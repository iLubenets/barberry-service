<?php
namespace Barberry;

use ProstoAuth\Exception\ProstoAuthException;
use ProstoAuth\ProstoAuth;
use Symfony\Component\Yaml\Yaml;

include dirname(__DIR__) . '/vendor/autoload.php';

try {
    $config = Yaml::parse(dirname(__DIR__) . '/etc/config.yml');
    if ($_SERVER['REQUEST_METHOD'] !== 'GET'
        && $config['prosto_auth']['certified_ip'] !== $_SERVER['REMOTE_ADDR']) {
        $prostoAuth = new ProstoAuth($config['prosto_auth'], $config['database']);
        $user = $prostoAuth->getAuthenticateUser('teammember');
        if(!$user){
            http_response_code(403);
            echo 'Access denied!';
            die();
        }
    }
} catch (ProstoAuthException $e) {
    http_response_code(404);
    echo $e->getMessage();
    die();
} catch (\Exception $e) {
    http_response_code(500);
    echo 'Service error!';
    die();
}

$application = new Application(new Config(realpath(__DIR__ . '/../'), '/etc/config.php'));
$application->run()->send();
