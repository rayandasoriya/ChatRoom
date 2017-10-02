<?php
	include('session.php');
	if (isset($_POST['id'])){
		$id=$_POST['id'];
		
		$query=mysqli_query($conn,"select * from chat_member where chatroom='$id' and userid='".$_SESSION['id']."'");
		if (mysqli_num_rows($query)<1){
			mysqli_query($conn,"insert into chat_member (chatroomid, userid) values ('$id', '".$_SESSION['id']."')");
		}
	}
?>