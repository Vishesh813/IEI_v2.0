<?php   
$con = mysqli_connect("localhost","root","","samplelogindb");

if(mysqli_connect_errno())
{
	echo "Error in connection".mysqli_connect_errno();
	
}
session_start();

?>