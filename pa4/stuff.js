	var counter = 0;//counts all elements
	var title = "<title>Untitled Page</title>";
	var CSS = "<style>";
	var CSScounter = 0;
        var CSScounter2 = 0;
	var buttonCounter = 0;
	var listCounter = 0;
	var HTMLCounter =0;
	var imageCounter = 0;
	

	function LinkButton(){
		var newbutton = document.createElement('input');
		counter++;
		newbutton.id = counter;
		newbutton.setAttribute("class", "btn");
		newbutton.type = "button";
		newbutton.value = document.getElementById('buttonText').value;
		
		//this is intentional.  using the DOM model, newbutton.onclick expects a method
		//if we set it as an explicit string it will work in other files
		newbutton.setAttribute('onclick', "window.open('http://" + document.getElementById('buttonLink').value + "');");
		document.getElementById('webpage').appendChild(newbutton);
	}
	function HTML(){
		var newText = document.createElement('H4');
		counter++;
                newText.id = counter;
		var text = document.createTextNode(document.getElementById('HTMLText').value);
		newText.appendChild(text);
		document.getElementById('webpage').appendChild(newText);
		HTMLCounter++;
	}
	function LineBreak(){
		var br = document.createElement('br');
		counter++;
                br.id = counter;
                document.getElementById('webpage').appendChild(br);
		HTMLCounter++;
	}
	function Ordered(){
		var newList = document.createElement('ol');
		counter++;
                newList.id = counter;
		for (var i = 1; i <= document.getElementById('NumOrdered').value; i++){
			newList.appendChild(TakeListItem(i));
		}
		document.getElementById('webpage').appendChild(newList);
		listCounter++;
	}
	function unOrdered(){
                var newList = document.createElement('ul');
		counter++;
                newList.id = counter;
                for (var i = 1; i <= document.getElementById('NumunOrdered').value; i++){
                        newList.appendChild(TakeListItem(i));
                }
                document.getElementById('webpage').appendChild(newList);
		listCounter++;
        }
	function TakeListItem(i){ //taken from my pa2
		var value = prompt("Please enter the " + i + "th  member value");
		var newText = document.createElement('li');
		var text = document.createTextNode(value);
		newText.appendChild(text);
		return newText;	
	}
	function DeleteElement(){
		if(counter > 0){
			var DeadMan = document.getElementById(counter);
			var name = DeadMan.tagName.toLowerCase();
			if(name == "input"){
				buttonCounter--;
			}else if (name == "h4" || name == "br" || name == "h1" || name == "a"){
				HTMLCounter--;
			}else if (name == "ol" || name == "ul"){
				listCounter--;
			}else if (name == "img"){
				imageCounter--;
			}
			document.getElementById('webpage').removeChild(DeadMan);
			counter--;
		}
	}

	function OpenPage(){
		var myWindow=window.open("", "myWindow");//window.open('',"test");
		CSS += "XML{display:none;}</style>";
		myWindow.document.write(CSS);
		myWindow.document.write(title);
		myWindow.document.write(document.getElementById('webpage').innerHTML);
		myWindow.document.write(GenerateXML());
	}

	function GenerateXML(){
		var XML = "";
		XML += "<?xml version='1.0'?> <XML>";
		//here we go
		var date = new Date();
		XML += element("webpage",
			element("metadata",
				element("generator",
					element("created_by", "Sam Borick's Page Generator") +
					element("browser", navigator.userAgent) +
					element("time", date.getHours() + ":" + date.getMinutes()) +
					element("date", date.getDay() + "-" + date.getMonth() + "-" + date.getFullYear())
				)+
				element("page",
					element("counters",
						element("total", counter) +
						element("lists", listCounter) +
						element("buttons", buttonCounter) +
						element("CSS", CSScounter) +
						element("images", imageCounter) +
						element("HTML", HTMLCounter)
					)
				)
			)
		);
		XML += "</XML>";
		return XML;				
	}

	function element(name,content){
		var xml;
		if (!content){
			xml='<' + name + '/>';
		}
		else {
			xml='<'+ name + '>' + content + '</' + name + '>\n';
		}
		return xml;
	}

	function MakeLink(){
		var newLink = document.createElement('a');
                counter++;
                newLink.id = counter;
                var text = document.createTextNode(document.getElementById('linkText').value);
                newLink.appendChild(text);
		newLink.href = "http://" + document.getElementById('linkLink').value;
		HTMLCounter++;
	}

	function MakeImg(){
		var newImg = document.createElement('img');
                counter++;
                newImg.id = counter;
                newImg.src = document.getElementById('ImageLink').value;
		newImg.height = document.getElementById('ImageHeight').value;
		newImg.width = document.getElementById('ImageHeight').value;
                document.getElementById('webpage').appendChild(newImg);
		imageCounter++
	}
	
	
	function addProperty(){
		var div = document.createElement('div');
		div.style = "display:inline-block;";
		div.class = "css";
		//div.id = "css";
		div.id = CSScounter;

		var Prop = document.createElement('input');
		Prop.id = "Prop"+ CSScounter;
		Prop.type = "text";
		Prop.class = "form-control";
		Prop.placeholder = "Property";

		var Val = document.createElement('input');
		Val.id = "Val" + CSScounter;
                Val.type = "text";
		Val.class = "form-control";
                Val.placeholder = "Value";

		var col = document.createElement('b');
		col.innerHTML = ":";

		var br = document.createElement('br');
		br.id = "br" + CSScounter;

		var scol = document.createElement('b');
                scol.innerHTML = ";";
		CSScounter++;
		div.appendChild(Prop);
		div.appendChild(col);
		div.appendChild(Val);
		div.appendChild(scol);
		//div.appendChild(br);

		document.getElementById('CSSblock').appendChild(div);
	}

	function MakeCSS(){
		var selector = document.getElementById("CSSSelector");
		switch(selector.selectedIndex){
			case 0:
				CSS += "h4";
				break;
			case 1:
				CSS += "h1";
				break;
			case 2:
				CSS += "br";
				break;
			case 3:
                                CSS += "ol";
                                break;
			case 4:
                                CSS += "ul";
                                break;
			case 5:
                                CSS += "a";
                                break;
			case 6:
                                CSS += ".btn";
                                break;
			case 7:
                                CSS += "img";
                                break;
			default:
                                CSS += "unk";
		}
		CSS += "{";
		for(i=0; i < CSScounter; i++){
			CSS += document.getElementById('Prop' + i).value + ":" + document.getElementById('Val' + i).value + ";";
			document.getElementById('CSSblock').removeChild(document.getElementById(i));
		}
		CSS += "}";
		CSScounter2 = 0;
		CSScounter++;
	}

	function HTMLTitle(){
		var newText = document.createElement('H1');
                counter++;
                newText.id = counter;
                var text = document.createTextNode(document.getElementById('HTMLTitle').value);
                newText.appendChild(text);
                document.getElementById('webpage').appendChild(newText);
	}

	function RemoveCSS() {
		CSS = "<style";
		CSScounter = 0;
	}

	function PageTitle(){
		title = "<title>" + document.getElementById('PageTitle').value + "</title>";
	}
