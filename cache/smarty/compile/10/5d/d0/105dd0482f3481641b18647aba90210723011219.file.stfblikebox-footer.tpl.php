<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:33
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stfblikebox\views\templates\hook\stfblikebox-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:604956d9d665d319e4-32355649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '105dd0482f3481641b18647aba90210723011219' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stfblikebox\\views\\templates\\hook\\stfblikebox-footer.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '604956d9d665d319e4-32355649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'st_fb_lb_wide_on_footer' => 0,
    'st_lb_url' => 0,
    'st_lb_height' => 0,
    'st_lb_small_header' => 0,
    'st_lb_hide_cover' => 0,
    'st_lb_face' => 0,
    'st_lb_stream' => 0,
    'st_lb_locale' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d666033023_41190008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d666033023_41190008')) {function content_56d9d666033023_41190008($_smarty_tpl) {?>
<!-- MODULE st facebook like box  -->
<section id="facebook_like_box_footer" class="col-xs-12 col-sm-<?php if ($_smarty_tpl->tpl_vars['st_fb_lb_wide_on_footer']->value) {?><?php echo $_smarty_tpl->tpl_vars['st_fb_lb_wide_on_footer']->value;?>
<?php } else { ?>3<?php }?> block">
    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
    <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Facebook','mod'=>'stfblikebox'),$_smarty_tpl);?>
</h4>
    <div class="footer_block_content fb_like_box_warp">
        <div class="fb-page" data-href="<?php echo $_smarty_tpl->tpl_vars['st_lb_url']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['st_lb_height']->value) {?> data-height="<?php echo $_smarty_tpl->tpl_vars['st_lb_height']->value;?>
"<?php }?> data-small-header="<?php if ($_smarty_tpl->tpl_vars['st_lb_small_header']->value) {?>true<?php } else { ?>false<?php }?>" data-adapt-container-width="true" data-hide-cover="<?php if ($_smarty_tpl->tpl_vars['st_lb_hide_cover']->value) {?>true<?php } else { ?>false<?php }?>" data-show-facepile="<?php if ($_smarty_tpl->tpl_vars['st_lb_face']->value) {?>true<?php } else { ?>false<?php }?>" data-show-posts="<?php if ($_smarty_tpl->tpl_vars['st_lb_stream']->value) {?>true<?php } else { ?>false<?php }?>"></div>
        <div id="fb-root"></div>
        <script>
        //<![CDATA[
        
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/<?php echo $_smarty_tpl->tpl_vars['st_lb_locale']->value;?>
/sdk.js#xfbml=1&version=v2.4";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
         
        //]]>
        </script>
    </div>
</section>
<!-- /MODULE st facebook like box --><?php }} ?>
