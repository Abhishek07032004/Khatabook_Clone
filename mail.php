<?php
include("connection.php");

$id = $_GET["bid"];
$sql = "SELECT `Email`, `business_id`, `taken` FROM `customerdetail` WHERE `customer_id`=$id";  // Fetching `taken` amount as well
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$business_id = $row['business_id'];
$sql1 = "SELECT `Businessname` FROM `businessdetail` WHERE `Business_id` = $business_id";
$result1 = $conn->query($sql1);

if ($result1) {
    $businessRow = $result1->fetch_assoc();
    $businessName = $businessRow['Businessname'];
} else {
    echo "Error: " . $conn->error;
    exit;
}

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'khatabookuser@gmail.com';
    $mail->Password   = 'gcwt fvro gvmy etbo';  // Use the App Password generated
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('khatabookuser@gmail.com', $businessName);
    $mail->addAddress($row['Email'], 'Joe User');
    $mail->addReplyTo('khatabookuser@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'REMINDER';
    $mail->Body    = 'You have to return <b>' . $row["taken"] . '</b> Rupees.';
    $mail->AltBody = 'You have to return ' . $row["taken"] . ' Amount.';

    $mail->send();
    echo '<script>
    alert("Reminder sent");
    var id = ' . json_encode($id) . ';
    window.location.href = "History.php?id=" + id;
    </script>';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
