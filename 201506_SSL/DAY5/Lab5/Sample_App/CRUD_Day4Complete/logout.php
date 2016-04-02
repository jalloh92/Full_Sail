<?php

    //ini_set('session.gc_maxlifetime', 5 * 60);

	session_start();

	session_destroy();
	header("Location: upload_form.php");

?>
