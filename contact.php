<?php
// contact.php

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "point_technovation";

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}

// Get Form Data
$name     = mysqli_real_escape_string($conn, $_POST['name']);
$email    = mysqli_real_escape_string($conn, $_POST['email']);
$phone    = mysqli_real_escape_string($conn, $_POST['phone']);
$company  = mysqli_real_escape_string($conn, $_POST['company']);
$service  = mysqli_real_escape_string($conn, $_POST['service']);
$message  = mysqli_real_escape_string($conn, $_POST['message']);

// Insert Data
$sql = "INSERT INTO inquiries
(name,email,phone,company,service,message)
VALUES
('$name','$email','$phone','$company','$service','$message')";

if($conn->query($sql) === TRUE)
{
?>
<!DOCTYPE html>
<html>
<head>

<title>Success</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{
background:white;
padding:40px;
border-radius:10px;
box-shadow:0 0 20px rgba(0,0,0,.15);
text-align:center;
}

h2{
color:green;
}

a{
display:inline-block;
margin-top:20px;
padding:12px 30px;
background:#b30000;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>

</head>

<body>

<div class="box">

<h2>
Thank You!
</h2>

<p>

Your inquiry has been submitted successfully.

</p>

<a href="index.html">

Back To Home

</a>

</div>

</body>

</html>

<?php
}
else
{
echo "Error : ".$conn->error;
}

$conn->close();

?>