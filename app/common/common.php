<?php
$app_directory = get_app_directory();
function get_app_directory(){
        $pos =  strpos(getcwd(),"app");
        $length = abs($pos+3-13);
        $app_directory =  substr(getcwd(),13,$length);
        return $app_directory;
}

function print_imports($app_directory){
	$library_directory = $app_directory."/libraries/html5up-verti";
echo '
        <head>
                <title>Sparked! Spark your ideas</title>
                <meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <meta name="description" content="" />
                <meta name="keywords" content="" />
                <!--[if lte IE 8]><script src="'.$library_directory.'/css/ie/html5shiv.js"></script><![endif]-->
                <script src="'.$library_directory.'/js/jquery.min.js"></script>
                <script src="'.$library_directory.'/js/jquery.dropotron.min.js"></script>
                <script src="'.$library_directory.'/js/skel.min.js"></script>
                <script src="'.$library_directory.'/js/skel-layers.min.js"></script>
                <script src="'.$library_directory.'/js/init.js"></script>
                <link rel="stylesheet" href="'.$app_directory.'/css/customizations.css" />
		<noscript>
                        <link rel="stylesheet" href="'.$library_directory.'/css/skel.css" />
                        <link rel="stylesheet" href="'.$library_directory.'/css/style.css" />
                        <link rel="stylesheet" href="'.$library_directory.'/css/style-desktop.css" />
		</noscript>
                <link rel="stylesheet" href="'.$library_directory.'/css/votingPage.css" />
                <link rel="stylesheet" href="'.$library_directory.'/sui/semantic.css" />
                <script src="'.$library_directory.'/sui/semantic.js"></script>
                <!--[if lte IE 8]><link rel="stylesheet" href="'.$library_directory.'/css/ie/v8.css" /><![endif]-->
        </head>
';
}
function print_header($app_directory){
echo '
    <div id="header-wrapper">
      <header id="header" >
        <!-- Logo -->
        <div id="logo">
          <a href="'.$app_directory.'/index.php"> <img class="header_logo" src="'.$app_directory.'/images/sparked_horizontal.png" /> </a>
        </div>
        <!-- Nav -->
        <nav id="nav">
          <ul>
            <li><a href="'.$app_directory.'/pages/vote.php?id=1">Vote</a></li>
            <li><a href="'.$app_directory.'/pages/submit.php">Submit</a>
            <li><a href="#">Sucess Stories</a></li>
            <li><a href="#">username</a></li>
          </ul>
        </nav>
      </header>
    </div>
';
}

?>
