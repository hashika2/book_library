<?php 
  $username=filter_input(INPUT_POST,'uname');
  $email=filter_input(INPUT_POST,'Email');
  $password=filter_input(INPUT_POST,'psw');

  $conn=new mysqli("localhost","root","","library_book");

  if(mysqli_connect_error()){
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
  }
  else{
    $sql="INSERT INTO buser(username,email,password) VALUES('$username','$email','$password')";

    if($conn->query($sql)===TRUE){
      echo "new record inserted successful";
     header('Location:home2.php');
    }
    else{
      echo "error :".$sql."<br>".$conn->error;
    }
    $conn->close();
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;background-image:url("image/original.jpg"); width: 100%;height: 100%}
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



<form action="create_acc.php" method="post">
  <div class="imgcontainer">
    <h2 class="avatar">Login Form </h2>
  </div>

  <div class="container">

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Email" name="Email" required>
    <label for="uname"><b>Password</b></label>
    <input type="password" placeholder="password" name="psw" required>
    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Password" name="psw" required>
        
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

