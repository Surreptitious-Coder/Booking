<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-18 20:51:34
  from '/var/www/html/tpl/Ajax/reservation/reservation_attributes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611d72d6344e51_10247364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38cd2fc206ce5098aa86b724ad83f99d67e0993d' => 
    array (
      0 => '/var/www/html/tpl/Ajax/reservation/reservation_attributes.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611d72d6344e51_10247364 (Smarty_Internal_Template $_smarty_tpl) {
if (count((($tmp = @$_smarty_tpl->tpl_vars['Attributes']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
    <div class="customAttributes">
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attributes']->value, 'attribute', false, NULL, 'attributes', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['attribute']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['index']++;
?>
                <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_attributes']->value['index'] : null)%3 == 0) {?>
                    </div>
                    <div class="row">
                <?php }?>
                <div class="customAttribute col-sm-4 col-xs-12">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0], array( array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'readonly'=>$_smarty_tpl->tpl_vars['ReadOnly']->value),$_smarty_tpl ) );?>

                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
    <div class="clear">&nbsp;</div>
<?php }
}
}
