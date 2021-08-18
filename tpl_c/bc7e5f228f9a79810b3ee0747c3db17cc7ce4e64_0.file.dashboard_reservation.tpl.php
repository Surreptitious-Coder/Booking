<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-18 10:33:16
  from '/var/www/html/tpl/Dashboard/dashboard_reservation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611ce1eca79bc7_31148297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc7e5f228f9a79810b3ee0747c3db17cc7ce4e64' => 
    array (
      0 => '/var/www/html/tpl/Dashboard/dashboard_reservation.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611ce1eca79bc7_31148297 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('checkin', $_smarty_tpl->tpl_vars['reservation']->value->IsCheckinEnabled() && $_smarty_tpl->tpl_vars['reservation']->value->RequiresCheckin());
$_smarty_tpl->_assignInScope('checkout', $_smarty_tpl->tpl_vars['reservation']->value->IsCheckinEnabled() && $_smarty_tpl->tpl_vars['reservation']->value->RequiresCheckout());
$_smarty_tpl->_assignInScope('class', '');
if ($_smarty_tpl->tpl_vars['reservation']->value->RequiresApproval) {
$_smarty_tpl->_assignInScope('class', "pending");
}?>
<div class="reservation row <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['reservation']->value->ReferenceNumber;?>
">
    <div class="col-sm-3 col-xs-12"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['reservation']->value->Title)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['DefaultTitle']->value : $tmp);?>
</div>
    <div class="col-sm-2 col-xs-12"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fullname'][0], array( array('first'=>$_smarty_tpl->tpl_vars['reservation']->value->FirstName,'last'=>$_smarty_tpl->tpl_vars['reservation']->value->LastName,'ignorePrivacy'=>$_smarty_tpl->tpl_vars['reservation']->value->IsUserOwner($_smarty_tpl->tpl_vars['UserId']->value)),$_smarty_tpl ) );?>
 <?php if (!$_smarty_tpl->tpl_vars['reservation']->value->IsUserOwner($_smarty_tpl->tpl_vars['UserId']->value)) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0], array( array('src'=>"users.png",'altKey'=>'Participant'),$_smarty_tpl ) );
}?></div>
    <div class="col-sm-2 col-xs-6"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->StartDate->ToTimezone($_smarty_tpl->tpl_vars['Timezone']->value),'key'=>'dashboard'),$_smarty_tpl ) );?>
</div>
    <div class="col-sm-2 col-xs-6"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['reservation']->value->EndDate->ToTimezone($_smarty_tpl->tpl_vars['Timezone']->value),'key'=>'dashboard'),$_smarty_tpl ) );?>
</div>
    <div class="col-sm-<?php if ($_smarty_tpl->tpl_vars['checkin']->value || $_smarty_tpl->tpl_vars['checkout']->value) {?>2<?php } else { ?>3<?php }?> col-xs-12"><?php echo join(', ',$_smarty_tpl->tpl_vars['reservation']->value->ResourceNames);?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['checkin']->value) {?>
        <div class="col-sm-1 col-xs-12">
            <button title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'CheckIn'),$_smarty_tpl ) );?>
" type="button" class="btn btn-xs col-xs-12 btn-warning btnCheckin" data-referencenumber="<?php echo $_smarty_tpl->tpl_vars['reservation']->value->ReferenceNumber;?>
" data-url="ajax/reservation_checkin.php?action=<?php echo ReservationAction::Checkin;?>
">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'CheckIn'),$_smarty_tpl ) );?>

            </button>
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['checkout']->value) {?>
        <div class="col-sm-1 col-xs-12">
            <button title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'CheckOut'),$_smarty_tpl ) );?>
" type="button" class="btn btn-xs col-xs-12 btn-warning btnCheckin" data-referencenumber="<?php echo $_smarty_tpl->tpl_vars['reservation']->value->ReferenceNumber;?>
" data-url="ajax/reservation_checkin.php?action=<?php echo ReservationAction::Checkout;?>
">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'CheckOut'),$_smarty_tpl ) );?>

            </button>
        </div>
    <?php }?>
    <div class="clearfix"></div>
</div>
<?php }
}
