<?php
trait validate
{
    public $name;
    public $phone;
    public $email;
    public $message;
    public function __construct($name, $phone, $email, $message) {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
    }
    public function nameError() {
        if(empty(trim($this->name))) {
            $nameError = "<p class='text-danger'>The name is required</p>";
            return $nameError;
        }
    }
    public function phoneError() {
        if(empty(trim($this->phone))) {
            $phoneError = "<p class='text-danger'>The phone number is required</p>";
            return $phoneError;
        }
    }
    public function emailError() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
           $emailError = "<p class='text-danger'>Invalid Email Address</p>";
           return $emailError;
        }
    }
    public function messageError() {
        if(empty(trim($this->message))) {
            $messageError = "<p class='text-danger'>Please Enter your message</p>";
            return $messageError;
        }
    }
}
class ReceiveInput
{
    use validate;
}
class SendEmail
 {
    private $content;
    public function __construct($content) {
        $this->content = $content;
}
    public function mailSuccess(){
        $sent_status = "<div class='alert alert-success alert-dismissible fade show'>
    <strong><i class='fas fa-check-circle'></i></strong>Message has been sent successfully!
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
</div>";
return $sent_status;
    }
    public function mailFailed() {
        $sent_status = "<div class='alert alert-danger alert-dismissible fade show'>
        <strong><i class='fas fa-exclamation-triangle'></i></strong> Oops, Message Not Sent, Please try again later!
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
    </div>";
    return $sent_status;
    }
    public function sendEmail() {
    $to ='godwintumuhimbise@gmail.com';
    $headers = "From: noreply@example.com\r\n";
    $headers .="MIME-Version: 1.0\r\n";
    $headers.="Content-type: text/html; charset=ISO-8859-1\r\n";
    try{
       if(mail($to, $this->content, $headers)) {
           echo mailSuccess();
       }
    }catch(PDOExeception $e) {
        echo mailFailed();
        $log = fopen("log.txt", 'a');
        fwrite($log, $e->get_message());
        fclose($log);
    }
    }
}
