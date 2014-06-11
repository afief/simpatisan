$(function() {

    var baseUrl = 'http://localhost/simpatisan/';

    facebookInit();

    function facebookInit() {
        $.ajaxSetup({ cache: true });
        $.getScript('//connect.facebook.net/en_UK/all.js', function(){
            FB.init({
                appId: '308104096001937',
                cookie: true,
                status: true
            });     
            fbLoginStatus();
        });
    }
    //fungsi
    function fbLoginStatus() {
        FB.getLoginStatus(function(e) {
            if (e.status == "connected") {
                console.log("Connected To Faceook");
                fbOnConnect();
            } else {
                fbOnNotConnect();
                console.log("Not Connected To Facebook");
            }
        });
    }
    function fbOnConnect() {
        FB.api('/me', function(response) {
            if (response) {
                $("#user").addClass("show");
                $("#userphoto").attr("src", "http://graph.facebook.com/" + response.id + "/picture?type=square&height=250&width=250&redirect=true");          
                $("#username").html(response.name);
            } else {
                fbOnNotConnect();
            }
        });
    }
    function fbOnNotConnect() {
        $("#facebookLogin").addClass("show");
    }

    function fbOnAfterLogin() {
        $.ajax({
            type: "GET",
            url: baseUrl + "fb_api/isRegistered",
            success: function(e) {
                if (e.status) {
                    //user sudah teregistrasi, masuk lewat facebook
                    window.location.href = baseUrl + 'facebook/connect';

                } else {
                    //user belum teregistrasi, masuk lewat facebook
                    window.location.href = baseUrl + 'facebook/connect';

                }
            },
            error: function() {
                console.log("error");
            },
            dataType: "json"
        });
    }

});
