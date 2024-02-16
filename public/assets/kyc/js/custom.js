"use strict";
$(document).ready(function(){
	$(".detail-edit").click(function(){
		$(".tab-bottom-blog").addClass("edit-open");
	});
	$(".humberger-icon").click(function(){
		$(".dash-section").toggleClass("sidebar-open");
	  });
	const swiper = new Swiper('.swiper', {
		loop: true,
		freeMode: true,
		pagination: {
		  el: '.external-pagination',
		  clickable: true,
		},
		breakpoints: {
			575: {
				slidesPerView: 1,
				spaceBetween: 0
			},
			600: {
				slidesPerView: 2,
				spaceBetween: 10
			},
			1000: {
				slidesPerView: 3,
				spaceBetween: 10
			},
			1299: {
				slidesPerView: 4,
				spaceBetween: 10
			}
		},
	});

	$( "#datepicker" ).datepicker({
		yearRange: "-100:+0",
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'yy-mm-dd',
		maxDate: 0,
	});

});
$(document).on('change', "#uploadidPic .input-file",function(e){
	if ($(this).val()) {
		var filename = $(this).val().split("\\");
		filename = filename[filename.length-1];
		$('#uploadidPic .image-name').text(filename);
	}
	var files = e.target.files;
	for (var i = 0; i < files.length; i++) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#previewImg1 img').attr('src', e.target.result);
			// $('#upload_submit').text('Submit');
			$('#upload_submit').html('Submit <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.29356 2.63052L4.17356 6.51052L0.29356 10.3905C-0.0964404 10.7805 -0.0964404 11.4105 0.29356 11.8005C0.68356 12.1905 1.31356 12.1905 1.70356 11.8005L6.29356 7.21052C6.68356 6.82052 6.68356 6.19052 6.29356 5.80052L1.70356 1.21052C1.31356 0.820519 0.68356 0.820519 0.29356 1.21052C-0.0864404 1.60052 -0.0964404 2.24052 0.29356 2.63052Z" fill="white"/> <path d="M6.87657 2.79434L10.7566 6.67434L6.87657 10.5543C6.48657 10.9443 6.48657 11.5743 6.87657 11.9643C7.26657 12.3543 7.89657 12.3543 8.28657 11.9643L12.8766 7.37434C13.2666 6.98434 13.2666 6.35434 12.8766 5.96434L8.28657 1.37434C7.89657 0.984337 7.26657 0.984337 6.87657 1.37434C6.49657 1.76434 6.48657 2.40434 6.87657 2.79434Z" fill="white"/></svg>');
			$('#upload_submit').addClass('submit_btn');
			
			
		};
		reader.readAsDataURL(files[i]);
	}
});
$(document).on('change', "#uploadfacepic .input-file",function(e){
	if ($(this).val()) {
		var filename = $(this).val().split("\\");
		filename = filename[filename.length-1];
		$('#uploadfacepic .image-name').text(filename);
	}
	var files = e.target.files;
	for (var i = 0; i < files.length; i++) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#previewImg2 img').attr('src', e.target.result);
			$('#upload_submit2').html('Submit <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.29356 2.63052L4.17356 6.51052L0.29356 10.3905C-0.0964404 10.7805 -0.0964404 11.4105 0.29356 11.8005C0.68356 12.1905 1.31356 12.1905 1.70356 11.8005L6.29356 7.21052C6.68356 6.82052 6.68356 6.19052 6.29356 5.80052L1.70356 1.21052C1.31356 0.820519 0.68356 0.820519 0.29356 1.21052C-0.0864404 1.60052 -0.0964404 2.24052 0.29356 2.63052Z" fill="white"/> <path d="M6.87657 2.79434L10.7566 6.67434L6.87657 10.5543C6.48657 10.9443 6.48657 11.5743 6.87657 11.9643C7.26657 12.3543 7.89657 12.3543 8.28657 11.9643L12.8766 7.37434C13.2666 6.98434 13.2666 6.35434 12.8766 5.96434L8.28657 1.37434C7.89657 0.984337 7.26657 0.984337 6.87657 1.37434C6.49657 1.76434 6.48657 2.40434 6.87657 2.79434Z" fill="white"/></svg>');
			$('#upload_submit2').addClass('submit_btn');
		};
		reader.readAsDataURL(files[i]);
	}
});
$(document).on('change', "#uploadaddproof .input-file",function(e){
	if ($(this).val()) {
		var filename = $(this).val().split("\\");
		filename = filename[filename.length-1];
		$('#uploadaddproof .image-name').text(filename);
	}
	var files = e.target.files;
	for (var i = 0; i < files.length; i++) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#previewImg3 img').attr('src', e.target.result);
			$('#upload_submit3').html('Submit <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.29356 2.63052L4.17356 6.51052L0.29356 10.3905C-0.0964404 10.7805 -0.0964404 11.4105 0.29356 11.8005C0.68356 12.1905 1.31356 12.1905 1.70356 11.8005L6.29356 7.21052C6.68356 6.82052 6.68356 6.19052 6.29356 5.80052L1.70356 1.21052C1.31356 0.820519 0.68356 0.820519 0.29356 1.21052C-0.0864404 1.60052 -0.0964404 2.24052 0.29356 2.63052Z" fill="white"/> <path d="M6.87657 2.79434L10.7566 6.67434L6.87657 10.5543C6.48657 10.9443 6.48657 11.5743 6.87657 11.9643C7.26657 12.3543 7.89657 12.3543 8.28657 11.9643L12.8766 7.37434C13.2666 6.98434 13.2666 6.35434 12.8766 5.96434L8.28657 1.37434C7.89657 0.984337 7.26657 0.984337 6.87657 1.37434C6.49657 1.76434 6.48657 2.40434 6.87657 2.79434Z" fill="white"/></svg>');
			$('#upload_submit3').addClass('submit_btn');
		};
		reader.readAsDataURL(files[i]);
	}
});
$(document).ready(function(){
	// $(".nextstepbtn").click(function(){
	//   var button = $(this);
	//   var currentSection = button.parents(".tab-pane");
	//   var currentSectionIndex = currentSection.index();
	//   var headerSection = $('.nav-tabs li').eq(currentSectionIndex);
	//   currentSection.removeClass("active").next().addClass("active");
	//   currentSection.removeClass("show").next().addClass("show");
	//   headerSection.removeClass("active").next().addClass("active");
  
	//   if(currentSectionIndex === 4){
	// 	$(document).find(".tab-bottom-blog .tab-pane").first().addClass("active");
	// 	$(document).find(".nav-tabs li").first().addClass("active");
	//   }
	// });
	// $(".stepback-btn").click(function(){
	// 	var button = $(this);
	// 	var currentSection = button.parents(".tab-pane");
	// 	var currentSectionIndex = currentSection.index();
	// 	var headerSection = $('.nav-tabs li').eq(currentSectionIndex);
	// 	currentSection.removeClass("active").prev().addClass("active");
	// 	currentSection.removeClass("show").prev().addClass("show");
	// 	headerSection.removeClass("active").prev().addClass("active");
	
	// 	if(currentSectionIndex === 4){
	// 	  $(document).find(".tab-bottom-blog .tab-pane").first().addClass("active");
	// 	  $(document).find(".nav-tabs li").first().addClass("active");
	// 	}
	// });
	
	$('.from_code').select2({
		templateResult: formatState,
		templateSelection: formatStateSelection
	});
	$('.from_code2').select2({
		templateResult: formatState,
		templateSelection: formatStateSelection
	});
});
function formatState(state) {
	if (!state.id) {
		return state.text;
	}
	var $state = $(
		'<span class="topd-img flag-img"><img src="' + $(state.element).attr('data-src') + '" class="img-flag" /> ' + state.text + '</span>'
	);
	return $state;
};
function formatStateSelection(state) {
	if (!state.id) {
		return state.text;
	}
	var $state = $(
		'<span class="topf-img flag-img"><img src="' + $(state.element).data('src') + '" class="img-flag" /> ' + state.text + '</span>'
	);
	return $state;
}

function showloader(){
	$('.pageloader').removeClass('d-none');
}

function hideloader(){
	$('.pageloader').addClass('d-none');
}
