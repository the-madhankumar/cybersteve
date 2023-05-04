<?php
session_start();
$sun=$_SESSION["un"];
$run=$_POST["rusername"];
$rn=$_POST["rname"];
$aa=$_POST["money"];
$con=mysqli_connect("localhost","root","","bank");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql1="SELECT * FROM $sun";
if($result=mysqli_query($con,$sql1))
{
$row=mysqli_fetch_assoc($result);
$d=$row["deposit"];
if($d>$aa)
{
$a=$d-$aa;
$sql3="UPDATE $sun SET deposit='$a' WHERE username='$sun'";
if(mysqli_query($con,$sql3))
{
echo"";
}
else
{
echo"notcreated1:",mysqli_error($con);
}
}
}
$sql2="SELECT * FROM $run";
if($result=mysqli_query($con,$sql2))
{
$row1=mysqli_fetch_assoc($result);
$d1=$row1["deposit"];
if($d>$aa)
{
$aaa=$d1+$aa;
$sql4="UPDATE $run SET deposit='$aaa' WHERE username='$run'";
if(mysqli_query($con,$sql4))
{
echo"<html>
<style>
.container{
  display: inline-block;
  font-family: arial;
  font-size: 24px;
color:734f96;
}

.typed {
  overflow: hidden;
  white-space: nowrap;
  border-right: 2px solid;
  width: 0;
  animation: typing;
  animation-duration: 1.5s;
  animation-timing-function: steps(30, end);
  animation-fill-mode: forwards;
}
  
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}
</style>
<body bgcolor=powderblue>
<div class=container>
  <p class=typed>THE AMOUNT HAS BEEN TRANSACTED</p>
</div>
<form action='bankamount.html'>
<input type=submit value='submit'>
</form>
</body>
</html>";
}
else
{
echo"notcreated2:",mysqli_error($con);
}
}
else
{
echo"
<html>
<body bgcolor=powderblue>
<h1>CHECK YOUR BANK BALANCE,INSUFFICIENT BANK BALANCE</h1>
<form action='bankamount.html'>
<input type=submit value='submit'>
</form>
</body>
</html>";
}
}
else
{
echo"not created3:",mysqli_error($con);
}
mysqli_close($con);

if($d>$aa)
{
$con=mysqli_connect("localhost","root","","transaction");
$bb=$aa-(2*$aa);
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql1="INSERT INTO $sun(transaction,amount) VALUES('$rn','$bb')";
if($result=mysqli_query($con,$sql1))
{
echo"";
}
else
{
echo"notcreated2:",mysqli_error($con);
}
mysqli_close($con);
}
else
{
echo"";
}

if($d>$aa)
{
$con=mysqli_connect("localhost","root","","transaction");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql1="INSERT INTO $run(transaction,amount) VALUES('$sun','$aa')";
if($result=mysqli_query($con,$sql1))
{
echo"";
mysqli_close($con);
}
else
{
echo"notcreated2:",mysqli_error($con);
}
}
else
{
echo"";
}
?>