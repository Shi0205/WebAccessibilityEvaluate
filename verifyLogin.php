<?php

include_once 'database.php';
session_start();

if (isset($_POST['user_login'])) {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $conn->prepare("SELECT * FROM fyp_tbl_admin WHERE fld_admin_id = :userid LIMIT 1");

        $stmt->bindParam(':userid', $username, PDO::PARAM_STR);

        $username = $_POST['username'];
        $pswd = $_POST['pswd'];

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($result['fld_admin_id'])) {
            if ($result['fld_admin_password'] == $pswd) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $result['fld_admin_id'];
                header("Location: admin.php");
                exit();
            } else {
                $_SESSION['errorM'] = "Invalid password. Please try again.";
            }
        } else {
            $_SESSION['errorM'] = "Invalid username. Please try again.";
            header("Location: login.php");
            exit();
        }
        header("Location: login.php");
        exit();

    } catch (PDOException $e) {
        $_SESSION['errorM'] = "problem";
    }

    $conn = null;
}
?>
