<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-02 12:44:34
  from '/var/www/html/tpl/json_data.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6107e8b2b1ce14_85572578',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d63ec657f078f5f622d322a44b25741bf8ce127' => 
    array (
      0 => '/var/www/html/tpl/json_data.tpl',
      1 => 1627552873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6107e8b2b1ce14_85572578 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
