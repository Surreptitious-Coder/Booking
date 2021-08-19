<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-19 19:19:27
  from '/var/www/html/tpl/Ajax/respopup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611eaebf5ca195_40554774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55c1c5b9830957049c1ee24b2b37f661dbca7c99' => 
    array (
      0 => '/var/www/html/tpl/Ajax/respopup.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611eaebf5ca195_40554774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/lib/external/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
if ($_smarty_tpl->tpl_vars['authorized']->value) {?>
    <div class="res_popup_details" style="margin:0">

        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "name", null, null);?>
            <div class="user">
                <?php if ($_smarty_tpl->tpl_vars['hideUserInfo']->value || $_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Private'),$_smarty_tpl ) );?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['fullName']->value;?>

                <?php }?>
            </div>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('name',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'name'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "email", null, null);?>
            <div class="email">
                <?php if (!$_smarty_tpl->tpl_vars['hideUserInfo']->value && !$_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                    <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

                <?php }?>
            </div>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('email',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'email'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "phone", null, null);?>
            <div class="phone">
                <?php if (!$_smarty_tpl->tpl_vars['hideUserInfo']->value && !$_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                    <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>

                <?php }?>
            </div>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('phone',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'phone'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "dates", null, null);?>
            <?php $_smarty_tpl->_assignInScope('key', "res_popup");?>
            <?php if ($_smarty_tpl->tpl_vars['startDate']->value->DateEquals($_smarty_tpl->tpl_vars['endDate']->value)) {?>
                <?php $_smarty_tpl->_assignInScope('key', "res_popup_time");?>
            <?php }?>
            <div class="dates"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['startDate']->value,'key'=>'res_popup'),$_smarty_tpl ) );?>
 - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['endDate']->value,'key'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl ) );?>
</div>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('dates',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dates'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "title", null, null);?>
            <?php if (!$_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                <div class="title"><?php if ($_smarty_tpl->tpl_vars['title']->value != '') {
echo $_smarty_tpl->tpl_vars['title']->value;
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'NoTitleLabel'),$_smarty_tpl ) );
}?></div>
            <?php }?>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('title',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'title'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "resources", null, null);?>
            <div class="resources">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Resources"),$_smarty_tpl ) );?>
 (<?php echo count($_smarty_tpl->tpl_vars['resources']->value);?>
):
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resources']->value, 'resource', false, NULL, 'resource_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['resource']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
$_smarty_tpl->tpl_vars['resource']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['total'];
?>
                    <?php echo $_smarty_tpl->tpl_vars['resource']->value->Name();?>

                    <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_resource_loop']->value['last'] : null)) {?>, <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('resources',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'resources'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "participants", null, null);?>
            <?php if (!$_smarty_tpl->tpl_vars['hideUserInfo']->value && !$_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                <div class="users">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Participants"),$_smarty_tpl ) );?>
 (<?php echo count($_smarty_tpl->tpl_vars['participants']->value);?>
):
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['participants']->value, 'user', false, NULL, 'participant_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['total'];
?>
                        <?php if (!$_smarty_tpl->tpl_vars['user']->value->IsOwner()) {?>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fullname'][0], array( array('first'=>$_smarty_tpl->tpl_vars['user']->value->FirstName,'last'=>$_smarty_tpl->tpl_vars['user']->value->LastName),$_smarty_tpl ) );?>

                        <?php }?>
                        <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_participant_loop']->value['last'] : null)) {?>, <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php }?>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('participants',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'participants'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "accessories", null, null);?>
            <?php if (!$_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                <div class="accessories">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Accessories"),$_smarty_tpl ) );?>
 (<?php echo count($_smarty_tpl->tpl_vars['accessories']->value);?>
):
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accessories']->value, 'accessory', false, NULL, 'accessory_loop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['accessory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->value) {
$_smarty_tpl->tpl_vars['accessory']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_accessory_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_accessory_loop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_accessory_loop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_accessory_loop']->value['total'];
?>
                        <?php echo $_smarty_tpl->tpl_vars['accessory']->value->Name;?>
 (<?php echo $_smarty_tpl->tpl_vars['accessory']->value->QuantityReserved;?>
)
                        <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_accessory_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_accessory_loop']->value['last'] : null)) {?>, <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php }?>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('accessories',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'accessories'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "description", null, null);?>
            <?php if (!$_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                <div class="summary"><?php if ($_smarty_tpl->tpl_vars['summary']->value != '') {
echo nl2br(smarty_modifier_truncate($_smarty_tpl->tpl_vars['summary']->value,300,"..."));
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'NoDescriptionLabel'),$_smarty_tpl ) );
}?></div>
            <?php }?>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('description',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'description'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "attributes", null, null);?>
            <?php if (!$_smarty_tpl->tpl_vars['hideDetails']->value) {?>
                <?php if (count((($tmp = @$_smarty_tpl->tpl_vars['attributes']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
                    <br/>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['attributes']->value, 'attribute');
$_smarty_tpl->tpl_vars['attribute']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attribute']->value) {
$_smarty_tpl->tpl_vars['attribute']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('attr', "att".((string)$_smarty_tpl->tpl_vars['attribute']->value->Id()));?>
                        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "attr", null, null);?>
                            <div><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['control'][0], array( array('type'=>"AttributeControl",'attribute'=>$_smarty_tpl->tpl_vars['attribute']->value,'readonly'=>true),$_smarty_tpl ) );?>
</div>
                        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
                        <?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'attr');?>

                        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add($_smarty_tpl->tpl_vars['attr']->value,$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'attr'));?>

                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            <?php }?>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('attributes',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'attributes'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "pending", null, null);?>
            <?php if ($_smarty_tpl->tpl_vars['requiresApproval']->value) {?>
                <div class="pendingApproval"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'PendingApproval'),$_smarty_tpl ) );?>
</div>
            <?php }?>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('pending',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'pending'));?>


        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "duration", null, null);?>
            <div class="duration"><?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
</div>
        <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Add('duration',$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'duration'));?>

        <!-- <?php echo $_smarty_tpl->tpl_vars['ReservationId']->value;?>
 -->

        <?php echo $_smarty_tpl->tpl_vars['formatter']->value->Display();?>

    </div>
<?php } else { ?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'InsufficientPermissionsError'),$_smarty_tpl ) );?>

<?php }
}
}
