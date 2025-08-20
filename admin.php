<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Empresarial - Editor de Registros</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary-color: #64748b;
            --success-color: #059669;
            --warning-color: #d97706;
            --error-color: #dc2626;
            --background-color: #f8fafc;
            --surface-color: #ffffff;
            --border-color: #e2e8f0;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header Empresarial */
        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: var(--shadow-lg);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.75rem;
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .company-info h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .company-info p {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .header-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }

        /* Container Principal */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Tabs Empresariales */
        .tabs {
            display: flex;
            background: var(--surface-color);
            border-radius: 12px 12px 0 0;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .tab {
            flex: 1;
            padding: 1rem 1.5rem;
            background: var(--surface-color);
            color: var(--text-secondary);
            text-align: center;
            cursor: pointer;
            border: none;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
        }

        .tab:hover {
            background: #f1f5f9;
            color: var(--primary-color);
        }

        .tab.active {
            background: var(--primary-color);
            color: white;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-dark);
        }

        /* Content Areas */
        .tab-content {
            display: none;
            background: var(--surface-color);
            padding: 2rem;
            border-radius: 0 0 12px 12px;
            box-shadow: var(--shadow-md);
        }

        .tab-content.active {
            display: block;
        }

        /* Cards y Secciones */
        .card {
            background: var(--surface-color);
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .card-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .card-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-content {
            padding: 2rem;
        }

        /* Filtros Mejorados */
        .filter-container {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .filter-instructions {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--primary-color);
        }

        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-buttons {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            grid-column: 1 / -1;
            justify-content: center;
            margin-top: 1rem;
        }

        /* Form Elements */
        label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: var(--surface-color);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Select personalizado */
        select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        /* Buttons */
        .btn {
            background: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-secondary {
            background: var(--secondary-color);
        }

        .btn-secondary:hover {
            background: #475569;
        }

        .btn-success {
            background: var(--success-color);
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        .btn-success:hover {
            background: #047857;
        }

        /* MEJORAS PARA LA TABLA - SCROLL HORIZONTAL MEJORADO */
        .table-wrapper {
            position: relative;
            margin-top: 1.5rem;
        }

        .table-container {
            overflow-x: auto;
            overflow-y: visible;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            max-height: 70vh;
            position: relative;
        }

        /* Scroll horizontal siempre visible */
        .table-container::-webkit-scrollbar {
            height: 12px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 6px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 6px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* BOTONES DE NAVEGACIÓN CORREGIDOS */
        .scroll-indicator {
            position: absolute;
            top: 20%;
            transform: translateY(-50%);
            background: var(--primary-color);
            color: white;
            padding: 0.75rem;
            border-radius: 50%;
            box-shadow: var(--shadow-md);
            cursor: pointer;
            z-index: 20;
            transition: all 0.3s ease;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-indicator:hover {
            background: var(--primary-dark);
            transform: translateY(-50%) scale(1.1);
        }

        .scroll-left {
            left: 15px;
        }

        .scroll-right {
            right: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1600px;
            background: var(--surface-color);
        }

        th {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 1rem 0.75rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border-color);
            position: sticky;
            top: 0;
            font-size: 0.875rem;
            z-index: 5;
        }

        /* Columna ID fija */
        th:first-child,
        td:first-child {
            position: sticky;
            left: 0;
            background: var(--surface-color);
            z-index: 6;
            box-shadow: 2px 0 4px rgba(0,0,0,0.1);
        }

        th:first-child {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            z-index: 7;
        }

        td {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: top;
        }

        tr:hover {
            background: #f8fafc;
        }

        tr:hover td:first-child {
            background: #f8fafc;
        }

        /* Editable Inputs */
        .editable-input, .editable-textarea {
            width: 100%;
            border: 1px solid transparent;
            background: transparent;
            padding: 0.5rem;
            font-size: 0.875rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            min-width: 120px;
        }

        .editable-input:focus, .editable-textarea:focus {
            background: #fefce8;
            border-color: var(--warning-color);
            box-shadow: 0 0 0 2px rgba(217, 119, 6, 0.1);
            outline: none;
        }

        .editable-textarea {
            resize: vertical;
            min-height: 60px;
            min-width: 200px;
        }

        /* Messages */
        .message {
            padding: 1rem 1.5rem;
            margin: 1.5rem 0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
        }

        .success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #10b981;
        }

        .error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 1px solid #ef4444;
        }

        .info {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #3b82f6;
        }

        .results-info {
            background: linear-gradient(135deg, #e0f2fe 0%, #b3e5fc 100%);
            color: #0c4a6e;
            border: 1px solid #0ea5e9;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            margin: 1.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .no-results {
            text-align: center;
            padding: 3rem;
            color: var(--text-secondary);
        }

        .no-results i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        /* Modified Indicator */
        .modified {
            background: linear-gradient(135deg, #fefce8 0%, #fef3c7 100%) !important;
            border-left: 4px solid var(--warning-color) !important;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: linear-gradient(135deg, var(--surface-color) 0%, #f8fafc 100%);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            text-align: center;
        }

        .stat-icon {
            background: var(--primary-color);
            color: white;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.25rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Navegación de tabla mejorada */
        .table-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: #f8fafc;
            border-top: 1px solid var(--border-color);
            border-radius: 0 0 12px 12px;
        }

        .table-info {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .scroll-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .scroll-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .scroll-btn:hover {
            background: var(--primary-dark);
        }

        .scroll-btn:disabled {
            background: var(--secondary-color);
            cursor: not-allowed;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .container {
                padding: 1rem;
            }

            .filter-row {
                grid-template-columns: 1fr;
            }

            .filter-buttons {
                justify-content: center;
            }

            .card-content {
                padding: 1rem;
            }

            .tabs {
                flex-direction: column;
            }

            .scroll-indicator {
                display: none;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .spinner {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header Empresarial -->
    <div class="header">
        <div class="header-content">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-building fa-lg"></i>
                </div>
                <div class="company-info">
                    <h1>Sistema de Gestión Empresarial</h1>
                    <p>Control y seguimiento de registros de calidad</p>
                </div>
            </div>
            <div class="header-badge">
                <i class="fas fa-shield-alt"></i> Versión 2.0
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="stat-value">1,247</div>
                <div class="stat-label">Total Registros</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-value">98.5%</div>
                <div class="stat-label">Eficiencia</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value">24</div>
                <div class="stat-label">Inspectores Activos</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-value">156</div>
                <div class="stat-label">Registros Hoy</div>
            </div>
        </div>
        
        <div class="tabs">
            <button class="tab active" onclick="openTab(event, 'view-tab')">
                <i class="fas fa-table"></i>
                Ver/Editar Registros
            </button>
        </div>

        <!-- Pestaña Ver/Editar Registros -->
        <div id="view-tab" class="tab-content active">
            <!-- Filtros -->
            <div class="card filter-container">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-filter"></i>
                        Filtros de Búsqueda Avanzada
                    </h3>
                </div>
                <div class="card-content">
                    <div class="filter-instructions">
                        <i class="fas fa-info-circle"></i>
                        <strong>Instrucciones:</strong> Utiliza los filtros para buscar registros específicos. Los campos se pueden editar directamente en la tabla de resultados.
                    </div>
                    <form method="GET" id="filterForm">
                        <div class="filter-row">
                            <div class="filter-group">
                                <label for="filter_inspector">
                                    <i class="fas fa-user-tie"></i>
                                    Inspector
                                </label>
                                <select id="filter_inspector" name="filter_inspector">
                                    <option value="">-- Seleccionar Inspector --</option>
                                    <?php
                                    // Obtener lista de inspectores únicos
                                    $serverName = "HERCULES";
                                    $connectionInfo = array("Database" => "calidad", "UID" => "sa", "PWD" => "Sky2022*!");
                                    $conn = sqlsrv_connect($serverName, $connectionInfo);
                                    
                                    if ($conn) {
                                        $sql_inspectores = "SELECT DISTINCT INSPECTOR FROM FORMULARIO WHERE INSPECTOR IS NOT NULL AND INSPECTOR != '' ORDER BY INSPECTOR";
                                        $stmt_inspectores = sqlsrv_query($conn, $sql_inspectores);
                                        
                                        if ($stmt_inspectores) {
                                            while ($inspector = sqlsrv_fetch_array($stmt_inspectores, SQLSRV_FETCH_ASSOC)) {
                                                $selected = (isset($_GET['filter_inspector']) && $_GET['filter_inspector'] == $inspector['INSPECTOR']) ? 'selected' : '';
                                                echo "<option value='" . htmlspecialchars($inspector['INSPECTOR']) . "' $selected>" . htmlspecialchars($inspector['INSPECTOR']) . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="filter-group">
                                <label for="filter_area">
                                    <i class="fas fa-industry"></i>
                                    Área de Producción
                                </label>
                                <input type="text" id="filter_area" name="filter_area" 
                                       value="<?php echo htmlspecialchars($_GET['filter_area'] ?? ''); ?>" 
                                       placeholder="Ej: Producción A, Control Calidad...">
                            </div>
                            
                            <div class="filter-group">
                                <label for="filter_codigo">
                                    <i class="fas fa-barcode"></i>
                                    Código de Producto
                                </label>
                                <input type="text" id="filter_codigo" name="filter_codigo" 
                                       value="<?php echo htmlspecialchars($_GET['filter_codigo'] ?? ''); ?>" 
                                       placeholder="Ej: PRD-001, ART-123...">
                            </div>
                            
                            <div class="filter-group">
                                <label for="filter_fecha">
                                    <i class="fas fa-calendar-alt"></i>
                                    Fecha de Registro
                                </label>
                                <input type="date" id="filter_fecha" name="filter_fecha" 
                                       value="<?php echo htmlspecialchars($_GET['filter_fecha'] ?? ''); ?>">
                            </div>
                            
                            <div class="filter-buttons">
                                <button type="submit" class="btn">
                                    <i class="fas fa-search"></i>
                                    Consultar Registros
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="clearFilters()">
                                    <i class="fas fa-eraser"></i>
                                    Limpiar Filtros
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            // Mostrar mensaje de actualización si existe
            if (isset($_GET['updated']) && $_GET['updated'] == 'success') {
                echo "<div class='message success'><i class='fas fa-check-circle'></i> Registro actualizado exitosamente.</div>";
            } elseif (isset($_GET['updated']) && $_GET['updated'] == 'error') {
                echo "<div class='message error'><i class='fas fa-exclamation-circle'></i> Error al actualizar el registro.</div>";
            }

            // Solo mostrar registros si hay filtros aplicados
            $hasFilters = !empty($_GET['filter_inspector']) || !empty($_GET['filter_area']) || !empty($_GET['filter_codigo']) || !empty($_GET['filter_fecha']);

            if ($conn && $hasFilters) {
                // Construir la consulta SQL con filtros
                $sql = "SELECT * FROM FORMULARIO WHERE 1=1";
                $params = array();
                
                // Filtro por inspector
                if (!empty($_GET['filter_inspector'])) {
                    $sql .= " AND INSPECTOR = ?";
                    $params[] = $_GET['filter_inspector'];
                }
                
                // Filtro por área
                if (!empty($_GET['filter_area'])) {
                    $sql .= " AND AREA LIKE ?";
                    $params[] = '%' . $_GET['filter_area'] . '%';
                }
                
                // Filtro por código
                if (!empty($_GET['filter_codigo'])) {
                    $sql .= " AND CODIGO LIKE ?";
                    $params[] = '%' . $_GET['filter_codigo'] . '%';
                }
                
                // Filtro por fecha
                if (!empty($_GET['filter_fecha'])) {
                    $sql .= " AND CAST(FECHA AS DATE) = ?";
                    $params[] = $_GET['filter_fecha'];
                }
                
                $sql .= " ORDER BY FECHA DESC";
                
                $stmt = sqlsrv_query($conn, $sql, $params);
                
                if ($stmt) {
                    // Contar resultados
                    $count = 0;
                    $results = array();
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        $results[] = $row;
                        $count++;
                    }
                    
                    // Mostrar información de resultados
                    echo "<div class='results-info'>";
                    echo "<i class='fas fa-chart-bar'></i>";
                    echo "<div>";
                    echo "<strong>Resultados encontrados: $count registros</strong><br>";
                    $filters_applied = array();
                    if (!empty($_GET['filter_inspector'])) $filters_applied[] = "Inspector: '" . htmlspecialchars($_GET['filter_inspector']) . "'";
                    if (!empty($_GET['filter_area'])) $filters_applied[] = "Área: '" . htmlspecialchars($_GET['filter_area']) . "'";
                    if (!empty($_GET['filter_codigo'])) $filters_applied[] = "Código: '" . htmlspecialchars($_GET['filter_codigo']) . "'";
                    if (!empty($_GET['filter_fecha'])) $filters_applied[] = "Fecha: " . htmlspecialchars($_GET['filter_fecha']);
                    if (!empty($filters_applied)) {
                        echo "<small>Filtros aplicados: " . implode(" | ", $filters_applied) . "</small>";
                    }
                    echo "</div>";
                    echo "</div>";
                    
                    if ($count > 0) {
                        echo "<div class='card'>";
                        echo "<div class='card-header'>";
                        echo "<h3><i class='fas fa-table'></i> Tabla de Registros Editables</h3>";
                        echo "</div>";
                        echo "<div class='table-wrapper'>";
                        echo "<div class='table-container' id='tableContainer'>";
                        echo "<div class='scroll-indicator scroll-left' id='scrollLeft' onclick='scrollTable(-200)'>";
                        echo "<i class='fas fa-chevron-left'></i>";
                        echo "</div>";
                        echo "<div class='scroll-indicator scroll-right' id='scrollRight' onclick='scrollTable(200)'>";
                        echo "<i class='fas fa-chevron-right'></i>";
                        echo "</div>";
                        echo "<table id='editableTable'>";
                        echo "<thead><tr>
                                <th><i class='fas fa-hashtag'></i> ID</th>
                                <th><i class='fas fa-user'></i> Inspector</th>
                                <th><i class='fas fa-industry'></i> Área</th>
                                <th><i class='fas fa-cogs'></i> Proceso</th>
                                <th><i class='fas fa-calendar'></i> Fecha</th>
                              
                                <th><i class='fas fa-clock'></i> Hora Inicio</th>
                                <th><i class='fas fa-clock'></i> Hora Final</th>
                                <th><i class='fas fa-file-alt'></i> Orden</th>
                                <th><i class='fas fa-barcode'></i> Código</th>
                                <th><i class='fas fa-box'></i> Artículo</th>
                                <th><i class='fas fa-calculator'></i> Cantidad</th>
                                <th><i class='fas fa-check'></i> Procesadas</th>
                                <th><i class='fas fa-exclamation-triangle'></i> Desviaciones</th>
                                <th><i class='fas fa-comment'></i> Observaciones</th>
                                <th><i class='fas fa-tools'></i> Acciones</th>
                              </tr></thead>";
                        echo "<tbody>";
                        
                        foreach ($results as $row) {
                            $id = $row['ID'] ?? 0;
                            echo "<tr data-id='$id'>";
                            echo "<td><strong style='color: var(--primary-color);'>#" . $id . "</strong></td>";
                            echo "<td><input type='text' class='editable-input' name='inspector' value='" . htmlspecialchars($row['INSPECTOR'] ?? '') . "'></td>";
                            echo "<td><input type='text' class='editable-input' name='area' value='" . htmlspecialchars($row['AREA'] ?? '') . "'></td>";
                            echo "<td><input type='text' class='editable-input' name='proceso' value='" . htmlspecialchars($row['PROCESO'] ?? '') . "'></td>";
                            echo "<td><input type='text' class='editable-input' name='fecha' value='" . htmlspecialchars($row['FECHA'] ?? '') . "'></td>";
                            echo "<td><input type='time' class='editable-input' name='horainicio' value='" . htmlspecialchars($row['HORAINICIO'] ?? '') . "'></td>";
                            echo "<td><input type='time' class='editable-input' name='horafin' value='" . htmlspecialchars($row['HORAFIN'] ?? '') . "'></td>";
                            echo "<td><input type='text' class='editable-input' name='orden' value='" . htmlspecialchars($row['ORDEN'] ?? '') . "'></td>";
                            echo "<td><input type='text' class='editable-input' name='codigo' value='" . htmlspecialchars($row['CODIGO'] ?? '') . "'></td>";
                            echo "<td><input type='text' class='editable-input' name='articulo' value='" . htmlspecialchars($row['ARTICULO'] ?? '') . "'></td>";
                            echo "<td><input type='number' class='editable-input' name='cantidad' value='" . htmlspecialchars($row['CANTIDAD_PLANIFICADA'] ?? '') . "'></td>";
                            echo "<td><input type='number' class='editable-input' name='procesadas' value='" . htmlspecialchars($row['PROCESADAS'] ?? '') . "'></td>";
                            echo "<td><input type='number' class='editable-input' name='desviaciones' value='" . htmlspecialchars($row['DESVIACIONES'] ?? '') . "'></td>";
                            echo "<td><textarea class='editable-textarea' name='observaciones'>" . htmlspecialchars($row['OBSERVACIONES'] ?? '') . "</textarea></td>";
                            echo "<td><button class='btn btn-success' onclick='updateRecord($id)'><i class='fas fa-save'></i> Actualizar</button></td>";
                            echo "</tr>";
                        }
                        echo "</tbody></table>";
                        echo "</div>";
                        echo "<div class='table-navigation'>";
                        echo "<div class='table-info'>Mostrando $count registros | Usa las flechas o arrastra para navegar horizontalmente</div>";
                        echo "<div class='scroll-buttons'>";
                        echo "<button class='scroll-btn' onclick='scrollToStart()'><i class='fas fa-angle-double-left'></i> Inicio</button>";
                        echo "<button class='scroll-btn' onclick='scrollToEnd()'><i class='fas fa-angle-double-right'></i> Final</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<div class='card'>";
                        echo "<div class='card-content'>";
                        echo "<div class='message error'><i class='fas fa-search-minus'></i> No se encontraron registros con los filtros aplicados.</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='card'>";
                    echo "<div class='card-content'>";
                    echo "<div class='message error'><i class='fas fa-database'></i> Error al consultar los registros en la base de datos.</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } elseif ($conn && !$hasFilters) {
                echo "<div class='card'>";
                echo "<div class='card-content'>";
                echo "<div class='no-results'>";
                echo "<i class='fas fa-search fa-3x'></i>";
                echo "<h3>Utiliza los filtros para consultar registros</h3>";
                echo "<p>Selecciona al menos un filtro (Inspector, Área, Código o Fecha) para visualizar los registros de la base de datos.</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='card'>";
                echo "<div class='card-content'>";
                echo "<div class='message error'><i class='fas fa-exclamation-triangle'></i> Error de conexión a la base de datos. Verifique la configuración del servidor.</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tabs;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            tabs = document.getElementsByClassName("tab");
            for (i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove("active");
            }
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }

        function clearFilters() {
            document.getElementById('filter_inspector').value = '';
            document.getElementById('filter_area').value = '';
            document.getElementById('filter_codigo').value = '';
            document.getElementById('filter_fecha').value = '';
            window.location.href = window.location.pathname;
        }

        // FUNCIONES MEJORADAS PARA NAVEGACIÓN DE TABLA
        function scrollTable(amount) {
            const container = document.getElementById('tableContainer');
            container.scrollLeft += amount;
            updateScrollIndicators();
        }

        function scrollToStart() {
            const container = document.getElementById('tableContainer');
            container.scrollTo({ left: 0, behavior: 'smooth' });
            setTimeout(updateScrollIndicators, 300);
        }

        function scrollToEnd() {
            const container = document.getElementById('tableContainer');
            container.scrollTo({ left: container.scrollWidth, behavior: 'smooth' });
            setTimeout(updateScrollIndicators, 300);
        }

        function updateScrollIndicators() {
            const container = document.getElementById('tableContainer');
            const scrollLeft = document.getElementById('scrollLeft');
            const scrollRight = document.getElementById('scrollRight');
            
            if (!container || !scrollLeft || !scrollRight) return;
            
            // Mostrar/ocultar indicadores según posición de scroll
            if (container.scrollLeft <= 10) {
                scrollLeft.style.opacity = '0.3';
                scrollLeft.style.pointerEvents = 'none';
            } else {
                scrollLeft.style.opacity = '1';
                scrollLeft.style.pointerEvents = 'auto';
            }
            
            if (container.scrollLeft >= container.scrollWidth - container.clientWidth - 10) {
                scrollRight.style.opacity = '0.3';
                scrollRight.style.pointerEvents = 'none';
            } else {
                scrollRight.style.opacity = '1';
                scrollRight.style.pointerEvents = 'auto';
            }
        }

        // Marcar campos como modificados cuando se editan
        document.addEventListener('DOMContentLoaded', function() {
            const editableInputs = document.querySelectorAll('.editable-input, .editable-textarea');
            
            editableInputs.forEach(input => {
                const originalValue = input.value;
                
                input.addEventListener('input', function() {
                    const row = this.closest('tr');
                    if (this.value !== originalValue) {
                        this.classList.add('modified');
                        row.classList.add('modified');
                    } else {
                        this.classList.remove('modified');
                        // Verificar si hay otros campos modificados en la fila
                        const modifiedInputs = row.querySelectorAll('.modified');
                        if (modifiedInputs.length === 0) {
                            row.classList.remove('modified');
                        }
                    }
                });
            });

            // Permitir filtrar con Enter
            const filterInputs = document.querySelectorAll('#filterForm input');
            filterInputs.forEach(input => {
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        document.getElementById('filterForm').submit();
                    }
                });
            });

            // Inicializar indicadores de scroll
            setTimeout(updateScrollIndicators, 100);
            
            // Actualizar indicadores al hacer scroll
            const container = document.getElementById('tableContainer');
            if (container) {
                container.addEventListener('scroll', updateScrollIndicators);
            }
        });

        function updateRecord(id) {
            const row = document.querySelector(`tr[data-id="${id}"]`);
            if (!row) {
                showMessage('Error: No se encontró la fila del registro', 'error');
                return;
            }

            // Recopilar datos de la fila
            const formData = new FormData();
            formData.append('id', id);
            formData.append('inspector', row.querySelector('input[name="inspector"]').value);
            formData.append('area', row.querySelector('input[name="area"]').value);
            formData.append('proceso', row.querySelector('input[name="proceso"]').value);
            formData.append('fecha', row.querySelector('input[name="fecha"]').value);
            formData.append('horainicio', row.querySelector('input[name="horainicio"]').value);
             formData.append('horafin', row.querySelector('input[name="horafin"]').value);
            formData.append('orden', row.querySelector('input[name="orden"]').value);
            formData.append('codigo', row.querySelector('input[name="codigo"]').value);
            formData.append('articulo', row.querySelector('input[name="articulo"]').value);
            formData.append('cantidad', row.querySelector('input[name="cantidad"]').value);
            formData.append('procesadas', row.querySelector('input[name="procesadas"]').value);
            formData.append('desviaciones', row.querySelector('input[name="desviaciones"]').value);
            formData.append('observaciones', row.querySelector('textarea[name="observaciones"]').value);

            // Deshabilitar el botón mientras se procesa
            const updateBtn = row.querySelector('.btn-success');
            const originalHTML = updateBtn.innerHTML;
            updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Actualizando...';
            updateBtn.disabled = true;

            // Enviar datos via fetch
            fetch('actualizar_registro.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remover clases de modificado
                    row.classList.remove('modified');
                    row.querySelectorAll('.modified').forEach(input => {
                        input.classList.remove('modified');
                    });
                    
                    // Mostrar mensaje de éxito
                    showMessage(`Registro #${id} actualizado exitosamente`, 'success');
                } else {
                    showMessage(`Error en registro #${id}: ${data.error || 'Error desconocido'}`, 'error');
                }
            })
            .catch(error => {
                showMessage(`Error de conexión en registro #${id}: ${error.message}`, 'error');
            })
            .finally(() => {
                // Rehabilitar el botón
                updateBtn.innerHTML = originalHTML;
                updateBtn.disabled = false;
            });
        }

        function showMessage(message, type) {
            // Remover mensajes anteriores
            const existingMessages = document.querySelectorAll('.message');
            existingMessages.forEach(msg => msg.remove());

            // Crear nuevo mensaje
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${type}`;
            
            const icon = type === 'success' ? 'fas fa-check-circle' : 
                        type === 'error' ? 'fas fa-exclamation-circle' : 
                        'fas fa-info-circle';
            
            messageDiv.innerHTML = `<i class="${icon}"></i> ${message}`;

            // Insertar después del contenedor de filtros
            const filterContainer = document.querySelector('.filter-container');
            filterContainer.parentNode.insertBefore(messageDiv, filterContainer.nextSibling);

            // Remover mensaje después de 5 segundos
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }

        // Animación de carga para los stats
        document.addEventListener('DOMContentLoaded', function() {
            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(stat => {
                const finalValue = stat.textContent;
                stat.textContent = '0';
                
                setTimeout(() => {
                    stat.style.transition = 'all 1s ease';
                    stat.textContent = finalValue;
                }, 500);
            });
        });
    </script>
</body>
</html>