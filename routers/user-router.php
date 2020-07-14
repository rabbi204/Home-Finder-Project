<?php
include '../includes/connect.php';
	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_role/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE users SET role = '$value' WHERE id = $key;";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_verified/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE users SET verified = '$value' WHERE id = $key;";
			$con->query($sql);

   

           $s= "SELECT * FROM block WHERE id=$key";
	       $stm=$con->prepare($s);
          $stm->execute() ;
          $resulti=$stm->get_result();

          if(mysqli_num_rows($resulti) == 0)
     {      date_default_timezone_set("Asia/dhaka");

  	$x=date("Y-m-d H:i:s");

	$sql = "INSERT INTO block(id,date,verified) VALUES ($key,'$x','$value');";
         $con->query($sql);

     }
     else
    {           date_default_timezone_set("Asia/dhaka");


  	  	$x=date("Y-m-d H:i:s");

	$sql = "UPDATE block SET date='$x',verified='$value' WHERE id=$key;";
         $con->query($sql);



  }


          
            

    


		}
		if(preg_match("/[0-9]+_deleted/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE users SET deleted = '$value' WHERE id = $key;";
			$con->query($sql);
		}		
		if(preg_match("/[0-9]+_balance/",$key)){
			$key = strtok($key, '_');
			$result = mysqli_query($con,"SELECT * from wallet WHERE customer_id = $key;");
			if($row = mysqli_fetch_array($result)){
				$wallet_id = $row['id'];
				$sql = "UPDATE wallet_details SET balance = '$value' WHERE wallet_id = $wallet_id;";
				$con->query($sql);
			}
		}			
	}
header("location: ../users.php");
?>