<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom2.css">
</head>
<body>
    <div class=contenedor>
    <form action="" method="post">
    <h1 class="titulo1">Escriba la orden:</h1>
    <br>
    <br>
				<input class="seleccion1" type="number" name="id2" id="id" placeholder="Escriba la orden">
                <br>
		<input type="submit" value="Consulta de datos" class="enviar1" name="btn2">
    </form>
    </div>
</body>
</html>
<?php

if(isset($_POST['btn2'])){
    $serverName ="EASYNEWS\SQLEXPRESS";
    $connectionInfo = array( "Database"=>"calidad", "UID"=>"sa", "PWD"=>"Omega");
    $conn =sqlsrv_connect($serverName, $connectionInfo);


    $id = $_POST ['id2'];
    $consulta= sqlsrv_query($conn,"SELECT * FROM matriiz WHERE orden = $id");
        ?>
        <table style="width:87%;

padding-left:20px;">
      <thead>

        <tr>
          <th style="">unidades procesadas</th>
          <th style="">fecha</th>
          <th style="">inspector</th>
          <th style="">unidades a procesar <br></th>
        </tr>

      </thead>
            <?php
            while($row=sqlsrv_fetch_array($consulta)){
            ?>
            <tr style="text-align: center;">
            <td ><?php echo   $row['Cantidades_procesadas']?></td>
            <td ><?php echo $row['Fecha_Actual']?></td>
            <td ><?php echo $row['Inspector']?></td>
            <td ><?php echo $row['rango']?></td>
           
            </tr>
            <?php
            }
        }else{
            echo "";
        }
            ?>

<?php

if(isset($_POST['btn2'])){
    $serverName ="MERCURY";
    $connectionInfo = array( "Database"=>"SKY_SAP", "UID"=>"sa", "PWD"=>"SAPB1Admin");
    $conn =sqlsrv_connect($serverName, $connectionInfo);


    $id = $_POST ['id2'];
    $consulta= sqlsrv_query($conn,"SELECT * FROM orden_de_produccion_matriz WHERE DocNum = $id");
        ?>
        <table style="width:87%;

padding-left:20px;">
      <thead>

        <tr>
            <br>
            <br>
            <br>
          <th style="">Cantidad planificada en SAP</th>
        </tr>

      </thead>
            <?php
            while($row=sqlsrv_fetch_array($consulta)){
            ?>
            <tr style="text-align: center;">
            <td ><?php echo   $row['Expr1']?></td>
           
           
            </tr>
            <?php
            }
        }else{
            echo "";
        }
            ?>






