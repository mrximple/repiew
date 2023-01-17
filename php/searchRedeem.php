<?php
require_once('connect.php');
require_once('printItem.php');
require_once('printEmptyItem.php');
require_once('tesInput.php');
if(isset($_POST['search'])&& !empty($_POST['search'])){
    $search_string=test_input($_POST['search']);
    if(strlen($search_string) > 100){
        $_SESSION['error']="Your input is too long!";
        header("Location: ./redeem.php?");
        die;
    }
    if(!preg_match_all("/^[a-zA-Z0-9 ]*$/", $search_string)){
        print_empty_item('IT000','asset\Redeem_item.png','No Item Found','0');
        die;
    }
    else{
        $search=$search_string;
    }
    $sql="select itemID,itemPicUrl,itemDesc,itemPoint,itemQty from redeemItem where itemDesc LIKE ?";
    $search_item="%$search%";
    $query=$mysqli->prepare($sql);
    $hasil=$query->bind_param("s",$search_item);
    $query->execute();
    $query->bind_result($item_id,$item_pic_url,$item_desc,$item_point,$item_qty);
    $query->store_result();
    if($query->num_rows>0){
        while($query->fetch()){
            print_item($item_id,$item_pic_url,$item_desc,$item_point);
        }
       
    }
    else{
        print_empty_item('IT000','asset\Redeem_item.png','No Item Found','0');
    }
    $_POST=array();
}


?>