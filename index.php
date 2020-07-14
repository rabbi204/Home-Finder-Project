

<?php
include 'includes/connect.php';
include 'includes/wallet.php';

  if($_SESSION['customer_sid']==session_id())
  {

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HomeFinder</title>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <header class="sticky-top">
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white ">
      <a href="#" class="navbar-brand"><img src="images/logo.jpg"></a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

 
      <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
          <ul class="navbar-nav font-weight-bold">
            <li class="nav-item active">
                <a href="house.php" class="nav-link active">Home</a>
            </li>
           
            <li class="nav-item">
                <a href="bo.php" class="nav-link">Booking info</a>



            </li>
            <li class="nav-item">
                    <ul class="navbar-nav font-weight-bold">
                        <li class="nav-item">                <a href="tickets.php" class="nav-link"> Massage us</a>

                            <div class="collapsible-body">
                                <ul>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li> 


                              

            <li class="nav-item">
                <a href="routers/logout.php" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
    </nav>
    </div>
  </header>
<!------carousel-slider-1-------->
<div id="slider1" class="carousel slide mysilder" data-ride="carousel">
  <ol class="carousel-indicators">
    <li class="active" data-target="#slider1" data-slide-to="0"></li>
    <li data-target="#slider1" data-slide-to="1"></li>
    <li data-target="#slider1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner rabbi" role="listbox">
    <div class="carousel-item active">
      <img src="images/k3.jpg" alt="slider-img-1" class="d-block img-fluid w-100 h-100">
      <div class="carousel-caption">
        <h3>Hello World</h3>
        <p>Lorem ipsum dolor sit amet.</p>
      </div>
    </div>
      <div class="carousel-item ">
        <img src="images/k3.jpg" alt="slider-img-2" class="d-block img-fluid w-100 h-100">
        <div class="carousel-caption">
          <h3>Wellcome our Website</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, laboriosam.</p>
        </div>
      </div>
      <div class="carousel-item ">
        <img src="images/k3.jpg" alt="slider-img-3" class="d-block img-fluid w-100 h-100">
        <div class="carousel-caption">
          <h3>Our Services</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, dignissimos!</p>
        </div>
      </div>
  </div>
  <a href="#slider1" class="carousel-control-prev" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
  </a>
  <a href="#slider1" class="carousel-control-next" data-slide="next">
      <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="section-1">
    <div class="container text-center">
        <h1 class="header-1 mt-5">Different Types of Template</h1>
        <p class="para-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quae tenetur consequatur doloremque amet qui veniam, porro animi rem repellendus!</p>



<?php 

 $sql = "SELECT COUNT(*)as x FROM book1 WHERE uid=$user_id AND cn=0


 ";  
      $result = mysqli_query($con, $sql);  
      while($rowx = mysqli_fetch_array($result))  
      {  
           $x = $rowx["x"];  
      }  
     
if($x==2)
{


 echo' <h4 class="card-title display-3">you can not book more than two house ! please wait for admin confrimation  </h4>';
                      
}



else if($x!=2)

 {?>

          <section class="item container mb-3">
            <div class="search-container">
 <form method="post" class="formValidate" id="formValidate1"  action="house.php">
                <?php   
 //load_data_select.php  
 function fill_brand($con)  
 {  
      $output = '';  
      $sql = "SELECT DISTINCT price  FROM home JOIN book WHERE home.id=book.id AND book.val!=1";  
      $result = mysqli_query($con, $sql);  
      while($rowx = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$rowx["price"].'">'.$rowx["price"].'</option>';  
      }  
      return $output;  
 }  
?>


<select name="brand" id="brand">  
                          <option value="">Search by price</option>  
                          <?php echo fill_brand($con); ?>  
                     </select>
                             



                        <?php   
 //load_data_select.php  
 function cill_brand($con)  
 {  
      $output = '';  
      $sql = "SELECT DISTINCT region  FROM home JOIN book WHERE home.id=book.id AND book.val!=1 ";  
      $result = mysqli_query($con, $sql);  
      while($rowx = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$rowx["region"].'">'.$rowx["region"].'</option>';  
      }  
      return $output;  
 }  
?>


<select name="rand" id="rand">  
                          <option value="">Search by region</option>  
                          <?php echo cill_brand($con); ?>  
                 </select>
                             
           <!--start container-->

 <br>
<button class="btn waves-effect waves-light right submit" type="submit" name="actionx" id="max" onclick="c();" >search
                                              <i class="mdi-editor-insert-invitation"></i> 
                    </button>
              </form>
            </div>
          </section>

        <div class="row justify-content-center text-center mb-5">

          <?php 

  ?>

  <?php
 
    
            if(isset($_POST['actionx']))

{

    $name=$_POST['brand'];
        $contract=$_POST['rand'];

    //echo "name";
    if(empty($name) && empty($contract))
    {

$sql = mysqli_query($con, "SELECT home.floor,home.name ,home.id,home.img,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house ,book.val  from home join room join adress join book WHERE home.id=room.id AND home.id=adress.id AND home.id=book.id AND book.val=0 ;");


    }
  else  if(empty($contract) )
    {
    $sql = mysqli_query($con, "SELECT * FROM (SELECT home.price, home.floor,home.name ,home.id,home.img,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house ,book.val from home join room join adress join book WHERE home.id=room.id AND home.id=adress.id AND home.id=book.id AND book.val=0) as m WHERE m.price=$name");

    }
    else  if(empty($name) )
    {
    $sql = mysqli_query($con, "SELECT * FROM (SELECT home.region,home.price, home.floor,home.name ,home.id,home.img,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house ,book.val from home join room join adress join book WHERE home.id=room.id AND home.id=adress.id AND home.id=book.id AND book.val=0) as m WHERE m.region='$contract'");

    }
    else
    {


 $sql = mysqli_query($con, "SELECT * FROM (SELECT home.region,home.price, home.floor,home.name ,home.id,home.img,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house ,book.val from home join room join adress join book WHERE home.id=room.id AND home.id=adress.id AND home.id=book.id AND book.val=0) as m WHERE m.region='$contract' AND m.price=$name");


    }
  
            
           /* $sql = mysqli_query($con, "SELECT home.floor,home.name ,home.id,home.img,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house ,book.val  from home join room join adress join book WHERE home.id=room.id AND home.id=adress.id AND home.id=book.id AND book.val=0 ;");
         */
}
else{
$sql = mysqli_query($con, "SELECT home.floor,home.name ,home.id,home.img,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house ,book.val  from home join room join adress join book WHERE home.id=room.id AND home.id=adress.id AND home.id=book.id AND book.val=0 ;");}
                
    

 ?>
       <?php
       while($row = mysqli_fetch_array($sql)){
 
        

      
       ?>


            <div class="col-lg-4">
              <div class="card">
                  <img src="<?= $row['img']; ?>" alt="#" class="card-image-top w-100">
                  <div class="card-body">
                      <h4 class="card-title display-3"><?= $row['name']; ?> (<?= $row['floor']; ?> th floor)  </h4>
                      <div class="list-card-heading">
                        <ul class="list-card-details">
                          <li>
         <?= $row['bed']; ?>       <abbr class="list-card-level">bed room</abbr>
                          </li>
                          <li>
                            <?= $row['kit']; ?>
                            <abbr class="list-card-level">kitchen</abbr>
                          </li>
                          <li>
<?= $row['washroom']; ?>                            <abbr class="list-card-level">washroom</abbr>
                          </li>
                        </ul>
                      </div>

                        <a href="fo.php?details=<?= $row['id'];?>" class="btn bg-secondary cardbtn">Read Deatails</a>


 <a href="acti.php?delete=<?= $row['id'];?>" class="btn bg-secondary cardbtn" onclick="return confirm('confirm that you want to book this home');">Book</a>
                  
                      
                  </div>
              </div>
            </div>
                            <?php } ?>


                            <?php } ?>


            <div class="col-lg-4">
             
           </div>
            <div class="col-lg-4">
             
           </div>
           <div class="col-lg-4">
              
           </div>
           <div class="col-lg-4">
             
           </div>
           <div class="col-lg-4">
              
           </div>
      </div>
    </div>
</div>

<div class="about-us">
  <h1 class="header-title">Find Your New Home on HomeFinder</h1>
  <div class="row mt-0">
    <div class="col-lg-6 row-col1 pl-3">
      <p class="para mb-3 ">Find the home you’ve been looking for on HomeFinder, the top online real estate search portal.</p>
      <p class="para">HomeFinder is a premier online resource for finding homes for sale and rentals in the United States. With millions of real estate listings, including home foreclosures and rent to own homes, HomeFinder will bring the real estate market to your fingertips.</p>
    </div>
    <div class="col-lg-6 row-col2">
        <img src="images/abu.jpg" class="">
    </div>
  </div>

</div>
<footer>
  <div class="section-5 text-center">
    <h4 style="margin-top:5%">Get Template Design From BUBT</h4>
    <h4 class="my-4">If you Need any Help</h4>

    <div class="form-inline justify-content-center">
      <input type="text" name="Email" id="email" placeholder="Email" size="40" class="form-control px-4 py-2">
      <input type="button" name="" value="Contact Us" class="btn btn-danger px-4 py-2">
    </div>

    <div class="social-icon" style="margin:5%">
        <div class="d-flex flex-row justify-content-center">
          <a href=""><i class="fa fa-facebook-f m-2"></a></i>
          <a href=""><i class="fa fa-twitter m-2"></i></a>
          <a href=""><i class="fa fa-instagram m-2"></i></a>
          <a href=""><i class="fa fa-youtube m-2"></i></a>
        </div>
    </div>
    <hr>
    <h5 style="color:lightseagreen;">&copy All Reserved 2020</h5>

  </div>
</footer>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
</body>
</html>
<?php
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
?>