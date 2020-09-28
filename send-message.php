<?php require'feedback-component.php';
if(isset($_REQUEST['sendMessage'])) {
    $name = $_POST['name'];
    $phone = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $messageInput = new ReceiveInput($name, $phone, $email, $message);
    if(!empty($messageInput->nameError())) {
        echo $messageInput->nameError();
    }
    else if(!empty($messageInput->phoneError())) {
        echo $messageInput->phoneError();
    }
    else if(!empty($messageInput->emailError())) {
        echo $messageInput->emailError();
    }
    else if(!empty($messageInput->messageError())) {
        echo $messageInput->messageError();
    }
    else {
        $content = "
        <div class='card'>
        <div class='card-header'>From: $email</div>
        <div class='card-body'>
        <h4 class='card-title'>$name</h4>
        <h5 class='card-text'> $message </h5>
        </div>
        </div>
        ";
        try{
            $mail = new SendEmail($content);
            $mail->sendEmail();
        } catch(PDOExeception $e) {
            echo "Oops, operation failed";
            $log = fopen("log.txt", 'a');
            fwrite($log, $e->get_message());
        }
    }
}