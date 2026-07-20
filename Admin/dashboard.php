<?php
// admin/dashboard.php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost","root","","point_technovation");

if($conn->connect_error)
{
    die("Connection Failed");
}

// Delete Inquiry
if(isset($_GET['delete']))
{
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM inquiries WHERE id=$id");
    header("Location: dashboard.php");
    exit();
}

$result = $conn->query("SELECT * FROM inquiries ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:#f5f5f5;
}

.header{
background:#b30000;
color:#fff;
padding:20px 40px;
display:flex;
justify-content:space-between;
align-items:center;
}

.logout{
background:#fff;
color:#b30000;
padding:10px 20px;
text-decoration:none;
border-radius:5px;
font-weight:bold;
}

.container{
width:95%;
margin:40px auto;
}

table{
width:100%;
border-collapse:collapse;
background:#fff;
box-shadow:0 5px 20px rgba(0,0,0,.1);
}

table th{
background:#b30000;
color:#fff;
padding:15px;
}

table td{
padding:15px;
border-bottom:1px solid #ddd;
text-align:center;
}

tr:hover{
background:#fafafa;
}

.delete{
background:red;
color:#fff;
padding:8px 15px;
text-decoration:none;
border-radius:5px;
}

.delete:hover{
background:#850000;
}

</style>

</head>

<body>

<div class="header">

<h2>
Point Technovation Admin Panel
</h2>

<a href="logout.php" class="logout">
Logout
</a>

</div>

<div class="container">

<table>

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Company</th>

<th>Service</th>

<th>Message</th>

<th>Date</th>

<th>Action</th>

</tr>

<?php

while($row = $result->fetch_assoc())
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['name']); ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo htmlspecialchars($row['phone']); ?></td>

<td><?php echo htmlspecialchars($row['company']); ?></td>

<td><?php echo htmlspecialchars($row['service']); ?></td>

<td><?php echo htmlspecialchars($row['message']); ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a
class="delete"
href="?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this inquiry?')">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>