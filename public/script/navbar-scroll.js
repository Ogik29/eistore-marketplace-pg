//  menggukanan jquery
$(function () {
  $(document).scroll(function () {
    // saat document atau halaman ini di scroll maka jalankan fungsi
    var $nav = $('.navbar-fixed-top');
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    // untuk mendeteksi jika pada saat mengscroll apakah posisi $(this).scrollTop() lebih panjang dari $nav.height() atau tidak
  });
});
