
<?php
include 'includes/connect.php';

  if($_SESSION['admin_sid']==session_id())
  {



if(isset($_GET['up']))
{

	$id=$_GET['up'];

  $query= "UPDATE  book SET book=1 WHERE id=$id";

    $stmt=$con->prepare($query);
  $stmt->execute() ;
  
    $query= "UPDATE  book1 SET cn=1 WHERE hid=$id";

$stmt=$con->prepare($query);
  $stmt->execute() ;

    header("location:admin-page.php");    




}


if(isset($_GET['dp']))
{

	$id=$_GET['dp'];
	//echo $id;
	//echo $user_id;

$query= "UPDATE  book SET book=0,ad=1 WHERE id=$id";

$stmt=$con->prepare($query);
	$stmt->execute() ;
  $query= "UPDATE  book1 SET cn=1 WHERE hid=$id";

$stmt=$con->prepare($query);
  $stmt->execute() ;

 	$x=1;
	header('location:admin-page.php? signup=empty');



}

  }
    else
  {
    if($_SESSION['admin_sid']==session_id())
    {
      header("location:admin-page.php");    
    }
    else{
      header("location:login.php");
    }
  }
