<?php
$tbname=$_POST["Uname"];
$con=mysqli_connect("localhost","root","","bank");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql="CREATE TABLE $tbname( username VARCHAR(500),email VARCHAR(50),password VARCHAR(50) , name VARCHAR(50),phone VARCHAR(20),street VARCHAR(50),city VARCHAR(50),website VARCHAR(50),birthdate VARCHAR(20),deposit BIGINT(20))";
if(mysqli_query($con,$sql))
{
echo"";
}
else
{
echo"not created:",mysqli_error($con);
}

mysqli_close($con);

$con=mysqli_connect("localhost","root","","transaction");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql1="CREATE TABLE $tbname(transaction VARCHAR(50),amount BIGINT(50))";
if(mysqli_query($con,$sql1))
{
echo"";
}
else
{
echo"not created:",mysqli_error($con);
}

mysqli_close($con);

$con=mysqli_connect("localhost","root","","message");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql="CREATE TABLE $tbname( name VARCHAR(50),message VARCHAR(500))";
if(mysqli_query($con,$sql))
{
header("location:bankapply.html");
}
else
{
echo"not created:",mysqli_error($con);
}

mysqli_close($con);
?>