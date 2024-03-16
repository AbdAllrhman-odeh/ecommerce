<?php
    require_once('../configration/config.php');
    require('class/user.php');
    if($_POST)
    {
        function validateInput($name,$email,$password)
        {
            $flag=array();
            if(empty($name) || empty($email) || empty($password))
            {
                $flag['msgEmpty']= "Please fill in all fields!";
                return $flag;
            }
            else if(strlen($name) < 4 )
            {
                $flag['msgLengthName']= "Name must be at least 4 characters long.";
            }
            else if(strlen($email) < 5 )
            {
                $flag['msgLengthEmail'] = "Email must be at least 5 characters long.";
            }
            else if(strlen($password) < 5 )
            {
                $flag['msgLengthPassword'] = "Password must be at least 5 characters long.";
            }

            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $flag['msgInvalidEmail'] = "Invalid email format. Please enter a valid email address.";
            }

            if(empty($flag))
            return true;

            return $flag;
        }

        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
  
        $flag=validateInput($name,$email,$password);
        if($flag===true) //valid input
        {
            //create the connection
            $dbObj=new dataBase();
            $db=$dbObj->getConnection();
    
            //create a new obj of USER
            $userObj=new user($db);

            //check if the user alredy exists
            if($userObj->checkIfEmailExists($email))
            { //user alredy exists
                $flag=array();
                $flag['msgExistsEmail'] = "This email address is already registered. Please use a different email.";
                
                header('Location: registration.php?result='.(json_encode($flag)).'');
                exit();
            }

            //user does not exist
            $userObj->addNewUser($name,$email,$password);

        }
        else //invalid input
        {
            //header does not accept an array, just excetp an stirng
            //so we well pass it an json string (key=>value)
            header('Location:registration.php?result='.(json_encode($flag)).'');
            exit();
        }

        //form is not submtied yet..
        header('Location:login.php');
        exit();
    }

?>