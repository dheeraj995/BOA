<!DOCTYPE html>
<html>
<body>

<?php
$name = $email = $company = $message = $contact = $option = "";
$nameErr = $emailErr = $companyErr = $messageErr = $contactErr = $optionErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"] || $_POST["name"]==" ")) {
    $nameErr = "Name is required";
  } else {
    $name = form($_POST["name"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     $nameErr = "Only letters and white space allowed"; }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = form($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $emailErr = "Invalid email format"; }
  }

  if (empty($_POST["contact"])) {
    $contactErr = "Required";
  } else {
    $contact = form($_POST["contact"]);
  }

  if (empty($_POST["company"])) {
    $companyErr = "Company Name is Required";
  } else {
    $company = form($_POST["company"]);
  }

  if (empty($_POST["option"])) {
    $companyErr = "You have to choose one of them";
  } else {
    $option = form($_POST["option"]);
  }
    
  if (empty($_POST["msg"])) {
    $message = "";
  } else {   
     $message = form($_POST["msg"]);
  } 
}

function form($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$to = "yogesh@appsuccessor.com";
$subject = "Contact BOA";
$mesag = "Hi, \n\r  My name is :". $name." \n\r and am an " .$option. " \n\r from " .$company. " \n\r and You can Contact Me Through my email id i.e. :".$email." \n\r or by my Mobile Number or skype Id :".$contact." \n\r Query : ".$message ;
$headers = 'From: '.$email."\r\n";
$headers .= "To: ".$to."\n";
$headers .= "Organization: Bay Of ADS \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

mail($to,$subject,$mesag,$headers, "-f yogesh@appsuccessor.com");
header('Location: index.html');
?>

</body>
</html>