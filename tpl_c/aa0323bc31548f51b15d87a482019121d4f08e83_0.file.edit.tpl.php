<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-16 11:10:37
  from '/var/www/html/tpl/Reservation/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611a47add8ca62_56737031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa0323bc31548f51b15d87a482019121d4f08e83' => 
    array (
      0 => '/var/www/html/tpl/Reservation/edit.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
  ),
),false)) {
function content_611a47add8ca62_56737031 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1099942758611a47add3eaf6_28974308', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1237294547611a47add42d03_49570815', 'reservationHeader');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_510206364611a47add47a03_68620266', 'submitButtons');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_714499094611a47add728d2_63174951', "ajaxMessage");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_796446819611a47add74051_92085018', 'attachments');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_533870427611a47add87031_89508856', 'extras');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "Reservation/create.tpl");
}
/* {block 'header'} */
class Block_1099942758611a47add3eaf6_28974308 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_1099942758611a47add3eaf6_28974308',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:globalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TitleKey'=>'EditReservationHeading','TitleArgs'=>'','Qtip'=>true,'printCssFiles'=>'css/reservation.print.css'), 0, false);
}
}
/* {/block 'header'} */
/* {block 'reservationHeader'} */
class Block_1237294547611a47add42d03_49570815 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'reservationHeader' => 
  array (
    0 => 'Block_1237294547611a47add42d03_49570815',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"EditReservationHeading",'args'=>''),$_smarty_tpl ) );?>

<?php if ($_smarty_tpl->tpl_vars['RequiresApproval']->value) {?><span class="pendingApproval">(<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'PendingApproval'),$_smarty_tpl ) );?>
)<?php }
}
}
/* {/block 'reservationHeader'} */
/* {block 'submitButtons'} */
class Block_510206364611a47add47a03_68620266 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'submitButtons' => 
  array (
    0 => 'Block_510206364611a47add47a03_68620266',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="btn-group btnMore">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="hidden-xs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'More'),$_smarty_tpl ) );?>
 <span class="caret"></span></span>
        <span class="visible-xs"><i class="fa fa-ellipsis-v"></i> <span class="caret"></span></span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <?php ob_start();
echo Pages::CALENDAR_EXPORT;
$_prefixVariable1=ob_get_clean();
ob_start();
echo QueryStringKeys::REFERENCE_NUMBER;
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('icsUrl', ((string)$_smarty_tpl->tpl_vars['Path']->value)."export/".$_prefixVariable1."?".$_prefixVariable2."=".((string)$_smarty_tpl->tpl_vars['ReferenceNumber']->value));?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['icsUrl']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['icsUrl']->value;?>
">
                <span class="fa fa-calendar"></span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'AddToOutlook'),$_smarty_tpl ) );?>
</a>
        </li>
        <li>
            <a href="http://www.google.com/calendar/event?action=TEMPLATE&text=<?php echo rawurlencode($_smarty_tpl->tpl_vars['ReservationTitle']->value);?>
&dates=<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['StartDate']->value->ToUtc(),'key'=>'google'),$_smarty_tpl ) );?>
/<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value->ToUtc(),'key'=>'google'),$_smarty_tpl ) );?>
&ctz=<?php echo $_smarty_tpl->tpl_vars['StartDate']->value->Timezone();?>
&details=<?php echo rawurlencode($_smarty_tpl->tpl_vars['Description']->value);?>
&location=<?php echo rawurlencode($_smarty_tpl->tpl_vars['Resource']->value->Name);?>
&trp=false&sprop=&sprop=name:"
               target="_blank" rel="nofollow">
            <span class="fa fa-google"></span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'AddToGoogleCalendar'),$_smarty_tpl ) );?>
</a>
        </li>
        <?php if ($_smarty_tpl->tpl_vars['EmailEnabled']->value) {?>
        <li>
            <a href="#" class="btnSendEmail">
            <span class="fa fa-envelope"></span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Email'),$_smarty_tpl ) );?>
</a>
        </li>
        <?php }?>
        <li>
            <a href="#" class="btnPrint">
                <span class="fa fa-print"></span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Print'),$_smarty_tpl ) );?>
</a>
        </li>
		<li>
            <a href="#" class="btnPDF">
                <span class="fa fa-file-pdf-o"></span>
                PDF</a>
        </li>
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::RESERVATION;?>
?<?php echo QueryStringKeys::SOURCE_REFERENCE_NUMBER;?>
=<?php echo $_smarty_tpl->tpl_vars['ReferenceNumber']->value;?>
&<?php echo QueryStringKeys::REDIRECT;?>
=<?php echo urlencode($_smarty_tpl->tpl_vars['ReturnUrl']->value);?>
">
                <span class="fa fa-copy"></span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'DuplicateReservation'),$_smarty_tpl ) );?>
</a>
        </li>

        <li class="divider"></li>
        <li>
        <?php if ($_smarty_tpl->tpl_vars['IsRecurring']->value) {?>
            <a href="#" class="delete prompt">
                <span class="fa fa-remove remove icon"></span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Delete'),$_smarty_tpl ) );?>

            </a>

<?php } else { ?>

            <a href="#" class="triggerDeletePrompt delete prompt-single">
                <span class="fa fa-remove remove icon"></span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Delete'),$_smarty_tpl ) );?>

            </a>
        <?php }?>
        </li>
    </ul>
</div>


<?php if ($_smarty_tpl->tpl_vars['CheckInRequired']->value) {?>
    <button type="button" class="btn btn-warning btnCheckin"><i class="fa fa-sign-in"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'CheckIn'),$_smarty_tpl ) );?>

        <span class="autoReleaseButtonMessage"
              data-autorelease-minutes="<?php echo $_smarty_tpl->tpl_vars['AutoReleaseMinutes']->value;?>
"> - <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReleasedIn'),$_smarty_tpl ) );?>
 <span
                    class="autoReleaseMinutes"></span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'minutes'),$_smarty_tpl ) );?>
</span></button>
<?php }
if ($_smarty_tpl->tpl_vars['CheckOutRequired']->value) {?>
    <button type="button" class="btn btn-warning btnCheckout"><i
                class="fa fa-sign-out"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'CheckOut'),$_smarty_tpl ) );?>
</button>
<?php }
if ($_smarty_tpl->tpl_vars['IsRecurring']->value) {?>
    <button type="button" class="btn btn-success update prompt">
        <span class="glyphicon glyphicon-ok-circle"></span>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Update'),$_smarty_tpl ) );?>

    </button>
    <div class="modal fade" id="updateButtons" tabindex="-1" role="dialog" aria-labelledby="updateButtonsLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="updateButtonsLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ApplyUpdatesTo'),$_smarty_tpl ) );?>
</h4>
                </div>
                <div class="modal-body">
                    <div id="deleteRecurringButtons" class="no-show margin-bottom-15">
                        <div><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'DeleteReminderWarning'),$_smarty_tpl ) );?>
</div>
                        <div>
                        <label for="deleteReasonRecurring"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Reason'),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Optional'),$_smarty_tpl ) );?>
)</label>
                        <textarea id="deleteReasonRecurring" class="form-control"></textarea>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success save btnUpdateThisInstance">
                        <span class="fa fa-check"></span>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ThisInstance'),$_smarty_tpl ) );?>

                    </button>
                    <button type="button" class="btn btn-success save btnUpdateAllInstances">
                        <span class="fa fa-check-square"></span>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'AllInstances'),$_smarty_tpl ) );?>

                    </button>
                    <button type="button" class="btn btn-success save btnUpdateFutureInstances">
                        <span class="fa fa-check-square-o"></span>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'FutureInstances'),$_smarty_tpl ) );?>

                    </button>
                    <button type="button" class="btn btn-default">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Cancel'),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>

    <button type="button" class="btn btn-success save update btnEdit">
        <span class="glyphicon glyphicon-ok-circle"></span>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Update'),$_smarty_tpl ) );?>

    </button>
<?php }?>

    <div id="deleteButtonPrompt" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="updateButtonsLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Delete'),$_smarty_tpl ) );?>
</h4>
            </div>
            <div class="modal-body">
                <div><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'DeleteReminderWarning'),$_smarty_tpl ) );?>
</div>
                <div>
                    <label for="deleteReason"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Reason'),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Optional'),$_smarty_tpl ) );?>
)</label>
                    <textarea class="deleteReason form-control"></textarea>
                </div>
             </div>
            <div class="modal-footer">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cancel_button'][0], array( array('class'=>"cancelDelete cancel"),$_smarty_tpl ) );?>

                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['delete_button'][0], array( array('class'=>"confirmDelete delete save"),$_smarty_tpl ) );?>

           </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'submitButtons'} */
/* {block "ajaxMessage"} */
class Block_714499094611a47add728d2_63174951 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'ajaxMessage' => 
  array (
    0 => 'Block_714499094611a47add728d2_63174951',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'UpdatingReservation'),$_smarty_tpl ) );?>
...
<?php
}
}
/* {/block "ajaxMessage"} */
/* {block 'attachments'} */
class Block_796446819611a47add74051_92085018 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'attachments' => 
  array (
    0 => 'Block_796446819611a47add74051_92085018',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if (count((($tmp = @$_smarty_tpl->tpl_vars['Attachments']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
        <div class="col-xs-12">
    <div id="attachmentDiv" class="res-attachments">
        <span class="heading"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Attachments'),$_smarty_tpl ) );?>
 (<?php echo count((($tmp = @$_smarty_tpl->tpl_vars['Attachments']->value)===null||$tmp==='' ? array() : $tmp));?>
)</span>
        <a href="#" class="remove" id="btnRemoveAttachment">(<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Remove"),$_smarty_tpl ) );?>
)</a>
        <br/>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attachments']->value, 'attachment');
$_smarty_tpl->tpl_vars['attachment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->value) {
$_smarty_tpl->tpl_vars['attachment']->do_else = false;
?>
            <?php ob_start();
echo Pages::RESERVATION_FILE;
$_prefixVariable3=ob_get_clean();
ob_start();
echo QueryStringKeys::ATTACHMENT_FILE_ID;
$_prefixVariable4=ob_get_clean();
ob_start();
echo QueryStringKeys::REFERENCE_NUMBER;
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('attachmentUrl', "attachments/".$_prefixVariable3."?".$_prefixVariable4."=".((string)$_smarty_tpl->tpl_vars['attachment']->value->FileId())."&".$_prefixVariable5."=".((string)$_smarty_tpl->tpl_vars['ReferenceNumber']->value));?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['attachmentUrl']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['attachmentUrl']->value;?>
"
               target="_blank"><?php echo $_smarty_tpl->tpl_vars['attachment']->value->FileName();?>
</a>

&nbsp;

            <input style='display: none;' type="checkbox"
                   name="<?php echo FormKeys::REMOVED_FILE_IDS;?>
[<?php echo $_smarty_tpl->tpl_vars['attachment']->value->FileId();?>
]"/>
            &nbsp;
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    </div>
    <?php }
}
}
/* {/block 'attachments'} */
/* {block 'extras'} */
class Block_533870427611a47add87031_89508856 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'extras' => 
  array (
    0 => 'Block_533870427611a47add87031_89508856',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['AutoReleaseMinutes']->value != null) {?>
    <input type="hidden" id="autoReleaseMinutes" value="<?php echo $_smarty_tpl->tpl_vars['AutoReleaseMinutes']->value;?>
"/>
<?php }?>

<div class="modal fade" id="emailReservationPrompt" tabindex="-1" role="dialog"
     aria-labelledby="emailReservationLabel" aria-hidden="true">
    <form id="emailReservationForm" method="post" role="form" onkeypress="return event.keyCode != 13;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="emailReservationLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'EmailReservation'),$_smarty_tpl ) );?>
</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="emailUserAutocomplete" class="no-show"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'User'),$_smarty_tpl ) );?>
</label>
                    <input type="search" id="emailUserAutocomplete" name="email"
                           class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Email'),$_smarty_tpl ) );?>
" autofocus="autofocus" />
                </div>

                <div id="emailReservationList">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSendReservation">
                    <span class="fa fa-envelope"></span>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Email'),$_smarty_tpl ) );?>

                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Cancel'),$_smarty_tpl ) );?>

                </button>
            </div>
        </div>
    </div>
    </form>
</div>
<?php
}
}
/* {/block 'extras'} */
}
