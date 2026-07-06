<?php
/**
 * Reviews API Wrapper - Server-Side
 * Securely calls the Reviews API with API key authentication
 * Frontend calls this file, which then calls apireviews.restaurant.ink
 */

// Prevent search engines from indexing API endpoints
header('X-Robots-Tag: noindex, nofollow');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Load configuration from config.json
$configPath = dirname(__DIR__) . '/config.json';
if (!file_exists($configPath)) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Configuration file not found',
        'path' => $configPath
    ]);
    exit;
}

$configContent = file_get_contents($configPath);
$config = json_decode($configContent, true);

if (!$config || !isset($config['restaurant']['api'])) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Invalid configuration file or missing API section',
        'hasConfig' => ($config !== null),
        'hasRestaurant' => isset($config['restaurant']),
        'hasApi' => isset($config['restaurant']['api'])
    ]);
    exit;
}

// API Configuration from config.json
$apiConfig = $config['restaurant']['api'];
$API_BASE_URL = $apiConfig['reviewsApiUrl'];
$RESTAURANT_ID = $apiConfig['restaurantId'];
$API_KEY = isset($apiConfig['apiKey']) ? $apiConfig['apiKey'] : '';

// Validate API key is configured
if (empty($API_KEY)) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'API key not configured in config.json'
    ]);
    exit;
}

// Get the endpoint from query parameter
$endpoint = isset($_GET['endpoint']) ? $_GET['endpoint'] : 'reviews';

// Special test endpoint to verify configuration
if ($endpoint === 'test') {
    echo json_encode([
        'success' => true,
        'message' => 'API wrapper is working correctly',
        'config' => [
            'restaurantId' => $RESTAURANT_ID,
            'apiUrl' => $API_BASE_URL,
            'hasApiKey' => !empty($API_KEY)
        ],
        'restaurant' => [
            'name' => $config['restaurant']['name'],
            'location' => $config['restaurant']['address']['city'] . ', ' . $config['restaurant']['address']['state']
        ]
    ]);
    exit;
}

// Validate endpoint
$allowedEndpoints = ['reviews', 'locations', 'health'];
if (!in_array($endpoint, $allowedEndpoints)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Invalid endpoint. Allowed: ' . implode(', ', $allowedEndpoints)
    ]);
    exit;
}

// Build API URL with restaurant ID
$apiUrl = $API_BASE_URL . '/index.php?endpoint=' . urlencode($endpoint) . '&restaurant=' . urlencode($RESTAURANT_ID) . '&cb=' . floor(time() / 3600);

// Make server-to-server request with API key authentication
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: Rossellinis-Website/1.0',
    'Accept: application/json',
    'X-API-Key: ' . $API_KEY
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
$curlInfo = curl_getinfo($ch);
// Note: curl_close() deprecated in PHP 8.0+, handle closes automatically

// Handle errors
if ($response === false) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Failed to connect to Reviews API: ' . $curlError,
        'apiUrl' => $API_BASE_URL . '/' . $endpoint,
        'curlInfo' => $curlInfo
    ]);
    exit;
}

// If the API returns a non-200 status, include debugging info
if ($httpCode !== 200) {
    http_response_code($httpCode);

    // Try to decode the response as JSON
    $jsonResponse = json_decode($response, true);
    if ($jsonResponse === null) {
        // Not JSON, return as-is with debug info
        echo json_encode([
            'success' => false,
            'error' => 'API returned non-200 status',
            'httpCode' => $httpCode,
            'response' => substr($response, 0, 500), // First 500 chars
            'apiUrl' => $API_BASE_URL . '/' . $endpoint
        ]);
    } else {
        // Valid JSON error response
        echo $response;
    }
    exit;
}

// Return the successful response
http_response_code($httpCode);
echo $response;
?>

