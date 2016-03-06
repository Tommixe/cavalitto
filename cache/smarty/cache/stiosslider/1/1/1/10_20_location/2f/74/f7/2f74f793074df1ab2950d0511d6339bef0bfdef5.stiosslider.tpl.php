<?php /*%%SmartyHeaderCode:3138156d9d66a226972-93958378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f74f793074df1ab2950d0511d6339bef0bfdef5' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stiosslider\\views\\templates\\hook\\stiosslider.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
    '08d982476f15350228c327a88171cfdbab514007' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stiosslider\\views\\templates\\hook\\stiosslider-fullwidth.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3138156d9d66a226972-93958378',
  'variables' => 
  array (
    'slide_group' => 0,
    'google_font_links' => 0,
    'slide' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d66b690027_26413917',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d66b690027_26413917')) {function content_56d9d66b690027_26413917($_smarty_tpl) {?><!-- MODULE stiossldier -->
                            <div id="iosSlider_1" class="iosSlider fullwidth_default block  ">
    <div class="slider clearfix">
                            <div id="iosSliderBanner_1" style="height:600px;" class="iosSliderBanner_1 iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('http://127.0.0.1/edsa-cavalitto/upload/stiosslider/d1f5800c0ff16014e431ab86b143f0e9.jpg');"></div>
                                <div class=" container_flex ">
                                                                                    <div class="iosSlider_text animated iosSlider_center_center  text-center  " style="width:80%;left:10%;right:10%;" data-animate="fadeInUp">
						<div class="iosSlider_text_con style_content clearfix"><h2 class="closer" style="font-family:Vollkorn;">AUTORICAMBI CAVALITTO</h2>
<div class="spacer"></div>
<p class="center_width_60 color_ccc">From 1946 we are the world leading spare parts supplier for Lancia and FIAT cars.</p>
<div class="spacer"></div>
<h4 class="icon_line icon_line_big" style="font-family:Vollkorn;">Torino 1946</h4>
<div class="spacer"></div></div>                                                    <a href="/index.php?id_cms=4&amp;controller=cms&amp;id_lang=1" target="_self" title="About us" class="btn btn-medium iosslider_btn">About us</a>
                                            </div>
                </div>
                			</div>
                                                            <div id="iosSliderBanner_2" style="height:600px;" class="iosSliderBanner_2 iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('http://127.0.0.1/edsa-cavalitto/upload/stiosslider/f73460987de1d84e41bab44ae772709e.jpg');"></div>
                                <div class=" container_flex ">
                                                                                    <div class="iosSlider_text animated iosSlider_center_center  text-center  " style="width:60%;left:20%;right:20%;" data-animate="flipInY">
						<div class="iosSlider_text_con style_content clearfix"><h2 class="closer" style="font-family:Vollkorn;">SERVING</h2>
<h2 class="closer" style="font-family:Vollkorn;">EXCELLENCE</h2>
<h6></h6></div>                                                    <a href="/index.php?id_category=49&amp;controller=category&amp;id_lang=1" target="_self" title="Our catalog" class="btn btn-medium iosslider_btn">Our catalog</a>
                                            </div>
                </div>
                			</div>
                                                    </div>
    	<div id="iosSliderPrev_1" class="iosSlider_prev  hidden-xs   showonhover  "><i class="icon-left-open-3"></i></div>
	<div id="iosSliderNext_1" class="iosSlider_next  hidden-xs   showonhover  "><i class="icon-right-open-3"></i></div>
        	<div id="iosSlider_selectors_1" class="iosSlider_selectors iosSlider_selectors_round ">
		<a class="selectoritem first selected" href="javascript:;"><span></span></a><a class="selectoritem" href="javascript:;"><span></span></a>
	</div>
        <div class="css3loader css3loader-3"></div>
</div>

<script type="text/javascript">
//<![CDATA[

    jQuery(function($){
		$('#iosSlider_1').iosSlider({
			
            desktopClickDrag: false,
            infiniteSlider: true,
			scrollbar: false,
			autoSlide: true,
			autoSlideTimer: 7000,
			autoSlideTransTimer: 400,
			autoSlideHoverPause: true,
                        
			navNextSelector: $('#iosSliderNext_1'),
			navPrevSelector: $('#iosSliderPrev_1'),
            
                                    navSlideSelector: '#iosSlider_selectors_1 .selectoritem',
                        
			onSliderLoaded: sliderLoaded_1,
			onSlideChange: slideChange_1,
			snapToChildren: true
		});
	});
    function slideChange_1(args) {
        $(args.sliderContainerObject).find('.iosSlideritem').removeClass('current');
        $(args.currentSlideObject).addClass('current');
        
        var slide_height = $(args.currentSlideObject).outerHeight();
        $(args.sliderContainerObject).css('min-height',slide_height);
        $(args.sliderContainerObject).css('height','auto');
       
        $(args.sliderContainerObject).find('.iosSlider_text').each(function(){
            $(this).removeClass($(this).attr('data-animate'));
        });
        $(args.currentSlideObject).find('.iosSlider_text').addClass($(args.currentSlideObject).find('.iosSlider_text').attr('data-animate'));
        
        		$('#iosSlider_selectors_1 .selectoritem').removeClass('selected');
		$('#iosSlider_selectors_1 .selectoritem:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
        	}
    	
	function sliderLoaded_1(args) {
        $(args.sliderContainerObject).find('.css3loader').fadeOut();
        $(args.currentSlideObject).addClass('current');
        
        var slide_height = $(args.currentSlideObject).outerHeight();
        $(args.sliderContainerObject).css('min-height',slide_height);
        $(args.sliderContainerObject).css('height','auto');
        
        $(args.sliderContainerObject).find('.iosSlider_center_center,.iosSlider_left_center,.iosSlider_right_center').each(function(){
            $(this).css('margin-bottom',-($(this).outerHeight()/2).toFixed(3)); 
        });
        
        $(args.sliderContainerObject).find('.iosSlider_selectors,.iosSlider_prev,.iosSlider_next').fadeIn();

        $(args.currentSlideObject).find('.iosSlider_text').addClass($(args.currentSlideObject).find('.iosSlider_text').attr('data-animate'));
	}
 
//]]>
</script>

            <!--/ MODULE stiossldier --><?php }} ?>
