<?php
session_start();
require_once('./connect.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
    //handle POST requests
    $error_msg=false;
    if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['agree'])&&isset($_POST['email'])){
        if($_POST['agree']==='ok'&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['email'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=md5($_POST['password']);
            $av_char="/[^a-z0-9A-Z@._]/";
            if(preg_match($av_char, $username)===1){
                $_SESSION['error']="Use the right input!";
                $error_msg=true;
            }
            else if(preg_match($av_char, $email)===1){
                $_SESSION['error']="Use the right input!";
                $error_msg=true;
            }
            else if(preg_match($av_char, $_POST['password'])===1){
                $_SESSION['error']="Use the right input!";
                $error_msg=true;
            }
            if($error_msg){
                header("Location: ../registration.php");
                die;
            }
            $point=0;
            $role="R3";
            if(empty($username)){
                $_SESSION['error']="The username cannot be empty!";
                $error_msg=true;
            }
            else if(strlen($username) < 4){
                $_SESSION['error']="The username is too short!";
                $error_msg=true;
            }
            else if(strlen($username) > 50){
                $_SESSION['error']="The username is too long!";
                $error_msg=true;
            }
            if(empty($email)){
                $_SESSION['error']="The email cannot be empty!";
                $error_msg=true;
            }
            else if(strlen($email) < 10){
                $_SESSION['error']="The email is too short!";
                $error_msg=true;
            }
            else if(strlen($email) > 50){
                $_SESSION['error']="The email is too long!";
                $error_msg=true;
            }
            if(empty($_POST['password'])){
                $_SESSION['error']="The password cannot be empty!";
                $error_msg=true;
            }
            else if(strlen($_POST['password']) < 7){
                $_SESSION['error']="The password is too short!";
                $error_msg=true;
            }
            else if(strlen($_POST['password']) > 50){
                $_SESSION['error']="The password is too long!";
                $error_msg=true;
            }
            if($error_msg){
                header("Location: ../registration.php");
                die;
            }
            $sql="SELECT userEmail FROM user WHERE userEmail=?";
            $query=$mysqli->prepare($sql);
            $hasil=$query->bind_param("s",$email);
            $query->execute();
            $query->bind_result($user_email_data);
            $query->store_result();
            if($query->num_rows==0){
                $sql="INSERT INTO user(userName,userPass,userEmail,userPoint,userRoleID) VALUES (?,?,?,?,?)";
                $query=$mysqli->prepare($sql);
                $hasil=$query->bind_param("sssds",$username,$password,$email,$point,$role);
                $query->execute();
                if($query->affected_rows<0){
                    $message="Sign Up Failed";
                    header("location: ../registration.php?message=$message");
                }
                else{
                    $message="Sign Up Success";
                    header("location: ../login.php?message=$message");
                }
            }
            else{
                    $query->fetch();
                    $error_msg=true;
                    $_SESSION['error']="Sign Up Failed!<br>Email has been registered!";
                    header("location: ../registration.php");
                    die;
            }
        }
        else if(empty($_POST['username'])||empty($_POST['email'])||empty($_POST['password'])){
            $_SESSION['error']="The username or password or email has not been filled!";
            header("Location: ../registration.php");
            die;
        }
        else{
            $_SESSION['error']="The checkbox has not been filled!";
            header("Location: ../registration.php");
            die;
        }
    }
    else if(!isset($_POST['username']) && !isset($_POST['email']) && !isset($_POST['password'])){
        $_SESSION['error']="The username or password or email has not been filled!";
        header("Location: ../registration.php");
        die;
    }
    else{
        $_SESSION['error']="The checkbox has not been filled!";
        header("Location: ../registration.php");
        die;
    }
}
?>