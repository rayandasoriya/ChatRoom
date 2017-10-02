<?php
	include('session.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		
		mysqli_query($conn,"delete from `user` where userid='$id'");
	}

?>