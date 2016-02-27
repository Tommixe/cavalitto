<?php /*%%SmartyHeaderCode:1870216570568a7a0517be61-48149213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbfb7417e3fd19e55b6b9c8549cbcc179d179283' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stcountdown/views/templates/hook/header.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1870216570568a7a0517be61-48149213',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a93149daf32_45893868',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a93149daf32_45893868')) {function content_568a93149daf32_45893868($_smarty_tpl) {?><style type="text/css">.countdown_timer.countdown_style_0 div{padding-top:11px;padding-bottom:11px;}.countdown_timer.countdown_style_0 div span{height:22px;line-height:22px;}.countdown_timer.countdown_style_0 div{border-right:none;}</style>
<script type="text/javascript">
//<![CDATA[

var s_countdown_all = 0;
var s_countdown_id_products = [];
jQuery(function($) {
    $('.s_countdown_block .s_countdown_timer, .c_countdown_timer').each(function() {
        var that = $(this), finalDate = $(this).data('countdown'), id = that.data('id-product'), countdown_pro = $(this).hasClass('countdown_pro');
        
        if (s_countdown_all || $.inArray(id, s_countdown_id_products) > -1)
        {
            that.countdown(finalDate).on('update.countdown', function(event) {
                
                                var format = '<div><span class="countdown_number">%D</span><span class="countdown_text">'+((event.offset.totalDays == 1) ? "day" : "days")+'</span></div><div><span class="countdown_number">%H</span><span class="countdown_text">hrs</span></div><div><span class="countdown_number">%M</span><span class="countdown_text">min</span></div><div><span class="countdown_number">%S</span><span class="countdown_text">sec</span></div>';
                                
                if(countdown_pro)
                    format = '%D '+((event.offset.totalDays == 1) ? "day" : "days")+' %H : %M : %S';
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
<?php }} ?>
