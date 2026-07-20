<?php
session_start();

$conn = new mysqli("localhost","root","","point_technovation");

$error="";

if(isset($_POST['login'])){

$username=$_POST['username'];

$password=$_POST['password'];

if($username=="admin" && $password=="admin123"){

$_SESSION['admin']=true;

header("Location: dashboard.php");
exit;

}else{

$error="Invalid Username or Password";

}

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<style>

body{
font-family:Arial;
background:#f2f2f2;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.login{
background:white;
padding:40px;
width:350px;
border-radius:10px;
box-shadow:0 0 20px rgba(0,0,0,.2);
}

h2{
text-align:center;
color:#b30000;
}

input{
width:100%;
padding:12px;
margin:12px 0;
}

button{
width:100%;
padding:12px;
background:#b30000;
color:white;
border:none;
cursor:pointer;
}

.error{
color:red;
text-align:center;
}

</style>

</head>

<body>

<div class="login">

<h2>Admin Login</h2>

<div class="error"><?php echo $error; ?></div>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
name="login">

Login

</button>

</form>

</div>

</body>

</html>