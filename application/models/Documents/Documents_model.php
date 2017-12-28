<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Documents_model extends CI_Model {
   public function __construct()
        {
                parent::__construct();

        }

      public function saveEmail($data){
           $this->db->insert('emails', $data);
            if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
      }


      
      public function saveDocument($data){
           $this->db->insert('documentos', $data);
            if ( $this->db->affected_rows() == '1' ) {
               $insert_id = $this->db->insert_id();
               $data = array('id_documento' => $insert_id, 'estado' => 0, 'fecha' => date('Y-m-d H:i:s'), 'observaciones' => 'DOCUMENTO AUN NO HA SIDO ASIGNADO');
               $this->db->insert('historial_documento',$data);
                return TRUE;
              }
              else {
                return FALSE;
            }
      }

 
      
      public function getMailsByUser($userid){
          $this->db->where('id_user', $userid);
          $query = $this->db->get('emails_view');
           if ($query->num_rows() > 0){
            // return $query->result();
             $data = array();
             $i = 0;
             foreach ($query->result() as $row) {
                   $data[$i]['email'] = $row;
                   //var_dump();
                        $this->db->where('id_email', $row->id_email);
                        $this->db->where('es_archivo', 1);
                    $adjuntos = $this->db->get('documents_view');
                    $ar = array();
                     if($adjuntos->num_rows()>0){
                      
                      foreach ($adjuntos->result() as $ad) {
                        $ar[] = $ad;

                        //echo $row->asunto. '  '. $ad->nombre.'<br >';
                       }
                     $data[$i]['adjuntos']= $ar;

                     }else{
                     $data[$i]['adjuntos'] = false;
                     }
                    $i++;
                    }
             return $data;
          }
        return false;
      }


       public function getMails(){
          $query = $this->db->get('emails_view');
           if ($query->num_rows() > 0){
            // return $query->result();
             $data = array();
             $i = 0;
             foreach ($query->result() as $row) {
                   $data[$i]['email'] = $row;
                   //var_dump();
                        $this->db->where('id_email', $row->id_email);
                        $this->db->where('es_archivo', 1);
                    $adjuntos = $this->db->get('documents_view');
                    $ar = array();
                     if($adjuntos->num_rows()>0){
                      
                      foreach ($adjuntos->result() as $ad) {
                        $ar[] = $ad;

                        //echo $row->asunto. '  '. $ad->nombre.'<br >';
                       }
                     $data[$i]['adjuntos']= $ar;

                     }else{
                     $data[$i]['adjuntos'] = false;
                     }
                    $i++;
                    }
             return $data;
          }
        return false;
      }





      public function getDocumentsByEmail($email_id, $asignado = false, $es_archivo = false){
            $this->db->where('id_email', $email_id);
            if($asignado == true){
              $this->db->where('id_estado',0);
            }
            if($es_archivo == true){
              $this->db->where('es_archivo' , 1);
            }
            
            $query = $this->db->get('documents_view');

               
        if($query->num_rows()>0){
          return $query->result();
        }
        return false;
      }

       public function getNoDocument($id, $asignado = false){
            $this->db->where('id_email', $id);
            $this->db->where('es_archivo' , 0);
            if($asignado == true){
              $this->db->where('id_estado',0);
            }
            $query = $this->db->get('documents_view');

               
        if($query->num_rows()>0){
          return $query->result();
        }
        return false;
      }


      public function getDocumentFile($id){
            $this->db->where('id', $id);
                        $this->db->where('es_archivo' , 1);
            $query = $this->db->get('documents_view');

               
        if($query->num_rows()>0){
          return $query->result();
        }
        return false;
      }

    

      // public function emailExists($user_id, $email_id){
      //  $this->db->where(array('id_user' => $user_id, 'numero_email' => $email_id ));
      //   $query = $this->db->get('emails');
      //   if ($query->num_rows() > 0){
      //               return true;
        // }
        // return false;
      // }


     public function emailExists($email_id){
        $this->db->where(array('numero_email' => $email_id ));
         $query = $this->db->get('emails');
         if ($query->num_rows() > 0){
                   return true;
        }
        return false;
      }



      public function asignar($data,$id, $adjuntos= true){

      
       if($adjuntos){

                          $this->load->model('Documents/documents_model', 'doc');

                          $this->db->where('id', $id);
                           $history = array(
                                   'observaciones' => $data['observaciones'],
                              'asignado_por' => $data['asignado_por'],
                              'usuario_asignado'  => $data['responsable'],
                              'fecha_asignacion' => date('Y-m-d H:i:s'),
                              'estado' => $data['estado']

                              );
                       $this->db->update('documentos', $history); 

                       if ($this->db->affected_rows() > 0)
                          {

                             $result =  $this->doc->changeState($id,1, $this->auth_user_id, $data['observaciones'], $data['id_email']);
                            
                            //   unset($data['asignado_por']);
                            //   $id_email = $data['id_email'];
                            //   unset($data['id_email']);
                            // $this->db->insert('historial_documento', $data);
                            // if ($this->db->affected_rows() > 0){
                            //   $this->updateEmailState($id_email, $data['estado']);
                            //   return TRUE;
                            // }
                            if($result != false){
                              return TRUE;
                            }
                            return FALSE;
                          }
                        return FALSE;
                }else{

                }

                }

      public function getHistory($id){
          $this->db->where('id', $id);
          $query = $this->db->get('historial_documento_view');             
        if($query->num_rows()>0){
          return $query->result();
        }
        return false;
      }


      public function updateEmailState($id_email, $state){
        $this->db->where('id_email', $id_email);
        $this->db->update('emails',array('estado' => $state, 'fecha_cambio_estado' =>  date('Y-m-d H:i:s') ));
        if($this->db->affected_rows() > 0){
          return true;
        }
        return false;
      }


      public function saveHistory($data){
        $this->db->insert('historial_documento', $data);
        if ( $this->db->affected_rows() == '1' ) {            
                return TRUE;
              }
              else {
                return FALSE;
            }
      }


      public function getDocumentsByUser($userid){
        $this->db->where('usuario_asignado', $userid);
          $query = $this->db->get('documents_view');             
        if($query->num_rows()>0){
          return $query->result();
        }
        return false;
      }

        public function getDocumentsById($id){
        $this->db->where('id', $id);
        //$this->db->where('es_archivo', 1);
          $query = $this->db->get('documents_view');             
        if($query->num_rows()>0){
          return $query->row();
        }
        return false;
      }

       public function changeState($id,$state,$user ,$observacion = false, $id_email= false, $adjunto=0 ){
        $this->db->trans_begin();

         $this->db->select('id');
         $this->db->from('historial_documento');
         $this->db->where('id_documento',$id);
         $this->db->order_by('id', 'DESC');
         $this->db->limit(1);
         $query = $this->db->get();

         if($query->num_rows() > 0){
          $max = $query->row();
          $maxid = $max->id;

         //echo ''. $maxid;
         $this->db->where('id' , $maxid);
         $this->db->update('historial_documento', array('fecha_fin' => date('Y-m-d H:i:s') ));


         $this->db->where('id', $id);
         $this->db->update('documentos', array('estado' => $state));
        $history = array('id_documento' => $id, 'responsable'=> $user,'fecha' => date('Y-m-d H:i:s'),'estado' => $state, 'adjunto' => $adjunto);
         if($observacion != false){
          $history['observaciones'] = $observacion;
         }
         $this->db->insert('historial_documento',$history);
         $insert_id = $this->db->insert_id();
         $data = $this->updateEmailState($id_email,$state);
         }
           


        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
                return FALSE;
    }
    else
    {
            $this->db->trans_commit();
            //return TRUE;
           return $insert_id;
    }   
        
       }


       public function getState($id){
            $this->db->select('estado_email');
            $this->db->from('emails_view');
            $this->db->where('id_email' , $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
              return $query->result();
            }
            return false;

       }




       // public function saveModificado($data){
       //     $this->db->insert('documento_modificado', $data);
       //     //var_dump($this->db->affected_rows());
       //      if ( $this->db->affected_rows() == 1 ) {  
       //       //var_dump($data);
       //       //return true;
       //       if($this->changeState($data['id_original'], 3 , $data['id_usuario'], $data['observaciones'],$data['id_email'],1)){
       //         $last_id =  $this->db->insert_id();
       //         $data['id_historial'] = $last_id;
       //         $this->db->insert('documento_modificado', $data);
       //         return TRUE;
       //       }
       //       return FALSE;
       //        }
       //        return FALSE;
       // }
       

            public function saveModificado($data){
            $last_id = $this->changeState($data['id_original'], 3 , $data['id_usuario'], $data['observaciones'],$data['id_email'],1);
              // var_dump($last_id);
            if($last_id != false){
              $data['id_historial'] = $last_id;
              $this->db->insert('documento_modificado', $data);
              return TRUE;
            }
            return FALSE;
            
       }

       public function finalizar($data){
        
            if($this->changeState($data['id_doc'], $data['estado'] , $data['id_usuario'], $data['observaciones'] , $data['id_email'] ,$data['adjunto']) != false){
              return TRUE;
            }
            return FALSE;

          }



       public function tieneAdjuntos($id_email){
          $this->db->select('count(*) as adjuntos');
          $this->db->from('documents_view');
          $this->db->where('es_archivo', 1);
          $this->db->where('id_email',$id_email);
          $query = $this->db->get();
          if($query->num_rows() > 0){
              $cuenta = $query->row();
              if($cuenta->adjuntos > 0){
                return true;
              }
              return false;
            }
            return false;

       }



       public function findModificado($id){
          $this->db->select('*');
          $this->db->from('documento_modificado');
          $this->db->where('id_historial', $id);
          $query = $this->db->get();
          if($query->num_rows() > 0){
            return $query->row();
          }
          return false;
       }


       public function saveCallLog($data){
        $this->db->insert('historial_documento_llamada',$data);
         if ( $this->db->affected_rows() == '1' ) {
                return TRUE;
              }
              else {
                return FALSE;
            }
       }


       public function getHistoryCalls($id){
          $this->db->where('documento_id', $id);
          $this->db->order_by('id', 'DESC');
          $query = $this->db->get('historial_documento_llamadas_view');            
        if($query->num_rows()>0){
          return $query->result();
        }
        return false;
       }

       public function getEmailById($id){
          $this->db->where('id_email', $id);
          $query = $this->db->get('emails_view');
          if($query->num_rows()>0){
          return $query->row();
        }
        return false;
         }


    public function validarDocumento($id,$user_id){
      if($this->changeState($id,6,$user_id) === false){
        return false;
      }
      return true;
    }

    public function documentoObservaciones($id,$user_id,$obs){
       if($this->changeState($id,5,$user_id,$obs) === false){
        return false;
      }
      return true;
    }
    


    public function getLastHistory($id){
      $this->db->select('*');
      $this->db->from('historial_documento');
      $this->db->where('id_documento', $id);
      $this->db->order_by('id','DESC');
      $this->db->limit(1);
      $query = $this->db->get();
        if($query->num_rows()>0){
          return $query->row();
        }
        return false;
    }


}

