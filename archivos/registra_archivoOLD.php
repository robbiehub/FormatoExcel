<?php

function registra_arch() {
	if(!($link3=mysqli_connect("localhost","root",""))){
		echo "Error al conectarse a la base de datos.";
		exit();
	}
	if (!mysqli_select_db($link3,"automoviles")){
		echo "Error al seleccionar la base de datos.";
		exit();
	}

	require_once '../Classes/PHPExcel/IOFactory.php';
	$objPHPExcel = PHPExcel_IOFactory::load("datosPersona.xls");


  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
	$worksheetTitulo  = $worksheet->getTitle();
	$filas  = $worksheet->getHighestRow(); // e.g. 10
	$Columnas = $worksheet->getHighestColumn(); // e.g 'F'
	$ColumnIndex = PHPExcel_Cell::columnIndexFromString($Columnas);
	for ($fila = 2; $fila <= $filas; ++ $fila) {
		for ($col = 0;  $col <= $ColumnIndex; ++ $col) {
			$celda = $worksheet->getCellByColumnAndRow($col, $fila);
		
		$val = $celda->getValue();
		$arreglo[$col] = $val;
		}
		$id =   $arreglo[0];
		$nombre = 	$arreglo[1];
		$edad = 	$arreglo[2];
		$consulta = "insert into persona(id,nombre,edad) values('$id', '$nombre', '$edad')";
  	  	$sq = mysqli_query($link3,$consulta);

		if(mysqli_affected_rows($link3) == 0) {
			echo "ERROR AL INSERTAR REGISTRO";
		}
	}
  }
}
?>