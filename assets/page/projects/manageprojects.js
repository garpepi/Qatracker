$(document).ready(function() {
var handleDataTableButtons = function() {
    if ($("#table1").length) {
    $("#table1").DataTable({
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
	$(".select2_single_teamleader").select2({
	  placeholder: "Select Tester Name",
	  allowClear: true
	});
	$(".select2_single_application").select2({
	  placeholder: "Select Application Name",
	  allowClear: true
	});
	
	
});
$(document).ready(function() {
	$('#plan_start_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#plan_end_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#plan_start_doc_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#plan_end_doc_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
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
$('.confirmation').on('click', function () {
	return confirm('Are you sure?');
});

$('.drop_proj').on('click', function () {
	var url = $( this ).data( "url" );
	var id= $( this ).data( "id" );
	var reason = prompt("Please enter the Reason", "");
	if (reason === null) {
        return; //break out of the function early
    }
	if ($.trim(reason).length > 0) {
		window.location.href = url+id+'/'+reason;
	}else{
		alert('Reason cannot empty !   Action terminated.');
		
	}
});

$(document).ready(function(){
	var status_rad = $("input[type=radio][name='status']:checked").val();
	if(status_rad == 'drop'){
		$('#drop_reason').show();
	}else{
		$('#drop_reason').hide();
	}
});

$('.status').on('ifChecked', function(event){
  if($(this).val() == 'drop'){
	  $('#drop_reason').show();
  }else{
	  $('#drop_reason').hide();
  }
});



