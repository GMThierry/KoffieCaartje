<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gravity_Media_single_product_webshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '391381214885757');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=391381214885757&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79852245-30"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-79852245-30');
</script>
<meta name="title" content="KoffieCaartje Den Bosch | Dé leukste koffie beleving in Den Bosch">
<meta name="description" content="KoffieCaartje is een cadeaubon voor heerlijke (specialty)koffie bij vijf leuke plekken in Den Bosch. Zo ontdek je voordelig de stad en de koffie.">
<meta name="keywords" content="koffiecaartje, koffie, cappucino, cadeau, den bosch, 's hertogenbosch, DaSilva, Oerwoud, Drab, Coffeelab, Meastro's, waardebon, gift, koffiegek">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="Gravity Media | www.gravitymedia.nl">

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class='topBar container-fluid'>
		<div class='topBarUsp'><img class="topBarImg" src="/wp-content/uploads/Levering-icon@2x.png"> Op werkdagen binnen 24 uur verzonden</div>|
		<div class='topBarUsp'><img class="topBarImg" src="/wp-content/uploads/Kwaliteit-icon@2x.png"> Gratis verzending</div>|
		<div class='topBarUsp'><img class="topBarImg" src="/wp-content/uploads/Bestel-snel-icon@2x.png"> Duurzaam materiaal, duurzame ervaring</div>
	</div>

	<header id="masthead" class="site-header  container-fluid">
		<div class="row">
			<div class="site-branding  col-md-4  col-sm-4 retinaImg">
				<?php
				the_custom_logo();
				?>
			</div><!-- .site-branding -->

			<div class="desktopMenu  col-md-6  col-sm-6">
				<nav id="site-navigation" class="main-navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="mobileMenu col-lg-6">
				<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
				<label for="openSidebarMenu" class="sidebarIconToggle">
					<div class="spinner diagonal part-1"></div>
					<div class="spinner horizontal"></div>
					<div class="spinner diagonal part-2"></div>
				</label>
				<div id="sidebarMenu">
					<ul class="sidebarMenuInner">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</ul>
				</div>
			</div>

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
