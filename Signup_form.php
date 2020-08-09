
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

error_reporting(0);
?>
<html>
    <head>
        <title>Gym-Review</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript">
        
    
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

            var No=document.getElementById("ur_phone").value;
            regx=/[7-9]\d{9}/;
            if(regx.test(No) && (No.length==10))
            {
                document.getElementById("ur_phone_lbl").innerHTML="Valid Mobile Number";
                document.getElementById("ur_phone_lbl").style.visibility="visible";
                document.getElementById("ur_phone_lbl").style.color='lightgreen';
                document.getElementById("ur_phone_lbl").style.fontWeight="Bold";
                document.getElementById("ur_phone").style.border="solid 5px lightgreen";
                
            }
            else
            {
                document.getElementById("ur_phone_lbl").innerHTML='Invalid Mobile Number';
                document.getElementById("ur_phone_lbl").style.visibility="visible";
                document.getElementById("ur_phone_lbl").style.color="red";
                document.getElementById("ur_phone_lbl").style.fontWeight="Bold";
                document.getElementById("ur_phone").style.border="solid 5px red";
                
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

            var Email=document.getElementById("ur_mail").value;
            regx=/^([\w\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,10})(.[a-z]{2,10})?$/;
            if(regx.test(Email))
            {
                document.getElementById("ur_mail_lbl").innerHTML="Valid Email Id";
                document.getElementById("ur_mail_lbl").style.visibility="visible";
                document.getElementById("ur_mail_lbl").style.color='lightgreen';
                document.getElementById("ur_mail_lbl").style.fontWeight="Bold";
                document.getElementById("ur_mail").style.border="solid 5px lightgreen";
                
            }
            else
            {
                document.getElementById("ur_mail_lbl").innerHTML='Invalid Email Id';
                document.getElementById("ur_mail_lbl").style.visibility="visible";
                document.getElementById("ur_mail_lbl").style.color="red";
                document.getElementById("ur_mail_lbl").style.fontWeight="Bold";
                document.getElementById("ur_mail").style.border="solid 5px red";
              
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
                                <li><a href="Card-last.php">GYMS</a></li>
                                <li><a href="about.html">ABOUT US</a></li>
                            </ul>

                        <div class="Loginform" style="padding-top: 10px;padding-left: 200px">
                        <form method="GET">
                            <label style="color:yellow" ><h1 style="font-family: cursive">Name:</h1> </label>
                            <input id="ur_name" name="Name" placeholder="Enter Name" type="text" style="height: 25;color: #000" class="btn"/>
                            <br>
                            <label id="ur_name_lbl" style="color: red;visibility:hidden">Invalid Name</label>
                            <br><br>
                            <label style="color:yellow" ><h1 style="font-family: cursive">Mobile Number:</h1> </label>
                            <input id="ur_phone" name="Mobile_NO" placeholder="Enter Phone Number" type="text" style="height: 25;color: #000" class="btn"/>
                            <br>
                            <label id="ur_phone_lbl" style="color: red;visibility:hidden">Invalid Phone Number</label>
                            <br><br>
                            <label style="color:yellow" ><h1 style="font-family: cursive">Password:</h1> </label>
                            <input id="ur_pass" name="Password" placeholder="Enter Password" type="password" style="height: 25; color: #000" class="btn"/>
                            <br>
                            <label id="ur_pass_lbl" style="color: red;visibility:hidden">Invalid Password</label>
                            <br><br>
                            <label style="color:yellow" ><h1 style="font-family: cursive">Email ID:</h1> </label>
                            <input id="ur_mail" name="Email_ID" placeholder="Enter Email" type="text" style="height: 25; color: #000" class="btn"/>
                            <br>
                            <label id="ur_mail_lbl" style="color: red;visibility:hidden">Invalid Email Id</label>
                            <br><br><br>
                            <div class="button" style="position: relative;">
                                    <a href="#" class="btn" onclick="Validate()" >Submit</a>
                                    <button id="btn_Sub" style="padding: 10px;font-weight: bold;"
                                    >Save</button>
                            </div>
                                    
                            
                        </form>
                        </div>

        </header>
      
<?php
$name=$_GET["Name"];
$Mobile=$_GET["Mobile_NO"];
$Password=$_GET["Password"];
$Email=$_GET["Email_ID"];

if($name!="" && $Mobile!="" && $Password!="" && $Email!="")
{
    $query="insert into signup values('$name','$Mobile','$Password','$Email')"; 
    $data=mysqli_query($conn,$query);

    if($data)
        echo "Data inserted";
    else
        echo "Data not inserted";
}
else
    echo "All Fields must be Filled";


?>
  </body>
</html>