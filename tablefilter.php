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
<script src="//ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="isDebug: true, async: true"></script>

<script>
    require([
        "dojox/grid/DataGrid",
        "dojox/grid/cells",
        "dojox/grid/cells/dijit",
        "dojo/store/Memory",
        "dojo/data/ObjectStore",
        "dojo/date/locale",
        "dojo/currency",
        "dijit/form/DateTextBox",
        "dijit/form/CurrencyTextBox",
        "dijit/form/HorizontalSlider",
        "dojo/domReady!"
    ], function(DataGrid, cells, cellsDijit, Memory, ObjectStore, locale, currency, DateTextBox, CurrencyTextBox, HorizontalSlider){
        var grid;

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
                    { name: 'Amount', field: 'col5', formatter: formatCurrency, constraint: {currency: 'USD'},widgetClass: HorizontalSlider, width: 10,}
                   ]
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

        // global var "test_store"
        test_store = new ObjectStore({objectStore: objectStore});

        // create the grid.
        grid = new DataGrid({
                            store: test_store,
                            structure: gridLayout,
                            escapeHTMLInData: false,
                            "class": "grid"
                            }, "grid");
        grid.startup();


        grid.on("RowClick", function(evt){
          //  alert(grid.getItem(0).col8);
                    var idx = evt.rowIndex,
                        rowData = grid.getItem(idx);
                    // The rowData is returned in an object, last is the last name, first is the first name
                    document.getElementById("results").innerHTML =
                        "You have clicked on " + rowData.id + ", " + rowData.col8 + ","+ rowData.col1 +","+ rowData.col3 +","+ rowData.col4 +","+ rowData.col5 +","+ rowData.col5;
                }, true);


         // dojo.connect(grid, "onCellClick", cellClickDataGrid);
          
dojo.connect(grid, "onCellDblClick", cellClickDataGrid);

          dojo.connect(grid, "onApplyCellEdit", onApplyCellEditss);
          dojo.connect(grid, "onCellFocus", onCellFocusss);


function onApplyCellEditss(inValue, inRowIndex, inFieldIndex)
{
 document.getElementById("results2").innerHTML =inValue;
 //alert(inValue);
 //alert(inRowIndex);   
 //alert(inFieldIndex);   
}
function onCellFocusss(inCell, inRowIndex)
{
    // alert(inCell.id);    
    // alert(inRowIndex);   
}

function cellClickDataGrid (e) {
    console.log(e);
   // alert('Id '+e.cell.id);
   // alert('Col Index '+e.cell.cellIndex);

 //console.log(e.cellNode.innerText);
document.getElementById("results3").innerHTML =e.cellNode.innerText;
document.getElementById("results4").innerHTML =e.cell.field;

            /* the 4th cell has the link to the Delete text*/
         //   alert(e.cellIndex);
       //  alert(grid.getItem(e.cellIndex).id);
          document.getElementById("results1").innerHTML =grid.getItem(e.rowIndex).id;
            if (e.cellIndex == 4){
               var selItem = e.grid.getItem(e.rowIndex);
         //      dijit.byId(grid).store.deleteItem(selItem);
            }
      }
   });
</script>
<div id="results" class="results"></div>
<br/>
Row ID:<div id="results1" class="results"></div>
<br/>
New Value:<div id="results2" class="results"></div>
<br/>
Old Value:<div id="results3" class="results"></div>
<br/>
Unique Id:<div id="results4" class="results"></div>


</body>
</html> 