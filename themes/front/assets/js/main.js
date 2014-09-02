// Google WebFont
WebFont.load({
  google: { families: [ 
    'Roboto+Slab:400,700:latin',
    'Open+Sans:400,700,400italic,700italic:latin'
  ] }
});


// Center jumbotron text
function center_jumbotron() {
  var y = $('.jumbotron').outerHeight(),
  inner = $('.container').outerHeight();

  $('.jumbotron').css('paddingTop', (y - inner) / 2);
}

$.fn.equalHeight = function(height) {
  el = $(this);
  elHeight =  el.height();
  el.each(function(index) {
    if (elHeight < $(this).height()  && el.length > 1){
      elHeight = $(this).height();
    }
    else {
    }
  });
  return this.each(function() {
    $(this).css('height', elHeight + 35);
  });
};

$.fn.accordion = function() {
  el = $(this);

  el.each(function() {
    var elToggler = $(this).children('*:even'),
        elContent = $(this).children('*:odd');

    elToggler.click(function() {
      if( !$(this).hasClass('current') ) {
        $(this).siblings().removeClass('current');
        $(this).addClass('current');
        elContent.slideUp();
        $(this).next().slideDown();
      }
      return false;
    });

    elContent.hide();

  });

  return this;
};


$(document).ready(function() {
  
  $('.accordion').accordion();

  Dropzone.autoDiscover = false;
  
  $('#photosUpload').dropzone({ url: '/' });

});

// window load
$(window).load(function() {

  center_jumbotron();

  $('.shop-content > div').equalHeight();

  $('.dashboard-menu').stick_in_parent({
    parent: '.page-dashboard'
  });

});

