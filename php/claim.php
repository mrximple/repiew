<?php
require_once("general.php");
require_once('connect.php');
$user_id=$_SESSION['user_id'];
$user_point=$_SESSION['user_point'];
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['item_id'])&&!empty($_POST['item_id'])&&!empty($user_point)&&!empty($user_id)){
        $item_id=$_POST['item_id'];
        $sql="SELECT itemID,itemQty,itemPoint FROM redeemItem WHERE itemID= ?";
        $query=$mysqli->prepare($sql);
        $hasil=$query->bind_param("s",$item_id);
        $query->execute();
        $query->bind_result($item_id,$item_qty,$item_point);
        $query->store_result();
        if($query->num_rows>0){
            $query->fetch();
            $point=$item_point;
            if($user_point>=$point){
                $qty=$item_qty-1;
                $id=$item_id;
                $sql="UPDATE redeemItem  SET itemQty=? WHERE itemID= ?";
                $query=$mysqli->prepare($sql);
                $hasil=$query->bind_param("ds",$qty,$id);
                $query->execute();
                if($query->affected_rows<0){
                    $mysqli->close();
                    $message="redeem item Failed";
                    header("location: ../redeem.php?message=$message");
                }
                else{
                    $sql="SELECT userPoint FROM user WHERE userID= ?";
                    $query=$mysqli->prepare($sql);
                    $hasil=$query->bind_param("d",$user_id);
                    $query->execute();
                    $query->bind_result($user_points);
                    $query->store_result();
                    if($query->num_rows>0){
                        $query->fetch();
                        $usr_points=$user_points-$point;
                        $sql="UPDATE user  SET userPoint=? WHERE userID= ?";
                        $query=$mysqli->prepare($sql);
                        $hasil=$query->bind_param("dd",$usr_points,$user_id);
                        $query->execute();
                        if($query->affected_rows<0){
                            $mysqli->close();
                            $message="redeem item Failed";
                            header("location: ../redeem.php?message=$message");
                        }
                        else{
                            $mysqli->close();
                            $message="redeem item Success";
                            header("location: ../redeem.php?message=$message");
                        }
                    }
                    else{
                        $mysqli->close();
                        $message="redeem item Failed";
                        header("location: ../redeem.php?message=$message");
                    }
                }
            }
            else{
                $mysqli->close();
                $message="redeem item Failed.Point not enough";
                header("location: ../redeem.php?message=$message");
            }
        }
        
    }
    else{
        $message="Reedem Failed";
        header("Location: ../redeem.php?message=$message");
    }
}
?>