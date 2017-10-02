<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
	$id=$_REQUEST['id'];
	
	$chatq=mysqli_query($conn,"select * from chatroom where chatroomid='$id'");
	$chatrow=mysqli_fetch_array($chatq);
	
	$cmem=mysqli_query($conn,"select * from chat_member where chatroomid='$id'");
?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<div class="row">
		<?php include('room.php'); ?>
	</div>
</div>
<?php include('room_modal.php'); ?>
<?php include('modal.php'); ?>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){

	displayChat();
	
		$(document).on('click', '#send_msg', function(){
			id = <?php echo $id; ?>;
			if($('#chat_msg').val() == ""){
				alert('Please write message first');
			}else{
				$msg = $('#chat_msg').val();
				$.ajax({
					type: "POST",
					url: "send_message.php",
					data: {
						msg: $msg,
						id: id,
					},
					success: function(){
						$('#chat_msg').val("");
						displayChat();
					}
				});
			}	
		});
		
		$(document).on('click', '#confirm_leave', function(){
			id = <?php echo $id; ?>;
			$('#leave_room').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
				$.ajax({
					type: "POST",
					url: "leaveroom.php",
					data: {
						id: id,
						leave: 1,
					},
					success: function(){
						window.location.href='index.php';
					}
				});
				
		});
		
		$(document).on('click', '#confirm_delete', function(){
			id = <?php echo $id; ?>;
			$('#confirm_delete').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
				$.ajax({
					type: "POST",
					url: "deleteroom.php",
					data: {
						id: id,
						del: 1,
					},
					success: function(){
						window.location.href='index.php';
					}
				});
				
		});
		
		$(document).keypress(function(e){
			if (e.which == 13){
			$("#send_msg").click();
			}
		});
		
		$("#user_details").hover(function(){
			$('.showme').removeClass('hidden');
		},function(){
			$('.showme').addClass('hidden');
		});
		
		//
	$(document).on('click', '.delete2', function(){
		var rid=$(this).val();
		$('#delete_room2').modal('show');
		$('.modal-footer #confirm_delete2').val(rid);
	});
	
	$(document).on('click', '#confirm_delete2', function(){
		var nrid=$(this).val();
		$('#delete_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"deleteroom.php",
				method:"POST",
				data:{
					id: nrid,
					del: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
	
	$(document).on('click', '.leave2', function(){
		var rid=$(this).val();
		$('#leave_room2').modal('show');
		$('.modal-footer #confirm_leave2').val(rid);
	});
	
	$(document).on('click', '#confirm_leave2', function(){
		var nrid=$(this).val();
		$('#leave_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"leaveroom.php",
				method:"POST",
				data:{
					id: nrid,
					leave: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
});
	
	function displayChat(){
		id = <?php echo $id; ?>;
		$.ajax({
			url: 'fetch_chat.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				fetch: 1,
			},
			success: function(response){
				$('#chat_area').html(response);
				$("#chat_area").scrollTop($("#chat_area")[0].scrollHeight);
			}
		});
	}
</script>	
</body>
</html>