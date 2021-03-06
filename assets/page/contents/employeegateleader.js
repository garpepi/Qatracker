$(document).ready(function() {
var handleDataTableButtons = function() {
    if ($("#table1").length) {
    $("#table1").DataTable({
        dom: "Bfrtip",
        buttons: [
        {
            extend: "copy",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "csv",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "excel",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "print",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        ],
        responsive: true
    });
    }
	
    if ($("#table2").length) {
    console.log($("#table2").length);
	$("#table2").DataTable({
        dom: "Bfrtip",
        buttons: [
        {
            extend: "copy",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "csv",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "excel",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
        {
            extend: "print",
            className: "btn-sm",
            exportOptions: {
                columns: [ 0,1,2,3 ]
                }
        },
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

var rejectid = 0;
$('#reject').on('show.bs.modal', function (e) {
    rejectid = $(e.relatedTarget).attr('data-id');
});
 
$("#reject-confirm").click(function () {
	var reasons = $("#reason-overtime").val();
	console.log(reasons);
	window.location.href = "/employeegateleader/reject/"+rejectid+"/"+reasons;
});

function leavesrejects(id){
  var reasons = prompt("Please enter the reasons", "");
  window.location.href = "/employeegateleader/leavesreject/"+id+"/"+reasons;
}

$('.collapsed').css('height', 'auto');
$('.collapsed').find('.x_content').css('display', 'none');
$('.collapsed').find('i').toggleClass('fa-chevron-up fa-chevron-down');