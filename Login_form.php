
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

?>
<html>
    <head>
        <title>Gym-Review</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript">
        //document.write("hello");
        function Validate()
        {
        
            var Name=document.getElementById("ur_name").value;
            var regx=/^[0-9a-zA-Z]+$/;
            if(regx.test(Name) && Name.length>=2 && Name.length<=30 )
            {
                document.getElementById("ur_name_lbl").innerHTML="Valid Name";
                document.getElementById("ur_name_lbl").style.visibility="visible";
                document.getElementById("ur_name_lbl").style.color='lightgreen';
                document.getElementById("ur_name_lbl").style.fontWeight="Bold";
                document.getElementById("ur_name").style.border="solid 5px lightgreen";
                
            }
            else
            {
                document.getElementById("ur_name_lbl").innerHTML='Invalid Name';
                document.getElementById("ur_name_lbl").style.visibility="visible";
                document.getElementById("ur_name_lbl").style.color="red";
                document.getElementById("ur_name_lbl").style.fontWeight="Bold";
                document.getElementById("ur_name").style.border="solid 5px red";
                
            }

            var Password=document.getElementById("ur_pass").value;
            regx=/[\w\.-]/;
            if(regx.test(Password) && Password.length>=8)
            {
                document.getElementById("ur_pass_lbl").innerHTML="Valid Password";
                document.getElementById("ur_pass_lbl").style.visibility="visible";
                document.getElementById("ur_pass_lbl").style.color='lightgreen';
                document.getElementById("ur_pass_lbl").style.fontWeight="Bold";
                document.getElementById("ur_pass").style.border="solid 5px lightgreen";
            }
            else
            {
                document.getElementById("ur_pass_lbl").innerHTML='Invalid Password';
                document.getElementById("ur_pass_lbl").style.visibility="visible";
                document.getElementById("ur_pass_lbl").style.color="red";
                document.getElementById("ur_pass_lbl").style.fontWeight="Bold";
                document.getElementById("ur_pass").style.border="solid 5px red";
            }

        }
        </script>
    </head>
    <body>
        <header  style="overflow:auto">
                <div class="main">
                        <div class="logo">
                            <img src="gymlogo.png">
                        </div>
                        <ul>
                                <li class="active"><a href="project.html">HOME</a></li>
                                <li><a href="Read-reviews.php">Read Reviews</a></li>
                                <li><a href="about.html">ABOUT US</a></li>
                                <li><a href="Card-last.php">GYMS</a></li>
                            </ul>

                        <div class="Loginform" style="padding-top: 100px;padding-left: 200px">
                        <form method="POST">
                            
                            <label style="color:yellow" ><h1 style="font-family: cursive" >Username:</h1> </label>
                            <input id="ur_name" name="Name" placeholder="Enter Username" type="text" style="height: 25;color: #000" class="btn"/>
                            <br>
                            <label id="ur_name_lbl" style="color: red;visibility:hidden">Invalid Username</label>
                            <br><br>
                            <label style="color:yellow" ><h1 style="font-family: cursive">Password:</h1> </label>
                            <input id="ur_pass" name="Password" placeholder="Enter Password" type="password" style="height: 25;color: #000" class="btn"/>
                            <br>
                            <label id="ur_pass_lbl" style="color: red;visibility:hidden">Invalid Password</label>
                            <br><br><br>
                            <div class="button" style="position: relative;">
                                    <a href="#" class="btn" onclick="Validate()" >Submit</a>
                                    <button id="btn_Sub" name="Save" style="padding: 10px;font-weight: bold;"
                                    >Save</button>
                            </div>
                        </form>
                        </div>
        </header>
<?php

if(isset($_POST['Name']) && isset($_POST['Password']))
{
    //echo $_POST['Name']." ".$_POST['Password'];
    $username=$_POST["Name"];
    $pass=$_POST["Password"];
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
if($username!="" && $pass!="")
{
    
        echo "<p class='Loginform' >$username  Login Successful
        <a class='btn' href='write-review.php'>Give Review</a>
        </p>";
        $_SESSION['Name']=$username;
        //header('location:write-review.php');
        
  }  
    else
    {
        echo "<p class='Loginform' >$username  Login Failed
        <a class='btn' href='Signup_form.php'>Create Your Account</a></p>";
        //header('location:Login_form.php');
    }
}
else
    echo "All Fields must be filled";

?>
    </body>
</html>