<?php





include '../includes/connect.php';




$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$phone = $_POST['phone'];
      //$photo = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  


$mail = $_POST['mail'];
$id = $_POST['ID'];




$sql = "INSERT INTO users (name, username, password,email,contact) VALUES ('$name', '$username', '$password','$mail', $phone);";

if($con->query($sql)==true){
    //move_uploaded_file($_POST['image'],$upload);


}

header("location: ../login.php");
?>