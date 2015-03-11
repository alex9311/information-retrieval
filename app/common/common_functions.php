<?php

function print_imports($app_directory){
	$library_directory = $app_directory."/libraries/html5up-verti";
echo '
        <head>
                <title>Sparked! Spark your ideas</title>
                <meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <meta name="description" content="" />
                <meta name="keywords" content="" />
                <!--[if lte IE 8]><script src="/libraries/html5up-verti/css/ie/html5shiv.js"></script><![endif]-->
                <script src="/libraries/html5up-verti/js/jquery.min.js"></script>
                <script src="/libraries/html5up-verti/js/jquery.dropotron.min.js"></script>
                <script src="/libraries/html5up-verti/js/skel.min.js"></script>
                <script src="/libraries/html5up-verti/js/skel-layers.min.js"></script>
                <script src="/libraries/html5up-verti/js/init.js"></script>
                        <link rel="stylesheet" href="/libraries/html5up-verti/css/skel.css" />
                        <link rel="stylesheet" href="/libraries/html5up-verti/css/style.css" />
                        <link rel="stylesheet" href="/libraries/html5up-verti/css/style-desktop.css" />
                <!--[if lte IE 8]><link rel="stylesheet" href="/libraries/html5up-verti/css/ie/v8.css" /><![endif]-->
        </head>
';
}
function print_header($app_directory){
echo '
    <div id="header-wrapper">
      <header id="header" class="container">
        <!-- Logo -->
        <div id="logo">
          <a href="'.$app_directory.'/index.php"> <img src="'.$app_directory.'/images/SparkedLogo2.png" /> </a>
        </div>
        <!-- Nav -->
        <nav id="nav">
          <ul>
            <li><a href="'.$app_directory.'/pages/vote.php">Vote</a></li>
            <li><a href="'.$app_directory.'/pages/submit.php">Submit</a>
            <li><a href="#">Sucess Stories</a></li>
            <li><a href="#">username</a></li>
          </ul>
        </nav>
      </header>
    </div>
';
}
