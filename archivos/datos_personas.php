<?php

function genera_arch() {
	// Error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

	// Include PHPExcel
	include '../Classes/PHPExcel.php';

	// NUEVO OBJETO EXCEL PHP
	$objPHPExcel = new PHPExcel();

    //Hermosillo
		//	 PROPIEDADES DEL DOCUMENTO EXCEL
		$objPHPExcel->getProperties()->setCreator("")
			->setLastModifiedBy("")
			->setTitle("")
			->setSubject("")
			->setDescription("")
			->setKeywords("")
			->setCategory("");

/*******************************************************/
	if(!($link=mysqli_connect("localhost","root",""))){
    		echo "Error al conectarse a la base de datos.";
      		exit();
	}
	
	if (!mysqli_select_db($link, "automoviles")){
  		echo "Error al seleccionar la base de datos.";
     	exit();
	}

	$columna=0;
	$fila=1;
	$arreglo[0] = "Id";
	$arreglo[1] = "nombre";
	$arreglo[2] = "edad";
	

	for($i=0;$i<3;$i++) {
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValueByColumnAndRow($i,$fila,$arreglo[$i]);
	}
	$fila = 2;
	$sql=mysqli_query($link, "select id, nombre, edad from persona");

	if(mysqli_affected_rows($link)>0){
   		while($row=mysqli_fetch_assoc($sql)){
			$id=$row['id'];
			$nombre=$row['nombre'];
			$edad=$row['edad'];
			
    		$columna = 0;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValueByColumnAndRow($columna,$fila,$id);
     		$columna = 1;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValueByColumnAndRow($columna,$fila,$nombre);
     		$columna = 2;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValueByColumnAndRow($columna,$fila,$edad);
 			$fila=$fila+1;
		}
	}

	//Hermosillo
// NOMBRE DE WORKSHEET (HOJA DE CALCULO)
	$objPHPExcel->getActiveSheet()->setTitle('Persona');

// PRIMERA HOJA
	$objPHPExcel->setActiveSheetIndex(0);

// FORMATO Excel 2007
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

// GUARDANDO Excel
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save(str_replace('.php', '.xls', __FILE__));
}
?>