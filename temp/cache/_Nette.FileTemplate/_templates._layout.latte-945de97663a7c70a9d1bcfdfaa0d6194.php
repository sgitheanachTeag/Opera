<?php //netteCache[01]000377a:2:{s:4:"time";s:21:"0.81599500 1398779330";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"/home/opera/public_html/app/AdminModule/templates/@layout.latte";i:2;i:1398779245;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: /home/opera/public_html/app/AdminModule/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'nwnup1vfvm')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block preloader
//
if (!function_exists($_l->blocks['preloader'][] = '_lb308dbaffa2_preloader')) { function _lb308dbaffa2_preloader($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block hiddenClass
//
if (!function_exists($_l->blocks['hiddenClass'][] = '_lb58e57bf6b9_hiddenClass')) { function _lb58e57bf6b9_hiddenClass($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb4c21e93af2_content')) { function _lb4c21e93af2_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html lang="cs">
  <head>
    <meta charset="utf-8">
    <title>Opera na cestách</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/static/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/static/css/site-dependent.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/static/js/vendor/bs3/bootstrap.min.js"></script>

    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/static/js/site-dependent.js"></script>
  </head>
  <body>
    <?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['preloader']), $_l, get_defined_vars())  ?>

<div id="content" <?php call_user_func(reset($_l->blocks['hiddenClass']), $_l, get_defined_vars())  ?>>  
<header class="navbar navbar-inverse header-outer navbar-static-top" role="banner">
    <div class="container form-inline">
        <a href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>">
            <img src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/static/img/layout/logo.jpg" alt="Image" id="logo"
                class="img-responsive pull-left">
        </a>

        <div class="navbar-collapse collapse padding-top pull-right">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/admin/">Hl. strana administrace</a></li>
            <li><a href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/admin/news">Aktuality</a></li>
            <li><a href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/admin/mainBanner">Změnit Banner</a></li>
            <li><a href="<?php echo htmlSpecialChars($_control->link("Default:logout")) ?>
">odhlásit se</a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </div>
</header>


    <div class="container">
<?php if (count($flashes)>0) { ?>        <div id="flashmessages">
<?php $iterations = 0; foreach ($flashes as $flash) { ?>            <div
                class='flashmessage <?php echo htmlSpecialChars($flash->type, ENT_QUOTES) ?>
 alert alert-<?php echo htmlSpecialChars($flash->type, ENT_QUOTES) ?>'><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?>

            </div>
<?php $iterations++; } ?>
        </div>
<?php } ?>

        <?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>

    </div> <!-- /container -->
    <div class="flush"></div>
</div>

</div>
  </body>
</html>


