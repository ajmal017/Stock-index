$(document).ready(function()
{

	(function (){
	 	validate();
	    $('#fromyear, #frommonth, #fromday, #toyear, #tomonth, #today').change(validate);
		})();


	    function validate(){
		    if ($('#fromyear').val().length   >   0   &&
		        $('#frommonth').val().length  >   0 &&
		        $('#fromday').val().length   >   0   &&
		        $('#toyear').val().length  >   0 &&
		        $('#tomonth').val().length   >   0   &&
		        $('#today').val().length  >   0 &&
		        ($('#userstocks').is(' :checked') ||
		        $('#energy').is(' :checked'))) 
		    {	    	
		        $("input[type=submit]").prop("disabled", false);
		    	$(':submit').html('');	
		    }

		    else 
		    {
		        $("input[type=submit]").prop("disabled", true);
		    }
		}

	//radio button validation	
	$('input:radio[name=stocks]').on('change', function (){
		if($('#userstocks').is(' :checked'))
	    {
	    	$("input[type=submit]").prop("disabled", true);
	    	$(':submit').html('');
			$('#symbol').on('keyup', function()
			{				
	        	validate();
	    		
	    	});	
		}
		
		else
		{
			$('#symbol').val('');
			 validate();
		}



	});


		year= new Date();
		year=year.getFullYear();


	//from year validation
	$('#fromyear').on('focusout', function(){

		if ($('#toyear').val()!=="")
		{
			if (($('#fromyear').val() > $('#toyear').val())||$('#fromyear').val() > year || $.isNumeric($('#fromyear').val())!==true)
			{
				$("input[type=submit]").prop("disabled", true);
				$('#error').html("<h4> Please check year and try again</h4>").hide().fadeIn(600);
			}
		}

		else if($('#fromyear').val() > year || $.isNumeric($('#fromyear').val())!==true)
		{
			$("input[type=submit]").prop("disabled", true);
			$('#error').html("<h4> Please check year and try again</h4>").hide().fadeIn(600);
		}


		else 
		{
			validate();
			$('#error').fadeOut(600).empty();
		}

	});


	//from month validation
	$('#frommonth').on('focusout', function(){
		if ( $('#frommonth').val() > 12 || $('#frommonth').val()<1 || $.isNumeric($('#frommonth').val())!==true)
		{	
			$("input[type=submit]").prop("disabled", true);
			$('#error').html("<h4> Please check month and try again</h4>").hide().fadeIn(600);
		}
		else 
		{
			validate();
			$('#error').fadeOut(600).empty();
		}

	});

	//from day validation
	$('#fromday').on('focusout', function(){
		if ( $('#fromday').val() > 31 || $('#fromday').val()<1 ||$.isNumeric($('#fromday').val())!==true)
		{
			$("input[type=submit]").prop("disabled", true);
			$('#error').html("<h4> Please check day and try again</h4>").hide().fadeIn(600);
		}

		else 
		{
			validate();
			$('#error').fadeOut(600).empty();
		}

	});


	//to month validation
	$('#tomonth').on('focusout', function(){
		if ( $('#tomonth').val() > 12 || $('#tomonth').val()<1 ||$.isNumeric($('#tomonth').val())!==true)
		{
			$("input[type=submit]").prop("disabled", true);
			$('#error').html("<h4> Please check month and try again</h4>").hide().fadeIn(600);
		}

		else 
		{
			validate();
			$('#error').fadeOut(600).empty();
		}

	});




	//to day validation
	$('#today').on('keyup', function(){
		if ( $('#today').val() > 31 || $('#today').val()<1 ||$.isNumeric($('#today').val())!==true)
		{
			$("input[type=submit]").prop("disabled", true);
			$('#error').html("<h4> Please check day and try again</h4>").hide().fadeIn(600);
		}

		else 
		{
			validate();
			$('#error').fadeOut(600).empty();
		}

	});




	//to year validation
	$('#toyear').on('focusout', function(){	
		if ( ($('#fromyear').val() > $('#toyear').val()) || ( $('#toyear').val() > year ) ||$.isNumeric($('#toyear').val())!==true)
		{
			$("input[type=submit]").prop("disabled", true);
			$('#error').html("<h4> Please check year and try again</h4>").hide().fadeIn(600);
		}

		else 
		{
			validate();
			$('#error').fadeOut(600).empty();
		}

	});


});
