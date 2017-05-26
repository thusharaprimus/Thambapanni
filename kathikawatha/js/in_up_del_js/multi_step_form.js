/*------------validation function-----------------*/
var count=0; // to count blank fields
function validation(event){
	

	//fetching all inputs with same class name text_field and an html tag textarea
	var input_field = document.getElementsByClassName('text_field');
	var text_area = document.getElementsByTagName('textarea');


	 var y = 0;


	//for loop to count blank inputs
	for(var i=input_field.length;i>count;i--){
	if(input_field[i-1].value==''|| text_area.value=='')
		{
			count = count + 1;

		}
	else{
			count = 0;
		}
	}

	
}
/*---------------------------------------------------------*/


//Function that executes on click of first next button

function next_step1(){
	document.getElementById("first").style.display="none";
	document.getElementById("second").style.display="block";

	}
	

//Function that executes on click of first previous button
function prev_step1(){
	document.getElementById("first").style.display="block";
	document.getElementById("second").style.display="none";


	}

//Function that executes on click of second next button
function next_step2(){
	document.getElementById("second").style.display="none";
	document.getElementById("third").style.display="block";

	}

//Function that executes on click of second previous button
 function prev_step2(){
	document.getElementById("third").style.display="none";
	document.getElementById("second").style.display="block";


	}