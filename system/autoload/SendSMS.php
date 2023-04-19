<?php
/**
* PHP Mikrotik Billing (www.phpmixbill.com)
* Ismail Marzuqi <iesien22@yahoo.com>
* @version		5.0
* @copyright	Copyright (C) 2014-2015 PHP Mikrotik Billing
* @license		GNU General Public License version 2 or later; see LICENSE.txt
* @donate		PayPal: iesien22@yahoo.com / Bank Mandiri: 130.00.1024957.4
**/
include_once ('Zenoph/Notify/AutoLoader.php');
                
use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Enums\TextMessageType;
use Zenoph\Notify\Request\NotifyRequest;
use Zenoph\Notify\Request\SMSRequest;

Class SendSMS{
    public static function _MF($purpose,$name="",$account="",$amount="",$plann="",$date="",$due=""){
        $tem = ORM::for_table('sms_template')->where('purpose', $purpose)->find_one();
        $message = $tem['message'];
        $message=str_replace("{name}",$name,$message);
        $message=str_replace("{account}",$account,$message);
        $message=str_replace("{amount}",$amount,$message);
        $message=str_replace("{plan}",$plann,$message);
        $message=str_replace("{date}",$date,$message);
        $message=str_replace("{due}",$due,$message);

        return $message;
    }
    public static function _sendSMS($_c,$to,$message){
        if(!empty($to)) {
            
            $str = ltrim($to, '255');
            $str = ltrim($to, '+255');
            $str = ltrim($str, '2550');
            $str = ltrim($str, '255255');
            $str = ltrim($str, '255+255');
            $to = '255' . $str;
            if($_c['sms_gateway']=="ujumbesms") {
                $api_key = $_c['sms_api_key'];
                $email = $_c['sms_username'];
                $url = "https://ujumbesms.co.ke/api/messaging";
                $sender = $_c['sms_sender_id'];
                $data = [
                    "data" => [[
                        "message_bag" => [
                            "numbers" => $to,
                            "message" => $message,
                            "sender" => $sender,
                        ]
                    ]]
                ];

                $sms_data = json_encode($data);

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($curl, CURLOPT_TIMEOUT, 10);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $sms_data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($sms_data),
                    'X-Authorization: ' . $api_key,
                    'email: ' . $email
                ));


                $res = curl_exec($curl);
            }elseif($_c['sms_gateway']=="advanta") {
                $api_key = $_c['sms_api_key'];
                $email = $_c['sms_username'];
                $url = "https://quicksms.advantasms.com/api/services/sendsms/";
                $sender = $_c['sms_sender_id'];

                $data=array(
                    "apikey"=>$api_key,
                    "partnerID"=>$email,
                   "message"=>$message,
                   "shortcode"=>$sender,
                     "mobile"=>$to,
                );
               // $data = json_encode($data);
                $cURLConnection = curl_init($url);
                curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
                curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($cURLConnection);
                curl_close($cURLConnection);
                
            }elseif($_c['sms_gateway']=="kibabasms"){

            }elseif($_c['sms_gateway']=="africantalkings"){
                require_once('AfricasTalkingGateway.php');

                $username   = $_c['sms_username'];
                $apikey     = $_c['sms_api_key'];

                $from = $_c['sms_sender_id'];

                $gateway = new AfricasTalkingGateway($username, $apikey);
                try {
                    $gateway->sendMessage($to, $message );
                } catch (AfricasTalkingGatewayException $e) {

                }
            }elseif($_c['sms_gateway']=="movesms"){

                $username=$_c['sms_username'];
                $Key=$_c['sms_api_key'];
                $senderId=$_c['sms_sender_id'];
                $tophonenumber=$to;
                $finalmessage=urlencode($message);
                $live_url="https://sms.movesms.co.ke/api/compose?username=".$username."&api_key=".$Key."&sender=".$senderId."&to=".$tophonenumber."&message=".$finalmessage."&msgtype=5&dlr=0";
                $parse_url=file($live_url);

                $res= $parse_url[0];

            }elseif($_c['sms_gateway']=="mspace"){
                $curl = curl_init();
                $main_url = "http://api.mspace.co.ke/mspaceservice/wr/sms/";

                $data2 = array(
                    'username' => $_c['sms_username'],
                    'password' => $_c['sms_password'],
                    'senderid' => $_c['sms_sender_id'],
                    'recipient' => $to,
                    'message' => $message
                );

                $sendtextUrl = "sendtext/" . str_replace("+","%20",(str_replace("&","/",http_build_query($data2))));

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $main_url . $sendtextUrl,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/json"),
                ));

                $res= curl_exec($curl);
            }elseif($_c['sms_gateway']=="juamobile"){

                $partnerID = $_c['sms_username'];
                $apikey = $_c['sms_api_key'];
                $shortcode = $_c['sms_sender_id'];

                $mobile = $to; // Bulk messages can be comma separated


                $finalURL = "https://mysms.celcomafrica.com/api/services/sendsms/?apikey=" . urlencode($apikey) . "&partnerID=" . urlencode($partnerID) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";
                $ch = curl_init();
                \curl_setopt($ch, CURLOPT_URL, $finalURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
            }elseif($_c['sms_gateway']=="afrinet"){
                $partnerID = $_c['sms_username'];
                $apikey = $_c['sms_api_key'];
                $shortcode = $_c['sms_sender_id'];

                $mobile = $to; // Bulk messages can be comma separated


                $finalURL = "https://bulksms.afrinettelecom.co.ke/api/services/sendsms/?apikey=" . urlencode($apikey) . "&partnerID=" . urlencode($partnerID) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $finalURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
            }elseif($_c['sms_gateway']=="smsonlinegh"){
               
              try {
                  
                    NotifyRequest::setHost('api.smsonlinegh.com');
    
                    // create request subject
                    $smsReq = new SMSRequest();
                    $smsReq->setAuthModel(AuthModel::API_KEY);
                    $smsReq->setAuthApiKey($_c['sms_api_key']);
                    
                    // set message properties
                    $smsReq->setMessage($message);
                    $smsReq->setMessageType(TextMessageType::TEXT);
                    
                    // message sender Id must be requested from account to be used
                    $smsReq->setSender($_c['sms_sender_id']);
                    
                    // add message destinations. 
                    $to = ltrim($to, '255');
                    $smsReq->adddestination($to."0");
                    
                    // an array of destinations to be added
                    $destsArr = array($to."0");
                    
                    // add phone numbers in an array
                    $addedCount = $smsReq->addDestinationsFromCollection($destsArr);
                    
                    // submit message for response
                    $msgResp = $smsReq->submit();
                } 
                
                catch (\Exception $ex) {
                    die ($ex->getMessage());
                }
            

            } else{

                $partnerID = $_c['sms_username'];
                $apikey = $_c['sms_api_key'];
                $shortcode = $_c['sms_sender_id'];

                $mobile = $to; // Bulk messages can be comma separated


                $finalURL = "https://sms.phitech.co.ke/api/services/sendsms/?apikey=" . urlencode($apikey) . "&partnerID=" . urlencode($partnerID) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";
                $ch = curl_init();
                \curl_setopt($ch, CURLOPT_URL, $finalURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
               // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT_MS, 400);
                curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
                 curl_exec($ch);
                curl_close($ch);
            }



       $d = ORM::for_table('sms_sent')->create();
       $d->phone = $to;
       $d->type = "";
       $d->message = $message;
       $d->datet = date('d/m/Y H:i:m:s');
       $d->save();

       return $res;

        }
    }
}
