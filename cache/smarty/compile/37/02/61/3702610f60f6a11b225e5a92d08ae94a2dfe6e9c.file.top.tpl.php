<?php /* Smarty version Smarty-3.1.19, created on 2016-01-05 15:24:54
         compiled from "/home/micreon/public_html/cavalitto/modules/uecookie/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17996928568bd2367a9729-41857463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3702610f60f6a11b225e5a92d08ae94a2dfe6e9c' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/uecookie/top.tpl',
      1 => 1451225450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17996928568bd2367a9729-41857463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vareu' => 0,
    'uecookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568bd2367f8f59_01791940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568bd2367f8f59_01791940')) {function content_568bd2367f8f59_01791940($_smarty_tpl) {?><script>

    function setcook() {
        var nazwa = 'cookie_ue';
        var wartosc = '1';
        var expire = new Date();
        expire.setMonth(expire.getMonth()+12);
        document.cookie = nazwa + "=" + escape(wartosc) +";path=/;" + ((expire==null)?"" : ("; expires=" + expire.toGMTString()))
    }

</script>
<style>

.closebutton {
    cursor:pointer;
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9) );
	background:-moz-linear-gradient( center top, #f9f9f9 5%, #e9e9e9 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9');
	background-color:#f9f9f9;
	-webkit-border-top-left-radius:5px;
	-moz-border-radius-topleft:5px;
	border-top-left-radius:5px;
	-webkit-border-top-right-radius:5px;
	-moz-border-radius-topright:5px;
	border-top-right-radius:5px;
	-webkit-border-bottom-right-radius:5px;
	-moz-border-radius-bottomright:5px;
	border-bottom-right-radius:5px;
	-webkit-border-bottom-left-radius:5px;
	-moz-border-radius-bottomleft:5px;
	border-bottom-left-radius:5px;
	text-indent:0px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#666666!important;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	font-style:normal;
	height:25px;
	line-height:25px;
	text-decoration:none;
	text-align:center;
    padding:0px 10px;
	text-shadow:1px 1px 0px #ffffff;
}
.closebutton:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9) );
	background:-moz-linear-gradient( center top, #e9e9e9 5%, #f9f9f9 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9');
	background-color:#e9e9e9;
}.closebutton:active {
	position:relative;
	top:1px;
}


#cookieNotice p {margin:0px; padding:0px;}

</style>
<div id="cookieNotice" style="
width: 100%; 
position: fixed; 
<?php if ($_smarty_tpl->tpl_vars['vareu']->value->uecookie_position==2) {?>
bottom:0px;
box-shadow: 0px 0 10px 0 #<?php echo $_smarty_tpl->tpl_vars['vareu']->value->uecookie_shadow;?>
;
<?php } else { ?>
top:0px;
box-shadow: 0 0 10px 0 #<?php echo $_smarty_tpl->tpl_vars['vareu']->value->uecookie_shadow;?>
;
<?php }?>
background: #<?php echo $_smarty_tpl->tpl_vars['vareu']->value->uecookie_bg;?>
;
z-index: 9999;
font-size: 14px;
line-height: 1.3em;
font-family: arial;
left: 0px;
text-align:center;
color:#FFF;
opacity: <?php echo $_smarty_tpl->tpl_vars['vareu']->value->uecookie_opacity;?>

">
    <div id="cookieNoticeContent" style="position:relative; margin:auto; padding:10px; width:100%; display:block;">
    <table style="width:100%;">
      <td style="text-align:center;">
        <?php echo $_smarty_tpl->tpl_vars['uecookie']->value;?>

      </td>
      <td style="width:80px; vertical-align:middle; padding-right:20px; text-align:right;">
    	<span id="cookiesClose" class="closebutton"  onclick="
            <?php if ($_smarty_tpl->tpl_vars['vareu']->value->uecookie_position==2) {?>
            
            $('#cookieNotice').animate(
            {bottom: '-200px'}, 
            2500, function(){
                $('#cookieNotice').hide();
            }); setcook();
            ">
            <?php echo smartyTranslate(array('s'=>'close','mod'=>'uecookie'),$_smarty_tpl);?>

            <?php } else { ?>
            
            $('#cookieNotice').animate(
            {top: '-200px'}, 
            2500, function(){
                $('#cookieNotice').hide();
            }); setcook();
            ">
            <?php echo smartyTranslate(array('s'=>'close','mod'=>'uecookie'),$_smarty_tpl);?>

            <?php }?>
        </span>
     </td>
     </table>
    </div>
</div><?php }} ?>
