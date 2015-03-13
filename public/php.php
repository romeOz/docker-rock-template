<?php
use rock\template\Template;

if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    die('need to use PHP version 5.4.x or greater');
}

require(dirname(__DIR__) . '/vendor/autoload.php');


\rock\base\Alias::setAlias('@runtime', __DIR__ . '/runtime');
\rock\base\Alias::setAlias('@demo.views', __DIR__ . '/views');

$template = new Template();
// registration meta
$template->title = 'Demo by PHP engine';
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
$template->registerCssFile('/assets/css/bootstrap.min.css');
$template->registerCssFile('/assets/css/highlight/github.css');
$template->registerCssFile('/assets/css/demo.css');
$template->registerJsFile('/assets/js/jquery.min.js');
$template->registerJsFile('/assets/js/bootstrap.min.js');
$template->registerJsFile('/assets/js/highlight.pack.js');
$template->registerJsFile('/assets/js/demo.js');

$template->addPlaceholder('active.php', true, true);

echo $template->render(
    '@demo.views/layout.php',
    [
        'title' => 'Demo by PHP engine',
    ]
);