<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
 body {font-family: Arial, Helvetica, sans-serif;
  background-image: linear-gradient(to right, #001334, #00213a, #002a2f, #00311c, #27340a);}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background:#001334;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid #001334;
}

/* Set a style for the submit button */
.btn {
  background-color: #001334;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
  </style>
</head>
<body>
	<button style="margin-top: 2%;margin-left: 87%;background-color: #3F4E1D;width: 10% ;height: 40px;border-style: none;"><a href="index.php" style="text-decoration: none;color: white;;">Back</a></button> 
   <div id="container">
   	<form action="signup.php" method="post" style="margin-left: 20%;border-width: 10%;margin-top: 12%;margin-right: 20%;">
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Enter Username" name="username" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Enter Password" name="pass" required>
  </div>
   <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Re-Enter Password" name="confirm_pass" required>
  </div>

  <button type="submit" class="btn" name="submit">Sign Up</button>


   	</form>
   </div>
</body>

<?php
if(isset($_POST['submit']))
{
   $user=$_POST['username'];
   $pass=$_POST['pass'];
   $con_pass=$_POST['confirm_pass'];
   if ($pass==$con_pass) 
   {
   	 $conn = mysqli_connect("localhost", "root","", "denso");
   	if($conn)
   	{
   		$query1="SELECT * from signup WHERE username='$user'";
   		$res=mysqli_query($conn,$query1);
   		$row=mysqli_fetch_assoc($res);
   		if ($row > 0) 
   		{
   			echo '<script type="text/javascript"> alert("username already exists..")</script>';
   		}  		
   		else
   		{
   		$query="INSERT into signup(username,pass) values('$user','$pass')";
   		if(mysqli_query($conn,$query))
	    {
        $query3="CREATE table $user(traveller_name varchar(50),from_loc varchar(40),to_loc varchar(40),datee date,phone bigint)";
        if(mysqli_query($conn,$query3))
        { 
		 echo '<script type="text/javascript"> alert("Registration Successfull !!!")</script>';
    }
	    }
	   }
   	}
   }
   else
   {
    echo '<script type="text/javascript"> alert("Registration Unsuccessfull...")</script>';
   }
}
?>
</html>