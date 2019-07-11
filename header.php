<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); ?>
<meta name="google-site-verification" content="GUalIxQFF6iDpMF7X7kkhBn93A3VY-cnnYkYmpbwGfg" />
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 
fbq('init', '181781019049859'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=181781019049859&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Eloqua Tracking Script -->
<script type="text/javascript">
    var _elqQ = _elqQ || [];
    _elqQ.push(['elqSetSiteId', '1913652004']);
    _elqQ.push(['elqTrackPageView']);
    
    (function () {
        function async_load() {
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
            s.src = '//img.en25.com/i/elqCfg.min.js';
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        }
        if (window.addEventListener) window.addEventListener('DOMContentLoaded', async_load, false);
        else if (window.attachEvent) window.attachEvent('onload', async_load); 
    })();
</script>
<!-- End Eloqua Tracking Script -->

</head>

<body <?php body_class(); ?>>
	<div class="outer" id="top">
	
		<div class="wrapper wrapper-<?php echo cpotheme_get_option('cpo_layout_style'); ?>">
			<div id="topbar" class="topbar">
				<div class="container">
				<div class="logo">
					<?php cpotheme_logo(205, 50); ?>
				</div>					
				
<div id="topmenu" class="topmenu">						
					<?php wp_nav_menu(array('menu_class' => 'menu-top', 'theme_location' => 'top_menu', 'depth' => 1, 'fallback_cb' => null)); ?>
					</div>
					
					<!-- <?php cpotheme_languages(); ?> -->
					<!-- <?php cpotheme_social(); ?> -->
					<div class="clear"></div>
				</div>
			</div>
			<header id="header" class="header">
				<div class="container">
					
					<!-- <?php cpotheme_menu(); ?> -->
					
					<?php cpotheme_mobile_menu(); ?>
					
					<div class='clear'></div>
				</div>
			</header>
<?php if(function_exists('chi_display_header')) { chi_display_header(); } ?>
			<?php if(cpotheme_get_option('cpo_slider_always') == 1 || is_home() || is_front_page()){ ?>
			<?php $slider_posts = new WP_Query('post_type=post&meta_key=post_featured&meta_value=1&posts_per_page=-1&order=ASC&orderby=menu_order'); ?>
			<?php if($slider_posts->post_count > 0): $slide_count = 0; ?>
			<div id="slider" class="slider">
				<ul class="slider-slides">
					<?php while($slider_posts->have_posts()): $slider_posts->the_post(); ?>
					<?php $slide_count++; ?>
					<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array(1500, 7000), false, ''); ?>
					<?php $slide_position = get_post_meta(get_the_ID(), 'slide_position', true); ?>
					<li id="slide_<?php echo $slide_count; ?>" class="slide slide-<?php echo $slide_position; ?>" style="background:url(<?php echo $image_url[0]; ?>) no-repeat 0%; background-size:cover;">
						<div class="container">
							<a class="slide-textbox" href="<?php the_permalink(); ?>">
								<h2 class="slide-title"><?php the_title(); ?></h2>
								<div class="slide-content"><?php the_excerpt(); ?></div>
							</a>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php if($slider_posts->post_count > 1): ?>
				<div class='slider-prev'></div>
				<div class='slider-next'></div>
				<?php endif; ?>
			</div>  
			<?php endif; ?>
			
				
			<?php }else{ ?>
			
			<?php $header_image = get_header_image(); if($header_image != ''): ?>
			<img src="<?php echo $header_image; ?>" class="header-image" />
			<?php endif; ?>
			
			<?php } ?>
			
				
			<?php if(is_home() || is_front_page()){ ?>
			
			<div class="container">					
				<?php $feature_posts = new WP_Query('post_type=page&meta_key=page_featured&meta_value=1&posts_per_page=-1&order=ASC&orderby=menu_order'); ?>
				<?php if($feature_posts->post_count > 0): $feature_count = 0; ?>
				<div id="minifeatures" class="minifeatures">
					<?php while($feature_posts->have_posts()): $feature_posts->the_post(); ?>
					<?php if($feature_count % 3 == 0 && $feature_count != 0) echo '<div class="col-divide"></div>'; $feature_count++; ?>
					<div class="column col3 <?php if($feature_count % 3 == 0) echo ' feature_right col-last'; ?>">
						<div class="block feature">
							<?php $icon = get_post_meta(get_the_ID(), 'page_icon', true); ?>
							<?php if($icon != '0' && $icon != ''): ?>
							<div class="feature-icon primary-color-bg"><?php echo $icon; ?></div>
							<?php endif; ?>
							<h2 class="block-title feature-title">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<div class="feature-content"><?php the_excerpt(); ?><?php cpotheme_edit(); ?></div>
							
						</div>
					</div>
					<?php endwhile; ?>
					<div class='clear'></div>
				</div>
				<?php endif; ?>
			</div>
			
			<?php } ?>