<?php
require('./services/router.php');
require('./services/template.php');

$router = router();
$config = $router['config'];

$nav_data = [
    'pages' => get_pages(),
    'key' => $router['key']?? null,
];

$nav = new Template($config['nav'], $nav_data);

$body_data = [
    'title' => 'My title',
    'content' => 'My content'
];

$body = new Template($router['template'], $body_data);

$site_data = [
    'style' => $config['style'],
    'nav' => $nav,
    'body' => $body,
];

$site = new Template($config['site'], $site_data);

echo $site->render();