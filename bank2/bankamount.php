<?php
session_start();
$_SESSION["un"]=$_POST["Uname"];
if(isset($_POST["Uname"]))
{
$tbname=$_SESSION["un"];
}
else
{
echo"error";
}
$password=$_POST["pass"];
$con=mysqli_connect("localhost","root","","bank");
$sql1="SELECT * FROM $tbname";
$result=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($result);
if($row["password"]==$password)
{
header("location:bankamount.html");
}
else
{
echo"<html>
<body bgcolor=powderblue>
<h1>CHECK YOUR PASSWORD</h1>
<form action='bank1.html'>
<input type=submit value='re-enter'>
</form>
</body>
</html>";
}
mysqli_close($con);
?>