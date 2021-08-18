<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-18 09:51:24
  from '/var/www/html/tpl/Ajax/reservation/save_successful.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611cd81c158b29_29980760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '618bd195db8c96fc87bc3cf2863423b00a68c5db' => 
    array (
      0 => '/var/www/html/tpl/Ajax/reservation/save_successful.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611cd81c158b29_29980760 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['divId']->value)===null||$tmp==='' ? 'reservation-created' : $tmp);?>
" class="reservationResponseMessage">
	<div id="reservation-response-image">
	<?php if ($_smarty_tpl->tpl_vars['RequiresApproval']->value) {?>
		<span class="fa fa-flag fa-5x warning"></span>
	<?php } else { ?>
		<span class="fa fa-check fa-5x success"></span>
	<?php }?>
	</div>

	<div id="created-message" class="reservation-message"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>(($tmp = @$_smarty_tpl->tpl_vars['messageKey']->value)===null||$tmp==='' ? "ReservationCreated" : $tmp)),$_smarty_tpl ) );?>
</div>
	<div id="reference-number"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'YourReferenceNumber','args'=>$_smarty_tpl->tpl_vars['ReferenceNumber']->value),$_smarty_tpl ) );?>
</div>

	<div class="dates" style="max-height: 15em;display: block;overflow-y: auto;margin: 0.5em 0;">
		<span class="bold"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Dates'),$_smarty_tpl ) );?>
:</span>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Instances']->value, 'instance', false, NULL, 'date_list', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['instance']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['instance']->value) {
$_smarty_tpl->tpl_vars['instance']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_date_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_date_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_date_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_date_list']->value['total'];
?>
			<span class="date"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0], array( array('date'=>$_smarty_tpl->tpl_vars['instance']->value->StartDate(),'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value),$_smarty_tpl ) );
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_date_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_date_list']->value['last'] : null)) {?>, <?php }?></span>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>

	<div class="resources">
		<span class="bold"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Resources'),$_smarty_tpl ) );?>
:</span>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Resources']->value, 'resource', false, NULL, 'resource_list', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['resource']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
$_smarty_tpl->tpl_vars['resource']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_resource_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_resource_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_resource_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_resource_list']->value['total'];
?>
			<span class="resource"><?php echo $_smarty_tpl->tpl_vars['resource']->value->GetName();
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_resource_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_resource_list']->value['last'] : null)) {?>, <?php }?></span>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['RequiresApproval']->value) {?>
		<div id="approval-message"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReservationRequiresApproval'),$_smarty_tpl ) );?>
</div>
	<?php }?>

	<input type="button" id="btnSaveSuccessful" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Close'),$_smarty_tpl ) );?>
" class="btn btn-success" />
</div>
<?php }
}
