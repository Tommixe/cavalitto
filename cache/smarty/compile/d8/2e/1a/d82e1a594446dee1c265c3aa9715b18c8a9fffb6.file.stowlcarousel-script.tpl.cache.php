<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 16:43:16
         compiled from "/home/micreon/public_html/cavalitto/modules/stowlcarousel/views/templates/hook/stowlcarousel-script.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1605085429568a9314cd0b43-79520483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd82e1a594446dee1c265c3aa9715b18c8a9fffb6' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stowlcarousel/views/templates/hook/stowlcarousel-script.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1605085429568a9314cd0b43-79520483',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'js_data' => 0,
    'sttheme' => 0,
    'transition_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a9314d4ca72_19541440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a9314d4ca72_19541440')) {function content_568a9314d4ca72_19541440($_smarty_tpl) {?><script type="text/javascript">
//<![CDATA[

    jQuery(function($){
        <?php if (count($_smarty_tpl->tpl_vars['js_data']->value['slide'])>1) {?>
        $("#st_owl_carousel-<?php echo $_smarty_tpl->tpl_vars['js_data']->value['id_st_owl_carousel_group'];?>
").owlCarousel({
            
            autoPlay : <?php if ($_smarty_tpl->tpl_vars['js_data']->value['auto_advance']&&!$_smarty_tpl->tpl_vars['js_data']->value['progress_bar']) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['js_data']->value['time'])===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
            navigation: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['prev_next']) {?>true<?php } else { ?>false<?php }?>,
            pagination: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['pag_nav']) {?>true<?php } else { ?>false<?php }?>,
            paginationSpeed : 1000,
            goToFirstSpeed : 2000,
            rewindNav: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['rewind_nav']) {?>true<?php } else { ?>false<?php }?>,
            singleItem : <?php if ($_smarty_tpl->tpl_vars['js_data']->value['templates']!=3) {?>true<?php } else { ?>false<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['js_data']->value['templates']==3) {?>
              
              itemsCustom : [
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?>
                [0,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_xxs'];?>
],
                [460,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_xs'];?>
],
                [748,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_sm'];?>
],
                [972,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_md'];?>
],
                [1180,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_lg'];?>
],
                [1420,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_xlg'];?>
],
                <?php } else { ?>
                [0,<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?><?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_xlg'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?><?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_lg'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_md'];?>
<?php }?>],
                <?php }?>
                [1600,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_xxlg'];?>
],
                [1900,<?php echo $_smarty_tpl->tpl_vars['js_data']->value['items_huge'];?>
]
              ],
              
            <?php }?>
            autoHeight : <?php if ($_smarty_tpl->tpl_vars['js_data']->value['auto_height']) {?>true<?php } else { ?>false<?php }?>,
            slideSpeed: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['js_data']->value['trans_period'])===null||$tmp==='' ? 200 : $tmp);?>
,
            stopOnHover: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['pause']) {?>true<?php } else { ?>false<?php }?>,
            mouseDrag: <?php if ($_smarty_tpl->tpl_vars['js_data']->value['mouse_drag']) {?>true<?php } else { ?>false<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['js_data']->value['progress_bar']) {?>
            afterInit : st_owl_progressBar,
            afterMove : st_owl_moved,
            startDragging : st_owl_pauseOnDragging,
            <?php }?>
            transitionStyle: "<?php if (array_key_exists($_smarty_tpl->tpl_vars['js_data']->value['transition_style'],$_smarty_tpl->tpl_vars['transition_style']->value)) {?><?php echo $_smarty_tpl->tpl_vars['transition_style']->value[$_smarty_tpl->tpl_vars['js_data']->value['transition_style']]['name'];?>
<?php } else { ?>fade<?php }?>"
            
        });
        <?php if ($_smarty_tpl->tpl_vars['js_data']->value['progress_bar']) {?>
        var st_owl_time = <?php echo (($tmp = @$_smarty_tpl->tpl_vars['js_data']->value['time'])===null||$tmp==='' ? 5000 : $tmp);?>
; // time in seconds 

        var st_owl_progressBar,
            st_owl_bar, 
            st_owl_elem, 
            st_owl_isPause, 
            st_owl_tick,
            st_owl_percentTime;
        //Init progressBar where elem is $("#owl-demo")
        function st_owl_progressBar(elem){
          st_owl_elem = elem;
          //build progress bar elements
          st_owl_buildProgressBar();
          //start counting
          st_owl_start();
        }

        //create div#progressBar and div#bar then prepend to $("#owl-demo")
        function st_owl_buildProgressBar(){
          st_owl_progressBar = $("<div>",{
            class:"owl_progressBar"
          });
          st_owl_bar = $("<div>",{
            class:"owl_bar"
          });
          
          <?php if ($_smarty_tpl->tpl_vars['js_data']->value['progress_bar']==1) {?>
            st_owl_progressBar.append(st_owl_bar).prependTo(st_owl_elem);
          <?php } else { ?>
            st_owl_progressBar.append(st_owl_bar).appendTo(st_owl_elem);
          <?php }?>
          
        }

        function st_owl_start() {
          //reset timer
          st_owl_percentTime = 0;
          st_owl_isPause = false;
          //run interval every 0.01 second
          st_owl_tick = setInterval(st_owl_interval, 10);
        };

        function st_owl_interval() {
          if(st_owl_isPause === false){
            st_owl_percentTime += 1000 / st_owl_time;
            st_owl_bar.css({
               width: st_owl_percentTime+"%"
             });
            //if st_owl_percentTime is equal or greater than 100
            if(st_owl_percentTime >= 100){
              //slide to next item 
              st_owl_elem.trigger('owl.next')
            }
          }
        }

        //pause while dragging 
        function st_owl_pauseOnDragging(){
          st_owl_isPause = true;
        }

        //moved callback
        function st_owl_moved(){
          //clear interval
          clearTimeout(st_owl_tick);
          //start again
          st_owl_start();
        }

        //uncomment this to make pause on mouseover 
        st_owl_elem.on('mouseover',function(){
          st_owl_isPause = true;
        })
        st_owl_elem.on('mouseout',function(){
          st_owl_isPause = false;
        })
        <?php }?><?php }?>
    });
 
//]]>
</script><?php }} ?>
