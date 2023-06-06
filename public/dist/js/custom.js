(function($){

    "use strict";

    $(".inputtags").tagsinput('items');

    $(document).ready(function() {
        $('#example1').DataTable();
    });

    $('.icp_demo').iconpicker();

    $(document).ready(function() {
        $('.snote').summernote();
    });

    $('.datepicker').datepicker({ format: "dd/mm/yyyy" });
    $('.datepickerhour').datepickerhour({ format: "dd/mm/yyyy HH:mm" });
    $('.timepicker').timepicker({
        icons:
        {
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down'
        }
    });

    $(document).ready(function() {
        $('.select2Custom').select2();
    });

})(jQuery);
