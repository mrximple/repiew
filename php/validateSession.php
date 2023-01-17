<?php
require_once('./php/connect.php');
require_once('./php/loginTime.php');
require_once('./php/location.php');
require_once('./php/get_ip.php');
function time_is_expired($time){
    if($time>=($time+(12*60*60))){
        return true;
    }
    else{
        return false;
    }
}
function checkSessionValidity(){

    if(isset($_SESSION['is_login'])){
        if(!empty($_SESSION['is_login'])){
            $user_ip=get_client_ip();
            //looking up the browser's information in the browscap.ini file.
            $browser=get_browser(null,true);
            //Returns false when no information can be retrieved, such as when the browscap configuration setting in php.ini has not been set.
            $user_agent=$browser['parent']??"";
            $user_public_ip=get_client_public_ip_address();
            
                
                if($_SESSION['client_ip']!==$user_ip){
                    return false;
                    /*session_destroy();
                    $message="user ip invalid";
                    $alamat="./signIn.php";
                    header("location: $alamat?message=$message");*/
                }
                
                if($_SESSION['user_agent']!==$user_agent){
                    return false;
                    /*session_destroy();
                    $message="user agent invalid";
                    $alamat="./signIn.php";
                    header("location: $alamat?message=$message");*/
                }
                
                
                if(time_is_expired($_SESSION['login_time'])){
                    return false;
                   /* session_destroy();
                    $message="session expired";
                    $alamat="./signIn.php";
                    header("location: $alamat?message=$message");*/
                }
                
                
    }
    else{
        return false;
    }
}


}
?>