<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-13 15:44:59
  from '/var/www/html/tpl/Reservation/participation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6116937b611839_97871614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7043e5eaea0dab00761273513ca1b3a1feae160d' => 
    array (
      0 => '/var/www/html/tpl/Reservation/participation.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6116937b611839_97871614 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="reservationParticipation">
	<div class="row">
		<label for="participantAutocomplete"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"ParticipantList"),$_smarty_tpl ) );?>
</label>
        <span class="badge" id="participantBadge">0</span>
        <br/>
		<div class="participationText">
			<span class="hidden-xs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Add'),$_smarty_tpl ) );?>
</span>
			<input type="text" id="participantAutocomplete" class="form-control inline-block user-search" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'NameOrEmail'),$_smarty_tpl ) );?>
"/>
			<span class="hidden-xs">|</span>
		</div>
		<div class="participationButtons">
			<button id="promptForParticipants" type="button" class="btn btn-link inline">
				<i class="fa fa-user"></i>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Users'),$_smarty_tpl ) );?>

			</button>
			<button id="promptForGroupParticipants" type="button" class="btn btn-link inline">
				<i class="fa fa-users"></i>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Groups'),$_smarty_tpl ) );?>

			</button>
		</div>

		<div id="participantList">
		</div>
	</div>
	<div class="row">
		<label for="inviteeAutocomplete"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"InvitationList"),$_smarty_tpl ) );?>
</label>
        <span class="badge" id="inviteeBadge">0</span>
		<br/>
		<div class="participationText">
			<span class="hidden-xs"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Add'),$_smarty_tpl ) );?>
</span>
			<input type="text" id="inviteeAutocomplete" class="form-control inline-block user-search" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'NameOrEmail'),$_smarty_tpl ) );?>
"/>
			<span class="hidden-xs">|</span>
		</div>
		<div class="participationButtons">
			<button id="promptForInvitees" type="button" class="btn btn-link inline">
				<i class="fa fa-user"></i>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Users'),$_smarty_tpl ) );?>

			</button>
			<button id="promptForGroupInvitees" type="button" class="btn btn-link inline">
				<i class="fa fa-users"></i>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Groups'),$_smarty_tpl ) );?>

			</button>
			<?php if ($_smarty_tpl->tpl_vars['AllowGuestParticipation']->value) {?>
				<button id="promptForGuests" type="button" class="btn btn-link inline">
					<i class="fa fa-user-plus"></i>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Guest'),$_smarty_tpl ) );?>

				</button>
			<?php }?>
		</div>

		<div id="inviteeList">
		</div>

		<div id="allowParticipation">
			<div class="checkbox">
				<input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['AllowParticipantsToJoin']->value) {?>checked="checked"<?php }?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formname'][0], array( array('key'=>'ALLOW_PARTICIPATION'),$_smarty_tpl ) );?>
 id="allowParticipationCheckbox">
				<label for="allowParticipationCheckbox"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'AllowParticipantsToJoin'),$_smarty_tpl ) );?>
</label>
			</div>
		</div>

		<div class="modal fade" id="inviteeDialog" tabindex="-1" role="dialog" aria-labelledby="inviteeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="inviteeModalLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'InviteOthers'),$_smarty_tpl ) );?>
</h4>
					</div>
					<div class="modal-body scrollable-modal-content">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Done'),$_smarty_tpl ) );?>
</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="inviteeGuestDialog" tabindex="-1" role="dialog" aria-labelledby="inviteeGuestModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="inviteeGuestModalLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'InviteOthers'),$_smarty_tpl ) );?>
</h4>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="txtGuestEmail" class="col-xs-2 form-control-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Email'),$_smarty_tpl ) );?>
</label>
							<div class="col-xs-8">
								<input id="txtGuestEmail" type="email" class="form-control"/>
							</div>
							<div class="col-xs-2">
								<button id="btnAddGuest" class="btn btn-link" type="button"><span class="no-show"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Guest'),$_smarty_tpl ) );?>
</span><i class="fa fa-user-plus icon add"></i></button>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Done'),$_smarty_tpl ) );?>
</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="inviteeGroupDialog" tabindex="-1" role="dialog" aria-labelledby="inviteeGroupModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="inviteeGroupModalLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'InviteOthers'),$_smarty_tpl ) );?>
</h4>
					</div>
					<div class="modal-body scrollable-modal-content">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Done'),$_smarty_tpl ) );?>
</button>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="modal fade" id="participantDialog" tabindex="-1" role="dialog" aria-labelledby="participantModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="participantModalLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'AddParticipants'),$_smarty_tpl ) );?>
</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Done'),$_smarty_tpl ) );?>
</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="participantGroupDialog" tabindex="-1" role="dialog" aria-labelledby="participantGroupModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="participantGroupModalLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'AddParticipants'),$_smarty_tpl ) );?>
</h4>
				</div>
				<div class="modal-body scrollable-modal-content">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Done'),$_smarty_tpl ) );?>
</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
}
