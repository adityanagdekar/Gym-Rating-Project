    <html>
    	<head>
    		<link rel="stylesheet" type="text/css" href="css/card.css">
    		<link rel="stylesheet" type="text/css" href="css/style.css">
    	</head>
    	<body>
			<div class="main">
			<div class="logo">
				<img src="gymlogo.png">
			</div>
			
			<ul>
					<li class="active"><a href="project.html">HOME</a></li>
					<li><a href="#">CONTACT</a></li>
					<li><a href="#">ABOUT US</a></li>
				</ul>
				<div class='container'>
				
		    
		    				<?php
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

								
								$query="select * from gym ";
								$data=mysqli_query($conn,$query);
								$total=mysqli_num_rows($data);
								
								if($total!=0)
								{
									//$gym_array = array();
									//while ($all = mysql_fetch_array($prod)) {
									 //   $gym_array[] = array('gym_id'=>$all['Gym_id'], 'gym_name'=>$all['Gym_name'],'gym_img'=>$all['Gym_img'], 'gym_location'=>$all['Gym_location']);
									
								 while ($result=mysqli_fetch_assoc($data))
								{
									$img=$result['Gym_img'];
									$id=$result['Gym_id'];
									
									
									echo "  
											<div class='box'>
											<div class='content' method='POST'>
											<h2>".$result['Gym_id']."</h2>
											<h3>".$result['Gym_name']."</h3>
											<img src=".$img." height='200' width='200'/>
											<br>
											<p>
												Location: ".$result['Gym_location']."
											</p>
											<br>
											<a href='review.php?id=$id'>Read More</a>
											</div>
				    						</div>
				    						
										";	
									
								}
								}
								else{
								    echo "No record fOund";			    		
								}
							?>
				</div>
		    	</div>				
			
	</html>
    			