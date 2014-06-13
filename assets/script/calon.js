$(function() {

	var pemiluapikey = "54d4666435bc00a05e17164ba5ac0710";

	init();

	function init() {
		getCalon();
	}
	function getCalon() {
		$.ajax({
			url: 'http://api.pemiluapi.org/calonpresiden/api/caleg?apiKey=' + pemiluapikey,
			success: onSuccess,
			error: function() {
				console.log("error");
			},
			dataType: "json"
		})

		function onSuccess(e) {
			var data = new Array();
			if (e.data) {
				if (e.data.results) {
					if (e.data.results.caleg) {
						if (e.data.results.caleg.length > 0) {
							data = e.data.results.caleg;
						}
					}
				}
			}
			console.log(data);

			for (var i = 0; i < data.length; i++) {
				olahProfil(data[i]);
			}
		}
		function olahProfil(profil) {
			var pclass = ".profil" + profil.id;

			$(pclass + " .nama").html(profil.nama);
			$(pclass + " .ttl").html(profil.tempat_lahir + ", " + profil.tanggal_lahir);

			$(pclass + " .alamat .kelurahan").html(profil.kelurahan_tinggal);
			$(pclass + " .alamat .kecamatan").html(profil.kecamatan_tinggal);
			$(pclass + " .alamat .kota").html(profil.kab_kota_tinggal);
			$(pclass + " .alamat .provinsi").html(profil.provinsi_tinggal);

			$(pclass + " .partai").html(profil.partai.nama);
			$(pclass + " .biografi").html(profil.biografi.split("\\n").join("<br />"));

			var pendidikan = profil.riwayat_pendidikan;
			var temp;
			for (var i = 0; i < pendidikan.length; i++) {
				temp = $("<li></li>");
				temp.append("<div class='ringkasan'>" + pendidikan[i].ringkasan + "</div>");
				temp.append("<div class='mulai'>" + pendidikan[i].tanggal_mulai + "</div>");
				temp.append("<div class='selesai'>" + pendidikan[i].tanggal_selesai + "</div>");

				$(pclass + " .pendidikan ul").append(temp);
			}
			var pekerjaan = profil.riwayat_pekerjaan;
			for (var i = 0; i < pekerjaan.length; i++) {
				temp = $("<li></li>");
				temp.append("<div class='ringkasan'>" + pekerjaan[i].ringkasan + "</div>");
				temp.append("<div class='mulai'>" + pekerjaan[i].tanggal_mulai + "</div>");
				temp.append("<div class='selesai'>" + pekerjaan[i].tanggal_selesai + "</div>");

				$(pclass + " .pekerjaan ul").append(temp);
			}
			var organisasi = profil.riwayat_organisasi;
			for (var i = 0; i < organisasi.length; i++) {
				temp = $("<li></li>");
				temp.append("<div class='ringkasan'>" + organisasi[i].ringkasan + "</div>");
				temp.append("<div class='jabatan'>" + organisasi[i].jabatan + "</div>");
				temp.append("<div class='mulai'>" + organisasi[i].tanggal_mulai + "</div>");
				temp.append("<div class='selesai'>" + organisasi[i].tanggal_selesai + "</div>");

				$(pclass + " .organisasi ul").append(temp);
			}
			var penghargaan = profil.riwayat_penghargaan;
			for (var i = 0; i < penghargaan.length; i++) {
				temp = $("<li></li>");
				temp.append("<div class='ringkasan'>" + penghargaan[i].ringkasan + "</div>");
				temp.append("<div class='institusi'>" + penghargaan[i].institusi + "</div>");
				temp.append("<div class='tanggal'>" + penghargaan[i].tanggal + "</div>");

				$(pclass + " .penghargaan ul").append(temp);
			}
		}
	}

});