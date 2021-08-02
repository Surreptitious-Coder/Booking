<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-02 12:43:01
  from '/var/www/html/tpl/Install/configure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6107e855ccae92_14545051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2868b397216c8198a4fed3f1a15a1680e7d62fb9' => 
    array (
      0 => '/var/www/html/tpl/Install/configure.tpl',
      1 => 1627552873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:javascript-includes.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_6107e855ccae92_14545051 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:globalheader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ConfigureApplication'),$_smarty_tpl ) );?>
</h1>

<div>
    <form class="register" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>
">

        <?php if ($_smarty_tpl->tpl_vars['ShowInvalidPassword']->value) {?>
            <div class="error"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'IncorrectInstallPassword'),$_smarty_tpl ) );?>
</div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['InstallPasswordMissing']->value) {?>
            <div class='error'>
				<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'SetInstallPassword'),$_smarty_tpl ) );?>
</p>
			    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'InstallPasswordInstructions','args'=>((string)$_smarty_tpl->tpl_vars['ConfigPath']->value).",".((string)$_smarty_tpl->tpl_vars['ConfigSetting']->value).",".((string)$_smarty_tpl->tpl_vars['SuggestedInstallPassword']->value)),$_smarty_tpl ) );?>
</p>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['ShowPasswordPrompt']->value) {?>
            <ul class="no-style">
				<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ProvideInstallPassword'),$_smarty_tpl ) );?>
</li>
			    <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'InstallPasswordLocation','args'=>((string)$_smarty_tpl->tpl_vars['ConfigPath']->value).",".((string)$_smarty_tpl->tpl_vars['ConfigSetting']->value)),$_smarty_tpl ) );?>
</li>
                <li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['textbox'][0], array( array('type'=>"password",'name'=>"INSTALL_PASSWORD",'class'=>"textbox",'size'=>"20"),$_smarty_tpl ) );?>

                    <button type="submit" name="" class="button" value="submit"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Next'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['html_image'][0], array( array('src'=>"arrow_large_right.png"),$_smarty_tpl ) );?>
</button>
                </li>
            </ul>
        <?php }?>

		<?php if ($_smarty_tpl->tpl_vars['ShowConfigSuccess']->value) {?>
			<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ConfigUpdateSuccess'),$_smarty_tpl ) );?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['Path']->value;
echo Pages::LOGIN;?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'Login'),$_smarty_tpl ) );?>
</a></h3>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['ShowManualConfig']->value) {?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'ConfigUpdateFailure'),$_smarty_tpl ) );?>


			<div style="font-family: courier; border: solid 1px #666;padding: 10px;margin-top: 20px;background-color: #eee">
				&lt;?php<br/>
				error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);<br/>
				<?php echo nl2br($_smarty_tpl->tpl_vars['ManualConfig']->value);?>

				?&gt;
			</div>
		<?php }?>

    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:javascript-includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:globalfooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
