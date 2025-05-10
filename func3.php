<?php
session_start();
$con=mysqli_connect("localhost","root","","novena_hospital");

if (isset($_POST['login_admin'])) {
	$username = $_POST['username1'];
	$password = $_POST['password2'];

	if ($username === 'admin' && $password === 'admin123') {
		header("Location: Admin/dashboard.php");
		echo "<script>alert('Welcome Admin!');</script>";

	} else {
		echo "<script>alert('Invalid Username or Password!');</script>";
	}
}

if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointment set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}




function display_docs()
{
	global $con;
	$query="select * from doctor";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		# echo'<option value="" disabled selected>Select Doctor</option>';
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

if(isset($_POST['doc_sub']))
{
	$name=$_POST['name'];
	$query="insert into doctor(name)values('$name')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}
