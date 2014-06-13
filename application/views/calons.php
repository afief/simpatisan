<?php include "header.php" ?>

<div class="calons">
	<h2>Profil Capres dan Cawapress</h2>
	<div class="keterangan">klik salah satu foto untuk melihat biodata detail</div>
	<div class="profils beranda">
		<a href="<?= base_url(); ?>calon/ps" class="profil profilps">
			<div class="poto" style="background-image: url('http://localhost/simpatisan/assets/images/ps.jpg')"></div>
			<div class="bio">
				<div class="nama">Prabowo Subianto</div>
			</div>
		</a>
		<a href="<?= base_url(); ?>calon/jw" class="profil profiljw">
			<div class="poto" style="background-image: url('http://localhost/simpatisan/assets/images/jw.jpg')"></div>
			<div class="bio">
				<div class="nama">Joko Widodo</div>
			</div>
		</a>
		<a href="<?= base_url(); ?>calon/hr" class="profil profilhr">
			<div class="poto" style="background-image: url('http://localhost/simpatisan/assets/images/hr.jpg')"></div>
			<div class="bio">
				<div class="nama">Hatta Rajasa</div>
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


<?php include "footer.php" ?>