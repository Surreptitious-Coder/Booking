<?php
/* Smarty version 3.1.34-dev-7, created on 2021-08-02 13:01:41
  from '/var/www/html/tpl/globalfooter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6107ecb55bd448_04750237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '346a6d96c187ad921320be1060b7796f70452f99' => 
    array (
      0 => '/var/www/html/tpl/globalfooter.tpl',
      1 => 1627552873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6107ecb55bd448_04750237 (Smarty_Internal_Template $_smarty_tpl) {
?>	</div><!-- close main-->

	<footer class="footer navbar">
		<a href="<?php echo $_smarty_tpl->tpl_vars['CompanyUrl']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['CompanyName']->value;?>
</a> <br/><a href="https://github.com/effgarces/BookedScheduler"><?php echo $_smarty_tpl->tpl_vars['AppTitle']->value;?>
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

	<?php if (!empty($_smarty_tpl->tpl_vars['GoogleAnalyticsTrackingId']->value)) {?>
		
			<?php echo '<script'; ?>
>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  
			  ga('create', '<?php echo $_smarty_tpl->tpl_vars['GoogleAnalyticsTrackingId']->value;?>
', 'auto');
              ga('set', 'anonymizeIp', true);
			  ga('send', 'pageview');
			<?php echo '</script'; ?>
>
	<?php }?>

	</body>
</html>
<?php }
}
