<?php
use rock\template\Template;

if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    die('need to use PHP version 5.4.x or greater');
}

require(dirname(__DIR__) . '/vendor/autoload.php');


\rock\base\Alias::setAlias('@runtime', __DIR__ . '/runtime');
\rock\base\Alias::setAlias('@demo.views', __DIR__ . '/views');

$template = new Template();
$template->chroots = [
    '@template.views',
    '@demo.views'
];
// registration meta
$template->title = 'PHP engine';
$template->head = "<!DOCTYPE html>\n<html lang=\"en\">";
$template->registerMetaTag(['charset' => 'UTF-8']);
$template->registerMetaTag(
    [
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1',
    ]
);
$template->registerMetaTag(
    [
        'name' => 'description',
        'content' => 'php engine',
    ],
    'description'
);
$template->registerLinkTag(
    [
        'type' => 'image/x-icon',
        'href' => '/assets/ico/favicon.ico?10',
        'rel' => 'icon'

    ],
    'favicon'
);
$template->registerCssFile('/assets/css/demo.min.css');
$template->registerJsFile('/assets/js/demo.min.js');

echo $template->render(
    '@demo.views/layout.php',
    [
        'title' => 'PHP engine',
    ]
);