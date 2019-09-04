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



"dojo/request"

var data = { identifier: 'id',label: 'id', items: [] };
var data_list = [
    {"Heard": true, "Checked": "True", "Genre":"Easy Listening", "Artist":"Bette Midler", "Year":2003, "Album":"Bette Midler Sings the Rosemary Clooney Songbook", "Name":"Hey There", "Length":"03:31", "Track":4, "Composer":"Ross, Jerry 1926-1956 -w Adler, Richard 1921-", "Download Date":"1923/4/9", "Last Played":"04:32:49"},
    {"Heard": true, "Checked": "True", "Genre":"Classic Rock", "Artist":"Jimi Hendrix", "Year":1993, "Album":"Are You Experienced", "Name":"Love Or Confusion", "Length":"03:15", "Track":4, "Composer":"Jimi Hendrix", "Download Date":"1947/12/6", "Last Played":"03:47:49"},
    {"Heard": true, "Checked": "True", "Genre":"Jazz", "Artist":"Andy Narell", "Year":1992, "Album":"Down the Road", "Name":"Sugar Street", "Length":"07:00", "Track":8, "Composer":"Andy Narell", "Download Date":"1906/3/22", "Last Played":"21:56:15"},
    {"Heard": true, "Checked": "True", "Genre":"Progressive Rock", "Artist":"Emerson, Lake & Palmer", "Year":1992, "Album":"The Atlantic Years", "Name":"Tarkus", "Length":"20:40", "Track":5, "Composer":"Greg Lake/Keith Emerson", "Download Date":"1994/11/29", "Last Played":"03:25:19"},
    {"Heard": true, "Checked": "True", "Genre":"Rock", "Artist":"Blood, Sweat & Tears", "Year":1968, "Album":"Child Is Father To The Man", "Name":"Somethin' Goin' On", "Length":"08:00", "Track":9, "Composer":"", "Download Date":"1973/9/11", "Last Played":"19:49:41"},
    {"Heard": true, "Checked": "True", "Genre":"Jazz", "Artist":"Andy Narell", "Year":1989, "Album":"Little Secrets", "Name":"Armchair Psychology", "Length":"08:20", "Track":5, "Composer":"Andy Narell", "Download Date":"2010/4/15", "Last Played":"01:13:08"},
    {"Heard": true, "Checked": "True", "Genre":"Easy Listening", "Artist":"Frank Sinatra", "Year":1991, "Album":"Sinatra Reprise: The Very Good Years", "Name":"Luck Be A Lady", "Length":"05:16", "Track":4, "Composer":"F. Loesser", "Download Date":"2035/4/12", "Last Played":"06:16:53"},
    {"Heard": true, "Checked": "True", "Genre":"Progressive Rock", "Artist":"Dixie dregs", "Year":1977, "Album":"Free Fall", "Name":"Sleep", "Length":"01:58", "Track":6, "Composer":"Steve Morse", "Download Date":"2032/11/21", "Last Played":"08:23:26"},
    {"Heard": true, "Checked": "True", "Genre":"Classic Rock", "Artist":"Black Sabbath", "Year":2004, "Album":"Master of Reality", "Name":"Sweet Leaf", "Length":"05:04", "Track":1, "Composer":"Bill Ward/Geezer Butler/Ozzy Osbourne/Tony Iommi", "Download Date":"2036/5/26", "Last Played":"22:10:19"},
    {"Heard": true, "Checked": "True", "Genre":"Blues", "Artist":"Buddy Guy", "Year":1991, "Album":"Damn Right, I've Got The Blues", "Name":"Five Long Years", "Length":"08:27", "Track":3, "Composer":"Eddie Boyd/John Lee Hooker", "Download Date":"1904/4/4", "Last Played":"18:28:08"},
    {"Heard": true, "Checked": "True", "Genre":"Easy Listening", "Artist":"Frank Sinatra", "Year":1991, "Album":"Sinatra Reprise: The Very Good Years", "Name":"The Way You Look Tonight", "Length":"03:23", "Track":5, "Composer":"D. Fields/J. Kern", "Download Date":"1902/10/12", "Last Played":"23:09:23"}];

var i, len;
for(i=0, len = data_list.length; i < len; ++i){
    data.items.push(dojo.mixin({'id': i + 1 }, data_list[i % len]));
}

function exportAll(){
    dijit.byId("grid").exportGrid("csv", function(str){
       dojo.byId("output").value = str;
  
var request =new dojo.request();


var xhrArgs = {
      url: "postIt",
      postData: "Some random text",
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




    });
};
function exportSelected(){
    var str = dijit.byId("grid").exportSelected("csv");
    dojo.byId("output").value = str;
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
<button onclick="exportSelected()">Export Selected Rows to CSV</button>
<br />
<textarea id="output"></textarea>
</body>
</html>