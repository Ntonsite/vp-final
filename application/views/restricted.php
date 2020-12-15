<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Restricted Area, Vendor M</title>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h2>You have tried to access an Authorized Page</h2>
		</div>
		<a class="btn btn-danger" href="<?php echo site_url('auth')?>">Go Back to Login</a>
	</div>
</body>
</html>
