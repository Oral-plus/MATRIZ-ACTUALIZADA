<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
    exit;
}

if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'error' => 'REGISTRO no proporcionado']);
    exit;
}

$id = $_POST['id'];
$inspector = $_POST['inspector'] ?? '';
$area = $_POST['area'] ?? '';
$proceso = $_POST['proceso'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$horainicio = $_POST['horainicio'] ?? '';
$orden = $_POST['orden'] ?? '';
$codigo = $_POST['codigo'] ?? '';
$articulo = $_POST['articulo'] ?? '';
$cantidad = $_POST['cantidad'] ?? '';
$procesadas = $_POST['procesadas'] ?? '';
$desviaciones = $_POST['desviaciones'] ?? '';
$observaciones = $_POST['observaciones'] ?? '';

$serverName = "HERCULES";
$connectionInfo = array("Database" => "calidad", "UID" => "sa", "PWD" => "Sky2022*!");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    echo json_encode(['success' => false, 'error' => 'Error de conexión: ' . print_r(sqlsrv_errors(), true)]);
    exit;
}

$sql = "UPDATE FORMULARIO SET 
        INSPECTOR = ?, 
        AREA = ?, 
        PROCESO = ?, 
        FECHA = ?, 
        HORAINICIO = ?, 
        ORDEN = ?, 
        CODIGO = ?, 
        ARTICULO = ?, 
        CANTIDAD_PLANIFICADA = ?, 
        PROCESADAS = ?, 
        DESVIACIONES = ?, 
        OBSERVACIONES = ?
        WHERE ID = ?";

$params = array(
    $inspector, 
    $area, 
    $proceso, 
    $fecha, 
    $horainicio, 
    $orden, 
    $codigo, 
    $articulo, 
    $cantidad, 
    $procesadas, 
    $desviaciones, 
    $observaciones, 
    $id
);

$stmt = sqlsrv_prepare($conn, $sql, $params);

if ($stmt && sqlsrv_execute($stmt)) {
    echo json_encode(['success' => true, 'message' => 'id ' . $id . ' actualizado exitosamente']);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al actualizar id ' . $id . ': ' . print_r(sqlsrv_errors(), true)]);
}

sqlsrv_close($conn);
?>
