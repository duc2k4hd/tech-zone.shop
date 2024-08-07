(function($) {
  "use strict";

  $("a[data-bs-toggle='collapse']").click(function(event) {
    event.preventDefault();
    var target = $(this).attr("href");
    $(target).toggleClass("show");
  });
})(jQuery);