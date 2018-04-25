$(document).ready(function() {	
	$('.btn-group-vertical').on('click', '.btn', function() {
		  $(this).addClass('active').siblings().removeClass('active');
		  var $change = $(this).attr('value');
	// 	  console.log($change);
		  $(this).siblings('input').attr('value', $change);
		//   console.log($(this).siblings('input'));
		});
		
	$( "#datepicker" ).datepicker({
	  	dateFormat: "yy-mm-dd",
		altField: "#date"
	 	});
	
//	//collect dropdown value on change and assign
//	$('.dropdown select').change(function() {
//	// console.log($(this));
//	var $status = $(this).val();
//	// console.log($status);
//	// console.log($('.dropdown input'));
//	// $(this).val($status);
//	$(this).siblings('input').val($status);
//	});
//	
	//collect dropdown value on change and assign
	$(document).on('change', '.dropdown select', function() { 
	//	console.log($(this));
		var $status = $(this).val();
		// console.log($status);
		// console.log($('.dropdown input'));
		// $(this).val($status);
		$(this).siblings('input').val($status);
	
		//check if the instructor 
	
	});
	
	//check form empty values in firstform
	$('#firstform').submit(function(evt) {
		var form = $(this); 
		var error = 0; 
		var dataArray = form.serializeArray(),
		    len = dataArray.length,
		    dataObj = {};
		
//		for (i=0; i<len; i++) {
//		  dataObj[dataArray[i].name] = dataArray[i].value;
//		  if (dataArray[i].value == "") {
////				console.log(dataArray[i].name);
////				console.log('it is null')
//				$('.' + dataArray[i].name + '.error').removeClass('hide');
//				error++;
//	//			console.log(error);
//				evt.preventDefault();
//			  } else {
//		 			$('.' + dataArray[i].name  + '.error').addClass('hide');
//		 			}
//		}
	});
	//
	//check type value of button
	$('#last button').click(function(evt) {
		var buttoncheck = $(this).attr('type');
		console.log(buttoncheck);
		
		if (buttoncheck == 'button') {
			//triggered when button is type=button
			//	evt.preventDefault();
				var form = $('form'); 
				var error = 0; 
				var dataArray = form.serializeArray(),
				    len = dataArray.length,
				    dataObj = {};
				
//				for (i=0; i<len; i++) {
//				  dataObj[dataArray[i].name] = dataArray[i].value;
//				  if (dataArray[i].value == "") {
////						console.log(dataArray[i].name);
////						console.log('it is null')
//						$('.' + dataArray[i].name + '.error').removeClass('hide');
//						error++;
//			//			console.log(error);
//					  } else {
//				 			$('.' + dataArray[i].name  + '.error').addClass('hide');
//				 			}
//				}
				
//				alert(dataObj['instructor']);
				console.log(form.serialize());
				if (error == 0) {
					$.ajax({
				        url: "http://localhost/pineknob/call/callForm", // Get the action URL to send AJAX to
				          type: "POST",
//				          dataType: 'json',
				          data: form.serialize(), // get all form variables
				          success: function(result){
				              $('#last').before(result);
//				        	  var obj = jQuery.parseJSON(result); // if using jquery
//
//				              console.log(obj.message);
				          }
				      });
				}
		}
		
		if (buttoncheck == 'submit') {
			//triggered when button is type=submit
				evt.preventDefault();
				var form = $('form'); 
				var error = 0; 
				var dataArray = form.serializeArray(),
				    len = dataArray.length,
				    dataObj = {};
				
//				for (i=0; i<len; i++) {
//				  dataObj[dataArray[i].name] = dataArray[i].value;
//				  if (dataArray[i].value == "") {
//						console.log(dataArray[i].name);
//						console.log('it is null')
//						$('.' + dataArray[i].name + '.error').removeClass('hide');
//						error++;
//						break;
//			//			console.log(error);
//					  } else {
//				 			$('.' + dataArray[i].name  + '.error').addClass('hide');
//				 			
//				 			}
//				}
				console.log(error);
				var checkArray = noneEmpty(dataObj);
				console.log(checkArray);
				if (error === 0) {
					form.submit();
					console.log('in the booper');
				}
				
		}
	});
	
	function noneEmpty(arr) {
		  for(var i=0; i<arr.length; i++) {
		    if(arr[i] === "") return false;
		  }
		  return true;
		}
	
});