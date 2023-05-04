<?php
session_start();
$run=$_POST["rusername"];
$sn=$_SESSION["un"];
$aa=$_POST["message"];
$con=mysqli_connect("localhost","root","","message");
if(!$con)
{
echo"failed to connect:",mysqli_error($con);
}
$sql1="INSERT INTO $run(name,message) VALUES('$sn','$aa')";
if(mysqli_query($con,$sql1))
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
  <p class=typed>THE MESSAGE HAS BEEN SENT</p>
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
mysqli_close($con);
?>