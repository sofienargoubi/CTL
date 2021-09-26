$(function(){
  $('.record td').on('click', function(){
    $(this).parent('.record').next('.companion').toggle();
  })

});