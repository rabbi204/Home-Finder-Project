<?php
 include 'includes/connect.php';

 

 
  if($_SESSION['admin_sid']==session_id())
  {
    include 'action.php';
    ?>

<!DOCTYPE html>
<html>
<head>
  <title> crud</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  </nav>
<div class="container-fluid">
  <div class="row justify-content-center">
 
    <div class="col-md-10">

      <h3 class="text-center text-dark mt-2 ">HOME INFO
  </h3>
  <hr>
  <?php 
if(isset($_SESSION['response'])){




   ?>
<div class="alert alert-<?= $_SESSION['res_type'] ;?> alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?= $_SESSION['response']; ?>
</div>
 <?php } unset($_SESSION['response']);?>

    </div> 
  </div>
   <div class="row">
    <div class="col-md-4">
     <h3 class="text-center text-info">ADD INFO </h3>

<form action="insert.php" method="post"enctype="multipart/form-data">
  

  <div class="form-group">
  <?php
  /* 
$q="SELECT name from product"; 

$stmt=$conn->prepare($q);
$stmt->execute();
$result=$stmt->get_result();


    <select type="text" name="name" class="form-control"> 

<?php 
while ($rows=$result->fetch_assoc()) {
  # code...
  $m=$rows['name'];
  echo "<option value='$m'>$m</option>";
}



 ?>

  </select>

*/

   ?>

 </div>
 
<input type="hidden" name="id" value="<?= $id; ?>">
 <div class="form-group">
  <input type="text" name="name" value="<?= $namex; ?>" class="form-control" placeholder="name"> 
 </div>

  
 <div class="form-group">
    <select name="brand" id="brand" class="form-control">  
                          <option value=""><?= $type; ?> </option> 
                                                    <option value="normal">normal</option>  

                          <option value="high">high</option>  
                                                    <option value="low">low</option>  

 
                     </select>

 </div>
  <div class="form-group">
    <select name="region" id="brand" class="form-control">  
                          <option value=""> <?= $region; ?></option> 
                                                    <option value="mirpur">mirpur</option>  

                          <option value="uttora">uttora</option>  
                                                    <option value="dhanmondi">dhanmondi</option>  

 
                     </select>

 </div>
 <div class="form-group">

    <select name="lift" id="brand" class="form-control">  
                          <option value="">lift</option> 
                                                    <option value="1">1</option>  

                          <option value="1">0</option>  
                                                    
 
                     </select>

 </div>



<div class="form-group">
  <input type="number" name="floor" value="" class="form-control" placeholder=" floor"> 
 </div>

<div class="form-group">
  <input type="number" name="price" value="<?=$price; ?>" class="form-control" placeholder=" price"> 
 </div>
 
<div class="form-group">
  <input type="number" name="contract" value="<?=$contract; ?>" class="form-control" placeholder=" phone no"> 
 </div>

 <div class="form-group">
  <input type="number" name="bed" value="<?=$bed; ?>" class="form-control" placeholder=" bed no"> 
 </div>
 

<div class="form-group">
  <input type="number" name="wash" value="<?=$wash; ?>" class="form-control" placeholder=" washroom no"> 
 </div>

<div class="form-group">
  <input type="number" name="kit" value="<?=$kit; ?>" class="form-control" placeholder=" kitchen no"> 
 </div>

<div class="form-group">
  <input type="text" name="zip" value="<?=$zip; ?>" class="form-control" placeholder=" zip"> 
 </div>
<div class="form-group">
  <input type="text" name="house" value="<?=$house; ?>" class="form-control" placeholder=" house no"> 
 </div>

<div class="form-group">
  <input type="text" name="road" value="<?=$road; ?>" class="form-control" placeholder=" road no"> 
 </div>

<div class="form-group">
<input type="hidden" name="oldimage" value="<?=$img; ?>">
  <input type="file" name="image" class="custom-file"> 
  <img src="<?= $img ?>" width="120" class= "img-thumbnail">
 </div>
<div class="form-group">

     <?php  if($update== true){      ?>


<input type="submit" name="update" class="btn btn-success btn-block"value="update record"> 

<?php } else {  ?>

  <input type="submit" name="add" class="btn btn-primary btn-block"value="add record"> 

      <input type="button" name="out" class="btn btn-success btn-block" value="home"
       onclick= "location.href='admin-page.php' " > 
    <a href="home.php?logout='1'" style="color: red;">logout</a>
<?php } ?>
 </div>

</form>

<?php 
$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] ";
if(strpos($fullUrl,"signup=empty")==true)
{
  echo "provide all info plz";
}


 ?>


      </div>
      <div class="col-md-8">
        <?php 


/*if(isset($_POST['Search']))
{
  $name=$_POST['name'];

  //$id=$_GET['delete'];
  $query= "SELECT * FROM product WHERE name like '%$name%'";
  $stmt=$conn->prepare($query);
  // $stmt->bind_param("s",$name);
  $stmt->execute() ;
  $result=$stmt->get_result();
  //header('location:indee.php');

}*/ 
  $q="SELECT * from home join room join adress WHERE home.id=room.id AND home.id=adress.id "; 

  $stmt=$con->prepare($q);
  $stmt->execute();
  $result=$stmt->get_result();


         ?>

         <div id="result">
        

         
           <h3 class="text-center text-info">ALL RECORD </h3>
     <table class="table  table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>image</th>
        <th>name</th>
          <th>type</th>
        <th>price</th>
        <th>contract</th>
       

                <th>action</th>


      </tr>
    </thead>
    <tbody>

      <?php
      while ($row=$result->fetch_assoc()) {
        
      
       ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><img src="<?= $row['img']; ?>" width="25"></td>
        <td><?= $row['name']; ?></td>
                <td><?= $row['type']; ?></td>
                <td><?= $row['price']; ?></td>
                  <td><?= $row['contract']; ?></td>
                                    


                <td>


      <a width="20" href="info.php?details=<?= $row['id'];?>" class="badge badge-primary p-2 " > details</a>

<a href="action.php?delete=<?= $row['id'];?>" class="badge badge-danger p-2 "onclick="return confirm('do you wanna dlt this record');"> delete</a>

<a href="insert.php?edit=<?= $row['id'];?>" class="badge badge-success p-2"> edit</a>
 
                </td>




      </tr>
    <?php } ?>
      
    </tbody>
  </table>


     
     </div> 
   </div>
</div>


</body>
</html> 
<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:".php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});
</script>
<?php
  }
  else
  {
    if($_SESSION['customer_sid']==session_id())
    {
      header("location:index.php");   
    }
    else{
      header("location:login.php");
    }
  }
?>