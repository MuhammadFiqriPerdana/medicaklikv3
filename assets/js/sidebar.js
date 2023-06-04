jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});

});

function autoDeleteCookie(cookieName, expirationTime) {
  // Mengubah expirationTime menjadi milidetik
  var expirationMs = expirationTime * 1000;

  setTimeout(function() {
    document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }, expirationMs);
}

// Panggil fungsi autoDeleteCookie dengan nama cookie dan waktu kedaluwarsa (dalam detik)
autoDeleteCookie("cookieName", 1); // Contoh: Menghapus cookie setelah 60 detik