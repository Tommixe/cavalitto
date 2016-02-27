<?php /*%%SmartyHeaderCode:2068444427568a7a05f28dc9-44060905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffae6944a408b7b65e641eae28113805c9feeafc' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stiosslider/views/templates/hook/stiosslider.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
    'ff55839a0474845d3e5edf9692fbea3d074c0e46' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stiosslider/views/templates/hook/stiosslider-fullwidth.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2068444427568a7a05f28dc9-44060905',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568bd236a503c2_90310936',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568bd236a503c2_90310936')) {function content_568bd236a503c2_90310936($_smarty_tpl) {?><!-- MODULE stiossldier -->
                            <div id="iosSlider_1" class="iosSlider fullwidth_default block  ">
    <div class="slider clearfix">
                            <div id="iosSliderBanner_1" style="height:600px;" class="iosSliderBanner_1 iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('http://cavalitto.micreon.net/upload/stiosslider/bcfc92bd7c1212d9491303718ebf0b20.jpg');"></div>
                                <div class=" container_flex ">
                                                                                    <div class="iosSlider_text animated iosSlider_center_center  text-center  " style="width:80%;left:10%;right:10%;" data-animate="fadeInUp">
						<div class="iosSlider_text_con style_content clearfix"><h2 class="closer" style="font-family:Vollkorn;">AUTORICAMBI CAVALITTO</h2>
<div class="spacer"></div>
<p class="center_width_60 color_ccc">Dal 1946 il punto di riferimento per tutte le parti di ricambio delle vetture Lancia e FIAT</p>
<div class="spacer"></div>
<h4 class="icon_line icon_line_big" style="font-family:Vollkorn;">Torino 1946</h4></div>                                                    <a href="/index.php?id_cms=4&amp;controller=cms&amp;id_lang=2" target="_self" title="La nostra storia" class="btn btn-medium iosslider_btn">La nostra storia</a>
                                            </div>
                </div>
                			</div>
                                                            <div id="iosSliderBanner_2" style="height:600px;" class="iosSliderBanner_2 iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('http://cavalitto.micreon.net/upload/stiosslider/30b973e57884a90f788286874c6fe4d0.jpg');"></div>
                                <div class=" container_flex ">
                                                                                    <div class="iosSlider_text animated iosSlider_center_center  text-center  " style="width:60%;left:20%;right:20%;" data-animate="flipInY">
						<div class="iosSlider_text_con style_content clearfix"><h2 class="closer" style="font-family:Vollkorn;">AL SERVIZIO</h2>
<h2 class="closer" style="font-family:Vollkorn;">DELL'ECCELLENZA</h2>
<h6></h6></div>                                                    <a href="/index.php?id_category=49&amp;controller=category&amp;id_lang=2" target="_self" title="Il nostro catalogo" class="btn btn-medium iosslider_btn">Il nostro catalogo</a>
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
