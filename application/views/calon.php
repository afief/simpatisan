<?php include "header.php" ?>

<div class="profils">
	<div class="profil single profil<?= $kode ?>">
		<div class="poto" style="background-image: url('<?= asset_url() . 'images/' . $kode . '.jpg'; ?>')"></div>
		<div class="bio">
			<table>
				<tr>
					<td>Nama</td>
					<td class="nama"></td>
				</tr>
				<tr>
					<td>Tempat, Tanggal Lahir</td>
					<td class="ttl"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td class="alamat">
						<div class="kelurahan"></div>
						<div class="kecamatan"></div>
						<div class="kota"></div>
						<div class="provinsi"></div>
					</td>
				</tr>
				<tr>
					<td>Partai</td>
					<td class="partai"></td>
				</tr>
				<tr>
					<td>Biografi</td>
					<td class="biografi"></td>
				</tr>
				<tr class="pendidikan">
					<td>Pendidikan</td>
					<td>
						<ul></ul>
					</td>
				</tr>
				<tr class="pekerjaan">
					<td>Pekerjaan</td>
					<td>
						<ul></ul>
					</td>
				</tr>
				<tr class="organisasi">
					<td>Organisasi</td>
					<td>
						<ul></ul>
					</td>
				</tr>
				<tr class="penghargaan">
					<td>Penghargaan</td>
					<td>
						<ul></ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php include "footer.php" ?>