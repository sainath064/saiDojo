
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Test dojox.grid.DataGrid Editing</title>
<meta charset="utf-8">
    <title>Table Format</title>
      <style type="text/css" title="text/css">
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojo/resources/dojo.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojox/grid/resources/claroGrid.css";
#gridDiv {
    height: 20em;
}
   </style>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="isDebug:false, parseOnLoad: true"></script>
   
	<script>
 require(['dojo/_base/lang', 'dojox/grid/DataGrid', 'dojo/data/ItemFileWriteStore', 'dojox/grid/cells/dijit', 'dojo/dom', 'dojo/domReady!'],
  function(lang, DataGrid, ItemFileWriteStore, cells, dom){
    /*set up data store*/

    var data = { identifier: "id", items: [] };
    var data_list = [
      { col1: "normal", col2: false, col3: 'But are not followed by two hexadecimal', col4: 29.91},
      { col1: "important", col2: false, col3: 'Because a % sign always indicates', col4: 9.33},
      { col1: "important", col2: false, col3: 'Signs can be selectively', col4: 19.34}
    ];
    var rows = 60;
    for(var i = 0, l = data_list.length; i < rows; i++){
      data.items.push(lang.mixin({ id: i+1 }, data_list[i%l]));
    }
    var store = new ItemFileWriteStore({data: data});

    /*set up layout*/
    var layout = [[
      {'name': 'Column 1', 'field': 'id', 'width': '100px'},
      {'name': 'Column 2', 'field': 'col2', 'width': '100px', editable: true, type: dojox.grid.cells.Cell,styles: 'text-align: center;'},
      {'name': 'Column 3', 'field': 'col3', 'width': '200px', editable: true},
              {'name': 'Column 4', 'field': 'col4', 'width': '150px', editable: true,}
    ]];

    /*create a new grid*/
    var grid = new DataGrid({
					        id: 'grid',
					        store: store,
					        structure: layout,
					        rowSelector: '20px'});

    /*append the new grid to the div*/
    grid.placeAt("gridDiv");

    /*Call startup() to render the grid*/
    grid.startup();
});
	</script>
</head>
<body class="claro">
    <p class="info">
    This example shows how to make columns editable. Please double click any of column 2, column 3 or column 4 to change the cell value.
</p>

<div id="gridDiv"></div>

</body>
</html>