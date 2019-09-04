<!DOCTYPE HTML>
<html >
<head>
    <meta charset="utf-8">
    <title>Title Group</title>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dijit/themes/claro/claro.css" media="screen">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojox/grid/resources/Grid.css" />
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojox/grid/resources/claroGrid.css" />  

<style type="text/css">
    #gridDiv {
    height: 20em;
}
</style>
</head>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
    <script>
 require(["dojo","dojox/widget/TitleGroup","dijit/TitlePane",
        "dijit/form/Button",
        "dojo/parser",
        "dojo/html",
        "dojo/dom","dojo/on",
        "dojo/store/Memory", "dijit/form/FilteringSelect","dojo/data/ItemFileReadStore","dijit/registry","dojo/dom-style","dijit/dijit",
        "dojo/_base/declare", "dijit/form/DateTextBox", "dojo/date/locale","dojo/dom-attr","dojo/query",'dojo/_base/lang', 'dojox/grid/DataGrid', 'dojo/data/ItemFileWriteStore',
        "dojox/grid/EnhancedGrid","dojox/grid/enhanced/plugins/exporter/CSVWriter","dojo/request",     "dojox/grid/cells",
        "dojox/grid/cells/dijit","dijit/form/CurrencyTextBox",
        "dijit/form/HorizontalSlider","dojo/data/ObjectStore","dojo/currency",
        "dojo/domReady!"
    ], function(dojo,TitleGroup,TitlePane,Button,parser,html,dom,on,Memory,FilteringSelect,ItemFileReadStore,registry,domStyle,dijit,declare, DateTextBox, locale,domAttr,query,lang, DataGrid, ItemFileWriteStore,EnhancedGrid,CSVWriter,request,cells, cellsDijit,CurrencyTextBox, HorizontalSlider,ObjectStore,currency){

//Title Group
                   var tg = new TitleGroup({style:"width:500px;"}).placeAt("holder");
              
                        tg.addChild(new TitlePane({ title:"Woot.", open:true }));
                        tg.addChild(new TitlePane({ title:"Second", open:false }));

                        new TitlePane({ title:"Testing placeAt", open:false }).placeAt(tg);                        
                        new TitlePane({ title:"Removed", open:false, id:"killer" }).placeAt(tg);                        
                        tg.startup();

                         setTimeout(function(){  //alert('sa');tg.removeChild(dijit.byId("killer")).placeAt("graveyard");
                                  }, 10000);


// Drop Down Dynamic Way Assign To DIv ID Using HTML
html.set(dom.byId("divSelect"),'<select data-dojo-type="dijit/form/FilteringSelect" id="id_color" name="id_color" data-dojo-props="value: \'\',placeHolder: \'Type To Select Color\'">'+
'<option value="red">Red</option>'+
'<option value="green">green</option>'+
'<option value="black">black</option>'+
'<option value="yellow">yellow</option>'+
'</select>',{parseContent: true});


// Drop Down Dynamic Way Assign To DIv ID Using Loading Option
/*var stateStore = new Memory({
        data: [{name:"Alabama", id:"AL"},
            {name:"Alaska", id:"AK"},
            {name:"American Samoa", id:"AS"},
            {name:"Arizona", id:"AZ"},
            {name:"Arkansas", id:"AR"},
            {name:"Armed Forces Europe", id:"AE"},
            {name:"Armed Forces Pacific", id:"AP"},
            {name:"Armed Forces the Americas", id:"AA"},
            {name:"California", id:"CA"},
            {name:"Colorado", id:"CO"},
            {name:"Connecticut", id:"CT"},
            {name:"Delaware", id:"DE"}]
});*/

// Drop Down Dynamic Way Assign To DIv ID Using Ajax Call Options
  var stateStore = new ItemFileReadStore({ url: "SelectOptions.json" });
  var filteringSelect = new FilteringSelect({
        id: "stateSelect",
        name: "state",
        value: "CA",
        store: stateStore,
        searchAttr: "name"
    }, "stateSelect").startup();

var _id_color = registry.byId("id_color");
var _color_change=dom.byId("color_change");

on(_id_color,"change", function(){
    domStyle.set(_color_change, "color",this.get('value'));
    domStyle.set(id_color, "color",this.get('value'));     
    tg.removeChild(dijit.byId("killer")).placeAt("graveyard");       
});


//Calendar
        var _cal_id=dom.byId("cal_id");
                domAttr.set(_cal_id, "data-dojo-id","myFromDate");
                domAttr.set(_cal_id, "name","fromDate");
                domAttr.set(_cal_id, "data-dojo-type","dijit/form/DateTextBox");

//Font Style
  query(".text_font").style({
            "backgroundColor": "yellow",
            "color": "red",
            "opacity": 0.5
        });


//Grid Table

 function formatCurrency(inDatum){
            return isNaN(inDatum) ? '...' : currency.format(inDatum, this.constraint);
        }
        function formatDate(inDatum){
            return locale.format(new Date(inDatum), this.constraint);
        }


     gridLayout = [{
            defaultCell: { width: 8, editable: true, type: cells._Widget, styles: 'text-align: right;'  },
            cells: [{ name: 'Id', field: 'id', editable: false },
                    { name: 'Date', field: 'col8',width: 10, editable: true,widgetClass: DateTextBox,formatter: formatDate,constraint: {formatLength: 'long', selector: "date"}},
                    { name: 'Priority', styles: 'text-align: center;', field: 'col1', width: 10,type: cells.ComboBox,options: ["P1","P2","P3"]},                
                    { name: 'Status', field: 'col3',styles: 'text-align: center;',type: cells.Select,options: ["new", "read", "replied"] },
                    { name: 'Message', field: 'col4', styles: '', width: 10 },
                    { name: 'Amount', field: 'col5', formatter: formatCurrency, constraint: {currency: 'USD'},widgetClass: CurrencyTextBox },
                    { name: 'Amount', field: 'col5', formatter: formatCurrency, constraint: {currency: 'USD'},widgetClass: HorizontalSlider, width: 10,}]
        }];

        var data = [
            { id: 101, col1: "P1", col2: false, col3: "new", col4: 'Creating UTC for Dex Hub', col5: 29.91, col6: 10, col7: false, col8: new Date() },
            { id: 102, col1: "P2", col2: false, col3: "new", col4: 'Making Checkbox for UTC', col5: 9.33, col6: -5, col7: false, col8: new Date() },
            { id: 103, col1: "P3", col2: false, col3: "read", col4: 'Pop up for the UTC', col5: 19.34, col6: 0, col7: true, col8: new Date() },
            { id: 104, col1: "P1", col2: false, col3: "read", col4: '', col5: 15.63, col6: 0, col7: true, col8: new Date() },
            { id: 105, col1: "P3", col2: false, col3: "replied", col4: 'It is therefore necessary', col5: 24.22, col6: 5.50, col7: true, col8: new Date() },
            { id: 106, col1: "P2", col2: false, col3: "replied", col4: 'To problems of corruption by', col5: 9.12, col6: -3, col7: true, col8: new Date() },
            { id: 107, col1: "P3", col2: false, col3: "replied", col4: 'Which would simply be awkward in', col5: 12.15, col6: -4, col7: false, col8: new Date() }
        ];
        var objectStore = new Memory({data:data});

        test_store = new ObjectStore({objectStore: objectStore});


    /*create a new grid*/
    var grid = new EnhancedGrid({  id: 'grid', store: test_store, structure: gridLayout,rowSelector: '20px',                            escapeHTMLInData: false,"class": "grid",
 plugins: {
            exporter: true
        }});
    /*append the new grid to the div*/
    grid.placeAt("gridDiv");
    /*Call startup() to render the grid*/
    grid.startup();

//Export CSV
on(dom.byId("Export_csv"),"click", function(){  
 // alert('sa');
 dijit.byId("grid").exportGrid("csv", function(str){
               dojo.attr('Printtype','value','Excel');
               dojo.byId("output").value = str;
               dojo.byId("submit_id").click(); 
    });
});


});
</script>



<body class="claro">
    <h1 class="testTitle">Dojox TitleGroup test</h1>

    <div id="bar" dojoType="dojox.widget.TitleGroup">
        <div dojoType="dijit.TitlePane" open="false" title="Dynamic Table">Yellow.</div>
        <div dojoType="dijit.TitlePane" open="false" title="Static Table">Static Table<br><br>
                    <button id="Export_csv">Export all to CSV</button><br><br>
                    <div id="gridDiv"></div>
                    <form action="printexcel.php" method="post"> 
                    <textarea id="output" name="str" style="display: none;"></textarea>
                    <input type="hidden" name="Printtype"  id="Printtype" value="">
                    <input type="submit" id="submit_id" name="Export To Excel" style="display: none;"  value="Export To Excel">
                    </form>
        </div>
        <div dojoType="dijit.TitlePane" open="false" title="Calendar">
            <p class="text_font">Calendar Dynamic Font Color</p>
            <input id="cal_id"  />
        </div>
        <div dojoType="dijit.TitlePane" open="false" title="Dynamic Filter Example">
        <button dojoType="dijit.form.Button">Label</button>
        <br>
        <span id="color_change">HTMl Include:</span><div id="divSelect"></div>
        <br>
        Programmatic Include:<input id="stateSelect">

           </div>
        <div dojoType="dijit.TitlePane" open="false" title="PHP Include File" href="data.php">
            

        </div>
    </div>
<br><br><br><br>

    <h1 class="testTitle"> TitleGroup </h1>



<div id="bar2" dojoType="dojox.widget.TitleGroup">
    <div dojoType="dijit.TitlePane" open="false" title="Title 1" open="open">Yellow.</div>
    <div dojoType="dijit.TitlePane" open="true" title="Title b">Heeeeee<br><br>hawwwww</div>
    <div dojoType="dijit.TitlePane" open="false" title="Title 3"><p style="font-size:27pt">WOW</p></div>
    <div dojoType="dijit.TitlePane" open="false" title="Title d (embedded TitlePanes)">
        <h3>See:</h3>
        <div dojoType="dijit.TitlePane" title="I should open fine">
            <h3>See:</h3>
            <div dojoType="dijit.TitlePane" title="I should open fine too">
                <p>Did i?</p>
            </div>
        </div>
    </div>
</div>

<div class="clear"></div>
<h2>A TitlePane for good measure:</h2>
<div dojoType="dijit.TitlePane" title="Basic, for Sanity" style="width:300px">
    <p>Lorem, ipsum <a href="#">dolor</a></p>
</div>
    <h2>Programattic</h2>
<div id="holder"></div>
    <h2>Once removed, will show up here:</h2>
<div id="graveyard"></div>



</body>
</html> 