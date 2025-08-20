<!DOCTYPE html>
<html lang="en">
<html>
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style></style>
	<title>matriiz de calidad</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/custom.css">
	<script src="./js/custom.js"></script>
	
	</head>
	<body>
		<div class="titulo">
			<h1>matriiz de calidad <br> actualizada</h1>
		</div>
		<br>
		<br>
		<div class="contenedor_formulario">
		<form name="formulario1" action="./php/conexion.php" id="myForm" method="post" >
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
      <br>
      <br>
      <br>
      <br>
      <br>
			<label for="">INSPECTOR:</label>
			<select class="seleccion" name="INSPECTOR" id="" required style="margin-botton:100px;">
			<option value="seleccione el inspector">Seleccione el inspector</option>
			<option value="Veronica Alvarez">Veronica Alvarez</option>
			<option value="Yuliana Cardenas">Yuliana Cardenas</option>
			<option value="Sor Luna">Sor Luna</option>
			<option value="Tania Astudillo">Tania Astudillo</option>
			<option value="Eliana Beltran">Eliana Beltran</option>
			<option value="Melisa salcedo">Melisa salcedo</option>
      <option value="EVELYN TATIANA RAMIREZ RAMIREZ">EVELYN TATIANA RAMIREZ RAMIREZ</option>
			</select>


			<label for="">AREA:</label>
			<br>
			<select class="seleccion" name="AREA" id="" required>
			<option value="Seleccione el area">Seleccione el area</option>
			<option value="Recepcion / Cuarentena">Recepcion / Cuarentena</option>
			<option value="Dispositivos Medicos">Dispositivos Medicos</option>
			<option value="Cosmeticos">Cosmeticos</option>
			<option value="Oficina">Oficina</option>
			<option value="Kits">Kits</option>
			<option value="Inyeccion">Inyeccion</option>
			</select>

			<label for="">PROCESO:</label>
		    <br>
			<select class="seleccion" name="cosa" onchange="cambia()" required>
				<option value="">Seleccione el proceso
				<option value="Recepcion_muestreo_e_inspeccion">Recepción, muestreo e inspección
				<option value="Análisis">Análisis
				<option value="Dispensación">Dispensación
				<option value="Fabricación">Fabricación
				<option value="Envasado_Ensamble">Envasado - Ensamble
				<option value="Acondicionamiento_empaque">Acondicionamiento / empaque
				<option value="Reacondicionamiento">Reacondicionamiento
				<option value="Otros">Otros

			</select>


			<br>
			<label for="">SUBPROCESO:</label>
			<select class="seleccion" name="opt" required>
				<option value="-">-
			</select>

			<label for="fecha" >FECHA:</label>
            <input class="seleccion" type="date" id="fechaActual1" value="" name="FECHA" readonly >

            <label for="inicio">HORA DE INICIO:</label>
<input class="seleccion" type="time" id="timeInput1" name="HORAINICIO" value="INICIO">


<script>
  window.addEventListener('load', function() {
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var currentTime = hours + ':' + minutes;

    document.getElementById('timeInput1').value = currentTime;
  });

  document.getElementById('myForm').addEventListener('submit', function(event) {
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var currentTime = hours + ':' + minutes;

    document.getElementById('timeInput1').value = currentTime;
  });
</script>

				

			
<?php
if (isset($_POST['btn_consulta'])) {
    $serverName = "MERCURY"; //serverName\instanceName, portNumber (default is 1433)
    $connectionInfo = array("Database" => "SKY_SAP", "UID" => "sa", "PWD" => "SAPB1Admin");

    $conn = sqlsrv_connect($serverName, $connectionInfo);
    $orden_input = $_POST['orden_input'];
    $codigo_input = $_POST['codigo_input'];

    // Consulta basada en $orden_input
    $consultaOrden = sqlsrv_query($conn, "SELECT * FROM orden_de_produccion_matriz WHERE DocNum = '$orden_input'");
    $rowOrden = sqlsrv_fetch_array($consultaOrden);

    // Consulta basada en $codigo_input
    $consultaSAP = sqlsrv_query($conn, "SELECT * FROM vista_bodega_10_30 WHERE ItemCode = '$codigo_input'");
    $rowSAP = sqlsrv_fetch_array($consultaSAP);

    if ($rowOrden || $rowSAP) {
        // Datos de la orden de producción
?>
        <div class="nuevodiv">
            <br>
            <br>
            <label style="margin-top: 20px;" for="time" class="formulario__label">ORDEN:</label>
            <input type="text" class="seleccion" name="ORDEN" value="<?php echo $rowOrden['DocNum'] ?>" readonly>
            <label for="time" class="formulario__label">CODIGO SAP:</label>
            <input type="text" class="seleccion" name="CODIGO" value="<?php echo $rowOrden ? $rowOrden['ItemCode'] : $rowSAP['ItemCode']; ?>" readonly>
            <label for="time" class="formulario__label">DESCRIPCION DEL PRODUCTO:</label>
            <input type="text" class="seleccion" name="ARTICULO" value="<?php echo $rowOrden ? $rowOrden['ProdName'] : $rowSAP['ItemName']; ?>" readonly>
			 <label for="time"  class="formulario__label">CANTIDAD PLANIFICADO:</label>
            <input type="text" id="input1" class="seleccion" name="CANTIDAD_PLANIFICADA" value="<?php echo $rowOrden['Expr1'] ?>" oninput="actualizarInput2()" >
			<label for="time" class="formulario__label">CANTIDAD A INPECCIONAR:</label>
            <input type="text" class="seleccion" id="input2" name="REVISION" value="<?php echo obtenerCantidadInspeccion($rowOrden['Expr1']); ?>">
        </div>
<?php
    } else {
        // No se encontraron resultados para la consulta
?>
        <div class="nuevodiv">
            <br>
            <br>
            <p>No se encontraron resultados para la consulta ingresada.</p>
        </div>
<?php
    }
}

function obtenerCantidadInspeccion($cantidad)
{
    if ($cantidad >= 2 && $cantidad <= 8) {
        return '2';
    } else if ($cantidad >= 9 && $cantidad <= 15) {
        return '3';
    } else if ($cantidad >= 16 && $cantidad <= 25) {
        return '5';
    } else if ($cantidad >= 26 && $cantidad <= 50) {
        return '8';
    } else if ($cantidad >= 51 && $cantidad <= 90) {
        return '13';
    } else if ($cantidad >= 91 && $cantidad <= 150) {
        return '20';
    } else if ($cantidad >= 151 && $cantidad <= 280) {
        return '32';
    } else if ($cantidad >= 281 && $cantidad <= 500) {
        return '50';
    } else if ($cantidad >= 501 && $cantidad <= 1200) {
        return '80';
    } else if ($cantidad >= 1201 && $cantidad <= 3200) {
        return '125';
    } else if ($cantidad >= 3201 && $cantidad <= 10000) {
        return '200';
    } else if ($cantidad >= 10001 && $cantidad <= 35000) {
        return '315';
    } else if ($cantidad >= 35001 && $cantidad <= 150000) {
        return '500';
    } else if ($cantidad >= 150001 && $cantidad <= 500000) {
        return '800';
    } else if ($cantidad > 500000) {
        return '1200';
    } else {
        return '';
    }
}
?>

<label for="time" class="formulario__label">LOTE:</label>
            <input class="seleccion" type="text"  name="LOTE" id="lote" required>
			


			<h1 class="consulta">REVISION DE UNIDADES</h1>
			<br>
			<br>

			<label for="procesadas">UNIDADES PROCESADAS:</label>
            <input class="seleccion" type="number" name="PROCESADAS" required >

            <label for="desviaciones" class="formulario__label">UNIDADES NO CONFORMES:</label>
            <input class="seleccion" type="number" name="DESVIACIONES" required >

			
			<label for="odservaciones" class="formulario__label">OBSERVACIONES:</label>
            <input class="seleccion" type="text" name="OBSERVACIONES" id="odservaciones" required>


            <label for="fechafin" class="formulario__label">FECHA FINALIZACION:</label>
            <input class="seleccion" type="date" name="FECHAFIN" id="fechaActual2" required>


            <label for="time" class="formulario__label">HORA DE FINALIZACION:</label>
            <input class="seleccion" type="time" id="timeInput"  name="HORAFIN" value="FIN" >


			<script>
document.getElementById('myForm').addEventListener('submit', function() {
  var horaActual = new Date().toLocaleTimeString('en-US', {hour12: false});
  document.getElementById('timeInput').value = horaActual;
});
</script>


	




			
			
			<input type="submit" value="envio de datos" id="enviar" name="btn1">
			<a href="http://192.168.2.220/matriz_actualizada/php/archivo.php?"><input type="button" value="Consultar de unidades procesadas" id="enviar"></a>
			</div>
						
		</form>


		


		</div class="contenedor_formulario_2">

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .nuevo01 {
            text-align: left;
        }

        .input01 {
            width: 200px;
        }

        .botin {
            margin-top: 10px;
        }
    </style>
</head>
<body>
  <br>
    <div class="nuevo01">
        <center>
            <form method="post">
                <label style="padding-top: 10px;" for="orden_input"></label>
                <br>
                <input class="input01" type="text" name="orden_input" id="orden_input" placeholder="Escribe la orden">
                <br>
                <label for="codigo_input"></label>
                <br>
                <input class="input01" type="text" name="codigo_input" id="codigo_input" placeholder="Escribe el código SAP">
                <br>
                <center>
                <input style="  background-color: #a86a7b;" class="botin" type="submit" value="Consulta" name="btn_consulta">
                </center>
            </form>
        </center>
    </div>
</body>
</html>

		
		
		
		
		
		
		
		















		
		
		<script type="text/javascript">
			//1) Definir Las Variables Correspondintes
			var opt_Recepcion_muestreo_e_inspeccion = new Array ("-", "Ingreso, verificacion y registro de materiales","Muestreo e inspección de materiales","Muestreo e inspeccion de maquila","Muestreo de materias primas","Generacion de certificados","Limpieza y desinfección del área");
			var opt_Análisis = new Array ("-", "Analisis fisicoquimico de materia prima","Analisis fisicoquimico de producto","Analisis microbiologico de materia prima","Analisis microbiologico de producto","Análisis sensorial cosméticos","Generacion de certificados","Limpieza y desinfección del area","Muestreos microbiologicos (aso)");
			var opt_Dispensación = new Array ("-", "Despeje de linea y arranque de proceso","Dispensacion de materias primas","Dispensacion de materiales","Verificación de registros ");
			var opt_Fabricación = new Array ("-", "Despeje de linea y arranque de proceso","Inyeccion de materiales","Preparacion de cosmeticos","Preparacion de dispositivo medico ( revelador)","Devanado","Encerdado de cepillos","Entorchado (ortodoncia)","Pulido de cepillos","Pulido de mangos","Verificacion de registros ","Verificacion orden, limpieza y desinfección","Ensamble limpiadiente","Marcacion de cepillos","Ensamble cepillos ortodoncia");
			var opt_Envasado_Ensamble = new Array ("-", "Despeje de linea y arranque de proceso","Envasado de cosmeticos","Envasado de dispositivo medico ( revelador)","Ensamble bobinas - carretas","Verificación de registros","Ensamble sera brackets");
			var opt_Acondicionamiento_empaque = new Array ("-", "Despeje de linea y arranque de proceso","Codificacion (loteado)","Sellado dispositivos medicos","Armado de cajas, etiquetado e inserción cortador (sedas)","Etiquetado (calcas - bandas)","Troquelado","Armado de cajas y empaque de cremas y kits","Termoencogido","Empaque (bolsas,cajas, canastas)","Verificación de registros ","Inspeccion y liberación de producto terminado","Sellado kits (Bliste)","Armado de kit (estuches)");
			var opt_Reacondicionamiento = new Array ("-", "Despeje de linea y arranque de proceso","Reprocesos / averias","Verificacion de registros ","Inspección y liberación de producto terminado");
			var opt_Otros = new Array ("-", "Capacitacion","Reunion");
			// 2) crear una funcion que permita ejecutar el cambio dinamico
			
			function cambia(){
				var cosa;
				//Se toma el vamor de la "cosa seleccionada"
				cosa = document.formulario1.cosa[document.formulario1.cosa.selectedIndex].value;
				//se chequea si la "cosa" esta definida
				if(cosa!=0){
					//selecionamos las cosas Correctas
					mis_opts=eval("opt_" + cosa);
					//se calcula el numero de cosas
					num_opts=mis_opts.length;
					//marco el numero de opt en el select
					document.formulario1.opt.length = num_opts;
					//para cada opt del array, la pongo en el select
					for(i=0; i<num_opts; i++){
						document.formulario1.opt.options[i].value=mis_opts[i];
						document.formulario1.opt.options[i].text=mis_opts[i];
					}
					}else{
						//si no habia ninguna opt seleccionada, elimino las cosas del select
						document.formulario1.opt.length = 1;
						//ponemos un guion en la unica opt que he dejado
						document.formulario1.opt.options[0].value="-";
						document.formulario1.opt.options[0].text="-";
					}
					//hacer un reset de las opts
					document.formulario1.opt.options[0].selected = true;
					
				}
				window.onload = function() {
    var fecha = new Date(); // Fecha actual
    var mes = fecha.getMonth() + 1; // Obteniendo mes
    var dia = fecha.getDate(); // Obteniendo día
    var ano = fecha.getFullYear(); // Obteniendo año

    if (dia < 10) {
        dia = '0' + dia; // Agrega cero si es menor de 10
    }

    if (mes < 10) {
        mes = '0' + mes; // Agrega cero si es menor de 10
    }

    // Asignar fecha actual al primer input
    document.getElementById('fechaActual1').value = ano + '-' + mes + '-' + dia;

    // Asignar fecha actual al segundo input
    document.getElementById('fechaActual2').value = ano + '-' + mes + '-' + dia;
};
</script>

<script>
function actualizarInput2() {
  var input1 = document.getElementById('input1').value;
  var input2 = document.getElementById('input2');

  if (input1 >= 2 && input1<=8) {
    input2.value = '2';
  } else if (input1 >= 9 && input1<=15){
    input2.value = '3';
  }else if(input1 >= 16 && input1<=25){
    input2.value = '5';
  }else if(input1 >= 26 && input1<=50){
    input2.value = '8';
  }else if(input1 >= 51 && input1<=90){
    input2.value = '13';
  }else if(input1 >= 91 && input1<=150){
    input2.value = '20';
  }else if(input1 >= 151 && input1<=280){
    input2.value = '32';
  }else if(input1 >= 281 && input1<=500){
    input2.value = '50';
  }else if(input1 >= 501 && input1<=1200){
    input2.value = '80';
  }else if(input1 >= 1201 && input1<=3200){
    input2.value = '125';
  }else if(input1 >= 3201 && input1<=10000){
    input2.value = '200';
  }else if(input1 >= 10001 && input1<=35000){
    input2.value = '315';
  }else if(input1 >= 35001 && input1<=150000){
    input2.value = '500';
  }else if(input1 >= 150001 && input1<=500000){
    input2.value = '800';
  }else if(input1>500000){
    input2.value = '1200';
    }
}

</script>




	</body>
</html>