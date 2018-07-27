<?php
if (count($_POST) != 0) {

session_start();
date_default_timezone_set('Asia/Bishkek');
$date_ins = date_create()->format('Y-m-d H:i:s');

function getUserIP()
  {
      $client  = @$_SERVER['HTTP_CLIENT_IP'];
      $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
      $remote  = $_SERVER['REMOTE_ADDR'];

      if(filter_var($client, FILTER_VALIDATE_IP))
      {
          $ip = $client;
      }
      elseif(filter_var($forward, FILTER_VALIDATE_IP))
      {
          $ip = $forward;
      }
      else
      {
          $ip = $remote;
      }

      return $ip;
  }

  function test_input($data) {
    $data = strip_tags($data);
    $data = filter_var ($data, FILTER_SANITIZE_STRING);
    $data = preg_replace("#<(.*)/(.*)>#iUs", "", $data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    $data = stripslashes($data);
    $data = trim($data);
  return $data;
  }


  $user_ip = getUserIP();


  $user = substr(test_input($_POST["user"]),0,120);
  $phone = substr(test_input($_POST["phone"]),0,18);
  $email = filter_var(substr(test_input($_POST["email"]),0,120),FILTER_SANITIZE_EMAIL);
  $message = substr(test_input($_POST["message"]),0,500);
  $capcode = substr(test_input($_POST["capcode"]),0,6);
  $lang = substr($_SESSION['language'],0,2);


/*
  print_r ($_POST); // Show all post data
  echo $user_ip.'<br/>';
  echo $user.'<br/>';
  echo $phone.'<br/>';
  echo $email.'<br/>';
  echo $message.'<br/>';
  echo $capcode.'<br/>';
  echo $date_ins.'<br/>';
  echo $lang;
*/

// check captcha captcha code

  $result='ok';


}

if ($result=='ok') {
  //let's insert all data into db


  $servername = "176.126.165.135";
  $username = "user28493_userki";
  $password = "netuser000_ws";
  $dbname = "user28493_kinartdata_db";

  try {


      }

  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
  $conn = null;



  // Email function

  require 'assets/lib/mailer/PHPMailerAutoload.php';


  //Create a new PHPMailer instance
  $mail = new PHPMailer;


  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "mail.enirest.kg";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 465;
  //Set the encryption system to use - ssl or tls
  $mail->SMTPSecure = 'ssl';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "enirest@enirest.kg";
  //Password to use for SMTP authentication
  $mail->Password = "netuser000_as";
  //Set who the message is to be sent from
  $mail->setFrom('enirest@enirest.kg');
  //Set an alternative reply-to address
  //$mail->addReplyTo('info@kalaulym.kz');
  //Set who the message is to be sent to
  $mail->addAddress('enirest.kg@gmail.com');
  //Set encoding
  $mail->CharSet = 'UTF-8';
  //Set the subject line
  $mail->Subject = 'Новое сообщение с сайта enirest.kg';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
  //Replace the plain text body with one created manually

  // Set email to HTML
  $mail->isHTML(true);
  $mail->Body = '<h1>Новое сообщение:</h1><ul>
  '.'<li></h2>Имя: </h3>'.$user.'<br /></li>'.
  '<li></h2>Телефон: </h3>'.$phone.'<br /></li>'.
  '<li></h2>Email: </h3>'.$email.'<br /></li>'.
  '<li></h2>Сообщение: </h3>'.$message.'<br /></li>'.
  '<li></h2>Дата: </h3>'.$date_ins.'<br /></li>'.
  '<li></h2>IP-адрес: </h3>'.$user_ip.'<br /></li></ul>'
  ;


  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');


  //send the message, check for errors
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  //    echo " Сообщение доставлено...";
  }


//require_once 'errors/'.$lang.'_ok.html';

header ('Location: index.php');  // перенаправление на нужную страницу


}


else {
  // todo: make show bad (by language) page
  require_once 'errors/'.$lang.'_bad.html';
}

?>

