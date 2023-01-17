<?php
require_once('connect.php');
require_once('printItem.php');
$sql="select itemID,itemPicUrl,itemDesc,itemPoint,itemQty from redeemItem";
$query=$mysqli->prepare($sql);
$query->execute();
$query->bind_result($item_id,$item_pic_url,$item_desc,$item_point,$item_qty);
$query->store_result();
if($query->num_rows>0){
    while($query->fetch()){
        print_item($item_id,$item_pic_url,$item_desc,$item_point);
    }
$mysqli->close();
}
else{
    print_item('IT000','asset\Redeem_item.png','No Item','0');
}


?>