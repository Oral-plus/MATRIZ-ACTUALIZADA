<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
  <div class="conexion">
    <h1>&#128512;Ya terminaste tu registro&#128512;</h1>
  <?php
$inspector = $_POST['inspector'];
$area = $_POST['area'];
$cosa = $_POST['cosa'];
$opt = $_POST['opt'];
$fecha = $_POST['fecha'];
$inicio = $_POST['inicio'];
$codigor = $_POST['referencia_Codigo'];
$descripr = $_POST['descripr'];
$cantidadr = $_POST['cantidadr'];
$procesadas =$_POST['procesadas'];
$desviaciones =$_POST['desviaciones'];
$odservaciones = $_POST['odservaciones'];
$fechafin = $_POST['fechafin'];
$time=$_POST['time'];
$orden = $_POST['orden'];
$codigo = $_POST['codigo'];
$descrip = $_POST['descrip'];
$cantidad=$_POST['cantidad'];
$Lote = $_POST['Lote'];


$serverName ="EASYNEWS\SQLEXPRESS";
$connectionInfo = array( "Database"=>"calidad", "UID"=>"sa", "PWD"=>"Omega");
$conn =sqlsrv_connect($serverName, $connectionInfo);

//if(!$conn){
  // die("error al conectar".mysqli_connect_error());
 //}else{
   // echo "conexion";
 //}

$sql = "INSERT INTO matriiz (inspector,Area,Proceso,Subproces,Fecha_Actual,Hora_Inicio,Referencias,Descripcion,Cantidad_Llegada,Cantidades_procesadas,Unidades_no_conformes,Desviaciones,Observaciones,fecha_final,Hora_final,orden,codigo,descrip,cantidad,Lote) values ('$inspector','$area','$cosa','$opt','$fecha','$inicio','$codigor','$descripr','$cantidadr','$procesadas','$procesadas','$desviaciones','$odservaciones','$fechafin','$time','$orden','$codigo','$descrip','$cantidad','$Lote')";
?>
</div>
<?php
if(sqlsrv_query($conn,$sql)){
    echo "Registro exitoso";
}else{
    echo "comunicate con el administrador de la aplicacion ya que el registro no fue enviado";
}
?>
<style>
@keyframes fuego {
  0% { background-color: #fff; box-shadow: 0 0 5px #fff; }
  25% { background-color: #66a3ff; box-shadow: 0 0 20px #66a3ff; }
  50% { background-color: #3366ff; box-shadow: 0 0 40px #3366ff; }
  75% { background-color: #66a3ff; box-shadow: 0 0 20px #66a3ff; }
  100% { background-color: #fff; box-shadow: 0 0 5px #fff; }
}

.conexion {
  width: 100%;
  height: 100px;
  animation: fuego 3s infinite;
  margin-bottom: 20px;
}


</style>

</body>
</html>
<?php





/*
if(isset($_POST['btn1'])){
  $inspector = $_POST['inspector'];
  $area = $_POST['area'];
  $cosa = $_POST['cosa'];
  $opt = $_POST['opt'];
  $fecha = $_POST['fecha'];
  $inicio = $_POST['inicio'];
  $codigor = $_POST['referencia_Codigo'];
  $descripr = $_POST['descripr'];
  $cantidadr = $_POST['cantidadr'];
  $procesadas =$_POST['procesadas'];
  $desviaciones =$_POST['desviaciones'];
  $odservaciones = $_POST['odservaciones'];
  $fechafin = $_POST['fechafin'];
  $time=$_POST['time'];
  $orden = $_POST['orden'];
  $codigo = $_POST['codigo'];
  $descrip = $_POST['descrip'];
  $cantidad=$_POST['cantidad'];
  $Lote = $_POST['Lote'];
  
  
  echo $inspector."</br>";
  echo $area."</br>";
  echo $cosa."</br>";
  echo $opt."</br>";
  echo $fecha."</br>";
  echo $inicio."</br>";
  echo $codigor."</br>";
  echo $descripr."</br>";
  echo $cantidadr."</br>";
  echo $procesadas."</br>";
  echo $desviaciones."</br>";
  echo $odservaciones."</br>";
  echo $fechafin."</br>";
  echo $time."</br>";
  echo $orden."</br>";
  echo $codigo."</br>";
  echo $descrip."</br>";
  echo $cantidad."</br>";
  echo $Lote."</br>";
  }
  */
?>




