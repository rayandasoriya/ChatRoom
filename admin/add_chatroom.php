<?php 
	include('session.php');
	
	if (isset($_POST['chatname'])){
	$cid="";
	$chat_name=$_POST['chatname'];
	$chat_password=$_POST['chatpass'];
	
	mysqli_query($conn,"insert into chatroom (chat_name, chat_password, date_created, userid) values ('$chat_name', '$chat_password', NOW(), '".$_SESSION['id']."')");
	$cid=mysqli_insert_id($conn);
	
	mysqli_query($conn,"insert into chat_member (chatroomid, userid) values ('$cid', '".$_SESSION['id']."')");
	
	echo $cid;
	}
	
	
?>