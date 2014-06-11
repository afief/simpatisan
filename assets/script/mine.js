$(function() {

    var baseUrl = 'http://localhost/simpatisan/';

    buttonsListener();
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
    function buttonsListener() {
        $("#btUserDropDown").bind("click blur", loginMenuClick);
    }

    //fungsi
    function fbLoginStatus() {
        FB.getLoginStatus(function(e) {
            if (e.status == "connected") {
                console.log("Connected To Faceook");
                fbOnConnect();
            } else {
                console.log("Not Connected To Facebook");
            }
            $(".btLoginFacebook").unbind("click").bind("click", fbLogin);
        });
    }
    function fbOnConnect() {
        /*
        FB.api("/me/picture?type=large&redirect=false", function(e) {
            if (e.data)
                if (e.data.url)
                    $(".fromfbid").attr("src", e.data.url);
            console.log(e.data.url);
        });*/
        //$(".btLoginFacebook").html('<i class="fa fa-facebook-square"></i> Logout');
        //$(".btLoginFacebook").unbind("click").bind("click", fbLogout);
        $(".btLoginFacebookLine").hide();
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

    function fbLogin() {
        window.location.href = baseUrl + 'facebook/connect';
        /*
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('Welcome Facebook!');
                fbOnAfterLogin();
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        },{scope: 'email,user_friends,user_about_me,user_birthday,user_location'});
        */
    }
    
    function fbLogout() {
        FB.logout(function(response) {
            $(".btLoginFacebook").html('<i class="fa fa-facebook-square"></i> Facebook');
            $(".btLoginFacebook").unbind("click").bind("click", fbLogin);
        });
    }

    //fungsi - fungsi listeners tombol
    function loginMenuClick(e) {
        if (($("#loginMenu").css("display") == "none") && (e.type != "blur")) {
            $("#loginMenu").css("display", "block");
            $("#loginMenu").css("bottom", (0 - $("#loginMenu").height() + 13) + "px");            
        } else {
            if (e.target.className == "fa fa-chevron-circle-down") {
                $("#loginMenu").css("display", "none");
            } else {
                window.setTimeout(function() {
                    $("#loginMenu").css("display", "none");
                }, 500);
            }
        }
    }

});
