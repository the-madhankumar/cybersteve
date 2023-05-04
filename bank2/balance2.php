<?php
session_start();
$un=$_SESSION["un"];
$con=mysqli_connect("localhost","root","","bank");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}

$sql1="SELECT * FROM $un";
if($result=mysqli_query($con,$sql1))
{
$row=mysqli_fetch_assoc($result);
$d=$row["deposit"];
echo"<html>
<body bgcolor=powderblue>
<h1>BALANCE:$d</h1>
<form action='bankamount.html'>
<input type=submit value='submit'>
</form>
</body>
</html>";
}
else
{
echo"not connected:",mysqli_error($con);
}
mysqli_close($con);
?>