<?php
// Configuración del archivo de log
define('LOG_FILE', 'api_log.txt');

// Verifica si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lee el contenido de la solicitud
    $jsonInput = file_get_contents('php://input');

    // Verifica si la entrada es un JSON válido
    $decodedInput = json_decode($jsonInput, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        // Formatear el JSON como cadena
        $logEntry = date('Y-m-d H:i:s') . " - " . $jsonInput . PHP_EOL;

        // Escribe en el archivo de log
        file_put_contents(LOG_FILE, $logEntry, FILE_APPEND);

        // Responde con éxito
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'message' => 'JSON received and logged successfully.'
        ]);
    } else {
        // Responde con error si el JSON no es válido
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid JSON input.'
        ]);
    }
} else {
    // Responde con error si no es POST
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Only POST method is allowed.'
    ]);
}
?>
