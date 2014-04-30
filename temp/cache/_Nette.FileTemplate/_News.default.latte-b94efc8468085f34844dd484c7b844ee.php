<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.98051900 1398780459";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:68:"/home/opera/public_html/app/AdminModule/templates/News/default.latte";i:2;i:1398780423;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: /home/opera/public_html/app/AdminModule/templates/News/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'kd7irp9tpb')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf553f04c40_content')) { function _lbf553f04c40_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Založit novou zprávičku
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Nová zprávička</h4>
      </div>
      <div class="modal-body">
<?php $_ctrl = $_control->getComponent("postNewsForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ?>
      </div>
<!--  <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
      </div>
-->
    </div>
  </div>
</div>


<?php
}}

//
// block content2Working
//
if (!function_exists($_l->blocks['content2Working'][] = '_lb0c0cda563f_content2Working')) { function _lb0c0cda563f_content2Working($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2>Přidat novou novinku</h2>
<?php $_ctrl = $_control->getComponent("postNewsForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ;
}}

//
// block content1
//
if (!function_exists($_l->blocks['content1'][] = '_lb2beed3c961_content1')) { function _lb2beed3c961_content1($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1> Výpis zpráviček</h1>


<table class="table table-stripped table-condensed">
<thead>
<th>
    Datum platnosti
</th>
<th>
    Tělo zprávičky
</th>
<th>
    Aktuality
</th>
<th>
    News
</th>
<th>
    Upravit
</th>
</thead>
<tbody>
    <tr>
        <td>
        14. - 25. květen 2014
        </td>
        <td>
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum."
        </td>
        <td>
        <div class="checkbox">
            <label>
            <input type="checkbox" checked="checked">
            </label>
        </div>
        </td>
        <td>
        <div class="checkbox">
            <label>
            <input type="checkbox">
            </label>
        </div>
        </td>
        <td>
            <button type="button" class="btn btn-success btn-sm">
            Upravit
            </button>

        </td>
    </tr>
    <tr>
        <td>
        24. červen 2014
        </td>
        <td>
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum."
        </td>
        <td>
        <div class="checkbox">
            <label>
            <input type="checkbox" checked="checked">
            </label>
        </div>
        </td>
        <td>
        <div class="checkbox">
            <label>
            <input type="checkbox">
            </label>
        </div>
        </td>
        <td>
            <button type="button" class="btn btn-success btn-sm">
            Upravit
            </button>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm">
            Smazat
            </button>
        </td>
    </tr>
</tbody>
</table>
<div class="container">
    <button type="button" class="btn btn-default">
    <span class="glyphicon glyphicon-plus"></span> Přidat novou zprávičku
    </button>



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



<?php call_user_func(reset($_l->blocks['content2Working']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content1']), $_l, get_defined_vars()) ; 