// JavaScript Document

function makeTable(){
	var theTable =document.getElementById("tbl");
	//IE requires rows to be added to a tBody element
	//IE automatically creates a tBody element - delete it and then manually create
	if (theTable.firstChild != null){
		var badIEBody = theTable.childNodes[0];  
		theTable.removeChild(badIEBody);
	}
	var tBody = document.createElement("TBODY");
	theTable.appendChild(tBody);

	var newRow = document.createElement("tr");
	var c1 = document.createElement("td");
	var v1 = document.createTextNode("7308");
	c1.appendChild(v1);
	newRow.appendChild(c1);
	var c2 = document.createElement("td");
	var v2 = document.createTextNode("software engineering");
	c2.appendChild(v2);
	newRow.appendChild(c2);
	tBody.appendChild(newRow);

	newRow = document.createElement("tr");
	c1 = document.createElement("td");
	v1 = document.createTextNode("7003");
	c1.appendChild(v1);
	newRow.appendChild(c1);
	c2 = document.createElement("td");
	v2 = document.createTextNode("Web Development");
	c2.appendChild(v2);
	newRow.appendChild(c2);
	tBody.appendChild(newRow);
}

function appendRow() {

	// Elements from HTML
	var theTable = document.getElementById("tbl");
	var tBody = theTable.getElementsByTagName("tbody")[0];

	// New Row + Background Colour
	var newRow = document.createElement("tr");
	newRow.style.backgroundColor = "#90EE90";

	// User Prompts
	var code = prompt("Enter subject code:");
	var name = prompt("Enter subject name:");

	// Table cell - Subject Code
	var cell = document.createElement("td");
	var cellItem = document.createTextNode(code);
	cell.appendChild(cellItem);
	newRow.appendChild(cell);

	// Table cell - Subject Name
	var cellName = document.createElement("td");
	var cellNameItem = document.createTextNode(name);
	cellName.appendChild(cellNameItem);
	newRow.appendChild(cellName);

	// Add Cells to Table Body
	tBody.appendChild(newRow);
}
