<?php
header('Content-Type: application/json');
if (function_exists('curl_init')) {
    $ch = curl_init('https://analytics.bitrix.info/crecoms/v1_0/recoms.php?' . $_SERVER['QUERY_STRING']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    if ($response === false) {
        http_response_code(500);
        echo json_encode(['error' => 'Request failed']);
    } else {
        echo $response;
    }
    curl_close($ch);
} else {
    $url = 'https://analytics.bitrix.info/crecoms/v1_0/recoms.php?' . $_SERVER['QUERY_STRING'];
    $response = @file_get_contents($url);
    if ($response === false) {
        http_response_code(500);
        echo json_encode(['error' => 'Request failed']);
    } else {
        echo $response;
    }
}
?>
