<?php require 'front_header.html'; ?>
<style>
	.css {
		display:inline-block;
	}
</style>
	<body>

	<p class = "h1"> Sam Borick's Page Generator</p>
	<table class= "table table-bordered table-sm" style="width: 50%;">
			<thead>
				<tr>
					<th>Item</td>
					<th>Description</td>
					<th>Option</td>
					<th>Action</td>
				</tr>
			</thead>
			<tbody>

				<tr>
                                        <td>Page Title</td>
                                        <td>Sets the title at the top of the page</td>
                                        <td>
                                                <input type="text" class="form-control" value="Untitled Page" id="PageTitle">
                                        </td>
                                        <td>
                                                <input class="btn" id = "HTMLButton" value="Set" onClick="PageTitle();" type="button">
                                        </td>
                                </tr>

				 <tr>
                                        <td>HTML Title</td>
                                        <td>Adds HTML title</td>
                                        <td>
                                                <input type="text" class="form-control" placeholder="Text" id="HTMLTitle">
                                        </td>
                                        <td>
                                                <input class="btn" id = "HTMLButton" value="Add" onClick="HTMLTitle();" type="button">
                                        </td>
                                </tr>

				<tr>
					<td>HTML Text</td>
					<td>Adds HTML plaintext</td>
					<td>
						<input type="text" class="form-control" placeholder="Text" id="HTMLText">
					</td>
					<td>
						<input class="btn" id = "HTMLButton" value="Add" onClick="HTML();" type="button">
					</td>
				</tr>

				<tr>
					<td>HTML Line Break</td>
					<td>Adds HTML Line Break</td>
					<td>None</td>
					<td>
						<input class="btn" id = "Break" value="Add" onClick="LineBreak();" type="button">
					</td>
				</tr>
				
				<tr>
					<td>HTML Ordered List</td>
					<td>Adds an Ordered List</td>
					<td>
						<input type="number" class="form-control" placeholder="Number of list items" id="NumOrdered" min="0">
					</td>
					<td>
						<input class="btn" id = "Ordered" value="Add" onClick="Ordered();" type="button">
					</td>
				</tr>

				<tr>
					<td>HTML Unordered List</td>
					<td>Adds an Unordered List</td>
					<td>
						<input type="number" class="form-control" placeholder="Number of list items" id="NumunOrdered" min="0">
					</td>
					<td>
						<input class="btn" id = "unOrdered" value="Add" onClick="unOrdered();" type="button">
					</td>
				</tr>

				<tr>
                                        <td>HTML Link</td>
                                        <td>A Link</td>
                                        <td>
                                                <input type="text" class="form-control" placeholder="Link to open" id="linkLink">
                                                <input type="text" class="form-control" placeholder="Link Text" id="linkText">
                                        </td>
                                        <td>
                                                <input class="btn" id = "makeLink" value="Add" onClick="MakeLink();" type="button">
                                        </td>
                                </tr>


				<tr>
	        	                <td>Button Link</td>
        	        	        <td>A button that opens some link in a new tab</td>
	        	                <td>
						<input type="text" class="form-control" placeholder="Link to open" id="buttonLink">
						<input type="text" class="form-control" placeholder="Button Name" id="buttonText">
					</td>
					<td>
						<input class="btn" id = "linkButton" value="Add" onClick="LinkButton();" type="button">
					</td>
	                	</tr>

				<tr>
                                        <td>HTML Image</td>
                                        <td>An image</td>
                                        <td>
                                                <input type="text" class="form-control" placeholder="Image Link" id="ImageLink">
						<input type="number" class="form-control" placeholder="Height" id="ImageHeight" min="0">
						<input type="number" class="form-control" placeholder="Width" id="ImageWidth" min="0">
                                                
                                        </td>
                                        <td>
                                                <input class="btn" id = "makeImg" value="Add" onClick="MakeImg();" type="button">
                                        </td>
                                </tr>

				<tr>
                                        <td>CSS</td>
                                        <td>CSS style</td>
                                        <td>
						<label for="CSSSelector">CSS Selector</textarea>
						<select id="CSSSelector" class="form-control">
							<option>Text</option>
							<option>Title</option>
							<option>Line Break</option>
							<option>Ordered List</option>
							<option>Unordered List</option>
							<option>Link</option>
							<option>Button</option>
							<option>Image</option>
						</select> <p>{</p>
						<div id="CSSblock"></div>
						<br>
						<p>}</p>
						<input class="btn btn-block" type="button" value = "add Property:Value" onclick="addProperty();">
                                        </td>
                                        <td>
                                                <input class="btn" id = "makeCSS" value="Add" onClick="MakeCSS();" type="button">
						<br>
						<input class="btn" id = "makeCSS" value="Remove all CSS" onClick="RemoveCSS();" type="button">
                                        </td>
                                </tr>

		</tbody>
	</table>
	
	<br>

	<div class="panel panel-default" style="width: 50%;">
		<div class="panel-heading"><p class="h3">Your Page</p></div>
		<div id="webpage" class="panel-body"></div>
		<div class="panel-footer">
			<input class="btn-danger" id = "deleteButton" value="Delete last element" onClick="DeleteElement();" type="button">
			<input class="btn-primary" id = "linkButton" value="Open Page in new window" onClick="OpenPage();" type="button">
		</div>
	</div>
	<br>
	 <table class= "table table-bordered table-sm" style="width: 50%;">
                        <thead>
                                <tr>
                                        <th>Autogenerated XML Items</td>
                                </tr>
                        </thead>
                        <tbody>
				<td>Time generated</td>
				<td>Date generated</td>
				<td>who made the tool</td>
				<td>whatr browser was used</td>
				<td>total # of elements</td>
				<td># buttons</td>
				<td># HTML items</td>
				<td># lists</td>
				<td># css</td>
				<td># images</td>


<Script src="stuff.js"></Script>

	</body>
</html>
