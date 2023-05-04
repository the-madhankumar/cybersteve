<?php
session_start();
$un=$_SESSION["un"];
$a=$_POST["money"];
$con=mysqli_connect("localhost","root","","bank");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql2="SELECT * FROM $un";
if($result=mysqli_query($con,$sql2))
{
$row1=mysqli_fetch_assoc($result);
$d1=$row1["deposit"];
$aaa=$d1+$a;
$sql4="UPDATE $un SET deposit='$aaa' WHERE username='$un'";
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
  <p class=typed>THE AMOUNT HAS BEEN DEBITED</p>
</div>
<form action='bankamount.html'>
<input type=submit value='submit'>
</form>
</body>
</html>";
}
else
{
echo"not created:",mysqli_error($con);
}
}
mysqli_close($con);
?>