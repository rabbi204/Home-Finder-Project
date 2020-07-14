
<?php
include 'includes/connect.php';
include 'includes/wallet.php';

  if($_SESSION['customer_sid']==session_id())
  {



if(isset($_GET['up']))
{

	$id=$_GET['up'];

	$query= "UPDATE  book SET val=0 WHERE id=$id";

    $stmt=$con->prepare($query);
	$stmt->execute() ;


	$query= "DELETE FROM `book1` WHERE hid=$id";

    $stmt=$con->prepare($query);
	$stmt->execute() ;


	header('location:bo.php? signup=empty');

}


if(isset($_GET['delete']))
{

	$id=$_GET['delete'];
	//echo $id;
	//echo $user_id;
	$query= "INSERT INTO book1(uid,hid) VALUES ($user_id,$id)";
    $stmt=$con->prepare($query);
    $stmt->execute() ;

$query= "UPDATE  book SET val=1 WHERE id=$id";

$stmt=$con->prepare($query);
	$stmt->execute() ;
 	$x=1;
	header('location:bo.php? signup=empty');



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
