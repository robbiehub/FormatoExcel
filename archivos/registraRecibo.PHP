<?php

function registra_arch() {
	if(!($link3=mysqli_connect("localhost","root",""))){
		echo "Error al conectarse a la base de datos.";
		exit();
	}
	if (!mysqli_select_db($link3,"final")){
		echo "Error al seleccionar la base de datos.";
		exit();
	}

	require_once '../Classes/PHPExcel/IOFactory.php';
	$objPHPExcel = PHPExcel_IOFactory::load("SIIA.xlsx");
    
    //foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $worksheet = $objPHPExcel->getSheetByName('recibo (tipo 5)');
        #$worksheetTitulo  = $worksheet->getTitle();
        $rec_ord = $worksheet->getCellByColumnAndRow(2,2)->getValue();
        //$est_act = $worksheet->getCellByColumnAndRow(4,1)->getValue();
        $est_act = substr($worksheet->getCellByColumnAndRow(0,4)->getValue(), strpos($worksheet->getCellByColumnAndRow(0,4)->getValue(), ":") + 1);
        $lug_fec = $worksheet->getCellByColumnAndRow(1,4)->getValue();
        $depe = substr($worksheet->getCellByColumnAndRow(0,6)->getValue(), strpos($worksheet->getCellByColumnAndRow(0,6)->getValue(),":")+1);
        $cant = substr($worksheet->getCellByColumnAndRow(0,13)->getValue(), strpos($worksheet->getCellByColumnAndRow(0,13)->getValue(),"$")+1);
        $concepto = substr($worksheet->getCellByColumnAndRow(0,16)->getValue(), strpos($worksheet->getCellByColumnAndRow(0,16)->getValue(),":")+1);
        $solicitante = substr($worksheet->getCellByColumnAndRow(0,18)->getValue(), strpos($worksheet->getCellByColumnAndRow(0,18)->getValue(),":")+1);
        $cta_gastos = $worksheet->getCellByColumnAndRow(21,1)->getValue();
        $cta_ingresos = $worksheet->getCellByColumnAndRow(21,2)->getValue();
        $tramite = substr($worksheet->getCellByColumnAndRow(0,26)->getValue(), strpos($worksheet->getCellByColumnAndRow(0,26)->getValue(),"l")+1);
        $consulta = "insert into recibos(ReciboOrdinario, EstadoActual, LugarFecha, Dependencia, CantidadRecibida, Concepto, Solicitante,                       TramiteGenerado) 
        values('$rec_ord','$est_act','$lug_fec','$depe','$cant','$concepto','$solicitante','$tramite')";
        $sq = mysqli_query($link3, $consulta);
        if(mysqli_affected_rows($link3) == 0) {
			echo "ERROR AL INSERTAR REGISTRO";
		}
        
        $filas  = $worksheet->getHighestRow(); // e.g. 10
        $Columnas = $worksheet->getHighestColumn(); // e.g 'F'
        $ColumnIndex = PHPExcel_Cell::columnIndexFromString($Columnas);
        $f1 = 0;
        $f2 = 0;
        $f3 = 0;
        
        for ($fila = 2; $fila <= $filas; ++ $fila) {
            if($worksheet->getCellByColumnAndRow(0, $fila)->getValue() == '[Documentos comprobatorios]')
                $f1 = $fila;
            if($worksheet->getCellByColumnAndRow(0, $fila)->getValue() == '[Flujo del trámite]')
                $f2 = $fila;
            if($worksheet->getCellByColumnAndRow(0, $fila)->getValue() == '______________________________________'){
                $f3 = $fila;
                continue;
            }
        }
        
        for($fila = $f1+2; $fila < ($f2-3); ++ $fila){
            for($col = 0; $col < 9; ++ $col){
                $celda = $worksheet->getCellByColumnAndRow($col, $fila);
                $arreglo[$col] = $celda->getValue();
            }
            $folio = $arreglo[0];
            $serie = $arreglo[1];
            $fecha = $arreglo[2];
            $emisor = $arreglo[3];
            $desc = $arreglo[4];
            $importe = $arreglo[5];
            $moneda = $arreglo[6];
            $tc = $arreglo[7];
            $total = $arreglo[8];
            $query = "insert into documentos_comprobatorios(Folio,Serie,Fecha,Emisor,Descripcion,Importe,Moneda,TC,Total) 
            values('$folio','$serie','$fecha','$emisor','$desc','$importe','$moneda','$tc','$total')";
            $sq = mysqli_query($link3, $query);
            if(mysqli_affected_rows($link3) == 0) {
			echo "ERROR AL INSERTAR REGISTRO";
		    }
        }
        
        for($fila = $f2+2; $fila < ($f3-3); ++ $fila){
            for($col = 0; $col < 5; ++ $col){
                $celda = $worksheet->getCellByColumnAndRow($col, $fila);
                $arreglo[$col] = $celda->getValue();
            }
            $etapa = $arreglo[0];
            $nombre = $arreglo[1];
            $responsable = $arreglo[2];
            $fecha = $arreglo[3];
            $hora = $arreglo[4];
            $query = "insert into flujo_tramite(NumEtapa, Nombre_Etapa, Responsable, Fecha, Hora) 
            values('$etapa', '$nombre', '$responsable', '$fecha', '$hora')";
            $sq = mysqli_query($link3, $query);
            if(mysqli_affected_rows($link3) == 0) {
			echo "ERROR AL INSERTAR REGISTRO";
		    }
        }
      
/*	$worksheetTitulo  = $worksheet->getTitle();
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
	}*/
  //}
}
?>