<?php
/**
 * php .remote.php URL COMMAND
 */

if (!defined('STDIN')) {
    abort('Running from web server is forbidden');
}

function abort($message, $code = 1)
{
    fwrite(STDERR, $message . "\n");
    exit($code);
}

function fetch($url, $id, $method, $params = []) {
    $data = json_encode([
        'id' => $id,
        'jsonrpc' => '2.0',
        'method' => $method,
        'params' => $params
    ]);

    $session = curl_init();
    curl_setopt($session, CURLOPT_URL, $url);
    curl_setopt($session, CURLOPT_TIMEOUT, 300);
    curl_setopt($session, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $data);
    curl_setopt($session, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    ]);

    $response = json_decode(curl_exec($session), true);

    if (array_key_exists('error', $response)) {
        abort($response['error']['message'] . ': ' . $response['error']['data']);
    }

    return $response['result'];
}

// 1. Login
$login = fetch($argv[1], 1, 'login', [
    getenv('DEPLOY_WEBCONSOLE_USERNAME'),
    getenv('DEPLOY_WEBCONSOLE_PASSWORD')
]);

// 2. Command
$data = fetch($argv[1], 2, 'run', [
    $login['token'],
    array_merge([], $login['environment'], [
        'path' => preg_replace('/^\//', '/home/' . getenv('DEPLOY_WEBCONSOLE_USERNAME') . '/', getenv('DEPLOY_PATH')),
        'user' => getenv('DEPLOY_WEBCONSOLE_USERNAME')
    ]),
    $argv[2]
]);
echo $data['output'] . "\n";
