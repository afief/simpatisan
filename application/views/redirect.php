<html>
<head>
    <title> Simpatisan Redirect </title>
    <style type="text/css">
        body {
            background-image: url("<?= base_url(); ?>assets/images/bg.jpg");
        }
        @font-face
        {
            font-family: "Comic Neue";
            src: url("<?= base_url(); ?>assets/font/ComicNeue-Regular.woff");
        }

        .container {
            width: 500px;
            margin: 0px auto;
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            border: solid 1px #aaa;
            border-radius: 5px;
            background-color: #eee
        }
        .header {
            font-style: italic;
            color: #444;
            padding: 5px;
            border-bottom: solid 1px #aaa;
            margin-bottom: 10px;
            font-family: "Comic Neue"; 
        }
        .body {
            font-weight: normal;
            font-family: "Comic Neue";
            font-size: large;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">Redirecting</div>
        <div class="body">
            <?= isset($text)?$text:"Redirecting ... "; ?>
        </div>
    </div>


    <script type="application/javascript">
        <?php if (!isset($duration)) { ?>

            window.location.href = "<?= isset($toUrl)?$toUrl:base_url(); ?>";

            <?php } else { ?>

                window.setTimeout(function() {
                    window.location.href = "<?= isset($toUrl)?$toUrl:base_url(); ?>";
                }, <?= $duration; ?>);

                <?php } ?>
            </script>
        </body>

        </html>