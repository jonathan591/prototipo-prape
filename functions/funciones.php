<?php



// Formatear una fecha a microtime para añadir al evento, tipo 1401517498985.
function _formatear($fecha)
{
	return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}
 ?>

