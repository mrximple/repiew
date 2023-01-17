<?php
require_once('geoip2.phar');
use GeoIp2\Database\Reader;
function get_client_public_ip_address(){
    $ip_address=null;
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  //filter ip address
    $result=filter_var($ip_address,FILTER_VALIDATE_IP,FILTER_FLAG_NO_PRIV_RANGE|FILTER_FLAG_NO_RES_RANGE);
    if($result){
        return $ip_address;
    }
    else{
    //get public IP
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "ifconfig.me/ip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ip_address = curl_exec($ch);
    curl_close($ch);
    return $ip_address;
    }
}
function get_client_location($ip_address){
    $reader = new Reader('./php/GeoLite2-City.mmdb');
    try{
        //$record = $reader->city($_SERVER['REMOTE_ADDR']);
        $record = $reader->city($ip_address);
        if(!empty($record->city->name)){
            $result['city']=$record->city->name;
        }
        else{
            $result['city']="unknown";
        }
        if(!empty($record->postal->code)){
            $result['postal_code']=$record->postal->code;
        }
        else{
            $result['postal_code']='unknown';
        }
        return $result;
        
    }
    
    catch(\GeoIp2\Exception\AddressNotFoundException $e){
        return false;
    }
}


/*$result=filter_var($user_ip,FILTER_VALIDATE_IP,FILTER_FLAG_NO_PRIV_RANGE|FILTER_FLAG_NO_RES_RANGE);
if($result){
    printf("%s %s\n<br>",$user_ip,"buka ip private");
}
else{
    printf("%s %s\n<br>",$user_ip,"private or reserved ip");
}*/
?>