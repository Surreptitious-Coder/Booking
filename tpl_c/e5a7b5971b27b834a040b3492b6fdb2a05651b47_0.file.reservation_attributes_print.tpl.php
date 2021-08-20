<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-20 09:51:51
  from '/var/www/html/tpl/Ajax/reservation/reservation_attributes_print.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611f7b37110495_58708874',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5a7b5971b27b834a040b3492b6fdb2a05651b47' => 
    array (
      0 => '/var/www/html/tpl/Ajax/reservation/reservation_attributes_print.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611f7b37110495_58708874 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'../../lib/external/Smarty/plugins/modifier.escape.php','function'=>'smarty_modifier_escape',),));
if (count((($tmp = @$_smarty_tpl->tpl_vars['Attributes']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute', false, NULL, 'attributes', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['attribute']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['total'];
?>
		 "<?php echo $_smarty_tpl->tpl_vars['attribute']->value->Id();?>
" :
		[ "<?php echo $_smarty_tpl->tpl_vars['attribute']->value->Type();?>
" ,
		"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['attribute']->value->Label(), 'json');?>
" ,
		<?php if ($_smarty_tpl->tpl_vars['attribute']->value->Type() == '5') {?>
			"<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['attribute']->value->Value(),'key'=>'embedded_datetime'),$_smarty_tpl ) );?>
" ] <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['last'] : null)) {
} else { ?>,<?php }?>
		<?php } else { ?>
			"<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['attribute']->value->Value(), 'json');?>
" ] <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['last'] : null)) {
} else { ?>,<?php }?>
		<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
}
<?php }
}
