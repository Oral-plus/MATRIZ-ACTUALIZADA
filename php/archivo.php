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
    $serverName ="HERCULES";
    $connectionInfo = array( "Database"=>"calidad", "UID"=>"sa", "PWD"=>"Sky2022*!");
    $conn =sqlsrv_connect($serverName, $connectionInfo);


    $id = $_POST ['id2'];
    $consulta= sqlsrv_query($conn,"SELECT * FROM FORMULARIO WHERE ORDEN = $id");
        ?>
        <table style="width:87%;

padding-left:20px;">
      <thead>
        <tr>
          <th style="">unidades procesadas</th>
          <th style="">fecha</th>
          <th style="">inspector</th>
       
        </tr>

      </thead>
            <?php
            while($row=sqlsrv_fetch_array($consulta)){
            ?>
            <tr style="text-align: center;">
            <td ><?php echo   $row['PROCESADAS']?></td>
            <td ><?php echo $row['FECHA']?></td>
            <td ><?php echo $row['INSPECTOR']?></td>
            
           
            </tr>
            <?php
            }
        }else{
            echo "";
        }
            ?>

<?php

if(isset($_POST['btn2'])){
    $serverName ="HERCULES";
    $connectionInfo = array( "Database"=>"SKY_SAP", "UID"=>"sa", "PWD"=>"Sky2022*!");
    $conn =sqlsrv_connect($serverName, $connectionInfo);


    $id = $_POST ['id2'];
    $consulta= sqlsrv_query($conn,"SELECT * FROM orden_de_produccion_matriz WHERE DocNum = $id");
        ?>
        <table style="width:100%;

padding-left:20px;">
      <thead>
<center>
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
            <td ><?php echo $prueba2=  $row['Expr1']?></td>
           
           
            </tr>
            <?php
            }
        }else{
            echo "";
        }
            ?>

</center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/custom2.css">
</head>
<body>
    <br>
    <center>
    <label class="bajate" for="">Cantidad de unidades a procesar:</label>
    <p class="PRUEBA"><?php
    if(isset($_POST['btn2'])){
        if($prueba2 >=2 && $prueba2 <=8){
            echo $subvalor = "2";
        }else if($prueba2 >=9 && $prueba2 <=15){
            echo $subvalor = "3";
        }else if($prueba2 >=16 && $prueba2 <=25){
            echo $subvalor = "5";
        }else if($prueba2 >=26 && $prueba2 <=50){
            echo $subvalor = "8";
        }else if($prueba2 >=51 && $prueba2 <=90){
            echo $subvalor = "13";
        }else if($prueba2 >=91 && $prueba2 <=150){
            echo $subvalor = "20";
        }else if($prueba2 >=151 && $prueba2 <=280){
            echo $subvalor = "32";
        }else if($prueba2 >=281 && $prueba2 <=500){
            echo $subvalor = "50";
        }else if($prueba2 >=501 && $prueba2 <=1200){
            echo $subvalor = "80";
        }else if($prueba2 >=1201 && $prueba2 <=3200){
            echo $subvalor = "125";
        }else if($prueba2 >=3201 && $prueba2 <=10000){
            echo $subvalor = "200";
        }else if($prueba2 >=10001 && $prueba2 <=35000){
            echo $subvalor = "315";
        }else if($prueba2 >=35001 && $prueba2 <=150000){
            echo $subvalor = "500";
        }else if($prueba2 >=150001 && $prueba2 <=500000){
            echo $subvalor = "800";
        }else if($prueba2 > 500000){
            echo $subvalor = "1200";
        }
        
    }

?>
</center>
</body>
</html>



