<?php
// Contact subject
$subject =$_REQUEST[‘subject’];
// Details
$message=$_REQUEST[‘detail’];
//echo $subject;
// Mail of sender
$mail_from=$_REQUEST[‘customer_mail’];
$name=$_REQUEST[‘name’];
// From
//$header=”from: $name <$mail_from>”;
// Enter your email address
$to =$_REQUEST[‘customer_mail’];
$send_contact=mail($to,$subject,$message);
// Check, if message sent to your email
if($send_contact){
echo “Your Message has been sent”;
}
else {
echo “ERROR”;
}
?>