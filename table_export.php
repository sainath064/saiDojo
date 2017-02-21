<!DOCTYPE html>
<html >
<head>


    <style type="text/css">
                @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojo/resources/dojo.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojox/grid/resources/claroGrid.css";


#output {
    width: 100%;
    height: 150px;
}
#gridContainer {
    width: 100%;
    height: 250px;
}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
<script>
dojo.require("dojox.grid.EnhancedGrid");
dojo.require("dojo.data.ItemFileWriteStore");
dojo.require("dojox.grid.enhanced.plugins.exporter.CSVWriter");
dojo.require("dojo.request");
dojo.require("dojo.dom-attr");

var data = { identifier: 'id',label: 'id', items: [] };
var data_list = [
    {"Heard": true, "Checked": "True", "Genre":"Easy Listening", "Artist":"Bette Midler", "Year":2003, "Album":"Bette Midler ", "Name":"Hey There", "Length":"03:31", "Track":4, "Composer":"Ross, Jerry 1926-1956 -w Adler, Richard 1921-", "Download Date":"1923/4/9", "Last Played":"04:32:49"},
    {"Heard": true, "Checked": "True", "Genre":"Classic Rock", "Artist":"Jimi Hendrix", "Year":1993, "Album":"Are You ", "Name":"Love Or Confusion", "Length":"03:15", "Track":4, "Composer":"Jimi Hendrix", "Download Date":"1947/12/6", "Last Played":"03:47:49"}
];

var i, len;
for(i=0, len = data_list.length; i < len; ++i){
    data.items.push(dojo.mixin({'id': i + 1 }, data_list[i % len]));
}

function exportAll(){
    dijit.byId("grid").exportGrid("csv", function(str){
   dojo.attr('Printtype','value','Excel');
   //dojo.byId("Printtype").set('value')='Excel';
   // domAttr.set(domAttr.byId("submit_id"), 'value','Excel'); 
   dojo.byId("output").value = str;
   dojo.byId("submit_id").click(); 

   /*       var myParameters= {"str":str};
var xhrArgs = {
      url: "printexcel.php",
      postData: {"str":str},//dojo.toJson(myParameters),
      handleAs: "text",
      load: function(data){
        dojo.byId("response2").innerHTML = "Message posted.";
      },
      error: function(error){
        // We'll 404 in the demo, but that's okay.  We don't have a 'postIt' service on the
        // docs server.
        dojo.byId("response2").innerHTML = "Message posted.";
      }
    }
 dojo.byId("response2").innerHTML = "Message being sent...";
    // Call the asynchronous xhrPost
    var deferred = dojo.xhrPost(xhrArgs);
*/
    });
};
function exportPdf(){
    dijit.byId("grid").exportGrid("csv", function(str){
   dojo.attr('Printtype','value','PDF');
   dojo.byId("output").value = str;
   dojo.byId("submit_id").click(); 
    });
};
dojo.ready(function(){
    var store = new dojo.data.ItemFileWriteStore({data: data});
    var layout = [
        { field: "id"},
        { field: "Genre"},
        { field: "Artist"},
        { field: "Album"},
        { field: "Name"},
        { field: "Track"},
        { field: "Download Date"},
        { field: "Last Played"}
    ];

    var grid = new dojox.grid.EnhancedGrid({
        id: 'grid',
        store: store,
        structure: layout,
        plugins: {
            exporter: true
        }
    });
    grid.placeAt('gridContainer');
    grid.startup();
});
    </script>
</head>
<body class="claro">
    <div id="gridContainer"></div>
<br />
<button onclick="exportAll()">Export all to CSV</button>
<button onclick="exportPdf()">Export To PDF</button>
<br />
<form action="printexcel.php" method="post"> 
<textarea id="output" name="str"></textarea>
<input type="hidden" name="Printtype"  id="Printtype" value="">
<input type="submit" id="submit_id" name="Export To Excel" style="display: none;"  value="Export To Excel">
</form>

<div id="response2"></div>




</body>
</html>