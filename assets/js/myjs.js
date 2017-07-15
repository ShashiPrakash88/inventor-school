$(function() {
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
    console.log(j);
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
    
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
  };

  function startAni() {
    if($('.tp').isOnScreen())
      animateCtrl();
  }

  var onScreenChecker = setInterval(function() {
    startAni();
  },100);
  

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
  

  // Changing the defaults
  
  // window.sr = ScrollReveal();

  // // Customizing a reveal set
  // sr.reveal('.tp',{
  //   duartion: 1000,
  //   origin: 'bottom',
  // });
  // $('.tp').removeAttr('data-sr-id').removeAttr('style');
});