$(document).ready(function(){

  // event ketika keyword ditulis
  $('.keyword-list').on('keyup', function(){

    // munculkan icon loading
    $('.loadd').show();

    // ajax menggunakan load
    // $('.kotakAjax').load('ajax/ajax.php?keyword=' + $('.keyword').val());
    $.get('../ajax/ajax-list.php?search=' + $('.tombol-cari-list').val());

    $.get('../ajax/ajax-list.php?keyword=' + $('.keyword-list').val(), function(data){

      $('.kotakAjax').html(data);
      $('.loadd').hide();

    });

  });


});