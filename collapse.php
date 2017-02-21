<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Table</title>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dijit/themes/claro/claro.css" media="screen">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojox/grid/resources/Grid.css" />
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojox/grid/resources/claroGrid.css" />
    
</head>
<body class="claro">
<h1>Table Demo</h1>
<div id="grid"></div>
<script src="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="isDebug: true, async: true,parseOnLoad: true"></script>
    <script>
require(["dojo/parser", "dijit/TitlePane"]);
    </script>


 <div style="border: solid black 1px;">
    <div data-dojo-type="dijit/TitlePane" data-dojo-props="title: 'Pane #1'">
        I'm pane #1
    </div>
    <div data-dojo-type="dijit/TitlePane" data-dojo-props="title: 'Pane #2'">
        I'm pane #2
    </div>
    <div data-dojo-type="dijit/TitlePane" data-dojo-props="title: 'Pane #3'">
        I'm pane #3
    </div>



</body>
</html> 