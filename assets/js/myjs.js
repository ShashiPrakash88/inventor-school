$(function() {
  
  //Rearranging metaboxes
  function rearrange(element, before) {
    var element_class = '.listing-detail-menu .'+element;
    var before_class = '.listing-detail-menu .'+before;

    var element_id = '#'+element;
    var before_id = '#'+before;

    $(element_id).insertBefore(before_id);
    $(element_class).insertBefore(before_class);

  }

  rearrange('listing-detail-section-gallery','listing-detail-section-video');
  rearrange('listing-detail-section-basic_details','listing-detail-section-description');

  //$('.listing-detail-menu .listing-detail-section-basic_details').insertBefore('.listing-detail-menu .listing-detail-section-description');

  //changing one review... to Reviews
  $('.listing-detail-menu a[href=#listing-detail-section-reviews]').html('Reviews')

  //Removing extra contact, opening hours
  $('.listing-detail-section-contact').css('display','none')
  $('.listing-detail-section-opening-hours').css('display','none')

  //for controls of teacher's details
  $('.card-container > .prev').click(function() {
    var pos = $('.card-container > .cards').scrollLeft();
    $('.card-container > .cards').animate({scrollLeft : pos-200},300);
  });
  $('.card-container > .next').click(function() {
    var pos = $('.card-container > .cards').scrollLeft();
    $('.card-container > .cards').animate({scrollLeft : pos+200},300);
  });

  //for animating basic details
  function animate(i) {
    $('.tp').eq(i).tooltip('show');

    setTimeout(function() {
      $('.tp').eq(i).tooltip('hide');
    },1000);
  }
  
  var timeInt;
  var onScreenChecker;

  j=0; flg=0;
  function animateCtrl() {
    animate(j);
    j+=1;

    if(j>5)
      { clearInterval(timeInt); clearInterval(onScreenChecker); }
  }

  //for checking element is on screen
  $.fn.isOnScreen = function(){
    
    var win = $(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    bounds.top = bounds.top + this.outerHeight();
    
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
  };

  function startAni() {
    if($('.tp').isOnScreen())
      animateCtrl();
  }

  var onScreenChecker = setInterval(function() {
    startAni();
  },100);
  
  var clpOnScrTimer = setInterval(function() {
    if($('#clp1').isOnScreen()) {
      $('#clp1').click();
      clearInterval(clpOnScrTimer);
    }
  },2000);
  // //toggling funding and grants

  // $('.abc_title').mouseover(function() {
  //   $(this).children('.collapse').addClass('collapse_style');
  // });
  // $('.abc_title').mouseout(function() {
  //   $(this).children('.collapse').removeClass('collapse_style');
  // });

  // $(window).on('resize', function() {
  //   if ($(window).width() >= 768) {
  //     $('.abc_title').children('.collapse').addClass('in');
  //   }
  //   else {
  //     $('.abc_title').children('.collapse').removeClass('in');
  //   }
  // });

  // if($(window).width() >= 768) {
  //     $('.abc_title').children('.collapse').addClass('in');
  //   }
  // else{
  //     $('.abc_title').children('.collapse').removeClass('in');
  //   }

  setInterval(function(){
    if( $('#accordion .panel-collapse').hasClass('in') ){
      $('#accordion .panel-collapse.in').siblings('.panel-heading').find('i').removeClass('fa-plus').addClass('fa-minus');
    }
    else{
      $('#accordion .panel-collapse').siblings('.panel-heading').find('i').removeClass('fa-minus').addClass('fa-plus');
    }
  },10);
  
});
