<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<div class="row">
		<?php include('chatlist.php'); ?>
	</div>
</div>
<?php include('crudroom_modal.php'); ?>
<?php include('modal.php'); ?>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){
	
	$('#chatRoom').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": false,
	"pageLength": 7
	});
	
	$(document).on('click', '#addchatroom', function(){
		chatname=$('#chat_name').val();
		chatpass=$('#chat_password').val();
			$.ajax({
				url:"add_chatroom.php",
				method:"POST",
				data:{
					chatname: chatname,
					chatpass: chatpass,
				},
				success:function(data){
				window.location.href='chatroom.php?id='+data;
				}
			});
		
	});
	//
	$(document).on('click', '.delete', function(){
		var rid=$(this).val();
		$('#delete_room').modal('show');
		$('.modal-footer #confirm_delete').val(rid);
	});
	
	$(document).on('click', '#confirm_delete', function(){
		var nrid=$(this).val();
		$('#delete_room').modal('hide');
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
	
	$(document).on('click', '.edit', function(){
		var rid=$(this).val();
		var name=$('#name'+rid).val();
		var pass=$('#pass'+rid).val();
		$('#edit_room').modal('show');
		$('.modal-body #room_name').val(name);
		$('.modal-body #room_password').val(pass);
		$('.modal-footer #confirm_update').val(rid);
	});
	
	$(document).on('click', '#confirm_update', function(){
		var nrid=$(this).val();
		var roomname=$('#room_name').val();
		var roompass=$('#room_password').val();
		$('#edit_room').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"update_room.php",
				method:"POST",
				data:{
					id: nrid,
					name: roomname,
					pass: roompass,
					edit: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
 
});
</script>	
</body>
</html>