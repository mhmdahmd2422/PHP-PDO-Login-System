<?php

class LoginClass extends Dbh
{
    protected function setUser($uid, $pwd, $email){
        $query = 'SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?';
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("Location: index.php?error=stmtfailed");
            exit;
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("Location: index.php?error=usernotfound");
            exit;
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd == false){
            $stmt = null;
            header("Location: index.php?error=wrongpassword");
            exit;
        } else {
            $query = 'SELECT * From users where users_uid = ? OR users_email = ? and users_pwd = ?';
            $stmt = $this->connect()->prepare($query);
            if(!$stmt->execute(array($uid, $email, $pwdHashed[0]["users_pwd"]))){
                $stmt = null;
                header("Location: index.php?error=stmtfailed");
                exit;
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("Location: index.php?error=usernotfound2");
                exit;
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sesh = session_start();
            print_r($user);
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            $stmt = null;
            if($sesh){
                header("Location: index.php?session=true");
            } else{
                header("Location: index.php?session=false");
            }
        }

        $stmt = null;
    }
}
















