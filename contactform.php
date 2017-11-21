<?php
 
$post_data = file_get_contents("php://input");
$data = json_decode($post_data);
 
// //Just to display the form values
// echo "Question : " . $data->question;
// echo "Email : " . $data->email;
// echo "phone " 
// echo "Message : " . $data->message;
 
// sned an email
$to = "shamsi@superjetgroup.com";
 
$subject = 'Coustomer Enquiery at all in one website';
 




$message = "<table border='0' cellpadding='2' cellspacing='2' width='600'>
<tr><td>Form details below:</td></tr>

<tr><td>Email: ".$data->$email."</td></tr>
<tr><td>Phone: ".$data->$phone."</td></tr>
<tr><td>Service: ".$data->$service."</td></tr>
<tr><td>Message: ".$data->$question."</td></tr>
</table>";		
 
$headers = 'From: ' . $data->email. 'allin one website' . "\r\n" .
        'Reply-To: info@allinoneemirates.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
 
//php mail function to send email on your email address
mail($to, $subject, $message, $headers);
 
?>