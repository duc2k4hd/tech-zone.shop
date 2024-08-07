(function($) {
    "use strict";

    $('#basic-datatables').DataTable({
        pageLength: 5,
    }).search($this.value).draw();
})(jQuery);