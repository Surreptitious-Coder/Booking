<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-18 14:30:25
  from '/var/www/html/tpl/Ajax/user_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611d1981402bf0_93624796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2389d02ed387941fbe23620d8c1ad8836155fee' => 
    array (
      0 => '/var/www/html/tpl/Ajax/user_details.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611d1981402bf0_93624796 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['CanViewUser']->value) {?>
<div id="userDetailsPopup">
	<div id="userDetailsName"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fullname'][0], array( array('first'=>$_smarty_tpl->tpl_vars['User']->value->FirstName(),'last'=>$_smarty_tpl->tpl_vars['User']->value->LastName(),'ignorePrivacy'=>true),$_smarty_tpl ) );?>
</div>
	<div id="userDetailsEmail"><span class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Email'),$_smarty_tpl ) );?>
</span> <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['User']->value->EmailAddress();?>
"><?php echo $_smarty_tpl->tpl_vars['User']->value->EmailAddress();?>
</a></div>
	<div id="userDetailsPhone"><span class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Phone'),$_smarty_tpl ) );?>
</span> <a href="tel:<?php echo $_smarty_tpl->tpl_vars['User']->value->GetAttribute(UserAttribute::Phone);?>
"><?php echo $_smarty_tpl->tpl_vars['User']->value->GetAttribute(UserAttribute::Phone);?>
</a></div>
	<div id="userDetailsOrganization"><span class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Organization'),$_smarty_tpl ) );?>
</span> <?php echo $_smarty_tpl->tpl_vars['User']->value->GetAttribute(UserAttribute::Organization);?>
</div>
	<div id="userDetailsPosition"><span class="label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Position'),$_smarty_tpl ) );?>
</span> <?php echo $_smarty_tpl->tpl_vars['User']->value->GetAttribute(UserAttribute::Position);?>
</div>
	<div id="userDetailsAttributes">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute');
$_smarty_tpl->tpl_vars['attribute']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->do_else = false;
?>
		<div class="customAttribute"><span class="label"><?php echo $_smarty_tpl->tpl_vars['attribute']->value->Label();?>
</span> <?php echo $_smarty_tpl->tpl_vars['User']->value->GetAttributeValue($_smarty_tpl->tpl_vars['attribute']->value->Id());?>
</div>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
</div>
<?php }
}
}
