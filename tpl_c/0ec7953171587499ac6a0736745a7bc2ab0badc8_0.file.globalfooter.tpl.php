<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-20 09:57:00
  from '/var/www/html/tpl/globalfooter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_611f7c6c8184e2_59661805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ec7953171587499ac6a0736745a7bc2ab0badc8' => 
    array (
      0 => '/var/www/html/tpl/globalfooter.tpl',
      1 => 1628761708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_611f7c6c8184e2_59661805 (Smarty_Internal_Template $_smarty_tpl) {
?>	</div><!-- close main-->

	<footer class="footer navbar">
		<a href="<?php echo $_smarty_tpl->tpl_vars['CompanyUrl']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['CompanyName']->value;?>
</a> <br/><a href="https://github.com/effgarces/BookedScheduler">Created using <?php echo $_smarty_tpl->tpl_vars['AppTitle']->value;?>
 GPLv3 v<?php echo $_smarty_tpl->tpl_vars['Version']->value;?>
</a>

	</footer>

	<?php echo '<script'; ?>
 type="text/javascript">
		init();
		$.blockUI.defaults.css.border = 'none';
		$.blockUI.defaults.css.top = '25%';

	<?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}