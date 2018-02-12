<?php 

class Api{

	public function __construct(){

	}

public function messageState($batchId){
  header('Content-Type: application/json');
          try {
            $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://sms.lanube.cl/services/rest/'.$batchId.'/status');
         // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          curl_setopt($ch, CURLOPT_USERPWD, "KROPSYS:KROPSYS2017");
          curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          $response = curl_exec($ch);
          curl_close($ch);
             $response = json_encode($response);
            echo json_decode($response, true);

          } catch (Exception $e) {
           return false; 
          }
        return false;
  }
 }