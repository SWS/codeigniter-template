<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?=(isset($title) ? $title : '')?></title>

		<base href="<?=base_url()?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<meta name="description" content="<?=(isset($description) ? $description : '')?>">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/screen.css">

		<link rel="icon" type="image/png" href="images/icon.png">
		<link rel="apple-touch-icon" type="image/png" href="images/apple-touch-icon.png">
	</head>
	
	<body>
		<div class="container">
			<?=(isset($content) ? $this->load->view($content) : NULL)?>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/application.js"></script>
	</body>
</html>