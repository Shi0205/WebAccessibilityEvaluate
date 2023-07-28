<?php 

include_once 'database.php';

if(isset($_POST['message'])){

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Save Data
  try{
    $stmt = $conn->prepare("INSERT INTO fyp_tbl_contacts(fld_contact_name, fld_contact_email, fld_contact_title, fld_contact_message) VALUES (:cname, :cemail, :ctitle, :cmessage)");

    $stmt->bindParam(':cname', $cname, PDO::PARAM_STR);
    $stmt->bindParam(':cemail', $cemail, PDO::PARAM_STR);
    $stmt->bindParam(':ctitle', $ctitle, PDO::PARAM_STR);
    $stmt->bindParam(':cmessage', $cmessage, PDO::PARAM_STR);

    $cname = $_POST['contact_name'];
    $cemail = $_POST['contact_email'];
    $ctitle = $_POST['contact_title'];
    $cmessage = $_POST['contact_message'];

    $stmt->execute();

    $_SESSION['send'] = true;

  }catch(PDOException $e){
    echo "Error". $e->getMessage();
  }

  $conn = null;



}





/*
if(isset($_POST['message'])){

  $name = $_POST['contact_name'];
  $email = $_POST['contact_email'];
  $title = $_POST['contact_title'];
  $message = $_POST['contact_message'];

  if(empty($name) || empty($email) || empty($title) ||empty($message) ){

  }else{

  // Set up the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Set up the email parameters
    $to = "a180172@siswa.ukm.edu.my"; // Replace with your email address
    $subject = "WAE: New message from $name about $title";
    $body = "From: $name <$email>\n\n$message";

    if(mail($to,$subject,$body)){
      echo "Successfully";
    }else{
      echo "Error: Message could not be sent.";
    }

  }

}*/
?>