<?php
use rock\helpers\Pagination;
use rock\template\Template;

if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    die('need to use PHP version 5.4.x or greater');
}

require(dirname(__DIR__) . '/vendor/autoload.php');


\rock\base\Alias::setAlias('@runtime', __DIR__ . '/runtime');
\rock\base\Alias::setAlias('@demo.views', __DIR__ . '/views');

$config = [
    'chroots' => [
        '@template.views',
        '@demo.views'
    ],
    'head' => "<!DOCTYPE html>\n<html lang=\"en\">",
    'title' => 'Demo by Rock engine',
    'metaTags' => [
        '<meta charset="UTF-8">',
        '<meta content="width=device-width, initial-scale=1" name="viewport">',
        'description' => '<meta name="description" content="rock engine">',
    ],
    'linkTags' => [
        '<link type="image/x-icon" href="/assets/ico/favicon.ico?10" rel="icon">',
    ],
    'cssFiles' => [
        Template::POS_HEAD => [
            '<link href="/assets/css/demo.min.css" rel="stylesheet">'
        ],
    ],
    'jsFiles' => [
        Template::POS_END => [
            '<script src="/assets/js/demo.min.js"></script>',
        ]
    ],
];

$template = new Template($config);

$list = [
    [
        'name' => 'Tom',
        'email' => 'tom@site.com',
        'about' => '<b>biography</b>'
    ],
    [
        'name' => 'Chuck',
        'email' => 'chuck@site.com'
    ]
];
$countList = count($list);
$currentPage = isset($_GET['num']) ? (int)$_GET['num'] : null;

if (empty($currentPage)) {
    unset($list[1]);
} else {
    unset($list[$currentPage-1]);
}

echo $template->render(
    '@demo.views/layout',
    [
        'title' => 'Rock engine',
        'demo' =>
            [
                'url' => '/categories/?view=all',
                'date' => '2014-02-12 15:01',
                'num' => 3,
                'title' => 'Hello world',
                'list' => $list,
                'pagination' =>  Pagination::get($countList, $currentPage, 1, SORT_DESC)
            ]
    ]
);