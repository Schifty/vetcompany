<?php session_start();
//connect to the database// 
include "connect_db.php";
//connect to the functions// 
include "functions.php";?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VetCompany</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	<link rel="stylesheet" href="css/mystyle.css" />
	<link href="css/featherlight.css" type="text/css" rel="stylesheet" title="Featherlight Styles" />
	<!-- Add jQuery to your website if you don't have it already -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- JAVASCRIPT to clear search text when the field is clicked -->
	<script type="text/javascript">
	$(function() {
		$("#tfq2b").click(function() {
			if ($("#tfq2b").val() == "Search our website"){
				$("#tfq2b").val(""); 
			}
		});
	});
	</script>
  </head>
  <body>
  <?php
  //a submit button has been pressed//
		if(isset($_SESSION["username"])){
	
	show_site_search_form($con);
	
	}
	?>
	
	<nav>
		<div class="large-3 columns"><a href="index.php"><img class="hover" style="margin-left: 6px; margin-bottom: 6%;" alt="logo" src="img/sitelogo.png"></a></div>
		<div class="large-9 columns"><?php get_nav_li();?></div>
	</nav><!--ends nav-->
	<div class="row">
<div class="large-12 columns">