<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gravity_Media_single_product_webshop
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row py-5 text-center text-md-left">
				<div id="footer-logo" class="col-md mobileAccordion pr-0 pr-lg-5">
					<?php
						if(is_active_sidebar('footer-logo')){
							dynamic_sidebar('footer-logo');
						}
					?>
				</div>

				<div id="footer-location" class="col-md mobileAccordion">
						<?php
						if(is_active_sidebar('footer-location')){
							dynamic_sidebar('footer-location');
						}
					?>
				</div>

				<div id="footer-contact" class="col-md">
					<?php
						if(is_active_sidebar('footer-contact')){
							dynamic_sidebar('footer-contact');
						}
					?>
				</div>

				<div id="footer-socials" class="col-md">
					<?php
						if(is_active_sidebar('footer-socials')){
							dynamic_sidebar('footer-socials');
						}
					?>
				</div>
			</div>
		<div class="site-info text-center">
      <p>@ Copyright 2019: KoffieCaartje | <a target="_blank" href="/algemene-voorwaarden/">Algemene voorwaarden</a> | <a target="_blank" href="/wp-content/uploads/Privacyverklaring-KoffieCaartje.pdf">Privacyverklaring</a> | Branding door <a target="_blank" href="https://www.gravitymedia.nl/"><u>Gravity Media</u></a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
<script>
// if($(window).scrollTop() >= 100){
// 	$('.site-header').addClass("scrolledDown");
// }
// $(window).scroll(function(){
// 	var scrollTop = 100;
// 	if($(window).scrollTop() >= scrollTop){
// 		$('.site-header').addClass("scrolledDown");
// 	}
// 	if($(window).scrollTop() < scrollTop){
// 		$('.site-header').removeClass("scrolledDown");
// 	}
// });


// document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//     anchor.addEventListener('click', function (e) {
//         e.preventDefault();
//
//         document.querySelector(this.getAttribute('href')).scrollIntoView({
//             behavior: 'smooth'
//         });
//     });
// });


// Product Title Br split - Koffiecaartje <br> Plaats
$(document).ready(function() {
	$(".product_title").each(function() {
    var html = $(this).html().split(" ");
    html = html.slice(0,1).join(" ") + "<br />" + html.slice(1).join(" ");
    $(this).html(html);
	});
});

$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top - 200
    }, 500);
});

if ( $( "#preOrderCard" ).length ) {
		console.log("Pre-order card exists");
    $( "li.GMButton.pre-order a" ).attr("href", "#preOrderCard");
}

/*qtybuttons to be ready to send to the checkout*/
$( ".addQty" ).each(function(index) {
	console.log("add");
  $(this).on("click", function(){
		if ($(this).prev().val() < 500) {
			$(this).prev().val(+$(this).prev().val() + 1);
		}
	});
});

$( ".subQty" ).each(function(index) {
	$(this).on("click", function(){
		console.log("clicked sub");
		if ($(this).next().val() > 1) {
			if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
	});
});

/*Onclick to add to cart and go to checkout*/
$('.qtyButtonEhv').click(function(){
	var completeLink = "/checkout/?add-to-cart=403&quantity="+$('#quantityValEhv').val();
	window.location = completeLink;
});
$('.qtyButtonDb').click(function(){
	var completeLink = "/checkout/?add-to-cart=50&quantity="+$('#quantityValDb').val();
	window.location = completeLink;
});
$('.qtyButtonTb').click(function(){
	var completeLink = "/checkout/?add-to-cart=142151&quantity="+$('#quantityValTb').val();
	window.location = completeLink;
});

// Accordion FAQ
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight){
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
		}
	});
}

$('a.woocommerce-terms-and-conditions-link').html('algemene voorwaarden');
</script>
</html>
