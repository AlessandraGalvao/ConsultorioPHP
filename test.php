<?php

include "Modelo/paciente.php";

$id = 543;
$nom = 'Fulanito';
$ape='Presente';
$fec='15-12-2016';
$sex='M';

$paciente = new Paciente($id,$nom,$ape,$fec,$sex);
$paciente->insertarPaciente();

echo "<p>fin de la prueba</p>";
?> 
