<html>
<head>
<title>Fun with Source!</title>
<style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";
      </style>

<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
</script>
<script type="text/javascript">
dojo.require("dojo.dnd.Source");
dojo.require("dojo.parser");
</script>
</head>


<body class="claro">
<div dojoType="dojo.dnd.Source" class="container">
	<div class="dojoDndItem">foo</div>
	<div class="dojoDndItem">bar</div>
	<div class="dojoDndItem">baz</div>
	<div class="dojoDndItem">quux</div>
</div>
</body>
</html>