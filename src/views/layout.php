<?php

/** @var \rock\template\Template $this */

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

$params = [
    'array' => $list,
    'tpl' => '@demo.views/chunks/item',
    'wrapperTpl' => '@INLINE<div>[[!+output]]</div>',
    'pagination' => [
        'array' => \rock\helpers\Pagination::get($countList, $currentPage, 1, SORT_DESC),
        'pageParam' => 'num',
        'url'  =>  ['#' => 'pagination']
    ]
];

?>
<?=$this->getChunk('@demo.views/chunks/top_menu')?>
<main class="container main" role="main">
    <header class="header">
        <h1 class="title"><?=$this->title?></h1>
        <p class="lead description">The example template.</p>
    </header>
    <article>
        <h2>Snippets</h2>
        <h3 class="header">listView + Pagination</h3>
        Contents index.php:
        <pre><code class="php"><!--
-->// set alias
\rock\template\Template::setAlias('@views', '/path/to/views')

$list = [
    [
        'name' => 'Tom',
        'email' => 'tom@site.com',
        'about' => '&lt;b&gt;biography&lt;/b&gt;'
    ],
    [
        'name' => 'Chuck',
        'email' => 'chuck@site.com'
    ]
];
$pagination = \rock\template\helpers\Pagination::get(count($list), null, 1, SORT_DESC);

// render template
echo (new \rock\template\Template)->render('@views/layout.php', ['list' => $list, 'pagination' => $pagination]);<!--
        --></code></pre>
        Contents layout.php:
        <pre><code class="php"><!--
 -->&lt;?php
/** @var \rock\template\Template $this */

$params = [
    'array' => $this->list,
    'tpl' => '@views/chunks/item',
    'wrapperTpl' => '@INLINE&lt;div&gt;[[!+output]]&lt;/div&gt;',
    'pagination' => [
        'array' => $this->pagination,
        'pageParam' => 'num',
    ]
];
?&gt;
&lt;?=$this->getSnippet('listView', $params)?&gt;<!--
                --></code></pre>
        <a name="pagination"></a><div class="post-meta">Result:</div>
        <pre><code class="html"><?=$this->getSnippet('listView', $params)?></code></pre>
    </article>
</main>
<?=$this->getChunk('@demo.views/chunks/footer')?>