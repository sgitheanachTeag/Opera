<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.07539500 1398779558";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:71:"/home/opera/public_html/app/AdminModule/templates/Default/default.latte";i:2;i:1398779556;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: /home/opera/public_html/app/AdminModule/templates/Default/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'bmm26uyxzz')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lba79c883ebf_content')) { function _lba79c883ebf_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
<h1>Hlavní strana administrace</h1>
<p>
Menu má zatím 2 položky.
<ul>
<li>v <a href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/admin/news">Aktualitách</a> lze přidat/upravit/odebrat nějakou zprávičku,news, etc.</li>
<li>
Ve <a href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/admin/mainBanner">Změnit Banner</a> se dá nahrát nový banner</li>
<li>
Odhlásit se je na odhlášení z admin sekce.
</li>
</ul>
</p>
</div>
<?php
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>




