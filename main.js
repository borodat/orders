$(function () {
  var updateButtons = $("form input[type='submit']");
  
  $('form').submit(function(){
    var str = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'handler.php',
      data: str,
      success: function(data){
        updateButtons.attr('class', data);
      },
    });
  });
      
  
  $.ajax({
    type: 'POST',
    url: 'handler.php',
    success: function(data){
      updateButtons.attr('class', data);
    },
    error: function(){
      alert ('ERROR loading data');
    },
  });
    
});