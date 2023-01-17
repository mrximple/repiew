<?php
session_start();
require_once('./connect.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
    //handle POST requests
    $error_msg=false;
    if(isset($_POST['email'])&&isset($_POST['newPassword'])&&isset($_POST['agree'])){
        if($_POST['agree']==='ok'&&!empty($_POST['newPassword'])&&!empty($_POST['email'])){
            $email=$_POST['email'];
            $password=md5($_POST['newPassword']);
            $av_char="/[^a-z0-9A-Z@._]/";
            if(preg_match($av_char, $email)===1){
                $_SESSION['error']="Use the right input!";
                $error_msg=true;
            }
            else if(preg_match($av_char, $_POST['newPassword'])===1){
                $_SESSION['error']="Use the right input!";
                $error_msg=true;
            }
            if($error_msg){
                header("Location: ../forgotPassword.php");
                die;
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
            if(empty($_POST['newPassword'])){
                $_SESSION['error']="The password cannot be empty!";
                $error_msg=true;
            }
            else if(strlen($_POST['newPassword']) < 7){
                $_SESSION['error']="The password is too short!";
                $error_msg=true;
            }
            else if(strlen($_POST['newPassword']) > 50){
                $_SESSION['error']="The password is too long!";
                $error_msg=true;
            }
            if($error_msg){
                header("Location: ../forgotPassword.php");
                die;
            }
            $sql="SELECT userEmail FROM user WHERE userEmail=?";
            $query=$mysqli->prepare($sql);
            $hasil=$query->bind_param("s",$email);
            $query->execute();
            $query->bind_result($user_email_data);
            $query->store_result();
            if($query->num_rows>0){
                $sql="UPDATE  user SET userPass=? WHERE userEmail=?";
                $query=$mysqli->prepare($sql);
                $hasil=$query->bind_param("ss",$password,$email);
                $query->execute();
                if($query->affected_rows<0){
                    $message="Reset Password Failed";
                    header("location: ../forgotPassword.php?message=$message");
                }
                else{
                    $message="Reset Password Success";
                    header("location: ../login.php?message=$message");
                }
            }
            else{
                $query->fetch();
                $_SESSION['error']="Reset Password Failed!<br>Email Not Found!";
                header("location: ../forgotPassword.php");
                die;
            }
        }
        else if(empty($_POST['email']) && empty($_POST['password'])){
            $_SESSION['error']="The email or password has not been filled!";
            header("Location: ../forgotPassword.php");
            die;
        }
        else{
            $_SESSION['error']="The checkbox has not been filled!";
            header("Location: ../forgotPassword.php");
            die;
        }
        
    }
    else if(!isset($_POST['email']) && !isset($_POST['password'])){
        $_SESSION['error']="The email or password has not been filled!";
        header("Location: ../forgotPassword.php");
        die;
    }
    else{
        $_SESSION['error']="The checkbox has not been filled!";
        header("Location: ../forgotPassword.php");
        die;
    }
}
?>