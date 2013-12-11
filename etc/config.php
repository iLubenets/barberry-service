<?php

$applicationPath = realpath(__DIR__ . '/../');
$subDomain = explode('.', $_SERVER['HTTP_HOST'])[0];

return array(
    'directoryCache' => $applicationPath . '/public/cache/' . $subDomain,
    'directoryStorage' => $applicationPath . '/public/cache/' . $subDomain,
);