$(document).ready(function(){
	// $('.send-people-message').hide();
	$('.new-message').click(function(){
		var header = $('.event-one').is(":hidden");
		if (header) {
			$('.event-one').show();
			$('.send-people-message').hide();
		}else{
			$('.send-people-message').show();
			$('.event-one').hide();
		}
	});
	$('button.add-user').click(function(){
		console.log("cl");
	});

  $(".animsition").animsition({
    inClass: 'fade-in-left',
    outClass: 'fade-out-left',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
/**
*
* Below is the script for displaying video
* Before Upload
*
**/
 $('.upload-video').change(function(){
 	$('.video-container').show();
  	var $source = $('#v-upload');
	$source[0].src = URL.createObjectURL(this.files[0]);
	$source.parent()[0].load();
  });
/**
*
* Script for Upload Button click PopUp
* 
*
**/
$('.popclick').click(function(){
    $('.background-upload').show();
    $('.upload-form').show();
});
$('.background-upload').click(function(){
    $('.upload-form').hide();
    $('.background-upload').hide();
});

$('.fa-times-circle').click(function(){
    $('.upload-form').hide();
    $('.background-upload').hide();
});
/**
*
* Script for Uploading Photo
*
**/
function photoPreview(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#preview-photo').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".upload-photo").change(function() {
  photoPreview(this);
  $("#photo-preview-wrapper").show();
});

$('.remove-preview').click(function(){
  if ($('.upload-photo') != '' || $('.upload-video') == '') {
    $("#preview-photo").attr('src','#');  
    $('#preview-photo').hide();
  }else if ($('.upload-video' != '' || $('.upload-photo') == '' )) {
    $("#v-upload").attr('src','#');
  }
    // $("#photo-preview-wrapper").hide();
    // $("#preview-photo").closest('img').find()
});

/**
*
* Profile Mange Drop Down
*
**/
$('.p-').click(function(){
  $('.p-drp').slideToggle();
});

});