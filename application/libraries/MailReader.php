<?php 

class MailReader{

	    protected $email;
	    protected $server;
	    protected $port;
	    protected $password;
	    protected $mailbox;
	    protected $totalMsg;
	    protected $limitMsg;
	    protected $filetypes;
	    protected $userid;
	    protected $CI;


		public function __construct($email= 'soporte@kropsys.cl',$password= 'pandora!x2012',$userid = false, $server = 'imap.gmail.com', $port = 993){
				$this->server = $server;
				$this->email = $email;
				$this->port = $port;
				$this->password = $password;
				$this->limitMsg = 10;
				$this->userid = $userid;
				$this->connect();
				$this->filetypes= array('xlsx','pdf','docx','png','jpg','jpeg','rar');
				$this->CI =& get_instance();
				$this->CI->load->model('documents/documents_model');
		    }

		public function connect(){
				$hostname = "{".$this->server.":".$this->port."/imap/ssl/novalidate-cert}";
				$this->mailbox = imap_open($hostname,$this->email, $this->password) or die('No se pudo conectar al servidor: ' . imap_last_error());

		}

		public function close(){
				imap_close($this->mailbox);
		}


		public function synchronize(){
			ini_set('max_execution_time', 0);
				//$emails = imap_search($this->mailbox, 'OR FROM "@kropsys.cl"');
				$emails = imap_search($this->mailbox, 'ALL');
				/* if emails are returned, cycle through each... */
				
			if($emails) {

			  /* begin output var */
			  $output = '';

			   /* put the newest emails on top */
			   rsort($emails);

			   $list = array();
			   $count = 0;
			    foreach($emails as $email_number) {
			     //var_dump($count);
			     //$inDB = $this->CI->documents_model->emailExists($this->userid, $email_number);
			     $inDB = $this->CI->documents_model->emailExists($email_number);

			   //  echo 'count : '.$count .'<br>';
			     if($count == $this->limitMsg){
			     		break;
			     	}

			     if($inDB){
			     	$count = $count + 1;
			     	continue;
			     }else{

			     	//echo 'NO EXISTE'.$count.'<br />';
							    /* informacion especifica del email*/
							    $overview = imap_fetch_overview($this->mailbox,$email_number,0);
							    $message = quoted_printable_decode(imap_fetchbody($this->mailbox,$email_number,'2'));
							    $structure = imap_fetchstructure($this->mailbox,$email_number);
							    $header = imap_headerinfo ( $this->mailbox, $email_number);


							   //pre($overview);


							     $attachments = array();
							       if(isset($structure->parts) && count($structure->parts)) {
							         for($i = 0; $i < count($structure->parts); $i++) {
							           $attachments[$i] = array(
							              'is_attachment' => false,
							              'filename' => '',
							              'name' => '',
							              'attachment' => '');
							           $extension = '';

							           if($structure->parts[$i]->ifdparameters) {
							             foreach($structure->parts[$i]->dparameters as $object) {
							               if(strtolower($object->attribute) == 'filename') {
							               			$sub = explode('.', $object->value);
							               			$ext = end($sub);
							               			
							               	if(in_array($ext, $this->filetypes)){
							               		$attachments[$i]['is_attachment'] = true;
							                	 $attachments[$i]['filename'] = $object->value;
							               	}
							                 
							               }
							             }
							           }

							           if($structure->parts[$i]->ifparameters) {
							             foreach($structure->parts[$i]->parameters as $object) {
							               if(strtolower($object->attribute) == 'name') {
							               	 $sub = explode('.', $object->value);
							               			$ext = end($sub);
							               	if(in_array($ext,$this->filetypes)){
							                 $attachments[$i]['is_attachment'] = true;
							                 $attachments[$i]['name'] = $object->value;
							                }
							                }
							             }
							           }

							           if($attachments[$i]['is_attachment']) {
							             $attachments[$i]['attachment'] = imap_fetchbody($this->mailbox, $email_number, $i+1);
							             if($structure->parts[$i]->encoding == 3) { // 3 = BASE64
							               $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
							             }
							             elseif($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
							               $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
							             }
							           }             
							         } // for($i = 0; $i < count($structure->parts); $i++)
							       } // if(isset($structure->parts) && count($structure->parts))


							     $overview = $overview[0];
							     $subject = isset($overview->subject) ? $overview->subject : false;
							     $sender = $header->from[0]->mailbox ."@". $header->from[0]->host;
							     $date = $overview->date;
							     $this->CI->documents_model->saveEmail(array( 
							     											/* 'id_user' =>$this->userid, */
							     											 'numero_email' =>$email_number,
							     											 'asunto' => $subject,
							     											 'enviado_por' => $sender,
							     											 'estado' => null,
							     											 'fecha_envio' => date('Y-m-d H:i:s', strtotime($date)),
							     											 'mensaje' => null,
							     											 'estado' => 0,
							     											 ));
							    $last_id = $this->CI->db->insert_id();

                             
							    if(count($attachments)!=0){
							     $attcont = 0;
							        foreach($attachments as $at){


							            if($at['is_attachment']==1){
							            	 $sub = explode('.', $at['filename']);
							               	 $ext = end($sub);
							                 if(in_array($ext, $this->filetypes)) {                  
							                     $path = 'archivos/'.$this->userid.'/'. $email_number;  
									            	if(!empty($at['filename'])){						            		
									            		if (!is_dir($path)) {				  									
							  								mkdir($path,0777,true);
							  								file_put_contents($path.'/'.$at['filename'], $at['attachment']);
							  							}
									            	}

									            $object->attachments[] =  $path.'/'.$at['filename'];   
									             $this->CI->documents_model->saveDocument(array('nombre' => $at['filename'], 'ubicacion' => $path.'/'.$at['filename'], 'id_email' => $last_id, 'es_archivo' => 1 ));  
							                 }

							                }else{
							                	if($attcont == 0){
							                		if($at['is_attachment'] == false){
							                			$this->CI->documents_model->saveDocument(array('nombre' => 'SIN ADJUNTOS', 'ubicacion' => 'NO APLICA', 'id_email' => $last_id, 'es_archivo' => 0 ));
							                		}
							                	}
							                	  
							                }
							              $attcont++;
							            }
							            
							            
							        }
			 					$count = $count+1;
                            }
                        }
			

				}

}


             public function sincronizar(){
             	ini_set('max_execution_time', 0);
             	$emails = imap_search($this->mailbox, 'ALL');
             	if($emails) {
             		 rsort($emails);
             		$count = 0 ; 
             		foreach ($emails as $messageNumber) {
             			if($count == $this->limitMsg){
             				break;
             			}

             			$structure = imap_fetchstructure($this->mailbox, $messageNumber);
             			if(!isset($structure->parts) || $inDB = $this->CI->documents_model->emailExists($messageNumber)){
             				$count++;
             				continue;
             			}
             			$flattenedParts = $this->flattenParts($structure->parts);
             			//var_dump($flattenedParts);
             			$overview = imap_fetch_overview($this->mailbox,$messageNumber,0);
 						$header = imap_headerinfo ( $this->mailbox, $messageNumber);
 						$overview = $overview[0];
						$subject = isset($overview->subject) ? $overview->subject : false;
						$sender = $header->from[0]->mailbox ."@". $header->from[0]->host;
						$date = $overview->date;

						//echo $subject.'<br />';
						//echo $sender;

									$data= array(	'message' => false, 
													'messageNumber' => $messageNumber,
													'sender' => $sender,
													'subject' => $subject,
													'date' => $date,
													'attachments'=> array());
									
									$message = false;
									foreach($flattenedParts as $partNumber => $part) {
								

										switch($part->type) {
											
											case 0:
												// the HTML or plain text part of the email
												$message = $this->getPart($this->mailbox, $messageNumber, $partNumber, $part->encoding);
												$data['message'] =$message;

												// now do something with the message, e.g. render it
											break;
										
											case 1:
												// multi-part headers, can ignore
										
											break;
											case 2:
												// attached message headers, can ignore
											break;
										
											case 3: // application
											case 4: // audio
											case 5: // image
											case 6: // video
											case 7: // other
												$filename = $this->getFilenameFromPart($part);
												if($filename) {
													// it's an attachment
													$attachment = $this->getPart($this->mailbox, $messageNumber, $partNumber, $part->encoding);
													$data['attachments'][]= array('filename' => $filename, 'file' => $attachment);
													//var_dump($filename);
													// now do something with the attachment, e.g. save it somewhere
													// 
													
												}
												else {
													// don't know what it is
												}
											break;
										
										}
										
									}

									//hay adjuntos
										$this->CI->documents_model->saveEmail(array(
											                                 //'id_user' =>$this->userid,
							     											 'numero_email' =>$messageNumber,
							     											 'asunto' => $subject,
							     											 'enviado_por' => $sender,
							     											 'estado' => null,
							     											 'fecha_envio' => date('Y-m-d H:i:s', strtotime($date)),
							     											 'mensaje' => $message,
							     											 'estado' => 0,
							     											 ));
							    		$last_id = $this->CI->db->insert_id();
							         $at = $data['attachments'] ;
									if(count($at) > 0){
											foreach ($at as $x) {
										//var_dump($at);
										$filename = $x['filename'];
										$attachment = $x['file'];

										 $sub = explode('.', $filename);
											               	 $ext = end($sub);
											                 if(in_array($ext, $this->filetypes)) {                  
											                     $path = 'archivos/'. $messageNumber;  
													            	if(!empty($filename)){						            		
													            		if (!is_dir($path)) {				  									
											  								mkdir($path,0777,true);
											  								
											  							}
											  							file_put_contents($path.'/'.$filename, $attachment);
													            	}

													            $object->attachments[] =  $path.'/'.$filename;   
													             $this->CI->documents_model->saveDocument(array('nombre' => $filename, 'ubicacion' => $path.'/'.$filename, 'id_email' => $last_id, 'es_archivo' => 1 ));  
											                 }
									}
									}else{
										$this->CI->documents_model->saveDocument(array('nombre' => 'SIN ADJUNTOS', 'ubicacion' => 'NO APLICA', 'id_email' => $last_id, 'es_archivo' => 0 ));
									}
										
										//echo $data['message'];
						$count++;			
             		}
             		return true;
             	}else{
             		return false;
             	}
             }


public function flattenParts($messageParts, $flattenedParts = array(), $prefix = '', $index = 1, $fullPrefix = true) {

						foreach($messageParts as $part) {
							$flattenedParts[$prefix.$index] = $part;
							if(isset($part->parts)) {
								if($part->type == 2) {
									$flattenedParts = $this->flattenParts($part->parts, $flattenedParts, $prefix,$index.'.', 0, false);
								}
								elseif($fullPrefix) {
									$flattenedParts = $this->flattenParts($part->parts, $flattenedParts, $prefix.$index.'.');
								}
								else {
									$flattenedParts = $this->flattenParts($part->parts, $flattenedParts, $prefix);
								}
								unset($flattenedParts[$prefix.$index]->parts);
							}
							$index++;
						}

						return $flattenedParts;
			
					}
		function getPart($connection, $messageNumber, $partNumber, $encoding) {
	
	$data = imap_fetchbody($connection, $messageNumber, $partNumber);
	switch($encoding) {
		case 0: return $data; // 7BIT
		case 1: return $data; // 8BIT
		case 2: return $data; // BINARY
		case 3: return base64_decode($data); // BASE64
		case 4: return quoted_printable_decode($data); // QUOTED_PRINTABLE
		case 5: return $data; // OTHER
	}
	
	
}

function getFilenameFromPart($part) {

	$filename = '';
	
	if($part->ifdparameters) {
		foreach($part->dparameters as $object) {
			if(strtolower($object->attribute) == 'filename') {
				$filename = $object->value;
			}
		}
	}

	if(!$filename && $part->ifparameters) {
		foreach($part->parameters as $object) {
			if(strtolower($object->attribute) == 'name') {
				$filename = $object->value;
			}
		}
	}
	
	return $filename;
	
}


}

class Omail{

	protected $subject;
	protected $from;
	protected $to;
	protected $email_number;
	protected $message;
	protected $date ;
	public $attachments;

	function __construct($subject,$from, $to,$email_number,$sender,$message,$date){
		$this->subject = $subject;
		$this->from = $from;
		$this->to = $to;
		$this->email_number = $email_number;
		$this->sender = $sender;
		$this->message = $message;
		$this->date = $date;
		$this->attachments = array();
	}

	function getSubject(){
		return $this->subject;
	}

	function getFrom(){
		return $this->from;
	}

	function getTo(){
		return $this->to;
	}

	function getEmailNumber(){
		return $this->email_number;
	}

	function getSender(){
		return $this->sender;
	}

	function getMessage(){
		return $this->message;
	}

	function getDate(){
		return $this->date;
	}

	
}