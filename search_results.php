
<!DOCTYPE html>
<html>
<head>
<?php
session_start();
 
?>
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

  <style type="text/css">
  	.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 53px;
  right: 28px;
  width: 280px;

}
.form-popup {
  display: none;
  position: fixed;
  bottom: 30px;
  right: 50px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  border-radius: 30px;
}

.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

.form-container input[type=text], .form-container input[type=password],.form-container input[type=Date] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

.form-container input[type=text]:focus, .form-container input[type=password]:focus,.form-container input[type=Date]:focus {
  background-color: #ddd;
  outline: none;
}

.form-container .btn5 {
  background-color: #001334;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.8;
   border-radius: 50px;
    font-family: 'Nanum Gothic', sans-serif;
}

.form-container .cancel {
  background-color: red;
  border-radius: 50px;
  margin-top: 5px;
}
.form-container .btn5:hover, .open-button:hover {
  opacity: 1;
}
  </style>
</head>
<body>
<div class="container">
      	<h3 class="section-header" align="center" style="font-family: 'Crimson Text', serif;font-weight: bold;font-size: 33px;margin-top: 10px;margin-left: 30px;">Trips Found
          </h3>
        <div class="row">				
                  <?php  
                  $conn = mysqli_connect("localhost", "root","", "denso");
                  $from_d=$_SESSION['from'];
                  $to=$_SESSION['to'];
                  $datee=$_SESSION['date'];
                  $sql = "SELECT * FROM trip WHERE fromm='$from_d' and datee='$datee'"; 
                 
                  $result = mysqli_query($conn, $sql);  
                 echo mysqli_error($conn);

                  while($row = mysqli_fetch_assoc($result))
                  {
                    ?>    
                    <div class="content">
                     <div class="grid">
					<figure class="effect-julia" onclick="openForm()" >           
						<img src="img/upcoming_travels.jpg" style="width: 100%;height: 100%;" >
						<figcaption>

							<h2 style="color: white;font-size: 26px;padding-left: 26px;padding-top: 13px;font-family: 'Crimson Text', serif;font-weight: 400;"><?php echo $row['fromm']  ?><span style="padding-left:10px;padding-right: 15px;">to</span> <?php echo $row['to']  ?></h2>
							<div>
								<p style="color:black;margin-top: 40px;">Traveller Name : <?php echo $row['name']  ?> </p>
								<br>
								<p style="color:black;">Travel Date: <?php echo $row['datee']  ?></p>
								<br>
								<p style="color:black;">From : <?php echo $row['fromm']  ?><br>
                                   To : <?php echo $row['to']  ?></p>
							</div>
						</figcaption>
						</div>				
				</div>
			</figure>

                  <?php }
    ?>       
	
					
				
</div>
</div>


<div class="form-popup" id="myForm">
  <form action="search_results.php" class="form-container" method="post">
    <input type="text" placeholder="Enter traveller name" name="name" required>
    <input type="text" placeholder="Enter Your name" name="your" required>
    <input type="text" placeholder="Enter Your Phone number" name="phn" required>
    <button type="submit" name="submit_val" class="btn5">Confirm Trip</button>
    <button type="button" class="btn5 cancel" onclick="closeForm()">Close</button>
  </form>
</div>
    <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


<?php
if (isset($_POST['submit_val'])) 
{
$conn = mysqli_connect("localhost", "root","", "denso");
$db=$_POST['name'];
$t_name=$_POST['your'];
$from_l=$_SESSION['from'];
$to_l=$_SESSION['to'];
$dat=$_SESSION['date'];
$phone=$_POST['phn'];
$query="INSERT INTO $db(traveller_name,from_loc,to_loc,datee,phone) VALUES('$t_name','$from_l','$to_l','$dat','$phone')";
if (mysqli_query($conn,$query)) {
		echo '<script type="text/javascript"> alert("Booking Confirmed")</script>';
}
else
{
		echo '<script type="text/javascript"> alert("ERROR...")</script>';
}


}



?>
</body>
</html>
