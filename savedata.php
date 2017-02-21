
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Demo: Connecting DataGrid to a Store</title>

	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/resources/dojo.css" />
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dijit/themes/claro/claro.css" />
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojox/grid/resources/Grid.css" />
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojox/grid/resources/claroGrid.css" />
</head>
<body class="claro">
<h1>Demo: Connecting DataGrid to a Store</h1>
<p class="tip">This is a front-end code demonstration and is not connected to a server with data persistence, so while the code provided will work with a server that provides the appropriate REST API, clicking "Save" in this demo will not work.</p>

<div id="target-node-id"></div>
<button id="save">Save</button>
<button id="btnSave" type="button"></button>
<!-- load dojo and provide config via data attribute -->
<script src="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" ></script>
<script>
	require([
		"dojo/store/JsonRest",
		"dojo/store/Memory",
		"dojo/store/Cache",
		"dojox/grid/DataGrid",
		"dojo/data/ObjectStore",
		"dojo/query",
		"dijit/form/Button",'dojo/data/ItemFileWriteStore',
		"dojo/domReady!"
	], function(JsonRest, Memory, Cache, DataGrid, ObjectStore, query,Button,ItemFileWriteStore){
		var myStore, dataStore, grid;



		myStore = new Cache(JsonRest({target:"sasa.php"}), new Memory());

	//var store = new ItemFileWriteStore({url: "data.json"});

		grid = new DataGrid({
			store: dataStore = new ObjectStore({objectStore: myStore}),
			structure: [
				{name:"State Name", field:"name", width: "200px"},
				{name:"Abbreviation", field:"abbreviation", width: "200px", editable: true}
			]
		}, "target-node-id"); // make sure you have a target HTML element with this id
		grid.startup();
		query("#save").on("click", function(){
			dataStore.save();
		});

		var btnSave = new dijit.form.Button({
        label: "Save",
        onClick: function() {
            grid.store.save({onComplete: saveDone,onError: saveFailed});
        }
    }, "btnSave");

	});

function saveDone() {    alert("Done saving."); }
function saveFailed() {    alert("Save failed."); }
</script>
</body>
</html>
