$(document).ready(function(){
  $('.poke-button').click(function(event) {
    event.preventDefault();
    $(this).html('SENDING...');
    $.ajax({
      dataType: 'JSON',
      url: 'includes/sendmail.php',
      type: 'POST',
      data: {'id': $(this).attr('id')},
      beforeSend: function(xhr){
        // $('.poke-button').html('SENDING...');
      },
      success: function(response){
        if(response){
          console.log(response);
          if(response['signal'] == 'ok'){
            // $('#msg').html('<div class="alert alert-success">'+ response['msg']  +'</div>');
            // $('input, textarea').val(function() {
            //   return this.defaultValue;
            // });
          }
          else{
            // $('#msg').html('<div class="alert alert-danger">'+ response['msg'] +'</div>');
          }
        }
      },
      error: function(){
        $('#msg').html('<div class="alert alert-danger">Errors occur. Please try again later.</div>');
      },
      complete: function(){
        $('.poke-button').html('Poke');
      }
    });
  });
});
function update() {
  $.get("sendmail.php", function(data) {
    $("#poke-button").html(data);
    window.setTimeout(update, 1000);
  });
}
