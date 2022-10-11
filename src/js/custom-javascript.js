jQuery(document).ready(function($) {
    
var $ = jQuery;
//new WOW().init();   

$(document).on('click', 'a[href^="#"]:not([data-toggle="tab"],[data-toggle="dropdown"],[data-toggle="list"],[data-slide="prev"],[data-toggle="modal"],[data-slide="next"])', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top-100
    }, 1000);
});


(function($) {

  /**
   *  checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
})(jQuery);

$(function() {
    //caches a jQuery object containing the header element
    var header = $("#main-nav");

	    $(window).scroll(function() {
	    	var scroll = $(window).scrollTop();

		    if (scroll >= 68) {
		        header.addClass("header-scrolled");

		    } else {
		        header.removeClass("header-scrolled");
		    }
	    });
});

(function () {
  var notice, noticeId, storedNoticeId, dismissButton;
  notice = document.querySelector('.site-notice');

  if (!notice) {
    return;
  }

  dismissButton = document.querySelector('.site-notice-dismiss');
  noticeId = notice.getAttribute('data-id');
  storedNoticeId = localStorage.getItem('myThemeSiteNotice');

  // This means that the user hasn't already dismissed
  // this specific notice. Let's display it.
  if (noticeId !== storedNoticeId) {
    notice.style.display = 'block';
  }

  dismissButton.addEventListener('click', function () {
    // Hide the notice
    notice.style.display = 'none';

    // Add the current id to localStorage
    localStorage.setItem('myThemeSiteNotice', noticeId);
  });
}());

}); /* end of as page load scripts */
