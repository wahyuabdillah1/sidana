<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<title>Website BMKG - <?=$title;?></title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" href="<?= base_url('home');?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('artikel');?>">Artikel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('gempa');?>">Data Gempa</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>