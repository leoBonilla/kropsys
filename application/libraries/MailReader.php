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
	    protected $last_update;
	    protected $search;


		public function __construct($email= 'soporte@kropsys.cl',$password= 'pandora!x2012',$userid = false, $server = 'imap.gmail.com', $port = 993){
				$this->server = $server;
				$this->email = $email;
				$this->port = $port;
				$this->password = $password;
				$this->limitMsg = 50;
				$this->userid = $userid;
				$this->connect();
				$this->filetypes= array('xlsx','pdf','docx','png','jpg','jpeg','rar');
				$this->CI =& get_instance();
				$this->CI->load->model('documents/documents_model');
				$this->CI->load->model('emails/emails_model');
				$this->last_update = $this->CI->emails_model->lastUpdate();
				if($this->last_update != false){
					$this->last_update = explode(' ', $this->last_update);
					$this->last_update = $this->last_update[0];
					$this->last_update = date_create($this->last_update);
					$this->last_update = date_format($this->last_update,'d-M-Y');
               	    $this->search = 'SINCE '.$this->last_update;
				}else {
					$this->search = 'ALL';
				}
				
		    }

		public function connect(){
				$hostname = "{".$this->server.":".$this->port."/imap/ssl/novalidate-cert}";
				$this->mailbox = imap_open($hostname,$this->email, $this->password) or die('No se pudo conectar al servidor: ' . imap_last_error());

		}

		public function close(){
				imap_close($this->mailbox);
		}




        public function sincronizar(){
             	ini_set('max_execution_time', 0);

             	$emails = imap_search($this->mailbox, $this->search ,SE_UID);
                if($emails) {
             		 rsort($emails);
             	     $last = $emails[0];
             	     // revisar si el ultimo correo ya esta en la base de datos
             	     if($this->CI->documents_model->emailExists($last)){
             	     	return false;
             	     }
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
						$subject = isset($overview->subject) ? $overview->subject : '';
						$subject  = str_replace('=?UTF-8?B?' , '' , $subject);
						//$subject  = str_replace('=?UTF-8?Q?' , '' , $subject);
  						//$subject  = str_replace('?=' , '' , $subject);  
  						$subject = utf8_decode(imap_utf8($subject));
						$sender = $header->from[0]->mailbox ."@". $header->from[0]->host;
						$date = $overview->date;


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
												$data['message'] =utf8_encode($message);;

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