<?php
session_start();
$un=$_SESSION["un"];
$con=mysqli_connect("localhost","root","","transaction");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql2="SELECT * FROM $un";
if($result=mysqli_query($con,$sql2))
{
echo"
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

#customers {
  font-family: sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color:orange;}
tr:nth-child(odd){background-color:tomato;}

#customers tr:hover {background-color: #ddd;}

#customers {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
th {
  background-color: #04AA6D;
  color: white;
}
body {
  background-image: url('money.jpg');
}
</style>
</head>
<body>
<table id=customers>
<tr><th>name</th><th>amount</th></tr><br>";
while($row=mysqli_fetch_assoc($result)) {
$row2=$row['amount'];
$row1=$row['transaction'];
    echo "
<tr><td>$row1</td><td>$row2</td></tr><br>
";
  }
echo"</table>
</body></html>
<form action='bankamount.html'>
<input type=submit value='submit'>
</form>";
}
else
{
echo"error:",mysqli_error($con);
}
mysqli_close($con);
?>