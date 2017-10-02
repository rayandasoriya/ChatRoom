<!-- Logout-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Logging out...</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<center><strong><span style="font-size: 15px;">Username: <?php echo $user; ?></span></strong></center>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Update Photo-->
    <div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Uploading Photo...</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<form method="POST" enctype="multipart/form-data" action="update_photo.php">
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Photo:</span>
						<input type="file" style="width:350px;" class="form-control" name="image">
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-upload"></span> Upload</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Account-->
    <div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">My Account</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="update_account.php">
					<div style="height: 10px;"></div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Name:</span>
						<input type="text" style="width:350px;" class="form-control" name="mname" value="<?php echo $srow['uname']; ?>">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Username:</span>
						<input type="text" style="width:350px;" class="form-control" name="musername" value="<?php echo $srow['username']; ?>">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Password:</span>
						<input type="password" style="width:350px;" class="form-control" name="mpassword" value="<?php echo $srow['password']; ?>">
					</div>
					<hr>
					<span>Enter current password to save changes:</span>
					<div style="height: 10px;"></div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Password:</span>
						<input type="password" style="width:350px;" class="form-control" name="cpassword">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Again:</span>
						<input type="password" style="width:350px;" class="form-control" name="apassword">
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
				</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->