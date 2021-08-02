<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-02 13:05:20
  from '/var/www/html/tpl/Calendar/mycalendar.subscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6107ed90dbbde9_53339238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e3b05966facce2af306c592a49c105d62faf3a8' => 
    array (
      0 => '/var/www/html/tpl/Calendar/mycalendar.subscription.tpl',
      1 => 1627552873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6107ed90dbbde9_53339238 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="calendarSubscription" class="calendar-subscription">
    <?php if ($_smarty_tpl->tpl_vars['IsSubscriptionAllowed']->value && $_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
        <a href="#" id="turnOffSubscription"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0], array( array('src'=>"switch-minus.png"),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'TurnOffSubscription'),$_smarty_tpl ) );?>
</a>
        <?php if ($_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
            <a id="subscribeToCalendar"
               href="<?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value;?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0], array( array('src'=>"calendar-share.png"),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'SubscribeToCalendar'),$_smarty_tpl ) );?>
</a>
            <br/>
            URL:
            <span class="note"><?php echo $_smarty_tpl->tpl_vars['SubscriptionUrl']->value;?>
</span>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['IsSubscriptionEnabled']->value) {?>
        <a href="#" id="turnOnSubscription"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0], array( array('src'=>"switch-plus.png"),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'TurnOnSubscription'),$_smarty_tpl ) );?>
</a>
    <?php }?>
</div><?php }
}
