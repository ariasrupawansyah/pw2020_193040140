// $ = JQuery
$(document).ready(function(){

  // event ketika keyword ditulis
  $('.keyword').on('keyup', function(){

    // munculkan icon loading
    $('.loadd').show();

    // ajax menggunakan load
    // $('.kotakAjax').load('ajax/ajax.php?keyword=' + $('.keyword').val());
    $.get('ajax/ajax.php?search=' + $('.tombol-cari').val());

    $.get('ajax/ajax.php?keyword=' + $('.keyword').val(), function(data){

      $('.kotakAjax').html(data);
      $('.loadd').hide();

    });

  });


});

// preview image untuk tambah dan ubah
function previewImage() {
  const gambar = document.querySelector('.gambarr');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFReader) {
    imgPreview.src = oFReader.target.result;
  }
}
