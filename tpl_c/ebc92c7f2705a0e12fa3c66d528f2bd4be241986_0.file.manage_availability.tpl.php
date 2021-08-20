<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-20 09:57:50
  from '/var/www/html/tpl/Admin/Schedules/manage_availability.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611f7c9e906099_07800177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebc92c7f2705a0e12fa3c66d528f2bd4be241986' => 
    array (
      0 => '/var/www/html/tpl/Admin/Schedules/manage_availability.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611f7c9e906099_07800177 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="availableDates"
     data-has-availability="<?php echo intval($_smarty_tpl->tpl_vars['schedule']->value->HasAvailability());?>
"
     data-start-date="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['schedule']->value->GetAvailabilityBegin(),'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value,'key'=>'general_date'),$_smarty_tpl ) );?>
"
     data-end-date="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['schedule']->value->GetAvailabilityEnd(),'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value,'key'=>'general_date'),$_smarty_tpl ) );?>
">
</div>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Available'),$_smarty_tpl ) );?>

<span class="propertyValue">
<?php if ($_smarty_tpl->tpl_vars['schedule']->value->HasAvailability()) {?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['schedule']->value->GetAvailabilityBegin(),'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value,'key'=>'schedule_daily'),$_smarty_tpl ) );?>
 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['schedule']->value->GetAvailabilityEnd(),'timezone'=>$_smarty_tpl->tpl_vars['timezone']->value,'key'=>'schedule_daily'),$_smarty_tpl ) );?>

<?php } else { ?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'AvailableAllYear'),$_smarty_tpl ) );?>

<?php }?>
</span>
<?php }
}
