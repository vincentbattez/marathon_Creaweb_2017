$(document).ready(function(){

  $('#search-btn').on('click', function(event){

    event.preventDefault();
    if( $('#search-btn').hasClass('search-form-visible') ) {
      $('#search-box').find('form').submit();
    } else {
      $('#search-btn').addClass('search-form-visible');
      $('#search-box').css('top','55px').css('visibility','visible').css('opacity','1');;
      $('#overlay').css('visibility','visible').css('opacity','1');
      $('#search-input').focus();
    }
  });

  $('#overlay').on('click',function () {
    $('#search-btn').removeClass('search-form-visible');
    $('#overlay').css('opacity','0').css('visibility','hidden');
    $('#search-box').css('top','-1px').css('opacity','0').css('visibility','hidden');
  });

  $('.modal-overlay').on('click',function () {
      closeIndexModal();
  });

  $('.close-error').on('click',function(){
    $(this).closest('.message').slideUp();
  });

  $(window).on('resize', function(){
    var fixedHeight = $('.modal-show').outerHeight();
    console.log(fixedHeight);
    $('.modal-holder').css("max-height", fixedHeight);
  });

  $('#last-stories').find('article').each(function(){
    console.log('lol');
  });

});
function openIndexModal(){
    $('#modal').css('visibility','visible');
    $('.modal-holder').addClass('modal-show');

    setTimeout(function(){
      var fixedHeighttest = $('.modal-show').outerHeight();
      console.log(fixedHeighttest);
      $('.modal-holder').css("max-height", fixedHeighttest);
    },500);

    $('#modal').css('opacity','1');
}
function closeIndexModal(){
    $('#modal').css('opacity','0').css('visibility','hidden');
    $('.modal-holder').removeClass('modal-show');
}
$(function() {
    var timer = !1;
    _Ticker = $("#tags").newsTicker();
    _Ticker.on("mouseenter", function() {
        var __self = this;
        timer = setTimeout(function() {
            __self.pauseTicker();
        }, 200);
    });
    _Ticker.on("mouseleave", function() {
        clearTimeout(timer);
        if (!timer) return !1;
        this.startTicker();
    });
});
