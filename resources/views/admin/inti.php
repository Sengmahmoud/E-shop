<?php

//make routes
$tp="includes/templates/";
$css="designe/css";
//$js="designe/js";
$lang="includes/languages/";
$func="includes/functions/";//function directory
//include the important files
$mylg="en";
include $func ."functions.php";
include  $lang .$mylg.".php"; //language file must be is defined before header
include $tp . 'header.php';
 
if(!isset($nonavbar)){include $tp. 'navbar.php';} //include navbar in all inti.php files except files with navbar variable 
$edit=lang("edit");
$add=lang("add");
$delete=lang("delete");
$approve=lang("approve");
$activate=lang("activate");
$refresh=lang("refresh");
$cancel=lang("cancel");
//checkOfferInterval();
?>