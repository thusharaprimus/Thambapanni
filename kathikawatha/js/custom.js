
$('#clock').countdown('2016/12/14').on('update.countdown', function(event) {
  var $this = $(this).html(event.strftime(''
   
    + 'දින <span>%-d</span>&nbsp;&nbsp;&nbsp;'
    + 'පැය <span>%H</span>&nbsp;&nbsp;&nbsp;'
    + 'මිනිත්තු<span>%M</span>&nbsp;&nbsp;&nbsp;'
    + 'තත්පර <span>%S</span> '));
});
     
	$("#buy-btn").click(function() {
		$('html, body').animate({
			scrollTop: $("#buy-div").offset().top
		}, 2000);
	});

	function toggleVideo(e, state) {
		var div = $(e.target)[0];
		var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
		div.style.display = state == 'hide' ? 'none' : '';
		func = state == 'hide' ? 'pauseVideo' : 'playVideo';
		iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
	}

	$(document).on('opening', '.remodal', function(e) {
		toggleVideo(e);
	});

	$(document).on('closing', '.remodal', function(e) {
		toggleVideo(e, 'hide');
	});
	
	$(window).scroll(function(){
	//alert("working!");
		if($("#backgroundaudio").is(".audio-click")){
			$("#backgroundaudio").removeClass("audio-click");
		}
	});
	
	$(".audio-tog").click(function(){
		$("#backgroundaudio").toggleClass('audio-click');
	});


$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});