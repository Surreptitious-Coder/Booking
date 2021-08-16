<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-16 11:21:44
  from '/var/www/html/tpl/SearchAvailability/search-availability-results.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611a4a48148904_16915157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e28e23546fa50178f45968aa4cceef91ee5d8850' => 
    array (
      0 => '/var/www/html/tpl/SearchAvailability/search-availability-results.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611a4a48148904_16915157 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Openings']->value, 'opening');
$_smarty_tpl->tpl_vars['opening']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['opening']->value) {
$_smarty_tpl->tpl_vars['opening']->do_else = false;
?>
    <div class="opening"
         data-resourceid="<?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Id;?>
"
         data-startdate="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0], array( array('date'=>$_smarty_tpl->tpl_vars['opening']->value->Start(),'key'=>'system_datetime'),$_smarty_tpl ) );?>
"
         data-enddate="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0], array( array('date'=>$_smarty_tpl->tpl_vars['opening']->value->End(),'key'=>'system_datetime'),$_smarty_tpl ) );?>
">
        <div class="resourceName" data-resourceId="<?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Id;?>
" <?php if ($_smarty_tpl->tpl_vars['opening']->value->Resource()->HasColor()) {?>style="background-color: <?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Color;?>
;color:<?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->TextColor;?>
;"<?php }?>>
            <?php echo $_smarty_tpl->tpl_vars['opening']->value->Resource()->Name;?>

        </div>
        <?php $_smarty_tpl->_assignInScope('key', 'short_reservation_date');?>
        <?php if ($_smarty_tpl->tpl_vars['opening']->value->SameDate()) {?>
            <?php $_smarty_tpl->_assignInScope('key', 'period_time');?>
        <?php }?>
        <div class="dates">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0], array( array('date'=>$_smarty_tpl->tpl_vars['opening']->value->Start(),'key'=>'res_popup'),$_smarty_tpl ) );?>
 -
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['format_date'][0], array( array('date'=>$_smarty_tpl->tpl_vars['opening']->value->End(),'key'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl ) );?>

        </div>
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php if (count((($tmp = @$_smarty_tpl->tpl_vars['Openings']->value)===null||$tmp==='' ? array() : $tmp)) == 0) {?>
    <div class="alert alert-warning">
        <i class="fa fa-frown-o"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'NoAvailableMatchingTimes'),$_smarty_tpl ) );?>

    </div>
<?php }
}
}
