<?php
	include('session.php');
	if(isset($_POST['mem'])){
		$id=$_POST['id'];
		
		$memq=mysqli_query($conn,"select * from chat_member left join `user` on user.userid=chat_member.userid where chatroomid='$id'");
		while($memrow=mysqli_fetch_array($memq)){
			?>
			<div class="well" style="height: 100px;">
			
			<span><?php echo $memrow['uname']; ?></span>
			<button class="btn btn-warning ">Kick</button>
			
			</div><br>
			<?php
		}
	}

?>