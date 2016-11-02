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

//operational
$('.confirmation').on('click', function () {
	return confirm('Are you sure?');
});

function submited() {
   if (confirm('Warning: You can be kickedout from this page if you remove Access Priviledge option! Do you still want to submit?')) {
	  $('#form1').submit();
   } else {
	   return false;
   }
}

$(".select2_multiple").select2({
  allowClear: true
});