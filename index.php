<?php 

// Incluir as configurações, ajudantes e classes

require 'config/config.php';
require 'helpers/database.php';
require 'helpers/helpers.php';
require 'models/AlienAbduction.php';
require 'models/DALAlienAbduction.php';

// Criar um	objeto da classe DAL

$dal = new DALAlienAbduction ( $con );

// Verificar qual arquivo (rota) deve ser usado	para tratar	a requisição

$rota = 'index';	// Rota padrão

if ( isset ( $_GET['rota'] ) ) {
	$rota = ( string ) $_GET['rota'];
}

// Incluir o arquivo que vai tratar	a requisição

if ( is_file ( "controllers/{$rota}.php" ) ) {
	require "controllers/{$rota}.php";
} else {
	echo 'Rota não encontrada';
}
