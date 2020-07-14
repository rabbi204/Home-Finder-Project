

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
            </li>
            <li class="nav-item">
                <a href="bo.php" class="nav-link">Booking Info</a>



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
<?php 

if(isset($_GET['details']))
{
$id=$_GET['details'];
  $query= "SELECT * FROM(SELECT home.region,home.price ,home.floor, home.lift, home.name ,home.id,home.img,room.bed,room.kit,room.washroom,adress.zip,adress.road,adress.house ,book.val  from home join room join adress join book WHERE home.id=room.id AND home.id=adress.id AND home.id=book.id ) as z WHERE z.id=$id  ";
$stmt=$con->prepare($query);
$stmt->execute() ;
$result=$stmt->get_result();
  $row=$result->fetch_assoc();

$namex=$row['name'];
$img=$row['img'];
$bed=$row['bed'];
$kit=$row['kit'];
$wash=$row['washroom'];
$zip=$row['zip'];
$road=$row['road'];
$house=$row['house'];
$book=$row['val'];
$lift=$row['lift'];
$floor=$row['floor'];
$price=$row['price'];
$region=$row['region'];



if($book==0)
{

$book="not booked";


}
else
{
$book=" booked";


}
if($lift==0)
{
  
$lift="no lift";


}
else
{
$lift=" lift available";


}



   // echo $vid;


  
} ?>
<div class="section-1">
    <div class="container text-center">
        
          <section class="item container mb-3">
            <div class="search-container">
              
            </div>
          </section>

        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-4">
              <div class="card">
                  <img src="<?= $row['img']; ?>" alt="#" class="card-image-top w-100">
                  <div class="card-body">
                      <h4 class="card-title display-3"><?php echo $namex ?>  [$<?php echo $price ?><h9>(negotiable)</h9>]</h4>
                      <h5 class="card-title display-3"><?php echo $floor ?>Th floor [<?php echo $lift ?>]  </h5>
                      
                      <div class="list-card-heading">
                        <ul class="list-card-details">
                          <li>
                            <?php echo $bed ?>
                            <abbr class="list-card-level">room </abbr>
                          </li>
                          <li>
                            <?php echo $kit ?>
                            <abbr class="list-card-level">kitchen</abbr>
                          </li>
                          <li>
                            <?php echo $wash ?>
                            <abbr class="list-card-level">washroom</abbr>
                          </li>

                        </ul>
                                   <ul class="list-card-details">
                                    <li>
                            <?php echo $house ?>
                            <abbr class="list-card-level">house_no</abbr>
                          </li>

                          <li>
                                                          <?php echo $region ?>

                              <?php echo $road ?>
                            <abbr class="list-card-level">road </abbr>
                          </li>
                         
</ul>
                                   <ul class="list-card-details">

 <li>
                            <?php echo $zip ?>
                            <abbr class="list-card-level">zip</abbr>
                          </li>
                        </ul>
                      </div>
                      
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