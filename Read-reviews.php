<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header  style="overflow:auto">
        <div class="main">
                <div class="logo">
                    <img src="gymlogo.png">
                </div>
                <ul>
                        <li class="active"><a href="project.html">HOME</a></li>
                        <li><a href="Card-last.php">GYMS</a></li>
                        <li><a href="#">Read Reviews</a></li>
                        <li><a href="about.html">ABOUT US</a></li>
                    </ul>
	<table style="padding: 200px;padding-left: 100px; color: #81EA27;text-align: left;border-bottom: 1px solid #ddd;">
        <tr >
            <th style="padding:10px ">Gym Name </th>
            <th style="padding:10px ">Gym ID </th>
            <th style="padding:10px ">User Name</th>
            <th style="padding:10px ">Gym Review</th>
        </tr>

    <?php
   

		$servername="localhost";
		$username="root";
		$password="";
		$dbName="wdlproject";

		$conn=mysqli_connect($servername,$username,$password,$dbName);
		if($conn)
		    echo "Connected";
		else
		    die("Connection Fail due to ".mysqli_connect_error());

		
		//$query="select * from Review  ";
		$query=" select a.Gym_name,a.Gym_id,b.Username,b.Review
    			from gym a inner join Review b on
    			a.Gym_id=b.Gym_id";
		$data=mysqli_query($conn,$query);
		$total=mysqli_num_rows($data);
		if($total!=0)
		{
		    while($result=mysqli_fetch_assoc($data))
    	{
    		
        echo " <tr>
                    <td style='padding:10px' >".$result['Gym_name']."</td>
                    <td style='padding:10px' >".$result['Gym_id']."</td>
                    <td style='padding:10px' >".$result['Username']."</td>
                    <td style='padding:10px' >".$result['Review']."</td>
                </tr>";
       
    	}
		}
		else
		    echo "No record fOund";
    
		?>
</table>
</div>
</header>
</body>
</html>
    
    