$(document).ready(function(){

  // event ketika keyword ditulis
  $('.keyword-update').on('keyup', function(){

    // munculkan icon loading
    $('.loadd').show();

    // ajax menggunakan load
    // $('.kotakAjax').load('ajax/ajax.php?keyword=' + $('.keyword').val());
    $.get('../ajax/ajax-update.php?search=' + $('.tombol-cari-update').val());

    $.get('../ajax/ajax-update.php?keyword=' + $('.keyword-update').val(), function(data){

      $('.kotakAjax').html(data);
      $('.loadd').hide();

    });

  });


});