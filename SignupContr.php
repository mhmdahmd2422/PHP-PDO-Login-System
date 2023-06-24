<?php

class SignupContr extends SignupClass
{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    /**
     * @param $uid
     * @param $pwd
     * @param $pwdRepeat
     * @param $email
     */
    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function verifyUser(){
        if($this->emptyInput() == false){
        echo "Empty Input!";
        header("Location: index.php?error=emptyinput");
        exit;
        }

        if($this->invalidUid() == false){
            echo "invalidUid!";
            header("Location: index.php?error=invalidUid");
            exit;
        }

        if($this->invalidEmail() == false){
            echo "invalidEmail!";
            header("Location: index.php?error=invalidEmail");
            exit;
        }

        if($this->pwdMatch() == false){
            echo "Pwd dont match!";
            header("Location: index.php?error=pwdMatch");
            exit;
        }

        if($this->userExist() == false){
            echo "Username or Email already in use!";
            header("Location: index.php?error=userExist");
            exit;
        }

        $this->createUser($this->uid,$this->pwd,$this->email);
    }

    private function emptyInput(): bool{
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            return false;
        } else {
            return true;
        }
    }

    private function invalidUid(): bool{
        if(!preg_match('/^[a-zA-Z0-9]*$/', $this->uid)){
            return false;
        }else{
            return true;
        }
    }

    private function invalidEmail(): bool{
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return false;
        } else{
            return true;
        }
    }

    private function pwdMatch(): bool{
        if($this->pwd !== $this->pwdRepeat){
            return false;
        } else{
            return true;
        }
    }

    private function userExist(): bool{
        if(!$this->checkUser($this->uid, $this->email)){
            return false;
        }else {
            return true;
        }
    }
}