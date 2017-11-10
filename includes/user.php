<?php
class User{
    private $id;
    private $login;
    private $email;
       
    function __construct($id, $login, $email){
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
    }
    
    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
?>