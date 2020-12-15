<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alert extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->library('phpmailer_lib');
		$this->load->model('contract_model');
		$this->load->model('license_model');
	}

	/**
	 * SMTP options parameters
	 */
	public function index(){
		$mail = $this->phpmailer_lib->load();
		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'mail.accessbank.co.tz';
		$mail->SMTPAuth = true;
		$mail->Username = 'itnotification@accessbank.co.tz';
		$mail->Password = 'abtHQit@123';
		
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587; 
		
		$mail->setFrom('itnotification@accessbank.co.tz', 'Vendor Portal Notifications');
		$mail->addAddress('ntonsite.mwamlima@accessbank.co.tz');

		$mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
		
		// Set email format to HTML
		$mail->isHTML(true);

		// Send email
		if (!empty($this->contract_model)) {
			$contract = $this->contract_model->contract_expiry();
		}
		if (!empty($this->license_model)) {
			$license = $this->license_model->license_expiry();
		}

        if (!empty($license)) {
            foreach ($license as $row){
                $id = $row->id;
                // Email body content
                $mailContent = "<h1>License Notifications</h1>
                    <p>License ".$row->license_name." is about to expire</p>";
                $mail->Body = $mailContent;

                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'License Notification Sent';
                    log_message('info', 'All is well email is sent');
                    $update = $this->license_model->licenseExpiryChecked($id);

                    if($update){
                        log_message('info', 'All good license updated');
                    }
                }
            }
        }

        if (!empty($contract)) {
            foreach($contract as $row){

                $id = $row->id;

                // Email body content
                $mailContent = "<h1>Contract Notifications</h1>
                    <p>Contract ".$row->contract_name." is about to expire</p>";
                $mail->Body = $mailContent;

                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'Contract Notification Sent';
                    log_message('info', 'All is well email is sent');
                    $update = $this->contract_model->contractExpiryChecked($id);

                    if($update){
                        log_message('info', 'All good contract updated');
                    }
                }

            }
        }else{
            echo "No Contract which has expired";
        }
	}
}
