<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Vendor Management Portal - ADMIN PANEL</title>
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
							<h3 class="panel-title">Login</h3>
						</div>
						<?php
					  $success_msg= $this->session->flashdata('success_msg');
					  $error_msg= $this->session->flashdata('error_msg');

						  if($success_msg){
							?>
							<div class="alert alert-success">
							  <?php echo $success_msg; ?>
							</div>
						  <?php
						  }
						  if($error_msg){
							?>
							<div class="alert alert-danger">
							  <?php echo $error_msg; ?>
							</div>
							<?php
						  }
						  ?>
						<div class="panel-body">
							<form role="form" method="post" action="<?php echo site_url('user/login'); ?>">
								<fieldset>
									<div class="form-group">
										<input required="" class="form-control" placeholder="username" name="user_name" type="text" autofocus>
									</div>
									<div class="form-group">
										<input required="" class="form-control" placeholder="Password" name="user_password" type="password" value="">
									</div>
										<input class="btn btn-block btn-primary btn-block" type="submit" value="login" name="login" > <br>
										<!-- <a href="<?php echo site_url('user/forgot_password'); ?>">Forgot Password</a> -->
								</fieldset>
							</form>
						</div>	
					</div>
				</div>
			</div>
			<div class="text-center"><?php $this->load->view('includes/footer'); ?></div>
		</div>
	  </body>
	  <script>
      $(document).ready(function() {
         function disablePrev() { window.history.forward() }
         window.onload = disablePrev();
         window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
      });
   </script>
</html>
