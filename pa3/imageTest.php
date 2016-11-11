<!DOCTYPE html>
<html>
  
<head>
<title>Move to Click Position</title>
<style type="text/css">
#contentContainer {
    position: fixed;
    top:0px;
    left: 0px;
    width: 100%;
    height: 100%;
    
/*
    border: 5px black solid;
    overflow: hidden;
    background-color: #F2F2F2;
    cursor: pointer;*/
}
#movingImg {
    position: relative;
    left: 50%;
    top: 0px;
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


 
<script>
var theThing = document.querySelector("#movingImg");
var container = document.querySelector("#contentContainer");

function MoveImage(){
	container.addEventListener("click", getClickPosition, false);
} 
 
function getClickPosition(e) {
    var parentPosition = getPosition(e.currentTarget);
    var xPosition = e.clientX - parentPosition.x - (theThing.clientWidth / 2);
    var yPosition = e.clientY - parentPosition.y - (theThing.clientHeight / 2);
     
    theThing.style.left = xPosition + "px";
    theThing.style.top = yPosition + "px";
}
 
// Helper function to get an element's exact position
function getPosition(el) {
  var xPos = 0;
  var yPos = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
      var yScroll = el.scrollTop || document.documentElement.scrollTop;
 
      xPos += (el.offsetLeft - xScroll + el.clientLeft);
      yPos += (el.offsetTop - yScroll + el.clientTop);
    } else {
      // for all other non-BODY elements
      xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPos += (el.offsetTop - el.scrollTop + el.clientTop);
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}
</script>
</body>
</html>
