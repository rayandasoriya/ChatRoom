<?php
	include('../conn.php');
	if(isset($_POST['edit'])){
		
		$id=$_POST['id'];
		$name=$_POST['name'];
		$pass=$_POST['pass'];
		
		mysqli_query($conn,"update chatroom set chat_name='$name', chat_password='$pass' where chatroomid='$id'");
		
	}

?>