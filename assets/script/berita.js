$(function(){

	var pemiluapikey = "54d4666435bc00a05e17164ba5ac0710";
	var base_url = "http://localhost/simpatisan/berita/";

	init();

	function init() {
		getBerita();

		$("#btSearch").bind("click", function() {
			if ($("#searchinput").val() != "") {
				searchBerita($("#searchinput").val());
			}
		})
	}
	function getBerita() {
		$.ajax({
			url: 'http://api.pemiluapi.org/berita?json=get_recent_posts&count=30&apiKey=' + pemiluapikey,
			success: onSuccess,
			error: function() {
				console.log("error");
			},
			dataType: "json"
		})

		function onSuccess(e) {
			var data = new Array();
			if (e.posts) {
				if (e.posts.length) {
					data = e.posts;
				}
			}
			console.log(data);

			for (var i = 0; i < data.length; i++) {
				olahBerita(data[i]);
			}
		}
	}
	function searchBerita(text) {
		$.ajax({
			url: 'http://api.pemiluapi.org/berita?json=get_search_results&search=' + encodeURIComponent(text) + '&count=30&apiKey=' + pemiluapikey,
			success: onSearch,
			error: function() {
				console.log("error");
			},
			dataType: "json"
		})
		function onSearch(e) {
			var data = new Array();
			if (e.posts) {
				if (e.posts.length) {
					data = e.posts;
				}
			}
			console.log(data);
			$(".posts").html("");

			if (data.length > 0) {
				$(".juhead").html("Hasil pencarian untuk kata `" + text + "`");
				for (var i = 0; i < data.length; i++) {
					olahBerita(data[i]);
				}
			} else {
				$(".juhead").html("Tidak ada berita yang memuat kata `" + text + "`");
			}
		}
	}
	function olahBerita(berita) {
		var konten = $("<div>" + berita.content + "</div>");
		var url = konten.find("a:contains('Selanjutnya')").attr('href');

		if (!url)
			url = berita.url;

		var temp = $("<a class='post' href='" + url + "' target='_blank'></a>")
		temp.addClass("post");

		var wrapper = $("<div class='wrapper'></div>");

		wrapper.append("<h2>" + berita.title + "</h2>");
		wrapper.append("<div class='date'>" + berita.date + "</div>");
		wrapper.append("<div class='content'>" + berita.content + "</div>");

		temp.append(wrapper);

		$(".posts").append(temp);
	}
})