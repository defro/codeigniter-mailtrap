<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MailtrapTest
 * Just a small example of a controller for testing Mailtrap Library
 * Copy/Paste this file in your folder application/controllers
 * Add this route to your application/config/routes.php file : $route['^mailtrap$'] = 'MailtrapTest';
 * And call this url in your browser : //yourdomain.com/index.php/mailtrap
 */
class MailtrapTest extends CI_Controller
{

	public function index()
	{
		$myConfig = array(
			  'mailtrap_api_token' => 'bd35f89bc30c5f4db5f43c3953da19bd',
			  'mailtrap_debug' => TRUE
		);
		$this->load->library('mailtrap', $myConfig);

		$user = $this->mailtrap->getUser();
		//$this->_my_print_r($user, 'getUser');

		$inboxes = $this->mailtrap->getInboxes();
		$this->_my_print_r($inboxes, 'getInboxes');

		if (is_array($inboxes) && !empty($inboxes))
		{
			foreach($inboxes AS $inbox) {
				$messages = $this->mailtrap->getMessages($inbox['id']);
				//$this->_my_print_r($messages);
			}
		}

		if ($messages && is_array($messages) && !empty($messages))
		{
			foreach($messages AS $message) {
				$body = $this->mailtrap->getMessageBody($message['inbox_id'], $message['id']);
				//$this->_my_print_r($body);
			}
		}

		die('END mailtrap test controller');
	}

	private function _sendMail()
	{
		$this->load->library('email');

		$send = $this->email
			  ->from('j.gaujard@gmail.com')
			  ->to('defro@users.noreply.github.com')
			  ->subject("It is " . date('H:i:s'))
			  ->message("No specific message... Just a test.")
			  ->send()
		;

		if ($send) {
			echo 'Email sent !';
		}
		else {
			echo 'Email not sent :-(';
			$this->_my_print_r($this->email->print_debugger());
		}
	}

	private function _my_print_r($print, $die = FALSE)
	{
		echo '<pre>';
		print_r($print);
		echo '</pre>';

		if ($die !== FALSE) die($die);
	}

}