(function($) {
    "use strict";

    $('#product-table').DataTable({
        pageLength: 5,
    }).search($this.value).draw();
})(jQuery);