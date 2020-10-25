<?php
/**
* Control_Medico
* @author julio_jimenez
**/

if(count($_POST)>0){
	$user = new CategoryData();
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=categories';</script>";


}


?>