jQuery(function() {
  
  //Rearranging metaboxes
  function rearrange(element, before, ch) {
    var element_class = '.listing-detail-menu .'+element;
    var before_class = '.listing-detail-menu .'+before;

    var element_id = '#'+element;
    var before_id = '#'+before;

    if(ch=='before') {
      jQuery(element_id).insertBefore(before_id);
      jQuery(element_class).insertBefore(before_class);
    }
    else {
      jQuery(element_id).insertAfter(before_id);
      jQuery(element_class).insertAfter(before_class);
    }
    
  }

  rearrange('listing-detail-section-gallery','listing-detail-section-contact_us','after');
  rearrange('listing-detail-section-basic_details','listing-detail-section-description','before');

  //jQuery('.listing-detail-menu .listing-detail-section-basic_details').insertBefore('.listing-detail-menu .listing-detail-section-description');

  //changing one review... to Reviews
  jQuery('.listing-detail-menu a[href=#listing-detail-section-reviews]').html('Reviews')

  //Removing extra contact, opening hours
  jQuery('.listing-detail-section-contact').css('display','none')
  jQuery('.listing-detail-section-opening-hours').css('display','none')

  //for controls of teacher's details
  jQuery('.card-container > .prev').click(function() {
    var pos = jQuery('.card-container > .cards').scrollLeft();
    jQuery('.card-container > .cards').animate({scrollLeft : pos-200},300);
  });
  jQuery('.card-container > .next').click(function() {
    var pos = jQuery('.card-container > .cards').scrollLeft();
    jQuery('.card-container > .cards').animate({scrollLeft : pos+200},300);
  });

  //for animating basic details
  function animate(i) {
    jQuery('.tp').eq(i).tooltip('show');

    setTimeout(function() {
      jQuery('.tp').eq(i).tooltip('hide');
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
  jQuery.fn.isOnScreen = function(){
    
    var win = jQuery(window);
    
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
    if(jQuery('.tp').isOnScreen())
      animateCtrl();
  }

  var onScreenChecker = setInterval(function() {
    startAni();
  },100);
  
  var clpOnScrTimer = setInterval(function() {
    if(jQuery('#clp1').isOnScreen()) {
      jQuery('#clp1').click();
      clearInterval(clpOnScrTimer);
    }
  },2000);
  // //toggling funding and grants

  // jQuery('.abc_title').mouseover(function() {
  //   jQuery(this).children('.collapse').addClass('collapse_style');
  // });
  // jQuery('.abc_title').mouseout(function() {
  //   jQuery(this).children('.collapse').removeClass('collapse_style');
  // });

  // jQuery(window).on('resize', function() {
  //   if (jQuery(window).width() >= 768) {
  //     jQuery('.abc_title').children('.collapse').addClass('in');
  //   }
  //   else {
  //     jQuery('.abc_title').children('.collapse').removeClass('in');
  //   }
  // });

  // if(jQuery(window).width() >= 768) {
  //     jQuery('.abc_title').children('.collapse').addClass('in');
  //   }
  // else{
  //     jQuery('.abc_title').children('.collapse').removeClass('in');
  //   }

  setInterval(function(){
    if( jQuery('#accordion .panel-collapse').hasClass('in') ){
      jQuery('#accordion .panel-collapse.in').siblings('.panel-heading').find('i').removeClass('fa-plus').addClass('fa-minus');
    }
    else{
      jQuery('#accordion .panel-collapse').siblings('.panel-heading').find('i').removeClass('fa-minus').addClass('fa-plus');
    }
  },10);
  
});
