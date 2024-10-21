<?php 

require 'class/Database.php';
require 'class/filter_text.php';
require 'class/Crud.php';
require 'class/ecrypt_id.php';

// Create a new instance of the Database class
$database = new Database();
$pdo = $database->getConnection();

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User($pdo);
$loginResult = $user->check_login($username, $password);

if ($loginResult) {
       echo "<script>alert('Login ho Sucessu..!')</script>";
	   echo "<script>window.location='media.php'</script>";
    } else {
        echo "<script>alert('Username no Password sei sala..!')</script>";
	   echo "<script>window.location='index.php'</script>";
    }

 ?>