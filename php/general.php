<?php
session_start();
require_once('connect.php');
$username=$_SESSION['username']??'User';
$login=$_SESSION['is_login']??false;
$user_id=$_SESSION['user_id']??null;
$user_point=$_SESSION['user_point']??0;
$sql="SELECT userPoint FROM user WHERE userID= ?";
$query=$mysqli->prepare($sql);
$hasil=$query->bind_param("d",$user_id);
$query->execute();
$query->bind_result($usr_Point);
$query->store_result();
if($query->num_rows>0){
    $query->fetch();
    $user_point=$usr_Point;
    
}
else{
    
    $user_point=0;
}

?>