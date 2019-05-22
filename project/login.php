<?php
$dbserver="localhost";
$user="root";
$pass="";
$db="library_book";
//$connect=mysqli_connect("localhost","root","","login");
$connect=mysqli_connect($dbserver,$user,$pass,$db);

  $error=array( );
   if(isset($_POST['uname'])){
        if(empty(trim($_POST['uname']))){
        $error[]='username is requered ';
      }
    $username=$_POST['uname'];
    $password=$_POST['psw'];


    $username=mysqli_real_escape_string($connect,$username);
    $password=mysqli_real_escape_string($connect,$password);

    
    $result=mysqli_query($connect,"select * from buser where username='$username' and password='$password'") or die("failed to query database ".mysqli_eror());
   
    $row=mysqli_fetch_array($result);
    if(mysqli_num_rows>0)
    echo 'username already exit';
    if($row['username']==$username && $row['psw'==$password]){
       $message="you have successfully logged ".$row['username'];
         echo "<script type='text/javascript'>alert('$message');</script>";

       header('location:home(2).php');
         
    }
    else{
        echo "you are not login";
    }
  }
   
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;background-image:url("image/original.jpg");width: 100%;height: 100%}
form {border: 3px solid #f1f1f1; width: 40%; height:50%;margin-left: 30%;margin-top: 5%; background-color: white}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}
.avatar{
	color: orange;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>



<form action="login.php" method="post">
  <div class="imgcontainer">
    <h2 class="avatar">Login Form </h2>
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <a href="home.php"><button type="submit">Login</button></a>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>

