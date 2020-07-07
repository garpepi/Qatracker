$(document).ready(function() {
var handleDataTableButtons = function() {
    if ($("#table1").length) {
    $("#table1").DataTable({
        dom: "Bfrtip",
        buttons: [
        ],
        responsive: true
    });
    }
    if ($("#table2").length) {
    $("#table2").DataTable({
        dom: "Bfrtip",
        buttons: [
        {
            extend: "copy",
            className: "btn-sm"
        },
        {
            extend: "csv",
            className: "btn-sm"
        },
        {
            extend: "excel",
            className: "btn-sm"
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm"
        },
        {
            extend: "print",
            className: "btn-sm"
        },
        ],
        responsive: true
    });
    }
	if ($("#table3").length) {
    $("#table3").DataTable({
        dom: "Bfrtip",
        buttons: [
		
        ],
        responsive: true
    });
    }
};

TableManageButtons = function() {
    "use strict";
    return {
    init: function() {
        handleDataTableButtons();
    }
    };
}();

$('#datatable').dataTable();
$('#datatable-keytable').DataTable({
    keys: true
});



var table = $('#datatable-fixed-header').DataTable({
    fixedHeader: true
});

TableManageButtons.init();
});

$(document).ready(function() {
	$('#plan_start_date').daterangepicker({
	  singleDatePicker: true,
	  timePicker12Hour: false,
	  timePicker: true,
	  timePickerIncrement: 1,
	  format: 'MM/DD/YYYY HH:mm:ss',
	  maxDate: new Date()
	}, function(start, end, label) {
	 // console.log(start.toISOString(), end.toISOString(), label);
	});
	
	$('#plan_end_date').daterangepicker({
	  singleDatePicker: true,
	  timePicker12Hour: false,
	  timePicker: true,
	  timePickerIncrement: 1,
	  format: 'MM/DD/YYYY HH:mm:ss',
	  maxDate: new Date()
	  
	}, function(start, end, label) {
	  //console.log(start.toISOString(), end.toISOString(), label);
	});
	
	$('#period_date').daterangepicker({
	  singleDatePicker: true,
	  format: 'YYYY-MM',
	  maxDate: new Date(),
	  showDropdowns: true
	}, function(start, end, label) {
	  //console.log(start.toISOString(), end.toISOString(), label);
	});
	
});

$('.confirmation').on('click', function () {
	return confirm('Are you sure?');
});


