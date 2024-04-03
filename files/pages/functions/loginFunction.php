<?php
    require_once('../../configration/config.php');
    require('../class/user.php');

    if($_POST)
    {//form submited

        function checkInput($email,$password)
        {
            $flag=array();

            if(empty($email) || empty($password))
            {
                $flag['msgEmpty']="Please fill in all fields.";
            }
            else if(strlen($email) < 5)
            {
                $flag['msgInvlidEmail']="Email must be at least 5 characters long.";
            }
            else if(strlen($password) < 5)
            {
                $flag['msgInvlidPassword']="Password must be at least 5 characters long.";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $flag['msgInvalidEmailFormat'] = "Invalid email format. Please enter a valid email address.";
            }

            if(empty($flag)) 
            return true;

            return $flag;   
        }

        $email=$_POST['email'];
        $password=$_POST['password'];

        $flag=checkInput($email,$password);

        if($flag===true)
        {
            //check if the email and the password are correct

            //create the connection
            $dbObj=new dataBase();
            $db=$dbObj->getConnection();

            // create the user obj
            $userObj=new user($db);

            $checkEmail=$userObj->checkIfEmailExists($email);
            if($checkEmail===true)
            {
                //email is correct
                $checkPassword=$userObj->checkPassword($email,$password);
                if($checkPassword===true)
                {
                    // correct password
                    header('Location:../dashboard.php');
                    exit();
                }
                else
                {
                    // incorrect password
                    $flag=array();
                    $flag['msgIncorrectPass'] = "Incorrect password or email. Please try again.";
                    
                    header('Location:../login.php?result='.(json_encode($flag)).'');
                    exit();
                }
            }
            else
            {
                // incorrect email
                $flag=array();
                $flag['msgIncorrectEmail'] = "Incorrect email or password. Please try again.";
                
                header('Location:../login.php?result='.(json_encode($flag)).'');
                exit();
            }
        }
        else
        {
            //wrong email || password FORMAT
            header('Location:../login.php?result='.(json_encode($flag)).'');
            exit();
        }
    }
    //form is not submtied
    header('Location:../login.php');
    exit();
?>