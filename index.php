<?php
include('config.php');
require('pizzariaController.php');
require('pizzariaModel.php');

	

	$pizzariaController = new pizzariaController();

	$pizzariaController->index();

?>