<?php 
function getConnexion()
{
  $mysqli = new Mysqli('localhost', 'dwebmat', '1234', 'db_web_mat');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  return $mysqli;
}