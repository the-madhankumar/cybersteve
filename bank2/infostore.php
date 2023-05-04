<?php
$tbname=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$name=$_POST["name"];
$phone=$_POST["phone"];
$street=$_POST["street"];
$city=$_POST["city"];
$website=$_POST["website"];
$birthdate=$_POST["birthdate"];
$deposit=0;
$con=mysqli_connect("localhost","root","","bank");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql="INSERT INTO $tbname(username,email,password,name,phone,street,city,website,birthdate,deposit) VALUES('$tbname','$email','$password','$name','$phone','$street','$city','$website','$birthdate','$deposit')";
if(mysqli_query($con,$sql))
{
header("location:bank1.html");
}
else
{
echo"not created:",mysqli_error($con);
}

mysqli_close($con);
?>