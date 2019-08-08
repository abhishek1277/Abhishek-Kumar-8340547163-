<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Serif&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet"> 
    <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <script src="contactform/contactform.js"></script>
<?php
session_start();
?>
  <script src="js/main.js"></script>
  <script>
function da()
{   
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

var a = parseInt(mm)
var b= a + 2;
var c=b.toString();

    if(c<10){
        c='0'+c
    } 


var today1 = new Date();
var dd1=dd;
var mm1=c;
var yyyy1=yyyy;
today = yyyy+'-'+mm+'-'+dd;
today1 = yyyy1+'-'+mm1+'-'+dd1;

document.getElementById("datefield").setAttribute("max", today1);
document.getElementById("datefield").setAttribute("min", today);
}
  </script>
  <?php
if (isset($_POST['submit_val'])) 
{
     $conn = mysqli_connect("localhost", "root","", "denso");
  if($conn)
    {
       $_SESSION['from']=$_POST['from'];
       $_SESSION['to']=$_POST['to'];
       $_SESSION['date']=$_POST['date'];
       header('Location:search_results.php');

    }

   
}
?>
</head>

<body>
  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">How it Works</a></li>
          <li><a href="#speakers">FAQ</a></li>
          <li class="buy-tickets"><a href="login.php">Log in</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container-fluid" id="intro">
    <div class="row" style=" margin-top: 170px;">
    <div class="col-md-6" style=" border-image: linear-gradient(transparent 15%,#f82249 20% 90%,transparent 10%) 0 1 0 0 / 2px;">


       <form action="index.php" method="post" style="margin-left: 26%;border-width: 10%;">
            <div id="text-input">
              <div class="main-search-input-item location">
                  <input required="From Location" id="autocomplete-input" name="from" type="text"  placeholder="From Location">
                   <label for="input1">Source Area/City</label>
               </div>
            </div>
            <div id="text-input">
         <div class="main-search-input-item location">
                  <input required="To Location" id="autocomplete-input1" name="to" type="text" placeholder="To Location">
                   <label for="input1">Destination City</label>
               </div>
            </div>
          
            <div id="text-input">
              <div class="main-search-input-item" style="height:55px">
                <input id="datefield" type="date" min="1899-01-01" max="2000-13-13" name="date" onclick="da()">
        <label for="input1">Date</label>
         <span>
                </span>
            </div>
            </div>
          
              <input type="submit" id="submit" name="submit_val" value="Find Traveller" class="button button1" style="margin-left: 12%;">
      
        </form>
    </div>
    <div class="col-md-6">
    <div class="intro-container wow fadeIn" style="margin-bottom: 20px;">
      <p style="font-family: 'PT Serif', serif;font-size: 31px;">Not a Express Parcel Member ? <br><span style="color: white;"><a href="signup.php"> Sign Up</a></span> now.</p>
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto" >How it Works</a>
    </div>
     </div>
     </div>
  </div>





</body>

</html>
