<?php

class LoginContr extends LoginClass
{
    private $uid;
    private $pwd;

    /**
     * @param $uid
     * @param $pwd
     */
    public function __construct($uid, $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this->emptyInput() == true){
            echo "Empty Input!";
            header("Location: index.php?error=emptyinput");
            exit;
        }
        $this->setUser($this->uid, $this->pwd, $this->uid);
    }

    private function emptyInput(): bool{
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            return false;
        } else {
            return true;
        }
    }
}