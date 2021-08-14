<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-13 23:58:19
  from '/var/www/html/tpl/Reservation/pdf_libraries.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6117071b4d1510_44256632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b42258fd8c1a521fd12f07a1756de6bb4a4cd2e' => 
    array (
      0 => '/var/www/html/tpl/Reservation/pdf_libraries.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6117071b4d1510_44256632 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0], array( array('src'=>"jsPDF/jspdf.umd.min.js"),$_smarty_tpl ) );?>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0], array( array('src'=>"jsPDF/jspdf.plugin.autotable.min.js"),$_smarty_tpl ) );
}
}
