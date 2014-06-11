<?php

$directory = "style";

require "scss.inc.php";
scss_server::serveFrom($directory);

?>