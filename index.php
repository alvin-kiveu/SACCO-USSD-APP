<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
  // This is the first request. Note how we start the response with CON
  $response  = "CON M-SACCO USSD\n";
  $response .= "1. My Account \n";
  $response .= "2. Deposit \n";
  $response .= "3. Withdraw \n";
  $response .= "4. Loan \n";
  $response .= "0. Exit \n";
} else if ($text == "1") {
  $response = "CON Choose account information you want to view \n";
  $response .= "1. Check Balance \n";
  $response .= "2. Mini Statement \n";
  $response .= "3. Full Statement \n";
  $response .= "0. Back \n";
}  else if ($text == "2") {
  $response = "Con Enter amount to deposit \n";
}elseif($text == "3"){
  $response = "Con Enter amount to withdraw \n";
}elseif($text == "4"){
  $response = "Con loan Section \n";
  $response .= "1. Apply for loan \n";
  $response .= "2. Check loan status \n";
  $response .= "0. Back \n";
}elseif($text == "0"){
  $response = "END Thank you for using M-SACCO";
}else if ($text == "1*1") {
  $response = "END Your account number is " . $accountNumber;
}else{
  $response = "END Incorrect input. Try again";
}


// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
