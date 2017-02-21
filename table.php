<!DOCTYPE html>
<html>
<head>
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
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true,parseOnLoad: true,isDebug: true"></script>
   
 <script>
  

  require(['dojo/_base/lang', 'dojox/grid/DataGrid', 'dojo/data/ItemFileWriteStore', 'dojo/dom',"dijit/dijit","dojo/on",'dojox/grid/EnhancedGrid','dojo/data/ItemFileWriteStore','dojox/grid/enhanced/plugins/exporter/CSVWriter','dojo/domReady!'],
    
    function(lang, DataGrid, ItemFileWriteStore, dom,dijit,on){
    /*set up data store*/
    var data = { identifier: "id", items: [{"col1":"Sainath","col2":"Reddy","col3":"07AQ1A1238","col4":"70%","id":"1"},
                                             {"col1":"Ravi","col2":"Reddy","col3":"07AQ1A1227","col4":"68%","id":"2"},
                                             {"col1":"Harshitha","col2":"Reddy","col3":"07AQ1A1216","col4":"73%","id":"3"},
                                             {"col1":"Sandhya","col2":"Reddy","col3":"07AQ1A1220","col4":"72%","id":"4"},
                                             {"col1":"Aashish","col2":"Reddy","col3":"07AQ1A1201","col4":"76%","id":"5"},
                                             {"col1":"Pramoda","col2":"Reddy","col3":"07AQ1A1226","col4":"73%","id":"6"},
                                             {"col1":"Kumar","col2":"Reddy","col3":"07AQ1A1231","col4":"62%","id":"7"},
                                             {"col1":"Visnu","col2":"Reddy","col3":"07AQ1A1251","col4":"66%","id":"8"},
                                             {"col1":"Mouni","col2":"Reddy","col3":"07AQ1A1212","col4":"71%","id":"9"}] };
    var store = new ItemFileWriteStore({data: data});

    /*set up layout*/
    var layout = [[   {'name': 'ID',         'field': 'id', 'width': '25%'},
                      {'name': 'First Name', 'field': 'col1', 'width': '25%'},
                      {'name': 'Last Name' , 'field': 'col2', 'width': '25%'},
                      {'name': 'Roll Number', 'field': 'col3', 'width': '25%'},
                      {'name': 'Percentage (%)','field': 'col4', 'width': '25%'} ]];

    /*create a new grid*/
    var grid = new DataGrid({
        id: 'grid',
        store: store,
        structure: layout,
        rowSelector: '60px'});

        /*append the new grid to the div*/
        grid.placeAt("gridDiv");
    
        /*Call startup() to render the grid*/
        grid.startup();

                 var exporals = dom.byId("exporal");


 on(exporals, "click", function(){        
      alert('Sainath');
                      
     dijit.byId("grid").exportGrid("csv", function(str){
        dojo.byId("output").value = str;
    });

                });



 function exportAll(){
alert('sa');
    dijit.byId("grid").exportGrid("csv", function(str){
        dojo.byId("output").value = str;
    });
};
function exportSelected(){
    var str = dijit.byId("grid").exportSelected("csv");
    dojo.byId("output").value = str;
};


});

 

    </script>
</head>
<body class="claro">

  <center>  <b>Dojo Standard HTML table</b></center><br>

<button id="exporal">Export</button>

<button onclick="exportAll()">Export all to CSV</button>
<button onclick="exportSelected()">Export Selected Rows to CSV</button>
<br>

    <div id="gridDiv"></div>




    <div id="output"></div>
</body></html>