 <?php

class SignupClass extends Dbh
{
    protected function checkUser(string $uid, string $email): bool
    {
        $query = 'SELECT * FROM users WHERE users_uid = ? OR users_email = ?';
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header('location: index.php?error=stmtfailed');
            exit;
        }

        $result = false;
        if ($stmt->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }


    protected function createUser($uid, $pwd, $email)
    {
        $query = 'INSERT INTO users(users_uid, users_pwd, users_email) VALUES (?,?,?)';
        $stmt = $this->connect()->prepare($query);
        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($uid, $hashedpwd, $email))){
            $stmt = null;
            header("Location: index.php?error=stmtfailed");
            exit;
        }
        $stmt = null;
    }

}