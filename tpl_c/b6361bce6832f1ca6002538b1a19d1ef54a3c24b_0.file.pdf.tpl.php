<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-20 09:51:50
  from '/var/www/html/tpl/Reservation/pdf.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611f7b36a552c7_33641382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6361bce6832f1ca6002538b1a19d1ef54a3c24b' => 
    array (
      0 => '/var/www/html/tpl/Reservation/pdf.tpl',
      1 => 1628215355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611f7b36a552c7_33641382 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/lib/external/Smarty/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
var allAttributes;

function GetSelectedResourceIds() {
	var resourceIds = [parseInt($('#primaryResourceId').val())];
	$('#additionalResources').find('.resourceId').each(function (i, element) {
		resourceIds.push(parseInt($(element).val()));
	});
	return resourceIds;
}
	
function LoadCustomAttributesData() {
	var url = 'ajax/reservation_attributes_print.php?uid=' + $('#userId').val() + '&rn=' + $('#referenceNumber').val() + '&ro=' + $('#reservation-box').hasClass('readonly');

	var resourceIds = GetSelectedResourceIds();
	_.each(resourceIds, function (n) {
		url += '&rid[]=' + n;
	});
	var json = null;
	$.ajax({
        global: false,
        url: url,
        dataType: 'json',
	    success: function (data) {
            allAttributes = data;
        }
    });
};

LoadCustomAttributesData();

$('.btnPDF').click(function (e) {
	e.preventDefault();

	window.jsPDF = window.jspdf.jsPDF;

	var pdfDocument = new jsPDF();

	var logo = new Image();
	logo.src = '<?php echo $_smarty_tpl->tpl_vars['ScriptUrl']->value;?>
/img/<?php echo $_smarty_tpl->tpl_vars['LogoUrl']->value;?>
';

	pdfDocument.autoTable({
	  columnStyles: { title: { halign: 'center'  , valign: 'center', fontSize: 14}},
	  theme: 'plain',
	  body: [
		{ logo: '', title: '- <?php echo strtr($_smarty_tpl->tpl_vars['AppTitle']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
 - '},
		{ blank: ''},
	  ],
	  didDrawCell: data => {
		if (data.section == 'body' && data.column.index == 0 && data.row.index == 0){
			pdfDocument.addImage(logo, data.cell.x, data.cell.y + 1, 0, 17);
		}
	  }
	});

	pdfDocument.autoTable({
	  styles: { halign: 'center'  , valign: 'center', fontSize: 12},
	  theme: 'plain',
	  body: [
		['<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>smarty_modifier_capitalize('ReservationDetails')),$_smarty_tpl ) );?>
'],
	  ],
	});

	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  columnStyles: { reftitle: { fontStyle: 'bold'}},
	  theme: 'plain',
		body: [
		{ reftitle: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReferenceNumber'),$_smarty_tpl ) );?>
', refnumb: '<?php echo $_smarty_tpl->tpl_vars['ReferenceNumber']->value;?>
'},
	  ],
	});

	<?php if ($_smarty_tpl->tpl_vars['ShowUserDetails']->value && $_smarty_tpl->tpl_vars['ShowReservationDetails']->value) {?>
		pdfDocument.autoTable({
		  styles: { lineWidth: 0.02},
		  theme: 'plain',
		  body: [
			{ user: '<?php echo strtr($_smarty_tpl->tpl_vars['ReservationUserName']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
		  ],
		  columns: [
			{ header: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'User'),$_smarty_tpl ) );?>
', dataKey: 'user' },
		  ],
		});
	<?php }?>

	var durationText = document.getElementsByClassName('durationText').item(0).innerText;
	var daysText = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'days'),$_smarty_tpl ) );?>
";
	daysText = daysText.charAt(0).toUpperCase() + daysText.slice(1);

	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  theme: 'plain',
		body: [
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'BeginDate'),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['StartDate']->value,'key'=>'embedded_datetime'),$_smarty_tpl ) );?>
'},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'EndDate'),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['EndDate']->value,'key'=>'embedded_datetime'),$_smarty_tpl ) );?>
'},
		],
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReservationLength'),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		 { colSpan: 3, content: durationText},	 
		],
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'RepeatPrompt'),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		<?php if ($_smarty_tpl->tpl_vars['IsRecurring']->value) {?>
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['RepeatOptions']->value[$_smarty_tpl->tpl_vars['RepeatType']->value]['key']),$_smarty_tpl ) );?>
'},
		 { content: '<?php echo $_smarty_tpl->tpl_vars['RepeatInterval']->value;?>
'},	
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['RepeatOptions']->value[$_smarty_tpl->tpl_vars['RepeatType']->value]['everyKey']),$_smarty_tpl ) );?>
'},
		<?php } else { ?>
		 { colSpan: 3, content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['RepeatOptions']->value[$_smarty_tpl->tpl_vars['RepeatType']->value]['key']),$_smarty_tpl ) );?>
'},
		<?php }?>
		],
		<?php if ($_smarty_tpl->tpl_vars['IsRecurring']->value) {?>
			<?php if ($_smarty_tpl->tpl_vars['RepeatMonthlyType']->value != '') {?>
				[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Type'),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
				<?php if ($_smarty_tpl->tpl_vars['RepeatMonthlyType']->value == 'dayOfMonth') {?>
					{ colSpan: 3, content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'repeatDayOfMonth'),$_smarty_tpl ) );?>
'},
				<?php } else { ?>
					{ colSpan: 3, content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'repeatDayOfWeek'),$_smarty_tpl ) );?>
'},
				<?php }?>
				],
			<?php }?>
			<?php if (count($_smarty_tpl->tpl_vars['RepeatWeekdays']->value) > 0) {?>
				[{ content: daysText, styles: { fontStyle: 'bold'}},
				{ colSpan: 3, content: '<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RepeatWeekdays']->value, 'day', false, NULL, 'weekdaysLoop', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['day']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_weekdaysLoop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_weekdaysLoop']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_weekdaysLoop']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_weekdaysLoop']->value['total'];
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_weekdaysLoop']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_weekdaysLoop']->value['last'] : null)) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['DayNames']->value[$_smarty_tpl->tpl_vars['day']->value]),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['DayNames']->value[$_smarty_tpl->tpl_vars['day']->value]),$_smarty_tpl ) );?>
,<?php }?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>'},
				],
			<?php }?>	
			[{ content: '<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'RepeatUntilPrompt'),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
echo strtr($_prefixVariable1, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
', styles: { fontStyle: 'bold'}},
			 { colSpan: 3, content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['formatdate'][0], array( array('date'=>$_smarty_tpl->tpl_vars['RepeatTerminationDate']->value),$_smarty_tpl ) );?>
'},	 
			],
		<?php }?>
		],
	});

	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  columnStyles: { 1: { cellWidth: 16}, 2: { cellWidth: 18},3: { cellWidth: 20}},
	  theme: 'plain',
		body: [
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Resources"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"RequiresApproval"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold', fontSize: 7, halign: 'center'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"RequiresCheckInNotification"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold', fontSize: 7, halign: 'center'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"ReleasedIn"),$_smarty_tpl ) );?>
 (<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"minutes"),$_smarty_tpl ) );?>
)', styles: { fontStyle: 'bold', fontSize: 7, halign: 'center'}},
		],
		[{ content: '<?php echo strtr($_smarty_tpl->tpl_vars['Resource']->value->Name, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
		 { content: '<?php if ($_smarty_tpl->tpl_vars['Resource']->value->GetRequiresApproval()) {?>X<?php }?>', styles: { halign: 'center'}},
		 { content: '<?php if ($_smarty_tpl->tpl_vars['Resource']->value->IsCheckInEnabled()) {?>X<?php }?>', styles: { halign: 'center'}},
		 { content: '<?php if ($_smarty_tpl->tpl_vars['Resource']->value->IsAutoReleased()) {
echo $_smarty_tpl->tpl_vars['Resource']->value->GetAutoReleaseMinutes();
}?>', styles: { halign: 'center'}},
		],
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AvailableResources']->value, 'resource');
$_smarty_tpl->tpl_vars['resource']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['resource']->value) {
$_smarty_tpl->tpl_vars['resource']->do_else = false;
?>
			<?php if (is_array($_smarty_tpl->tpl_vars['AdditionalResourceIds']->value) && in_array($_smarty_tpl->tpl_vars['resource']->value->Id,$_smarty_tpl->tpl_vars['AdditionalResourceIds']->value)) {?>
				[{ content: '<?php echo $_smarty_tpl->tpl_vars['resource']->value->Name;?>
'},
				 { content: '<?php if ($_smarty_tpl->tpl_vars['resource']->value->GetRequiresApproval()) {?>X<?php }?>', styles: { fontStyle: 'bold', halign: 'center'}},
				 { content: '<?php if ($_smarty_tpl->tpl_vars['resource']->value->IsCheckInEnabled()) {?>X<?php }?>', styles: { fontStyle: 'bold', halign: 'center'}},
				 { content: '<?php if ($_smarty_tpl->tpl_vars['resource']->value->IsAutoReleased()) {
echo $_smarty_tpl->tpl_vars['resource']->value->GetAutoReleaseMinutes();
} else { ?> - <?php }?>', styles: { halign: 'center'}},
				],
			<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		],
	});

	<?php if ($_smarty_tpl->tpl_vars['ShowReservationDetails']->value && is_array($_smarty_tpl->tpl_vars['Accessories']->value) && count((($tmp = @$_smarty_tpl->tpl_vars['Accessories']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  columnStyles: { 1: { cellWidth: 18}},
	  theme: 'plain',
		body: [
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Accessories"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Quantity"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold', fontSize: 7, halign: 'center'}},
		],
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Accessories']->value, 'accessory');
$_smarty_tpl->tpl_vars['accessory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->value) {
$_smarty_tpl->tpl_vars['accessory']->do_else = false;
?>
			[{ content: '<?php echo strtr($_smarty_tpl->tpl_vars['accessory']->value->Name, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
			 { content: '<?php echo $_smarty_tpl->tpl_vars['accessory']->value->QuantityReserved;?>
', styles: { halign: 'center'}},
			],
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		]
	});
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['ShowReservationDetails']->value && $_smarty_tpl->tpl_vars['ShowParticipation']->value && count((($tmp = @$_smarty_tpl->tpl_vars['Participants']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  columnStyles: { 1: { cellWidth: 80}},
	  theme: 'plain',
		body: [
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Participants"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Email"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold', fontSize: 7}},
		],
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Participants']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
			[{ content: '<?php echo strtr($_smarty_tpl->tpl_vars['user']->value->FullName, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
			 { content: '<?php echo $_smarty_tpl->tpl_vars['user']->value->Email;?>
'},
			],
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		]
	});
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['ShowReservationDetails']->value && $_smarty_tpl->tpl_vars['ShowParticipation']->value && count((($tmp = @$_smarty_tpl->tpl_vars['Invitees']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  columnStyles: { 1: { cellWidth: 80}},
	  theme: 'plain',
		body: [
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"InvitationList"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		 { content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"Email"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold', fontSize: 7}},
		],
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Invitees']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
			[{ content: '<?php echo strtr($_smarty_tpl->tpl_vars['user']->value->FullName, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
			 { content: '<?php echo $_smarty_tpl->tpl_vars['user']->value->Email;?>
'},
			],
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		]
	});
	<?php }?>

	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  columnStyles: { 1: { cellWidth: 80}},
	  theme: 'plain',
		body: [
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"ReservationTitle"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		],
		[{ content: '<?php echo strtr($_smarty_tpl->tpl_vars['ReservationTitle']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
		],
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"ReservationDescription"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		],
		[{ content: '<?php echo strtr($_smarty_tpl->tpl_vars['Description']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
		],
		]
	});

	var bodyAttributes = [[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"AdditionalAttributes"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}}, { content: ''}]];

	if (Object.keys(allAttributes).length != 0) {
		for (var obj in allAttributes) {
			if (allAttributes[obj][0] == "4") {
				if (allAttributes[obj][2] == "1") {
					bodyAttributes.push([{ content: allAttributes[obj][1], styles: { fontStyle: 'bold'}}, { content: 'X', styles: { fontStyle: 'bold', halign: 'center'}}]);
				};
			} else {
				bodyAttributes.push([{ colSpan: 2, content: allAttributes[obj][1], styles: { fontStyle: 'bold'}}]);
				bodyAttributes.push([{ colSpan: 2, content: allAttributes[obj][2]}]);
			};
		};
		pdfDocument.autoTable({
			styles: { lineWidth: 0.02},
			columnStyles: { 1: { cellWidth: 10}},
			theme: 'plain',
			body: bodyAttributes,
	});
	};

	<?php if ($_smarty_tpl->tpl_vars['RemindersEnabled']->value) {?>
	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  theme: 'plain',
		body: [
		[{ content: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"SendReminder"),$_smarty_tpl ) );?>
', styles: { fontStyle: 'bold'}},
		<?php if ($_smarty_tpl->tpl_vars['ReminderTimeStart']->value != '') {?>
		{ content: '<?php echo $_smarty_tpl->tpl_vars['ReminderTimeStart']->value;?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['ReminderIntervalStart']->value),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReminderBeforeStart'),$_smarty_tpl ) );?>
'},
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['ReminderTimeEnd']->value != '') {?>
		{ content: '<?php echo $_smarty_tpl->tpl_vars['ReminderTimeEnd']->value;?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['ReminderIntervalEnd']->value),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ReminderBeforeEnd'),$_smarty_tpl ) );?>
'},
		<?php }?>
		],
		]
	});
	<?php }?>

	<?php if (count((($tmp = @$_smarty_tpl->tpl_vars['Attachments']->value)===null||$tmp==='' ? array() : $tmp)) > 0) {?>
	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  theme: 'plain',
		body: [
		[{ content: '<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Attachments'),$_smarty_tpl ) );
$_prefixVariable2 = ob_get_clean();
echo strtr($_prefixVariable2, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
 (<?php echo count((($tmp = @$_smarty_tpl->tpl_vars['Attachments']->value)===null||$tmp==='' ? array() : $tmp));?>
)', styles: { fontStyle: 'bold'}},
		],
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Attachments']->value, 'attachment');
$_smarty_tpl->tpl_vars['attachment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->value) {
$_smarty_tpl->tpl_vars['attachment']->do_else = false;
?>
		[{ content: '<?php echo strtr($_smarty_tpl->tpl_vars['attachment']->value->FileName(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'},
		],
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		]
	});
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['Terms']->value != null&$_smarty_tpl->tpl_vars['TermsAccepted']->value) {?>
	pdfDocument.autoTable({
	  styles: { lineWidth: 0.02},
	  columnStyles: { 1: { cellWidth: 10}},
	  theme: 'plain',
		body: [
		[{ content: "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>strtr('IAccept', array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ))),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'TheTermsOfService'),$_smarty_tpl ) );?>
", styles: { fontStyle: 'bold'}},
		 { content: 'X', styles: { fontStyle: 'bold', halign: 'center'}},
		],
		]
	});
	<?php }?>
	window.open(URL.createObjectURL(pdfDocument.output("blob")))
});<?php }
}
