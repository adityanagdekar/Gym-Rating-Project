<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$dbName="wdlproject";

$conn=mysqli_connect($servername,$username,$password,$dbName);
if($conn)
    echo "Connected";
else
    die("Connection Fail due to ".mysqli_connect_error());

error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/gym.css">
</head>
<body>
	<header>
	<div class="main">
	<div class="logo">
        <img src="gymlogo.png">
    </div>
	<div class="LoginForm" style="padding-top: 100px;padding-left: 200px">
	<form method="GET">	
		<label style="color:yellow" ><h1 style="font-family: cursive">Gym ID:</h1> </label>
        <input id="gym_id" name="Gym_id" placeholder="Enter Gym ID" type="text" style="height: 25;color: #041249  " class="btn"/>
        <br>
        <label id="ur_gym_id" style="color: red;visibility:hidden">Invalid Gym ID</label>
        <br><br>
        <label style="color:yellow" ><h1 style="font-family: cursive">Gym Review:</h1> </label>
        <input type="text" name="read"  placeholder="Enter your review..." style="height: 25 width:200;color: #041249  ">
		<br><br>
		<label style="color:yellow" ><h1 style="font-family: cursive">Gym Rating:</h1> </label>
		<input id="gym_rating" name="Gym_rating" placeholder="Enter Gym Rating" type="text" style="height: 25;color: #041249  " class="btn"/>
        <br><br>
		<button id="btn_Sub" style="padding: 10px;font-weight: bold;" name="Save">Save</button>
		
		<a href="logout.php" class="btn">LogOut</a>
                                   
	</form>	
	</div>
</div>
</header>

<?php
//if(isset($_GET['Gym_id']) && isset($_GET['review']))
//{
	$name=$_SESSION['Name'];
	$gym_id=$_GET['Gym_id'];
	$review=$_GET['read'];
	$rating=$_GET['Gym_rating'];

	/*echo $name." ";
	echo $gym_id;
	echo $review;*/

	if($name!="" && $gym_id!="" && $review!="" && $rating!="")
	{
	    $query="insert into Review values('$gym_id','$name','$review')"; 
	    $data=mysqli_query($conn,$query);

	    if($data)
	        echo "<p class='Loginform' >$name  Review Accepted
        </p>";
	    else
	        echo "<p class='Loginform' >$name  Review Rejected
        </p>";

	}

	if ($gym_id!="" && $rating!="") {
		$query2="insert into Rating values('$rating','$gym_id','$name')";
	    $data2=mysqli_query($conn,$query2);

	    if ($data2) {
        	echo "
        	<p class='Loginform'>$name Rating Accepted </p>";
        }
         else{
	        echo "<p class='Loginform' >$name  Review Rejected
        </p>";
    	}
	}

//}
/* else
    echo "All Fields must be Filled"; */
?>
</body>
</html>