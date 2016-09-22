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
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "csv",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "excel",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "print",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
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
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "csv",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "excel",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
                }
        },
        {
            extend: "print",
            className: "btn-sm",
            exportOptions: {
                columns: [ 1,2,3,4 ]
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

function goBack() {
    window.history.back();
}

window.onload = function () {
	document.getElementById("password").onchange = validatePassword;
	document.getElementById("confpassword").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("confpassword").value;
var pass1=document.getElementById("password").value;
if(pass1!=pass2)
	document.getElementById("confpassword").setCustomValidity("Passwords Don't Match");
else
	document.getElementById("confpassword").setCustomValidity('');	 
//empty string means no validation error
}