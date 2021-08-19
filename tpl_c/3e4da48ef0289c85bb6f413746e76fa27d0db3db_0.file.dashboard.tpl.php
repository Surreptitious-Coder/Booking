<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-18 15:32:27
  from '/var/www/html/tpl/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611d280bec4ac3_30564623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e4da48ef0289c85bb6f413746e76fa27d0db3db' => 
    array (
      0 => '/var/www/html/tpl/dashboard.tpl',
      1 => 1629137166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_611d280bec4ac3_30564623 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->_subTemplateRender('file:globalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Qtip'=>true,'Owl'=>true), 0, false);
?>

<div id="page-dashboard">
	<div id="dashboardList">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'dashboardItem');
$_smarty_tpl->tpl_vars['dashboardItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dashboardItem']->value) {
$_smarty_tpl->tpl_vars['dashboardItem']->do_else = false;
?>
			<div><?php echo $_smarty_tpl->tpl_vars['dashboardItem']->value->PageLoad();?>
</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>

    <?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('Qtip'=>true,'Owl'=>true), 0, false);
?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0], array( array('src'=>"dashboard.js"),$_smarty_tpl ) );?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0], array( array('src'=>"resourcePopup.js"),$_smarty_tpl ) );?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0], array( array('src'=>"ajax-helpers.js"),$_smarty_tpl ) );?>


	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function () {

			var dashboardOpts = {
				reservationUrl: "<?php echo Pages::RESERVATION;?>
?<?php echo QueryStringKeys::REFERENCE_NUMBER;?>
=",
				summaryPopupUrl: "ajax/respopup.php",
				scriptUrl: '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
'
			};

			var dashboard = new Dashboard(dashboardOpts);
			dashboard.init();
		});
	<?php echo '</script'; ?>
>
</div>

<div id="wait-box" class="wait-box">
    <div id="creatingNotification">
        <h3>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1442876136611d280bead365_63591947', "ajaxMessage");
?>

        </h3>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0], array( array('src'=>"reservation_submitting.gif"),$_smarty_tpl ) );?>

    </div>
    <div id="result"></div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:globalfooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {block "ajaxMessage"} */
class Block_1442876136611d280bead365_63591947 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ajaxMessage' => 
  array (
    0 => 'Block_1442876136611d280bead365_63591947',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Working'),$_smarty_tpl ) );?>
...
            <?php
}
}
/* {/block "ajaxMessage"} */
}
