function HideBallroom(){
	$('#dropdownMenu4').removeClass('hidden');
	$('#dropdownMenu5').removeClass('hidden');
	$('#dropdownMenu6').removeClass('hidden');
	$('#dropdownDesc4').removeClass('hidden');
	$('#dropdownDesc5').removeClass('hidden');
	$('#dropdownDesc6').removeClass('hidden');
	document.getElementById("dropdownMenu4").style.visibility="visible";
	document.getElementById("dropdownMenu5").style.visibility="visible";
	document.getElementById("dropdownMenu6").style.visibility="visible";
	document.getElementById("dropdownMenu4").disabled=false;
	document.getElementById("dropdownMenu5").disabled=false;
	document.getElementById("dropdownMenu6").disabled=false;

	document.getElementById("dropdownDesc4").style.visibility="visible";
	document.getElementById("dropdownDesc5").style.visibility="visible";
	document.getElementById("dropdownDesc6").style.visibility="visible";
	//console.log("showing latin");
	
	document.getElementById("dropdownMenu1").style.visibility="hidden";
	document.getElementById("dropdownMenu2").style.visibility="hidden";
	document.getElementById("dropdownMenu3").style.visibility="hidden";
	document.getElementById("dropdownMenu1").disabled=true;
	document.getElementById("dropdownMenu2").disabled=true;
	document.getElementById("dropdownMenu3").disabled=true;

	document.getElementById("dropdownDesc1").style.visibility="hidden";
	document.getElementById("dropdownDesc2").style.visibility="hidden";
	document.getElementById("dropdownDesc3").style.visibility="hidden";
	//console.log("hiding ballRoom"); 

	}

function HideLatin(){
	$('#dropdownMenu1').removeClass('hidden');
	$('#dropdownMenu2').removeClass('hidden');
	$('#dropdownMenu3').removeClass('hidden');
	$('#dropdownDesc1').removeClass('hidden');
	$('#dropdownDesc2').removeClass('hidden');
	$('#dropdownDesc3').removeClass('hidden');
	document.getElementById("dropdownMenu1").style.visibility="visible";
	document.getElementById("dropdownMenu2").style.visibility="visible";
	document.getElementById("dropdownMenu3").style.visibility="visible";
	document.getElementById("dropdownMenu1").disabled=false;
	document.getElementById("dropdownMenu2").disabled=false;
	document.getElementById("dropdownMenu3").disabled=false;
	
	document.getElementById("dropdownDesc1").style.visibility="visible";
	document.getElementById("dropdownDesc2").style.visibility="visible";
	document.getElementById("dropdownDesc3").style.visibility="visible";
	//console.log("showing ballroom");
	
	document.getElementById("dropdownMenu4").style.visibility="hidden";
	document.getElementById("dropdownMenu5").style.visibility="hidden";
	document.getElementById("dropdownMenu6").style.visibility="hidden";
	document.getElementById("dropdownMenu4").disabled=true;
	document.getElementById("dropdownMenu5").disabled=true;
	document.getElementById("dropdownMenu6").disabled=true;

	document.getElementById("dropdownDesc4").style.visibility="hidden";
	document.getElementById("dropdownDesc5").style.visibility="hidden";
	document.getElementById("dropdownDesc6").style.visibility="hidden";


	//console.log("hiding latin");
			
}

