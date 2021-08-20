<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-20 09:57:36
  from '/var/www/html/tpl/Calendar/mycalendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611f7c905edd31_67458383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c45d703febdb3dfca0ce00c9d4c76c6f22b5b2c' => 
    array (
      0 => '/var/www/html/tpl/Calendar/mycalendar.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Calendar/calendar-page-base.tpl' => 1,
  ),
),false)) {
function content_611f7c905edd31_67458383 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Pages::MY_CALENDAR;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('pageUrl', $_prefixVariable1);
$_smarty_tpl->_assignInScope('pageIdSuffix', "my-calendar");
$_smarty_tpl->_assignInScope('subscriptionTpl', "mycalendar.subscription.tpl");
$_smarty_tpl->_subTemplateRender("file:Calendar/calendar-page-base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
