<html>
<head>
	<meta charset="UTF-8">

	<title>Simpatisan</title>

	<meta property="fb:app_id"          content="676813325744578" /> 
	<meta property="og:type"            content="reference" /> 
	<meta property="og:url"             content="<?= base_url() . uri_string(); ?>" /> 
	<meta property="og:title"           content="Simpatisan. Ajak teman-teman kalian untuk tidak golput." /> 
	<meta property="og:image"           content="<?= asset_url(); ?>images/logo.png" /> 

	<link rel="icon" type="image/png" href="<?= asset_url(); ?>images/logo_64.png">
	<link rel="stylesheet" href="<?= asset_url() . 'font-awesome-4.1.0/css/font-awesome.min.css' ?>">
	<link rel="stylesheet" href="<?= asset_url() . 'style.php/style.scss' ?>">

	<script type="application/javascript" src="<?= asset_url() . 'script/jquery-1.11.1.min.js'; ?>"></script>
	<?php if (isset($js)) { ?>
	<script type="application/javascript" src="<?= asset_url() . 'script/' . $js; ?>"></script>
	<?php } ?>
	<script type="application/javascript" src="<?= asset_url() . 'script/mine.js'; ?>"></script>
</head>
<body>

	<div class="mainwrapper">

		<header>
			<div class="container">
				<a href="<?= base_url(); ?>">
					<div class="logo">
					</div>
				</a>
				<div class="headermenu">
					<?php if (isLogin()) { ?>
					<div class="user" id="user">
						<div class="photo"><img id="userphoto" src="<?= $userdata->avatar; ?>" alt=""></div>
						<div class="info">
							<div class="username" id="username"><?= $userdata->username; ?></div>
							<div class="follower"><i class="fa fa-users"></i>&nbsp;<span id="follower"><?= $userdata->likes; ?></span></div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="mainmenu">
					<ul>
						<li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Beranda</a></li>
						<li><a href="<?= base_url(); ?>calon"><i class="fa fa-user"></i> Profil Capres</a></li>
						<li><a href="<?= base_url(); ?>berita"><i class="fa fa-paper-plane-o"></i> Berita</a></li>
						<li><a href="<?= base_url(); ?>tentang"><i class="fa fa-question"></i> Tentang</a></li>
					</ul>
				</div>
			</div>
		</header>

		<div class="container">
