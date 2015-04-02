<?php
include "import_csv.php";
include "resetdb.php";

if(isset($_POST['submit'])) {
	reset_db();
	$ideas_csv = $_POST["csv_file"];
	add_ideas_from_csv_full_mock($ideas_csv);

        session_start();
        $_SESSION["POST"] = "Repopulated DB!";
        header("Location: admin_page.php");
        exit();

}


?>
