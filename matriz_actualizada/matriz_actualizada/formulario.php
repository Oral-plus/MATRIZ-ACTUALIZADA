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

		<div class="contenedor_formulario">
		<form name="formulario1" action="./php/conexion.php" id="myForm" method="post" >
			<br>
			<label for="">INSPECTOR:</label>
			<select class="seleccion" name="inspector" id="" required>
			<option value="seleccione el inspector">Seleccione el inspector</option>
			<option value="Yuliana Cardenas">Veronica Alvarez</option>
			<option value="Melisa Salsedo">Yuliana Cardenas</option>
			<option value="Sor Luna">Sor Luna</option>
			<option value="Evelin">Tania Astudillo</option>
			<option value="Veronica">Eliana Beltran</option>
			<option value="Melisa salcedo">Melisa salcedo</option>

			</select>


			<label for="">AREA:</label>
			<br>
			<select class="seleccion" name="area" id="" required>
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
				<option value="Recepción_muestreo_e_inspección">Recepción, muestreo e inspección
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
            <input class="seleccion" type="date" id="fechaActual1" value="" name="fecha" readonly >

			<label for="inicio" >HORA DE INICIO:</label>
            <input class="seleccion"  type="time" id="timeInput1" name="inicio" value="INICIO" readonly >
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

			<script>
window.onload = function() {
  var horaInicio = new Date().toLocaleTimeString('en-US', {hour12: false});
  document.getElementById('timeInput1').value = horaInicio;
};
</script>
				

			
		   <?php
if (isset($_POST['btn3'])) {
    $serverName = "MERCURY"; //serverName\instanceName, portNumber (default is 1433)
    $conne = array("Database" => "SKY_SAP", "UID" => "sa", "PWD" => "SAPB1Admin");

    $conn = sqlsrv_connect($serverName, $conne);
    $id2 = $_POST['referencias'];
    $consulta = sqlsrv_query($conn, "SELECT * FROM vista_bodega_10_30 WHERE ItemCode = $id2");
?>

    <?php
    $row = sqlsrv_fetch_array($consulta);
    if ($row) {
    ?> 
	<div clas="nuevodiv">
        <label for="time" class="formulario__label">CODIGO SAP:</label>
        <?php
        echo '<input type="text" class="seleccion" name="referencia_Codigo" value="' . $row['ItemCode'] . '" date="null">';
        ?>
        <label for="time" class="formulario__label">DESCRIPCION:</label>
        <?php
        echo '<input type="text" class="seleccion" name="descripr"  value="' . $row['ItemName'] . '">' ;
        ?>
        <label for="time" class="formulario__label">CANTIDAD:</label>
        <?php
        echo '<input type="text" class="seleccion" name="cantidadr" value="">';
        ?>
		</div>
    <?php
    } else {
        echo "No se encontraron resultados para la consulta" . "<br><br>";
    }
} else {
    echo "Consulta los datos" . "<br><br>";
}
?>



			<h1 class="consulta">REVISION DE UNIDADES</h1>
			<br>
			<br>

			<label for="procesadas">UNIDADES PROCESADAS:</label>
            <input class="seleccion" type="number" name="procesadas" required >

            <label for="desviaciones" class="formulario__label">UNIDADES NO CONFORMES:</label>
            <input class="seleccion" type="number" name="desviaciones" required >

			
			<label for="odservaciones" class="formulario__label">OBSERVACIONES:</label>
            <input class="seleccion" type="text" name="odservaciones" id="odservaciones" required>


            <label for="fechafin" class="formulario__label">FECHA FINALIZACION:</label>
            <input class="seleccion" type="date" name="fechafin" id="fechaActual2" required>


            <label for="time" class="formulario__label">HORA DE FINALIZACION:</label>
            <input class="seleccion" type="time" id="timeInput"  name="time" value="FIN" >

			<script>
document.getElementById('myForm').addEventListener('submit', function() {
  var horaActual = new Date().toLocaleTimeString('en-US', {hour12: false});
  document.getElementById('timeInput').value = horaActual;
});
</script>


		<a href="http://192.168.2.220/matriz_actualizada/php/archivo.php?"><input type="button" value="Consultar de unidades procesadas" id="enviar"></a>
	
			<h1 class="consulta">CONSULTA DE DATOS</h1>
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
			<br>
			<br>
			<br>
			<div class="otra" >
			<?php
if (isset($_POST['btn2'])) {
    $serverName = "MERCURY"; //serverName\instanceName, portNumber (default is 1433)
    $connectionInfo = array("Database" => "SKY_SAP", "UID" => "sa", "PWD" => "SAPB1Admin");

    $conn = sqlsrv_connect($serverName, $connectionInfo);
    $id = $_POST['id'];
    $consulta = sqlsrv_query($conn, "SELECT * FROM orden_de_produccion_matriz WHERE DocNum = $id");

    $row = sqlsrv_fetch_array($consulta);
    if ($row) {
?>
        <label for="time" class="formulario__label">ORDEN:</label>
        <input type="text" class="seleccion" name="orden" value="<?php echo $row['DocNum']; ?>" readonly>
        <label for="time" class="formulario__label">CODIGO SAP:</label>
        <input type="text" class="seleccion" name="codigo" value="<?php echo $row['ItemCode']; ?>" readonly>
        <label for="time" class="formulario__label">DESCRIPCION DEL PRODUCTO:</label>
        <input type="text" class="seleccion" name="descrip" value="<?php echo $row['ProdName']; ?>" readonly>
        <label for="time" class="formulario__label">CANTIDAD PLANIFICADA:</label>
        <input type="text" class="seleccion" name="cantidad" value="<?php echo $row['Expr1']; ?>" readonly>
<?php
    } else {
        echo "No se encontraron resultados para la consulta" . "<br><br>";
    }
} else {
    echo "Consulta los datos" . "<br><br>";
}
?>

			<label for="time" class="formulario__label">LOTE:</label>
            <input class="seleccion" type="text"  name="Lote" id="lote" required>
			

			
			<input type="submit" value="envio de datos" id="enviar" name="btn1">
			</div>
						
		</form>


		


		</div class="contenedor_formulario_2">

        <div id="formulario">
			<center>
		<form   method="post" style="">
			    <label for=""></label>
				<input class="input01" type="text" name="id" id="id" placeholder="Escribe la orden" >
		
		        <input class="botin"   type="submit" value="Consulta "  name="btn2">
		</form>
		</center>
		</div>

		<div id="prueba">
			<center>
		<form   method="post" style="">
			    <label for=""></label>
				<input class="input01" type="text" name="referencias" id="id" placeholder="Escribe el codigo Sap" >
		
		        <input  class="botin"  type="submit" value="Consulta "  name="btn3">
		</form>
		</center>
		<div>

		
		
		
		
		
		
		
		















		
		
		<script type="text/javascript">
			//1) Definir Las Variables Correspondintes
			var opt_Recepción_muestreo_e_inspección = new Array ("-", "Ingreso, verificación y registro de materiales","Muestreo e inspección de materiales","Muestreo e inspección de maquila","Muestreo de materias primas","Generacion de certificados","Limpieza y desinfección del área");
			var opt_Análisis = new Array ("-", "Analisis fisicoquimico de materia prima","Analisis fisicoquimico de producto","Análisis microbiológico de materia prima","Analisis microbiologico de producto","Análisis sensorial cosméticos","Generacion de certificados","Limpieza y desinfección del área","Muestreos microbiologicos (aso)");
			var opt_Dispensación = new Array ("-", "Despeje de linea y arranque de proceso","Dispensacion de materias primas","Dispensacion de materiales","Verificación de registros ");
			var opt_Fabricación = new Array ("-", "Despeje de linea y arranque de proceso","Inyección de materiales","Preparación de cosmeticos","Preparación de dispositivo medico ( revelador)","Devanado","Encerdado de cepillos","Entorchado (ortodoncia)","Pulido de cepillos","Pulido de mangos","Verificación de registros ","Verificacion orden, limpieza y desinfección");
			var opt_Envasado_Ensamble = new Array ("-", "Despeje de linea y arranque de proceso","Envasado de cosmeticos","Envasado de dispositivo medico ( revelador)","Ensamble bobinas - carretas","ensamble de kits (estuches)","Ensamble cepillos ortodoncia","Verificación de registros");
			var opt_Acondicionamiento_empaque = new Array ("-", "Despeje de linea y arranque de proceso","Marcacion de cepillos","Codificacion (loteado)","Sellado dispositivos médicos","Armado de cajas, etiquetado e inserción cortador (sedas)","Etiquetado (calcas - bandas)","Troquelado","Armado de cajas y empaque de cremas y kits","Termoencogido","Empaque (bolsas,cajas, canastas)","Verificación de registros ","Inspección y liberación de producto terminado");
			var opt_Reacondicionamiento = new Array ("-", "Despeje de linea y arranque de proceso","Reprocesos / averias","Verificación de registros ","Inspección y liberación de producto terminado");
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

	</body>

</html>