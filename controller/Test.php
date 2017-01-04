<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{

  public function mailtrap()
  {
    $this->load->library('mailtrap');

    //$response =$this->mailtrap->patchInboxByIdAsRead(123);
    //$response =$this->mailtrap->getInboxById(42030);
    //$all_messages =$this->mailtrap->getMessages(42030,1);
    //$response =$this->mailtrap->getMessageBody(42030,54764026,'txt');

    var_dump( $response ); die();
  }

}