<?php require "front_header.html"; ?>
<head>
<style type="text/css">

#contentContainer {
	width: 100%;
	height: 100%;
	position: fixed;
	top:0px;
	left: 0px;
}

#movingImg {
	position: relative;
	left: 50%;
	top: 0;
	transition: left .5s ease-in, top .5s ease-in;
}

</style>
</head>

	<body>
		 <div id = "contentContainer">
                <img id="movingImg" src="halbullet.png" >
                <p> factorial output: </p>
                <font id = "output"></font>

                <form>
                        Enter email:
                        <input id = "email1" type="text">
                        <input type="button" value="Validate" onClick="Validate();">
                        <font id = "email1Output"></font> <br>
                        Enter email:
                        <input id = "email2" onkeyup="SingleValidate();" type="text"> <br><br>


                </form>

                 <input id = "moveimg" value="ACTIVATE CLICK IMAGE TRACKING" onClick="MoveImage();" type="button">

                </div>

		

<SCRIPT LANGUAGE = "Javascript">
	function TakeInput(){
		var value = parseInt(prompt("Please enter a positive number", "8"));

		if (value != null) {
                	if (value < 0) {
                        	alert("The value you entered was negative");
				return TakeInput();
                	}
        	}else {
			alert("Please enter a value");
                        return TakeInput();
		}
		return value;	
	}
	function Factorial(input){
		if (input == 0 ){
			return 1;
		}else{
			var nextValue = input - 1;
	                var output = Factorial(nextValue);
		}
		return input * output;
	}
	var IsAfterAt = false;
	function SingleValidate(){
		var thisString = document.getElementById("email2").value;
		var thisChar = thisString[thisString.length -1];
		if (thisChar == "@"){
			if (IsAfterAt == true) {
				 alert("That Character is Invalid!");
			}else{
				IsAfterAT = true;
			}
		}else{
			if(!IsAfterAt){
				if(!IsValidChar(thisChar)){
					alert("That Character is Invalid!");
				}
				if (thisString[thisString.length -2] == "." && thisChar == "."){
					 alert("That Character is Invalid!");
				}
			}else{
				if (thisString[thisString.length -2] == "@" && thisChar == "-"){
					alert("That Character is Invalid!");
				}
				if(!IsValidDomainChar(thisChar)){
                                        alert("That Character is Invalid!");
                                }
			
			}
		}
	}


	var image = document.querySelector("#movingImg");
	var container = document.querySelector("#contentContainer");
	function MoveImage(){
		container.addEventListener("click", GetClickPosition, false);
		
	}

	function GetClickPosition(e){
		var parentPosition = GetPosition(e.currentTarget);
		var xPosition = e.clientX - parentPosition.x - (image.clientWidth / 2);
		var yPosition = e.clientY - parentPosition.y - (image.clientHeight / 2);
     
		image.style.left = xPosition + "px";
 		image.style.top = yPosition + "px";
	}

	function GetPosition(el) {
		var xPos = 0;
		var yPos = 0;
 
		while (el) {
			if (el.tagName == "BODY") {
				var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
				var yScroll = el.scrollTop || document.documentElement.scrollTop;
 	
				xPos += (el.offsetLeft - xScroll + el.clientLeft);
				yPos += (el.offsetTop - yScroll + el.clientTop);
			} else {
				xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
				yPos += (el.offsetTop - el.scrollTop + el.clientTop);
			}
 
			el = el.offsetParent;
  		}	
	  	return {x: xPos, y: yPos};
	}


	function Validate(){
		var email = document.getElementById("email1").value;
		var local = email.match(/.+(?=@)/);
		var newEmail = "";
		
		for (i = 0; i < local[0].length; i++) {
			//newEmail += local[0][i].strike();
			var output = !IsValidChar(local[0][i]);
			if (output){
				newEmail += local[0][i].strike();
			}else{
				newEmail += local[0][i];
			}
			
		}
		newEmail = CheckDoublePeriods(newEmail);
		
		var afterAt = email.substring(email.indexOf("@") + 1);
		var newAfter = "";
		var j = 0;
		if (afterAt[0] == "-"){
			newAfter += afterAt[0].strike(); //reeeealy hard to see, but not allowed
			j = 1;
                }
		
		
		for (j; j < afterAt.length; j++){
			var output = !IsValidDomainChar(afterAt[j]);
                        if (output){
                                newAfter += afterAt[j].strike();
                        }else{
                                newAfter += afterAt[j];
                        }
		}
			

		document.getElementById("email1Output").innerHTML = newEmail + "@" + newAfter;


	}
	
	function CheckDoublePeriods(newEmail){
		var doublePeriod = newEmail.indexOf("..");
                if (doublePeriod > 0){
                        var str1 = newEmail.substring(0, doublePeriod);
                        var offender = newEmail.substring(doublePeriod, doublePeriod + 2);
                        var str2 = newEmail.substring(doublePeriod + 2);
                        //newEmail = str1 + offender.strike() + str2;
                        return str1 + offender.strike() +  CheckDoublePeriods(str2);
                }else {
			return newEmail;
		}

	}

	function IsValidDomainChar(n){

		if (isNumeric(n)){
               	        return true;
                }
                if (isLetter(n)){
                        return true;
                }
                if (n.length === 1 && n.match(/[-]|[.]/)){
                        return true;
                }

                return false;
	}
	
	
	function IsValidChar(n){
	
		if (isNumeric(n)){
			return true;
		}
		if (isLetter(n)){
			return true;
		}
		if (isSpecial(n)){
			return true;
		}
	
		return false;
	}
	
	function isNumeric(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}
	
	function isLetter(n){
		return n.length === 1 && n.match(/[a-z]/i);
	}
	
	function isSpecial(n) {
		return n.length === 1 && n.match(/[{]|[}]|[!]|[#]|[$]|[%]|[&]|[']|[*]|[+]|[-]|[\/]|[=]|[?]|[\^]|[_]|[`]|[|]|[~]|[.]/);
		//most special characters are allowed in the local part of an email.  source: https://en.wikipedia.org/wiki/Email_address#Syntax
	}


	var val = TakeInput();

	var output = Factorial(val);

	document.getElementById("output").innerHTML = output;
	//note: many browsers limit the max font size so many large values look the same
	document.getElementById("output").size = output;
	
	if (output %2 == 0){
		 document.getElementById("output").color = "green";
	}else {
		 document.getElementById("output").color = "red";

	}

</SCRIPT>

	</body>
</html>
