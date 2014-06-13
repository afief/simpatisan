<?php include "header.php" ?>

<div class="tentang">
	<h2>Tentang Simpatisan</h2>
	<div class="konten">
		<p>
			Simpatisan memuat informasi mengenai Calon Presiden dan Calon Wakil Presiden, serta berita - berita seputar pemilu. Semua data mengenai pemilu yang ada di Simpatisan diperoleh dari <a href="http://pemiluapi.org/" target="_blank">Pemilu Api</a> yang dijaga netralitasnya oleh mereka. Semoga dengan informasi tersebut, pengunjung dapat memilih dengan bijak siapa Calon Presiden dan Calon Wakil Presiden yang layak untuk memimpin negeri ini.
		</p>
		<p>Ajak teman-temanmu yang bimbang menentukan pilihan, lalu dapatkan poin dari setiap temanmu yang mendaftar melalui pranala yang kamu bagikan.</p>

		<?php if (isLogin()) { ?>

		<div class="sharewidget">
			<h4>Bagikan</h4>
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

		<?php } else { ?>

		<div class="infoberanda">
			<p class="bergabung">Bergabung Sekarang!</p>
			<div class="facebookLogin" id="facebookLogin">
				<button id="btLoginFacebook"><i class="fa fa-facebook-square"></i> &nbsp; Login</button>
			</div>
			<p class="keterangan">
				*kami hanya menyimpan nama dan email, serta <span>tidak</span> memposting ke facebook anda secara otomatis
			</p>
		</div>


		<?php } ?>
		<p>
			
		</p>
	</div>
</div>

<?php include "footer.php" ?>