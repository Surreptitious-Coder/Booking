<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-20 09:52:41
  from '/var/www/html/tpl/Admin/Blackouts/manage_blackouts_response.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611f7b69503cf9_52949900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc14986a975b9e6874bc97e9d97b8b6ff9805c94' => 
    array (
      0 => '/var/www/html/tpl/Admin/Blackouts/manage_blackouts_response.tpl',
      1 => 1629397615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611f7b69503cf9_52949900 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/lib/external/Smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div>
	<?php if ($_smarty_tpl->tpl_vars['Successful']->value) {?>
		<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['SuccessKey']->value),$_smarty_tpl ) );?>
</h2>
		<button class="reload btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"OK"),$_smarty_tpl ) );?>
</button>
	<?php } else { ?>
		<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['FailKey']->value),$_smarty_tpl ) );?>
</h2>
		<button class="unblock btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"OK"),$_smarty_tpl ) );?>
</button>
	<?php }?>

	<?php if (!empty($_smarty_tpl->tpl_vars['Message']->value)) {?>
		<h5><?php echo $_smarty_tpl->tpl_vars['Message']->value;?>
</h5>
	<?php }?>

	<?php if (!empty($_smarty_tpl->tpl_vars['Blackouts']->value)) {?>
		<h5><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'BlackoutConflicts'),$_smarty_tpl ) );?>
</h5>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Blackouts']->value, 'blackout');
$_smarty_tpl->tpl_vars['blackout']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['blackout']->value) {
$_smarty_tpl->tpl_vars['blackout']->do_else = false;
?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0], array( array('date'=>$_smarty_tpl->tpl_vars['blackout']->value->StartDate,'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value),$_smarty_tpl ) );?>

		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>

	<?php if (!empty($_smarty_tpl->tpl_vars['Reservations']->value)) {?>
		<h5><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReservationConflicts'),$_smarty_tpl ) );?>
</h5>
		<table class="table" id="reservationTable" style="margin-left: auto; margin-right: auto;">
			<thead>
			<tr data-reservation-id="<?php echo $_smarty_tpl->tpl_vars['reservation']->value->ReservationId;?>
">
				<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'User'),$_smarty_tpl ) );?>
</th>
				<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Resource'),$_smarty_tpl ) );?>
</th>
				<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'BeginDate'),$_smarty_tpl ) );?>
</th>
				<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'EndDate'),$_smarty_tpl ) );?>
</th>
				<th><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReferenceNumber'),$_smarty_tpl ) );?>
</th>
			</tr>
			</thead>
			<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Reservations']->value, 'reservation');
$_smarty_tpl->tpl_vars['reservation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reservation']->value) {
$_smarty_tpl->tpl_vars['reservation']->do_else = false;
?>
				<?php echo smarty_function_cycle(array('values'=>'row0,row1','assign'=>'rowCss'),$_smarty_tpl);?>

				<tr class="<?php echo $_smarty_tpl->tpl_vars['rowCss']->value;?>
 editable">
					<td><?php echo $_smarty_tpl->tpl_vars['reservation']->value->FirstName;?>
 <?php echo $_smarty_tpl->tpl_vars['reservation']->value->LastName;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['reservation']->value->ResourceName;?>
</td>
					<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->StartDate,'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value,'key'=>'res_popup'),$_smarty_tpl ) );?>
</td>
					<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->EndDate,'timezone'=>$_smarty_tpl->tpl_vars['Timezone']->value,'key'=>'res_popup'),$_smarty_tpl ) );?>
</td>
					<td class="referenceNumber"><?php echo $_smarty_tpl->tpl_vars['reservation']->value->ReferenceNumber;?>
</td>
				</tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</tbody>
		</table>
	<?php }?>
</div>
<?php }
}
