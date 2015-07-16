<?php
/** @var \rock\template\Template $this */
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button aria-controls="navbar" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button" data-ng-init="isCollapsed=true" data-ng-click="isCollapsed = !isCollapsed">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">DEMO</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar" collapse="isCollapsed">
            <ul class="nav navbar-nav">
                <li <?=$this->getSnippet('url', ['modify' => ['!']]) === '/' ? 'class="active"' : ''?>><a href="/">Rock engine</a></li>
                <li <?=$this->getSnippet('url', ['modify' => ['!']]) === '/php.php' ? 'class="active"' : ''?>><a href="/php.php">PHP engine</a></li>
            </ul>
        </div>
    </div>
</nav>