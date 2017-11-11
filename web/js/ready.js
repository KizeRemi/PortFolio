(function() {

  "use strict";

  var toggles = document.querySelectorAll(".display");
  var icon = document.querySelectorAll(".c-hamburger");
  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  };

  function toggleHandler(toggle) {
    toggle.addEventListener( "click", function(e) {
      $(this).toggleClass('active');
      $('.pushmenu-push').toggleClass('pushmenu-push-toright');
      $menuLeft.toggleClass('pushmenu-open');
      e.preventDefault();
      (icon[0].classList.contains("is-active") === true) ? icon[0].classList.remove("is-active") : icon[0].classList.add("is-active");
    });
  }

})();

$(document).ready(function() {
    $menuLeft = $('.pushmenu-left');
    $nav_list = $('#nav_list');
    var nav = $('#nav-menu');
    var num = $('#nav-menu').offset().top;
    $(window).scroll(function () {
        if ($(this).scrollTop() > num) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
});