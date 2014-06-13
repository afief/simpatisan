<?php include "header.php" ?>

<div class="calons">
<h2>Profil Calon dan Wakil Calon Presiden</h2>
<div class="profils small beranda">
	<a href="<?= base_url(); ?>calon/ps" class="profil profilps">
		<div class="poto" style="background-image: url('http://localhost/simpatisan/assets/images/ps.jpg')"></div>
		<div class="bio">
			<div class="nama">Prabowo Subianto</div>
		</div>
	</a>
	<a href="<?= base_url(); ?>calon/hr" class="profil profilhr">
		<div class="poto" style="background-image: url('http://localhost/simpatisan/assets/images/hr.jpg')"></div>
		<div class="bio">
			<div class="nama">Hatta Rajasa</div>
		</div>
	</a>
	<a href="<?= base_url(); ?>calon/jw" class="profil profiljw">
		<div class="poto" style="background-image: url('http://localhost/simpatisan/assets/images/jw.jpg')"></div>
		<div class="bio">
			<div class="nama">Joko Widodo</div>
		</div>
	</a>
	<a href="<?= base_url(); ?>calon/jk" class="profil profiljk">
		<div class="poto" style="background-image: url('http://localhost/simpatisan/assets/images/jk.jpg')"></div>
		<div class="bio">
			<div class="nama">Jusuf Kalla</div>
		</div>
	</a>
</div>
</div>

<div class="sharewidget">
	<h4>Bagikan</h4>
	<p>Ajak teman-temanmu dan dapatkan poin dari setiap temanmu yang mendaftar melalui pranala yang kamu bagikan.</p>
	<div class="widget">
		<div class="text">
			<input type="text" onclick="this.select()" value="<?= base_url() . 'u/' . $userdata->id; ?>" readonly>
		</div>
		<div class="buttons">
			<div class="facebook">
				<button id="btShareFacebook" class="btshare fb btShareFacebook"><i class="fa fa-facebook"></i> &nbsp; Share to Facebook</button>
			</div>
			<div class="twitter">
				<button id="btShareTwitter" class="btshare tw"><i class="fa fa-twitter"></i> &nbsp; Share to Twitter</button>
			</div>
		</div>
	</div>
</div>


<?php include "footer.php" ?>