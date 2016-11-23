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

$( "#admin_parent" ).click(function() {  
	if($('#admin_parent').is(':checked')){
		$('.admin_child').iCheck('check'); 	
	}else{
		$('.admin_child').iCheck('uncheck');
	}
});
$('.admin_child').on('ifChecked', function(event){ 
	if ($('.admin_child:checked').length != $('.admin_child').length) {
      $( "#admin_parent" ).prop( "checked", false );
    }else{
		$( "#admin_parent" ).prop( "checked", true );
	}
});
$('.admin_child').on('ifUnchecked', function () { 
	$( "#admin_parent" ).prop( "checked", false );
});

$( "#superadmin_parent" ).click(function() {  
	if($('#superadmin_parent').is(':checked')){
		$('.superadmin_child').iCheck('check'); 	
	}else{
		$('.superadmin_child').iCheck('uncheck');
	}

});
$('.superadmin_child').on('ifChecked', function(event){ 
	if ($('.superadmin_child:checked').length != $('.superadmin_child').length) {
      $( "#superadmin_parent" ).prop( "checked", false );
    }else{
		$( "#superadmin_parent" ).prop( "checked", true );
	}
});
$('.superadmin_child').on('ifUnchecked', function () { 
	$( "#superadmin_parent" ).prop( "checked", false );
});

$( "#tester_parent" ).click(function() {  
	if($('#tester_parent').is(':checked')){
		$('.tester_child').iCheck('check'); 	
	}else{
		$('.tester_child').iCheck('uncheck');
	}

});
$('.tester_child').on('ifChecked', function(event){ 
	if ($('.tester_child:checked').length != $('.tester_child').length) {
      $( "#tester_parent" ).prop( "checked", false );
    }else{
		$( "#tester_parent" ).prop( "checked", true );
	}
});
$('.tester_child').on('ifUnchecked', function () { 
	$( "#tester_parent" ).prop( "checked", false );
});
