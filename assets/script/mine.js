$(function() {

    var baseUrl = 'http://localhost/simpatisan/';
    var facebookappid = "676813325744578";

    facebookInit();

    function facebookInit() {
        $.ajaxSetup({ cache: true });
        $.getScript('//connect.facebook.net/en_UK/all.js', function(){
            FB.init({
                appId: facebookappid,
                cookie: true,
                status: true
            });     
            fbLoginStatus();
        });
        $("#btLoginFacebook").unbind("click").bind("click", fbLogin);
        $(".btShareFacebook").unbind("click").bind("click", shareFacebook)
    }
    //fungsi
    function shareFacebook() {
        FB.ui(
        {
            method: 'share',
            href: baseUrl + 'u/18',
        },
        function(response) {
            if (response && !response.error_code) {
                alert('posting complete');
            } else {
                console.log("error posting");
            }
        }
        );
    }
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
            } else {
                fbOnNotConnect();
            }
        });
    }
    function fbOnNotConnect() {
        $("#facebookLogin").addClass("show");
    }

    function fbLogin() {
        FB.login(function(response) {
            if (response.authResponse) {
                window.location.href = baseUrl + 'facebook/connect';
            } else {
             console.log('User cancelled login or did not fully authorize.');
         }
     }, {scope: "email"});
    }

});
