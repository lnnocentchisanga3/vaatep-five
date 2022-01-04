<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Error:  Error </title>
  <!-- StyleSheets -->
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
</head>
<body class="" style="background-color: whitesmoke; color: whitesmoke;">

  <script>
    var msg1 = '<div style="width: 100%; margin-top: 10rem;"><div style="width: 50%; margin-left: 25%; text-align: center;"><span style="color: black;"><img src="./animations/loading1.gif"><br><br><span style="padding: 8px;" class="py-4 text-uppercase">While the system is sending Notifications</span></div></div>';

    fetch('https://google.com', {
        method: 'GET', // *GET, POST, PUT, DELETE, etc.
        mode: 'no-cors',
    }).then((result) => {
       document.getElementById('display_network').innerHTML = msg1; 
    }).catch(e => {
       document.getElementById('display_network1').innerHTML = (e);
    })
  </script>

  <div id="display_network">
    
  </div>


<?php
session_start();
include("dbconnection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_GET['send'])) {

     $msg_data_days = '';
  
    $msg_data_tb1 = '
                  <p style="padding: 8px;">You have recieved this Email to notify you about the upcoming under five clinic days that are coming soon.
                  Below are the days that you are going to visit the clinic.</p>
                 <div style="background-color: white;">
                  <table style="padding: 1rem; width: 100%; font-family: Arial, Helvetica, sans-serif;  border-collapse: collapse;">
                    <thead>
                      <tr>
                         <th style="border: 0.5px solid black; padding: 8px; color: black;">Date</th>
                        <th style="border: 0.5px solid black; padding: 8px; color: black;">Time From</th>
                        <th style="border: 0.5px solid black; padding: 8px; color: black;">Time To</th>
                      </tr>
                    </thead>
                    <tbody>';

        $v_days = mysqli_query($con, "SELECT * FROM `under_five_days` ");
                      if (mysqli_num_rows($v_days)==null) {
                        echo "<tr class='text-center'> <td>No record for immunization to show</td> </tr>";
                      }else{
                        while ($row_days = mysqli_fetch_array($v_days)) {

                          $msg_data_days .='<tr>
                                  <td style="border: 0.5px solid black; padding: 8px; color: black;">'.$row_days["day"].'</td>
                                  <td style="border: 0.5px solid black; padding: 8px; color: black;"><strong>'.$row_days["from_time"].'</strong></td>
                                  <td style="border: 0.5px solid black; padding: 8px; color: black;"><strong>'.$row_days["to_time"].'</strong></td>
                                </tr>';
                        }
                      }


    $msg_data_tb2 = '</tbody>
                  </table>
                </div><!-- table-responsive -->

                <h4><strong>NB : </strong>Please note that this email was sent by a computer so <strong>DO NOT REPLY </strong> to this email</h4>
                    ';

    require 'email/email/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->SMTPKeepAlive = true;                                   // Enable SMTP authentication
    $mail->Username   = $email_address;                    // SMTP username
    $mail->Password   = $email_password;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email_address); //senders address
    /*$mail->Username = $email;*/
    /*$mail->addReplyTo($email_address);*/

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "UNDER FIVE VISITING DAYS";
    $mail->Body  = $msg_data_tb1.$msg_data_days.$msg_data_tb2;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

/*echo '<div style="width: 100%; margin-top: 10rem;">
          <div style="width: 50%; margin-left: 25%; text-align: center;"><span style="color: black;"><img src="./animations/loading1.gif"><br><br><span style="padding: 8px;" class="py-4 text-uppercase">While the system is sending Notifications</span></div>
        </div>';*/


$query = mysqli_query($con, "SELECT email, child_number, phone FROM child_account");

while ($row = mysqli_fetch_array($query)) {
  $mail->addAddress($row['email'], $row['child_number']);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
  if (!$mail->send()) {
    //echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
     echo '<div style="width: 100%; margin-top: 10rem;">
          <div style="width: 50%; margin-left: 25%; text-align: center;"><span style="color: red;"><img src="./animations/no-internet1.gif"></div>
        </div>';

      break; //Abandon sending
  }else{
    //echo "Message sent to :" . $row['child_number'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
            //Mark it as sent in the DB
     echo '<div style="width: 100%; margin-top: 10rem;">
          <div style="width: 50%; margin-left: 25%; text-align: center;"><span style="color: red;"><img src="./animations/loading1.gif"><br>While the system is sending Notifications</div>
        </div>';

  }

 $mail->clearAddresses();
 $mail->clearAttachments();

}

      
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content



   
    ?>
    <script>
      window.location.href = "./admin/index.php?action=msg_sent";
    </script>
    <?php
} catch ( Exception $e ) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

  echo '<div style="width: 100%; margin-top: 10rem;">
          <div style="width: 50%; margin-left: 25%; text-align: center;"><span style="color: red;"><img src="./animations/no-internet.gif"><br><br> <div id="display_network1" style="color: black;"></div></div>
        </div>';
}

    /*header("location: dashboard.php?msg=send");*/
  /*}else{
    header("location: dashboard.php?msg=notsend");
  }*/
  

} 

?>

<?php


// if (isset($_POST['send'])) {
  /*require 'PHPMailer-master';*/

  // Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Load Composer's autoloader

//}
?>



</body>
</html>