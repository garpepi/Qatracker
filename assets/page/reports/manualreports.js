$(document).ready(function() {
	$('#start_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
	$('#end_date').daterangepicker({
	  singleDatePicker: true,
	  calender_style: "picker_4"
	}, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
});
//<!-- Select2 -->
$(document).ready(function() {
	$(".select2_multiple").select2({
	  maximumSelectionLength: 10,
	  placeholder: "With Max Selection limit 10",
	  allowClear: true
	});

});
//<!-- /Select2 -->
var clickCheckboxUser = document.querySelector('#user-switch')
  , clickButtonUser = document.querySelector('#user-switch');

clickButtonUser.addEventListener('click', function() {
	if(clickCheckboxUser.checked == true){
		$("#users").attr("disabled", true);		
	}else{
		$("#users").attr("disabled", false);	
	}
});
var clickCheckboxDate = document.querySelector('#date-switch')
  , clickButtonDate = document.querySelector('#date-switch');

clickButtonDate.addEventListener('click', function() {
	if(clickCheckboxDate.checked == true){
		$("#daterange").attr("disabled", true);
	}else{
		$("#daterange").attr("disabled", false);	
	}
});

$(document).ready(function() {
	$('#daterange').daterangepicker(null, function(start, end, label) {
	  console.log(start.toISOString(), end.toISOString(), label);
	});
});

