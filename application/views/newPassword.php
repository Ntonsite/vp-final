<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Vendor Management Portal</title>
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer/">
  </head>
	 <body>
		<div class="container">
			<div class="row">
			  <br><br><br><br><br>
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Recover Password</h3>
						</div>
						<?php
					  $success_msg= $this->session->flashdata('success_msg');
					  $error_msg= $this->session->flashdata('error_msg');

						  if($success_msg){
							?>
							<div class="alert alert-success">
								<!-- Email has been sent to you -->
							  <?php echo $success_msg; ?>
							</div>
						  <?php
						  }
						  if($error_msg){
							?>
							<div class="alert alert-danger">
								<!-- Email does not exist -->
							  <?php echo $error_msg; ?>
							</div>
							<?php
						  }
						  ?>
						<div class="panel-body">
							<form role="form" method="post" action="<?php echo site_url('user/newPassword'); ?>">
								<fieldset>
									<div class="form-group">
										<input required="" class="form-control" placeholder="Enter new Password" name="password" type="text" autofocus>
									</div>
									<div class="form-group">
										<input required="" class="form-control" placeholder="Confirm new Password" name="cpassword" type="text" autofocus>
									</div>
									<input class="btn btn-block btn-primary btn-block" type="submit" value="Change Password" name="email_confirm">
								</fieldset>
							</form>
						</div>	
					</div>
				</div>
			</div>
			<div class="text-center"><?php $this->load->view('includes/footer'); ?></div>
		</div>
	  </body>
</html>
