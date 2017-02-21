<html>
<head>
<title>Fun with Source!</title>
<style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";


      #source1{
width: 200px;
background-color: red;
border: 1px solid red;

      }


      #source3{
width: 200px;
background-color: green;
border: 1px solid green;

      }
      </style>

<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
</script>
<script type="text/javascript">
dojo.require("dojo.dnd.Source");
dojo.require("dojo.parser");

dojo.addOnLoad(function( ) {
	dojo.subscribe("/dnd/source/over", function(source) {
		console.log("/dnd/source/over", source);
	});
	dojo.subscribe("/dnd/start", function(source, nodes, copy) {
		console.log("/dnd/start", source, nodes, copy);
	});
	dojo.subscribe("/dnd/drop", function(source, nodes, copy) {
		console.log("/dnd/drop", source, nodes, copy);
	});
	dojo.subscribe("/dnd/cancel", function( ) {
		console.log("/dnd/cancel");
	});
});
</script>
</head>

<body class="claro">

<table>
<tr><td>
	<div id="source1" dojoType="dojo.dnd.Source" class="container">
		<div class="dojoDndItem">foo</div>
		<div class="dojoDndItem">bar</div>
		<div class="dojoDndItem">baz</div>
		<div class="dojoDndItem">quux</div>
	</div>
</td>
<td>
	<div id="source2" dojoType="dojo.dnd.Source" class="container">
		<div class="dojoDndItem">FOO</div>
		<div class="dojoDndItem">BAR</div>
		<div class="dojoDndItem">BAZ</div>
		<div class="dojoDndItem">QUUX</div>
	</div>
	</td>
	</tr></table>
</body>
</html>