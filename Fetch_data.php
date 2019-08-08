
<html>
<head>
	    <head>
        <?php
            session_start();      
        ?>
	<title>Search Donors</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
background-image: linear-gradient(to right, #001334, #00213a, #002a2f, #00311c, #27340a);
 
		}
		table {
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
			margin-top: 50px;
			
		}

		h1 {
			margin: 25px auto 70px;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}
		       *:focus {
    outline: none;
}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
			margin-left: 350px;
			border-radius: 25px;

		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
			margin-top: 70px;
			font-size: 16px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
		.topnav {
  width: 100%;
  background:#474646;
  position: absolute;
  box-shadow: 0 1px 2px 2px #333;
 
 }
 .topnav a:hover {
 color:#31BCFF;
 
}

.topnav a {
  float: right;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 10px;
  text-decoration: none;
  font-size: 18px;
 padding-right: 40px;
 font-weight: 500;
 font-family: "Times New Roman", Times, serif;
}
span
{
	color: red;
	transition: 0.3s;
	font-weight: 700;
}
.container
{
	padding-top: 120px;
	float:center;
}
button {
	width: 70%;
    margin-top: 50px;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 12px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 17px;
    margin: 15px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
     border-radius: 25px;
     margin-bottom: 1px;
     margin-right: 20px;
     width: 120px;
     height: 42px;
     font-size: 15px;

}

button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
.inner{
	text-align: center;
}

	</style>
</head>
<body>
               
           <a href="addtrip.php" ><input type="submit" value="Back" style="border-style: none;height: 50px;width: 140px;margin-top: 10px;margin-left: 10px;background-color: #A32525;color: white;border-radius: 40px;"></a>
 
	<table class="data-table">
		<thead>
			<tr>
				<th>Traveller Name</th>
				<th>From Place </th>
				<th>To Place</th>
				<th>Travel Date</th>
				<th>Phone Number</th>
				
			
			</tr>
		</thead>
		<tbody>
		<?php
		$name=$_SESSION['user_val'];
		 $conn = mysqli_connect("localhost", "root","", "denso");
         $query="SELECT * from $name";
		    $res = mysqli_query($conn, $query);
	          	    if (!$res) {
					    printf("Error: %s\n", mysqli_error($conn));
					    exit();
					}
			while ($row = mysqli_fetch_array($res))
			{
				
				echo '<tr>
				        <td>'.$row['traveller_name'].'</td>
						<td>'.$row['from_loc'].'</td>
						<td>'.$row['to_loc'].'</td>
						<td>'.$row['datee'].'</td>
						<td>'.$row['phone'].'</td>
						
					</tr>';			
			}
	

	?>
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>
</body>
</html>
