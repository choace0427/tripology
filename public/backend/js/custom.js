(function ($) {
    "use strict";
    $('.editor').summernote({
        tabsize: 2,
        height: 300
    });
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#datepicker1" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#datepicker2" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy/mm/dd"
    });
    $( "#timepicker" ).timepicker();
    $('.select2').select2();
    $("#txtstartdate").datepicker({
        minDate: 0,
        onSelect: function(date) {
            $("#txtenddate").datepicker('option', 'minDate', date);
        }
    });

    $("#txtenddate").datepicker({});
})(jQuery);
