<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class SendMail extends Controller
{
    function __construct(){
        $this->email = \Config\Services::email();
    }

    function sendMail($to, $subject, $message) { 
        $this->email->setTo($to);
        $this->email->setFrom('pupt.rfeis2021@gmail.com', 'PUPT RFEIS');
        
        $this->email->setSubject($subject);
        $this->email->setMessage($message);

        $this->email->send();
    }

}