<?php
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet">

	<style type="text/css">
body
{
 background-image: linear-gradient(to right, #001334, #00213a, #002a2f, #00311c, #27340a);}
.btn {
  background-color: #001334;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.8;
  margin-top: 26%;
  margin-left: 10px;
  border-radius: 40px;


    font-family: 'Noto Serif', serif;


}
.tog
{
	margin-left: 420px;
}
.btn:hover {
  opacity: 1;
}


.btn1 {
  background-color: #AE1B28;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.8;
  margin-left: 5px;
  margin-top: 5px;
  border-radius: 70px;


    font-family: 'Nanum Gothic', sans-serif;


}

.btn1:hover {
  opacity: 1;
}
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
	
     <a href="index.php"><button type="submit" class="btn1" name="welcome">Welcome  :  <?php print($_SESSION['user_val']) ?>  </button></a>
     <br>
     <div class="tog">
     <a href="Fetch_data.php"><button type="submit" class="btn" name="1">See Bookings</button></a>
      <button type="submit" class="btn" name="2"  onclick="openForm()">Add Your Trip</button>
    </div>  
<div class="form-popup" id="myForm">
  <form action="addtrip.php" class="form-container" method="post">
    <!-- <input type="text" placeholder="Enter Username" name="user" required> -->
    <input type="text" placeholder="Enter from location " name="from" required>
    <input type="text" placeholder="Enter to location " name="to" required>
    <label for="datee"><b>Travel Date </b></label>
    <input type="date" placeholder="Enter travel date " name="date" required>

    <button type="submit" name="submit_val" class="btn5">Add Trip</button>
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
  $userval=$_SESSION['user_val'];
  $from_add=$_POST['from'];
  $to_add=$_POST['to'];
  $date=$_POST['date'];
  $conn = mysqli_connect("localhost", "root","", "denso");
  if($conn)
   	{
       $query1="INSERT into trip values('$userval','$from_add','$to_add','$date')";

       if(mysqli_query($conn,$query1))
       {

       	echo '<script type="text/javascript"> alert("Your trip added")</script>';
       }
       else
       {
         echo '<script type="text/javascript"> alert("update failed..")</script>';

       }
          
   	}
   	else
   	{
   		echo '<script type="text/javascript"> alert("Server connect failed..")</script>';
   	}
      

}

?>
</body>
</html>