<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Completado</title>
  <style>
    @keyframes fuego {
      0% { background-color: #fff; box-shadow: 0 0 5px #fff; }
      25% { background-color: #66a3ff; box-shadow: 0 0 20px #66a3ff; }
      50% { background-color: #3366ff; box-shadow: 0 0 40px #3366ff; }
      75% { background-color: #66a3ff; box-shadow: 0 0 20px #66a3ff; }
      100% { background-color: #fff; box-shadow: 0 0 5px #fff; }
    }

    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .conexion {
      width: 80%;
      max-width: 600px;
      padding: 40px;
      animation: fuego 3s infinite;
      margin-bottom: 20px;
      background: white;
      border-radius: 15px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .conexion h1 {
      color: #4a5568;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .resultado {
      background: #f7fafc;
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
    }

    .btn-admin {
      display: inline-block;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 15px 30px;
      text-decoration: none;
      border-radius: 8px;
      margin-top: 20px;
      font-weight: bold;
      transition: transform 0.3s ease;
    }

    .btn-admin:hover {
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="conexion">
    <h1>&#128512; Ya terminaste tu registro &#128512;</h1>
    
    <?php
    $INSPECTOR = $_POST['INSPECTOR'];
    $AREA = $_POST['AREA'];
    $COSA = $_POST['cosa'];
    $FECHA = $_POST['FECHA'];
    $HORAINICIO = $_POST['HORAINICIO'];
    $ORDEN = $_POST['ORDEN'];
    $CODIGO = $_POST['CODIGO'];
    $ARTICULO = $_POST['ARTICULO'];
    $CANTIDAD_PLANIFICADA= $_POST['CANTIDAD_PLANIFICADA'];
    $REVISION = $_POST['REVISION'];
    $PROCESADAS = $_POST['PROCESADAS'];
    $DESVIACIONES = $_POST['DESVIACIONES'];
    $OBSERVACIONES = $_POST['OBSERVACIONES'];
    $FECHAFIN = $_POST['FECHAFIN'];
    $HORAFIN = $_POST['HORAFIN'];
    $OPT = $_POST['opt'];
    $LOTE = $_POST['LOTE'];

    $serverName ="HERCULES";
    $connectionInfo = array( "Database"=>"calidad", "UID"=>"sa", "PWD"=>"Sky2022*!");
    $conn =sqlsrv_connect($serverName, $connectionInfo);

    $sql = "INSERT INTO FORMULARIO (INSPECTOR,AREA,PROCESO,FECHA,HORAINICIO,ORDEN,CODIGO,ARTICULO,CANTIDAD_PLANIFICADA,REVISION,PROCESADAS,DESVIACIONES,OBSERVACIONES,FECHAFIN,HORAFIN,SUBPROCESO,LOTE) values ('$INSPECTOR','$AREA','$COSA','$FECHA','$HORAINICIO','$ORDEN','$CODIGO','$ARTICULO','$CANTIDAD_PLANIFICADA','$REVISION','$PROCESADAS','$DESVIACIONES','$OBSERVACIONES','$FECHAFIN','$HORAFIN','$OPT','$LOTE')";
    
    if(sqlsrv_query($conn,$sql)){
        echo '<div class="resultado">';
        echo "<h2>✅ Registro exitoso</h2>";
        echo "<p>El formulario ha sido guardado correctamente en la base de datos.</p>";
        echo '</div>';
    }else{
        echo '<div class="resultado">';
        echo "<h2>❌ Error en la inserción</h2>";
        echo "<p>Error: " . print_r(sqlsrv_errors(), true) . "</p>";
        echo '</div>';
    }
    
    sqlsrv_close($conn);
    ?>
    
    <a href="admin.php" class="btn-admin">📊 Ir al Panel de Administración</a>
  </div>
</body>
</html>
