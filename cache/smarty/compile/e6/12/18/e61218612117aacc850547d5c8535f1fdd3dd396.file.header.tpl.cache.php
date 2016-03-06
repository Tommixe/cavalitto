<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:21
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stcountdown\views\templates\hook\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177656d9d659e9c9c8-76991281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e61218612117aacc850547d5c8535f1fdd3dd396' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stcountdown\\views\\templates\\hook\\header.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177656d9d659e9c9c8-76991281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'custom_css' => 0,
    'countdown_active' => 0,
    'display_all' => 0,
    'id_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d65a1b9ab7_06051563',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d65a1b9ab7_06051563')) {function content_56d9d65a1b9ab7_06051563($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['custom_css']->value)&&$_smarty_tpl->tpl_vars['custom_css']->value) {?>
<style type="text/css"><?php echo $_smarty_tpl->tpl_vars['custom_css']->value;?>
</style>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['countdown_active']->value)&&$_smarty_tpl->tpl_vars['countdown_active']->value) {?>
<script type="text/javascript">
//<![CDATA[

var s_countdown_all = <?php echo $_smarty_tpl->tpl_vars['display_all']->value;?>
;
var s_countdown_id_products = [<?php echo $_smarty_tpl->tpl_vars['id_products']->value;?>
];
jQuery(function($) {
    $('.s_countdown_block .s_countdown_timer, .c_countdown_timer').each(function() {
        var that = $(this), finalDate = $(this).data('countdown'), id = that.data('id-product'), countdown_pro = $(this).hasClass('countdown_pro');
        
        if (s_countdown_all || $.inArray(id, s_countdown_id_products) > -1)
        {
            that.countdown(finalDate).on('update.countdown', function(event) {
                
                <?php if (Configuration::get('ST_COUNTDOWN_STYLE')==1) {?>
                var format = '<div><i class="icon-clock"></i>%D '+((event.offset.totalDays == 1) ? "<?php echo smartyTranslate(array('s'=>'day','mod'=>'stcountdown'),$_smarty_tpl);?>
" : "<?php echo smartyTranslate(array('s'=>'days','mod'=>'stcountdown'),$_smarty_tpl);?>
")+' %H : %M : %S</div>';
                <?php } else { ?>
                var format = '<div><span class="countdown_number">%D</span><span class="countdown_text">'+((event.offset.totalDays == 1) ? "<?php echo smartyTranslate(array('s'=>'day','mod'=>'stcountdown'),$_smarty_tpl);?>
" : "<?php echo smartyTranslate(array('s'=>'days','mod'=>'stcountdown'),$_smarty_tpl);?>
")+'</span></div><div><span class="countdown_number">%H</span><span class="countdown_text"><?php echo smartyTranslate(array('s'=>'hrs','mod'=>'stcountdown'),$_smarty_tpl);?>
</span></div><div><span class="countdown_number">%M</span><span class="countdown_text"><?php echo smartyTranslate(array('s'=>'min','mod'=>'stcountdown'),$_smarty_tpl);?>
</span></div><div><span class="countdown_number">%S</span><span class="countdown_text"><?php echo smartyTranslate(array('s'=>'sec','mod'=>'stcountdown'),$_smarty_tpl);?>
</span></div>';
                <?php }?>
                
                if(countdown_pro)
                    format = '%D '+((event.offset.totalDays == 1) ? "<?php echo smartyTranslate(array('s'=>'day','mod'=>'stcountdown'),$_smarty_tpl);?>
" : "<?php echo smartyTranslate(array('s'=>'days','mod'=>'stcountdown'),$_smarty_tpl);?>
")+' %H : %M : %S';
                that.html(event.strftime(format));
            });
            if(countdown_pro)
                that.closest('.countdown_outer_box').addClass('counting');
            else
                that.addClass('counting');
        }
    });
    $('.s_countdown_block .s_countdown_perm, .c_countdown_perm, .countdown_pro_perm').each(function() {
        if (s_countdown_all || $.inArray($(this).data('id-product'), s_countdown_id_products) > -1)
            $(this).addClass('counting');
    });
});    
 
//]]>
</script>
<?php }?><?php }} ?>
