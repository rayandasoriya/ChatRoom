<?php
	include('session.php');
	if (isset($_POST['leave'])){
		$id=$_POST['id'];
		
		mysqli_query($conn,"delete from chat_member where userid='".$_SESSION['id']."' and chatroomid='$id'");
		
		//remove room if no more member
		$r=mysqli_query($conn,"select * from chat_member where chatroomid='$id'");
		if (mysqli_num_rows($r)<1){
			mysqli_query($conn,"delete from chatroom where chatroomid='$id'");
		}
		
	}

?>