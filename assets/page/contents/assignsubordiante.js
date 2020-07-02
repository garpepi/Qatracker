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

//<!-- Select2 -->
      $(document).ready(function() {
        $(".select2_multiple").select2({
      //    maximumSelectionLength: 10,
      //    placeholder: "With Max Selection limit 10",
      //    placeholder: "With Max Selection limit 10",
          allowClear: true
        });

      });
//<!-- /Select2 -->
