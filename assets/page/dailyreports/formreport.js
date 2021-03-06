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
	$(".select2_single_project").select2({
	  placeholder: "Select Project",
	  allowClear: true
	});
	$(".select2_single_projects").select2({
	  placeholder: "Select Application Name",
	  allowClear: true
	});
});

$(document).ready(function() {
	$('#actual_start_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#actual_start_doc_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
});


$(document).ready(function() {
	 //<!-- Select2 -->
	$(".select2_multiple").select2({
	  maximumSelectionLength: 10,
	  placeholder: "With Max Selection limit 10",
	  allowClear: true
	});
	//<!-- /Select2 -->
	$('#actual_end_doc_date').hide();
	$('#actual_end_date').hide();
	
	// Project
	function select_project(id){
	   var id = id;
	   $.ajax({
			type: "POST",
			url:'/dailyreports/get_projects',
			data: {
				akaridekoraskariosdekos: $.cookie('csrf_cookie_name'),
				id: id
			},
			success: function(data)
			{
				var json = JSON.stringify(data);
				var obj = JSON.parse(json);
				$("#project-desc").val(obj.project_desc);
				$("#TRF").val(obj.TRF);
				$("#trf-sum").val(obj.sum_TRF);
				$("#impact-app").val(obj.application_impacts);
				$("#type_of_change").val(obj.type_of_change);
				$("#plan_start_date").val(obj.plan_start_date);
				$("#plan_end_date").val(obj.plan_end_date);
				$("#plan_start_doc_date").val(obj.plan_start_doc_date);
				$("#plan_end_doc_date").val(obj.plan_end_doc_date);
				
				if(obj.actual_start_date != false){
					$("#actual_start_date").val(obj.actual_start_date);
					$("#actual_start_date").data('daterangepicker').remove();
					$("#actual_start_date").prop('readonly', true);
				}
				if(obj.actual_start_doc_date != false){
					$("#actual_start_doc_date").val(obj.actual_start_doc_date);		
					$("#actual_start_doc_date").data('daterangepicker').remove();					
					$("#actual_start_doc_date").prop('readonly', true);
				}
			}
		});
	}
	function daterangepicker_enabler(){
		$('#actual_start_date').daterangepicker({
		  singleDatePicker: true,
		  calender_style: "picker_4"
		}, function(start, end, label) {
		  console.log(start.toISOString(), end.toISOString(), label);
		});
		$('#actual_start_doc_date').daterangepicker({
		  singleDatePicker: true,
		  calender_style: "picker_4"
		}, function(start, end, label) {
		  console.log(start.toISOString(), end.toISOString(), label);
		});
	}
	$('#project').on('change', function() {
	  $("#actual_start_date").val('');
	  $("#actual_start_doc_date").val('');
	  $("#actual_start_date").prop('readonly', false);
	  $("#actual_start_doc_date").prop('readonly', false);
	  daterangepicker_enabler();
	  select_project(this.value);
	});
	
	
	$('#total_test_case').on('change', function() {
	  $("#total_test_case_assign").attr("max", $('#total_test_case').val());
	});
	
	$('#total_test_case_assign').on('change', function() {
	  $("#total_test_case_executed").attr("max", $('#total_test_case_assign').val());
	});
	
	
	$('#total_test_case_assign').on('change', function() {
	  var tc_assign = $("#total_test_case_assign").val();
	  var tc_executed = $("#total_test_case_executed").val();
	  var tc_outstanding = tc_assign - tc_executed;
	  $("#total_test_case_outstanding").val(tc_outstanding);
	});
	
	$('#total_test_case_executed').on('change', function() {
	  var tc_assign = $("#total_test_case_assign").val();
	  var tc_executed = $("#total_test_case_executed").val();
	  var tc_outstanding = tc_assign - tc_executed;
	  $("#total_test_case_outstanding").val(tc_outstanding);
	});

});

$( "#phase" ).change(function() {
  if($( "#phase" ).val() == 4)
  {
	$('#total_test_case_executed').attr('min', 1);
  }
  else{
	$('#total_test_case_executed').attr('min', 0);
  }
});
