<?php
//session_start();

include 'cox.php';
	$update=false;

	$id="";

$namex="";
//$price="";
//$contract="";
$type='type';

$region='region';


$img="";$bed="";$kit="";$wash="";
$zip="";$road="";
$house="";

if(isset($_POST['out']))
{
     session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}






























	
if(isset($_POST['add']))
{

 $name=$_POST['name'];
 $catgories=$_POST['brand'];
 	 $region=$_POST['region'];


 $price=$_POST['price'];
 $contract=$_POST['contract'];

 $bed=$_POST['bed'];
 $wash=$_POST['wash'];
 $kit=$_POST['kit'];
  $zip=$_POST['zip'];

 $house=$_POST['house'];
  $road=$_POST['road'];
    $lift=$_POST['lift'];
        $floor=$_POST['floor'];









 $photo=$_FILES['image']['name'];
$upload="uploads/".$photo;
if(empty($name) || empty($contract) || empty($price) || empty($house) || empty($photo) || empty($kit) || empty($zip)|| empty($road) || empty($wash) || empty($bed) || empty($contract) ){
	header('location:insert.php? signup=empty');

   // echo 'This line is printed, because the $var1 is empty.';
}	
else

{
	$query= "INSERT INTO home (name,type,region,price,contract,img,lift,floor) VALUES (?,?,?,?,?,?,?,?) ";
$stmt=$con->prepare($query);
$stmt->bind_param("sssssssi",$name,$catgories, $region,$price,$contract,$upload,$lift,$floor);
$stmt->execute() ;
move_uploaded_file($_FILES['image']['tmp_name'],$upload);

	$id =  $con->insert_id;
	$query= "INSERT INTO adress(id,zip,road,house) VALUES (?,?,?,?)";

$stmt=$con->prepare($query);
	$stmt->bind_param("isss",$id,$zip, $road,$house);

$stmt->execute() ;

$query= "INSERT INTO room(id,bed,kit,washroom) VALUES (?,?,?,?) ";
$stmt=$con->prepare($query);
	$stmt->bind_param("isss",$id,$bed,$kit,$wash);


$stmt->execute() ;
$query= "INSERT INTO book(id,val,book) VALUES ($id,0,0) ";
$stmt=$con->prepare($query);
$stmt->execute() ;


header('location:insert.php');


$_SESSION['response']="SUCCESSFULLY INSERTED TO THE DATABASE";
$_SESSION['res_type']="SUCCESS";

}
}
if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	$query= "DELETE FROM home WHERE id=?";
$stmt=$con->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute() ;

$query= "DELETE FROM room WHERE id=?";
$stmt=$con->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute() ;

$query= "DELETE FROM adress WHERE id=?";
$stmt=$con->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute() ;

$query= "DELETE FROM book WHERE id=?";
$stmt=$con->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute() ;
header('location:insert.php');


}

 if(isset($_GET['edit']))
 {


// 	$name=$_POST['name'];

$id=$_GET['edit'];
  $query= "SELECT * FROM(SELECT home.type, home.region, home.name ,home.id,home.img,home.price,home.contract,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house  from home join room join adress WHERE home.id=room.id AND home.id=adress.id) as z WHERE z.id=$id  ";
$stmt=$con->prepare($query);
$stmt->execute() ;
$result=$stmt->get_result();
  $row=$result->fetch_assoc();
$id=$row['id'];

$namex=$row['name'];
$price=$row['price'];
$contract=$row['contract'];
$type=$row['type'];

$region=$row['region'];


$img=$row['img'];
$bed=$row['bed'];
$kit=$row['kit'];
$wash=$row['washroom'];
$zip=$row['zip'];
$road=$row['road'];
$house=$row['house'];

 		$update=true;

// 	//header('location:indee.php');



 }
 if(isset($_POST['update']))
 {
 	 $id=$_POST['id'];

  
 $name=$_POST['name'];
 $catgories=$_POST['brand'];
 	 $region=$_POST['region'];


 $price=$_POST['price'];
 $contract=$_POST['contract'];

 $bed=$_POST['bed'];
 $wash=$_POST['wash'];
 $kit=$_POST['kit'];
  $zip=$_POST['zip'];

 $house=$_POST['house'];
  $road=$_POST['road'];


 $oldimage=$_POST['oldimage'];

 //$newimage=$_FILES['image']['name'];

if(isset($_FILES['image']['name']) &&   ($_FILES['image']['name']!=""))
{
	 $newimage=$_FILES['image']['name'];
unlink($oldimage);
move_uploaded_file($_FILES['image']['tmp_name'] , $newimage);
}
else
{

	$newimage=$oldimage;

}

	$query= "UPDATE  home SET name=?,type=?,region=?, price=?,contract=?,img=? WHERE id=?";

$stmt=$con->prepare($query);
	$stmt->bind_param("ssssssi",$name,$catgories,$region,$price,$contract,$newimage,$id);
	$stmt->execute() ;

	$query= "UPDATE  room SET bed=?,kit=?,washroom=? WHERE id=?";

$stmt=$con->prepare($query);
	$stmt->bind_param("sssi",$bed,$kit,$wash,$id);
	$stmt->execute() ;

 	$query= "UPDATE  adress SET zip=?,road=?,house=? WHERE id=?";

$stmt=$con->prepare($query);
	$stmt->bind_param("sssi",$zip,$road,$house,$id);
	$stmt->execute() ;
 	
 	header('location:insert.php');

 }






  ?>
