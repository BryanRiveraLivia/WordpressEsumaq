(function ($) {
  $(document).ready(function () {
    console.log("Theme SUMAQ activo");
    // Evento de clic para el botón
    $("#toggleMenu").on("click", function () {
      console.log("Botón clickeado");
      $("#menuMobile").toggleClass("-translate-x-full translate-x-0");
      $("body").addClass("overflow-hidden");
    });
    $(".overlayMenu").on("click", function () {
      $("#menuMobile")
        .removeClass("translate-x-0")
        .addClass("-translate-x-full");
      $("body").removeClass("overflow-hidden");
    });
  });
})(jQuery);
