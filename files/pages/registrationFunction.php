<?php
    require_once('../configration/config.php');
    require('class/user.php');
    if($_POST)
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $dbObj=new dataBase();
        $db=$dbObj->getConnection();

        $userObj=new user($db);
        $userObj->addNewUser($name,$email,$password);

        header('Location:login.php');
    }
?>