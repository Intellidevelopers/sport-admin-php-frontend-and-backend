"user strict";

$(document).ready(function () {
	//menu header bar
	$(".header-bar, .header-bartwo").on("click", function (e) {
		$(".main-menu, .header-bar, .header-bartwo").toggleClass("active");
	});
	$(".main-menu li a").on("click", function (e) {
		$(".main-menu, .header-bar").removeClass("active");
		var element = $(this).parent("li");
		if (element.hasClass("open")) {
			element.removeClass("open");
			element.find("li").removeClass("open");
			element.find("ul").slideUp(300, "swing");
		} else {
			element.addClass("open");
			element.children("ul").slideDown(300, "swing");
			element.siblings("li").children("ul").slideUp(300, "swing");
			element.siblings("li").removeClass("open");
			element.siblings("li").find("li").removeClass("open");
			element.siblings("li").find("ul").slideUp(300, "swing");
		}
	});
	//menu header bar

	//owl carousel
	$(".match__fixing__wrap").owlCarousel({
		loop: true,
		margin: 9,
		smartSpeed: 2500,
		autoplayTimeout: 3000,
		autoplay: false,
		nav: false,
		dots: false,
		responsiveClass: true,
		navText: [
			'<i class="fa-solid fa-angle-left"></i>',
			'<i class="fa-solid fa-angle-right"></i>',
		],
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 2,
			},
			767: {
				items: 2,
			},
			991: {
				items: 2,
			},
			1199: {
				items: 2,
			},
			1243: {
				items: 3,
			},
			1399: {
				items: 4,
			},
		},
	});
	//Sponsor Carousel
	$(".footer__sponsor").owlCarousel({
		loop: true,
		margin: 9,
		smartSpeed: 2500,
		autoplayTimeout: 3000,
		autoplay: false,
		nav: false,
		dots: false,
		responsiveClass: true,
		navText: [
			'<i class="fa-solid fa-angle-left"></i>',
			'<i class="fa-solid fa-angle-right"></i>',
		],
		responsive: {
			0: {
				items: 2,
			},
			400: {
				items: 3,
			},
			600: {
				items: 4,
			},
			767: {
				items: 5,
			},
			991: {
				items: 4,
			},
			1199: {
				items: 5,
			},
			1243: {
				items: 6,
			},
			1799: {
				items: 9,
			},
		},
	});
	//owl carousel
	$(".horse__slide__wrap").owlCarousel({
		loop: true,
		margin: 24,
		smartSpeed: 2500,
		autoplayTimeout: 3000,
		autoplay: false,
		nav: false,
		dots: false,
		responsiveClass: true,
		navText: [
			'<i class="fa-solid fa-angle-left"></i>',
			'<i class="fa-solid fa-angle-right"></i>',
		],
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 2,
			},
			767: {
				items: 2,
			},
			991: {
				items: 2,
			},
			1199: {
				items: 2,
			},
			1243: {
				items: 3,
			},
			1399: {
				items: 4,
			},
		},
	})
	
	//Deposit complate
	    // Number Active
	var qvalue = $(".quick-value h5");
	$(qvalue).on('click', function (e) {
		$(qvalue).removeClass('active');
		$(this).addClass('active');
		let cval = $(this).html();
		$("#dAmount, #amount").val('$'+cval+'.00');
	});
	//Deposit complate

	//Date Picker
	$(".datepicker").datepicker();
	//Date Picker

	//Magnifiq pupup
	$('.picture-btn').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
		}
	});

	$('.play-btn').magnificPopup({
		type: 'iframe',
		callbacks: {
			
			}
	});
	//Magnifiq pupup

	//Serach Popup
	$('#search').click(function() {
		$('.search-form').animate({right: 0}, 50);
		$('.search-popup').show();
		$('.search-bg').click(function() {
		  $('.search-popup').hide();
		  $('.search-form').animate({right: '-100%'}, 50);
		});
	  });
	//Serach Popup

	// Custom Dropdown
	let customDropdown = $('[data-set="custom-dropdown"]');
	let dropdownContent = $(".custom-dropdown__content");
	if (customDropdown || dropdownContent) {
		customDropdown.each(function () {
		$(this).on("click", function (e) {
			e.stopPropagation();
			$("body").toggleClass("custom-dropdown-open");
			dropdownContent.toggleClass("is-open");
		});
		});
		dropdownContent.each(function () {
		$(this).on("click", function (e) {
			e.stopPropagation();
		});
		});
		$(document).on("click", function () {
		$("body").removeClass("custom-dropdown-open");
		dropdownContent.removeClass("is-open");
		});
	}
	// Custom Dropdown End

	//porfile
	// const input = document.createElement('input');
	// 	input.type = 'file';
	// 	input.accept = 'image/*';
	// 	input.onchange = function () {
	// 	const reader = new FileReader();
	// 	reader.onload = function () {
	// 		document.getElementById('profile-picture').src = reader.result;
	// 	};
	// 	reader.readAsDataURL(input.files[0]);
	// 	};

	// 	document.getElementById('profile-picture').onclick = function () {
	// 	input.click();
	// };
	//porfile

	//Button Click
	// 	function handleClick(event) {
	// 	if (event.target.tagName !== "BUTTON") {
	// 	  return;
	// 	}
	// 	let buttonValue = event.target.innerText;
	// 	document
	// 	  .querySelector(".result")
	// 	  .innerText = buttonValue;
	//   }
	//   document
	// 	.querySelector(".buttons")
	// 	.addEventListener("click", handleClick);
	//Button Click
	
	// password hide
	$(".toggle-password, .toggle-password2, .toggle-password3, .toggle-password4, .toggle-password5, .toggle-password6, .toggle-password7, .toggle-password8, .toggle-password9, .toggle-password10").click(function() {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("id"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});



	// wow animation
	new WOW().init();
	// wow animation

	//preloader
	setTimeout(function(){
		$('.bg-load').fadeToggle();
	}, 1500);
	//preloader

	//--Nice Select--//
	$('select').niceSelect();
	
});


