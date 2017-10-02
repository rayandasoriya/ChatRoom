<?php
							include('../conn.php');
							$id=46;
								$mem=array();
								$um=mysqli_query($conn,"select * from `chat_member` where chatroomid='$id'");
								while($umrow=mysqli_fetch_array($um)){
									$mem[]=$umrow['userid'];
								}
								print_r($mem);
								$users=implode($mem, "', '");
								echo $users;
								print_r($users);
								
								$u=mysqli_query($conn,"select * from `user` where userid not in ('".$users."')");
								while($urow=mysqli_fetch_array($u)){
									?>
										<li><?php echo $urow['uname']; ?></li>	
									<?php
								}
							
							?>