
<html>
<head>
<title> Muscle Prime Gym, Kalyan City </title>
	<link rel="stylesheet" type="text/css" href="css/gym.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
</head>	
<body>
<header style="overflow:auto;">
		<div class="main">
			<div class="logo">
				<img src="gymlogo.png">
			</div>
			<ul>
				<li><a href="project.html">HOME</a></li>
				<li><a href="Read-reviews.php">Read Reviews</a></li>
				<li class="active"><a href="#">GYMS</a></li>
				<li><a href="about.html">ABOUT US</a></li>
			</ul>
		</div>
				<?php 
				 session_start();
				 $no=$_GET['id'];
				 echo $no;

				$servername="localhost";
				$username="root";
				$password="";
				$dbName="wdlproject";
				mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
				$conn=mysqli_connect($servername,$username,$password,$dbName);
				if($conn)
				    echo "Connected";
				else
				    die("Connection Fail bcz ".mysqli_connect_error());


				$query="select * from gym where Gym_id=$no ";
				$data=mysqli_query($conn,$query);
				$total=mysqli_num_rows($data);

				$query2="select AVG(rating) from Rating where Gym_id=$no ";
				$data2=mysqli_query($conn,$query2);
				$rating_result=mysqli_fetch_assoc($data2);

				print_r ($rating_result);
				if($total!=0)
				{
					
				 while ($result=mysqli_fetch_assoc($data))
				{
					$img=$result['Gym_img'];

					echo " 
							<div class='gymtitle'>
							<h1 style='color: white'>Gym Id: ".$result['Gym_id']."</h1>
							<h2 style='color: white'>Gym Name: ".$result['Gym_name']."</h2>
							</div>

							<div class='gymimg'>
							<img src=".$img." height='300' width='450' border='5'/>
							</div>
							<br>

							<div class='gyminfo'>
							<p>
								Address: ".$result['Gym_address']."<br><br>
								Location: ".$result['Gym_location']."<br><br>
								Contact Number: ".$result['Gym_contact_no']."<br><br>
								Timing: ".$result['Gym_time']."<br><br>
								Rating: ".$rating_result['AVG(rating)']."
							</p><br>
							</div>
							<br>
							<br><br>
							<div class='button' style='position: relative;padding-top: 500px ; padding-left: 300px'>
                                    <a href='Card-last.php' class='btn' >Back</a>
                                    <a href='Login_form.php' class='btn' >Give Review</a>
                            </div>
						";	
					
				}
				}
				else{
				    echo "No record fOund";			    		
				}
				  ?>
	</header>
	</body>
	</html>			  