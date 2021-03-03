<?php
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
function getLocationInfoByIp($ip){

  $result  = array('country'=>'', 'city'=>'');

  
  $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
  if($ip_data && $ip_data->geoplugin_countryName != null){
      $result['country'] = $ip_data->geoplugin_countryCode;
      $result['city'] = $ip_data->geoplugin_city;
  }
  return $result;
}
if(isset($_POST['tes']))
{


 
  $ip = getIPAddress(); 
   $data =  getLocationInfoByIp($ip);
    if($data['country']=='IN')
    {
      echo "You Got Blocked" ;
    }
    else{
      echo "No"; 
    }
// PHP di Duniail

  
}
?>
