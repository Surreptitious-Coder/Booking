<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-16 11:21:11
  from '/var/www/html/tpl/Ajax/reservation/update_successful.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611a4a270d3fe8_78257686',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de9e87662a34956cacf8bf6ef427b4f0cb2336b7' => 
    array (
      0 => '/var/www/html/tpl/Ajax/reservation/update_successful.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Ajax/reservation/save_successful.tpl' => 1,
  ),
),false)) {
function content_611a4a270d3fe8_78257686 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:Ajax/reservation/save_successful.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('divId'=>"reservation-updated",'messageKey'=>"ReservationUpdated"), 0, false);
}
}
