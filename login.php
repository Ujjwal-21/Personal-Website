<?php
// if(!empty($_POST['submit1']))
// {


// Create connection
$conn=mysqli_connect('localhost','root','','personal_website');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
if(isset($_POST["submit1"]))
{
  $uname=$_POST['uname'];
  $pword=$_POST['pwd'];
  $query="select * from Person_Details where Username='$uname' and  Password='$pword'";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0)
  {
    session_start();
    $cookie_name = "user";
    $cookie_value = $uname;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    if(!isset($_COOKIE[$cookie_name])) {
      echo "Cookie named '" . $cookie_name . "' is not set!";
  } else {
      date_default_timezone_set("Asia/Kolkata");
      $dt= date("h:i:sa");
      echo '<script type="text/JavaScript"> 
      alert("Cookie Is Set For ' . $_COOKIE[$cookie_name] .' For 30 Days At Time ' . $dt . ' "); 
      alert(" ' . $uname .' ,Your Session Is Started");
       window.location.replace("success.html");
      </script>';
  }    
  }
  else
  {
    // echo "Login unsucessful";
    header('Location:unsucessful.html');
  }
    // header('Location:index.php');
}
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <script>  
        function validateform(){  
        var name=document.myform.uname.value;  
        var password=document.myform.pwd.value;
        if (name==null || name==""){  
          alert("Name can't be blank");  
          return false;  
        }
        else if(password==null || password==""){
            alert("Password can't be blank");  
            return false;  
        }

        else if(password.length<8){  
          alert("Password must be at least 8 characters long.");  
          return false;  
          }  
        }  
        </script>
</head>
<body>
    <div class="header">
        <div class="nmn">
            <a href="" style="color: white; text-decoration: none;" id="aa">Ujjwal Kanti Pramanick</a>
            
        </div>
        
        
    </div>
    <div class="hdr2">
        <a href="index.html" style="text-decoration: none;color :white;"><h2>Home&nbsp;&nbsp;&nbsp;</h2></a>
        <a href="about.html" style="text-decoration: none;color :white;"><h2>About&nbsp;&nbsp;&nbsp;</h2></a>
        <h2>Projects&nbsp;&nbsp;&nbsp;</h2>
        <h2>More&nbsp;&nbsp;&nbsp;</h2>
        <h2>Contacts&nbsp;&nbsp;&nbsp;</h2>
        <h2>Login&nbsp;&nbsp;&nbsp;</h2>
        <h2>Signup</h2>

    </div>
    <div class="bdy">
        <!-- <h1 id="ujji" style="font-size: 40px;">Hello , I Am Ujjwal Kanti Pramanick</h1>
        <h3 id="ujji2">A computer science student passionate about programming and design.</h3>
        <button id="bttn"><h3>Know More</h3></button> -->
        <div class="language">
            <h1 style="text-align: center; color: wheat; padding-top: 5%;">Login</h1>
            <hr><br><br>
            <form name="myform" action="" onsubmit="return validateform()" method="post">
                <h2>Username</h2> <br>
                <input type="text" name="uname" id="uname"> <br><br><br>
               <h2>Password</h2>  <br>
                <input type="password" name="pwd" id="pwd"><br><br><br>
                <button type="reset" id="rst"><h3>Reset</h3></button>
                <button type="submit" name="submit1" id="sbmt" value="submt"><h3>Submit</h3></button>
                
            </form>
        </div>
    </div>
    <!-- <div class="bdy2">
        <h1>hjfh</h1>
    </div> -->
    <!-- <h1>Hi</h1> -->
</body>
</html>