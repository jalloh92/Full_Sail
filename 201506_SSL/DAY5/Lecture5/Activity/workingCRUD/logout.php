<?php

//ini_set('session.gc_maxlifetime', 5 * 60);

session_start();

session_destroy();
header("Location: upload_form.php");

/*
 *	==================================
 *	PROJECT:	SSL - Day 5
 *	FILE:		FULL CRUD - Class Analysis (logout.php)
 *	AUTHOR: 	Fialishia O. (Updated 1506)
 *	==================================
 */
?>

