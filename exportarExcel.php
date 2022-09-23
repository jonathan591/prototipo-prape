<?php
require_once ("conf/confconexion.php");
require 'excel/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;
$spreadsheet=new Spreadsheet();
$spreadsheet->getProperties()->setCreator("jonathan")->setTitle("5TDS");
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(11);
$spreadsheet->setActiveSheetIndex(0);
$hojactiva= $spreadsheet->getActiveSheet();
$hojactiva->setCellValue('A1', 'NOMBRES APELLIDOS')
            ->setCellValue('B1', 'TELEFONO')
            ->setCellValue('C1', 'CEDULA')
            ->setCellValue('D1', 'CORREO')
            ->setCellValue('E1', 'PERIODO')
            ->setCellValue('F1', 'JORNADA')
            ->setCellValue('G1', 'PARALELO')
            ->setCellValue('H1', 'CARRERA')
            ->setCellValue('I1', 'DIRECCION')
            ->setCellValue('J1', 'ESTADO');

$i = 2;
$sql = "select tb_estudiantes.nombres_apellidos,tb_estudiantes.telefono,tb_estudiantes.cedula,tb_estudiantes.correo,tb_cursos.descripcion as periodo,tb_jornadas.descripcion as jornada,tb_paralelos.descripcion as paralelo,
tb_carreras.descripcion as carrera,
tb_estudiantes.direccion,tb_estudiantes.estado
from tb_estudiantes ,tb_jornadas, tb_carreras,tb_cursos,tb_paralelos where  tb_estudiantes.id_jornadas = tb_jornadas.id_jornadas
and tb_estudiantes.id_carreras= tb_carreras.id_carreras and tb_estudiantes.id_cursos= tb_cursos.id_cursos and tb_estudiantes.id_paralelos= tb_paralelos.id_paralelos;";
$result = mysqli_query($objConexion, $sql);
while ($usuarioArray=mysqli_fetch_array($result)){
        //CAPTURAMOS VALORES DE LA CONSULTA
       
        $NombrePersona=$usuarioArray['nombres_apellidos'];
        $telefono=$usuarioArray['telefono'];
        $cedula=$usuarioArray['cedula'];
        $correos=$usuarioArray['correo'];
        
        $periododo=$usuarioArray['periodo'];
        $jornadad=$usuarioArray['jornada'];
         $paraleoo=$usuarioArray['paralelo'];
          $carreta=$usuarioArray['carrera'];
           $direcccion =$usuarioArray['direccion'];
        $idestado=$usuarioArray['estado'];
        
        if($idestado=='1'){
            $estado='ACTIVO';
        }elseif ($idestado=='0') {
            $estado='INACTIVO';
        } else {
            $estado='FINALIZO';
        }
            
       //ASIGNAMOS LOS DATOS A LA CELDA DE EXCEL             
 $spreadsheet->setActiveSheetIndex(0);
 $hojactiva->setCellValue("A$i", $NombrePersona)
            ->setCellValue("B$i", $telefono)
            ->setCellValue("C$i", $cedula)
            ->setCellValue("D$i", $correos)
            ->setCellValue("E$i", $periododo)
            ->setCellValue("F$i", $jornadad)
            ->setCellValue("G$i", $paraleoo)
            ->setCellValue("H$i", $carreta)
         ->setCellValue("I$i", $direcccion)
            ->setCellValue("J$i", $estado);    
            
$i++;
}
$hojactiva->getColumnDimension('A')->setAutoSize(true);
$hojactiva->getColumnDimension('B')->setAutoSize(true);
$hojactiva->getColumnDimension('C')->setAutoSize(true);
$hojactiva->getColumnDimension('D')->setAutoSize(true);
$hojactiva->getColumnDimension('E')->setAutoSize(true);
$hojactiva->getColumnDimension('F')->setAutoSize(true);
$hojactiva->getColumnDimension('G')->setAutoSize(true);
$hojactiva->getColumnDimension('H')->setAutoSize(true);
$hojactiva->getColumnDimension('I')->setAutoSize(true);
$hojactiva->getColumnDimension('J')->setAutoSize(true);


$hojactiva->setTitle('REPORTE DE ESTUDIANTES');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="estudiante.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// $writer= new Xlsx($spreadsheet);
// $writer->save("mi excel.xlsx");