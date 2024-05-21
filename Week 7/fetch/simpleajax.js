// file simpleajax.js
// var xhr = createRequest();

// GET METHOD:
// function getData(dataSource, divID, aName, aPwd)  {
//
// 	var place = document.getElementById(divID);
// 	var url = dataSource+"?name="+aName+"&pwd="+aPwd;
//
// 	const requestPromise = fetch(url);
// 	requestPromise.then(
// 		function (response){
// 			response.text().then(function(text) {
// 				place.innerHTML = text;
// 			});
//
// 		}
// 	);
// }

// POST METHOD
var xhr = createRequest();

function getData(dataSource, divID, aName, aPwd) {
	if (xhr) {
		var obj = document.getElementById(divID);
		// Creates RequestBody to hold encoded data
		var requestBody = "name=" + encodeURIComponent(aName) + "&pwd=" + encodeURIComponent(aPwd);

		xhr.open("POST", dataSource, true);

		// Sets Request headers
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4 && xhr.status === 200) {
				obj.innerHTML = xhr.responseText;
			}
		}
		// Finally send request Body!
		xhr.send(requestBody);
	}
}
