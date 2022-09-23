<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../conf/confconexion.php';
$sql="SELECT * FROM tb_asignacion"; 

// Verificamos si existe un dato
if ($objConexion->query($sql)->num_rows)
{ 

    // creamos un array
    $datos = array(); 

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0; 

    // Ejecutamos nuestra sentencia sql
    $e = $objConexion->query($sql); 

    while($row=$e->fetch_array()) // realizamos un ciclo while para traer los agenda encontrados en la base de dato
    {
        // Alimentamos el array con los datos de los agenda
        $datos[$i] = $row['lugar_asignacion']; 
        $datos[$i] = $row;
        $i++;
    }

    // Transformamos los datos encontrado en la BD al formato JSON
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );

    }
    else
    {
        // Si no existen agenda mostramos este mensaje.
        echo "No hay datos"; 
    }


?>

