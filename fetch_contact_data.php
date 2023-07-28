<?php
session_start();
include_once 'database.php';

if ($_SESSION['login'] == false) {
  header("Location: index.php");
  exit;
}

if (isset($_GET['cid'])) {
  $cid = $_GET['cid'];

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM fyp_tbl_contacts WHERE fld_contact_id = :cid");
    $stmt->bindParam(':cid', $cid);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Generate the HTML content to be displayed in the modal
    $html = '<p><b>User\'s name:</b> ' . $result['fld_contact_name'] . '</p>';
    $html .= '<p><b>User\'s Email:</b> <a href="mailto:' . $result['fld_contact_email'] . '?subject=' . urlencode('Regarding: ' . $result['fld_contact_title']) . '">' . $result['fld_contact_email'] . '</a></p>';
    $html .= '<p><b>Title :</b> ' . $result['fld_contact_title'] . '</p>';
    $html .= '<p><b>Date Time :</b> ' . $result['fld_date_time'] . '</p>';
    $html .= '<p><b>Message:</b> </p>';
    $html .= '<p>'. $result['fld_contact_message'] . '</p>';

    // Add more fields as needed

    echo urldecode($html);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>
