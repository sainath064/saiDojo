<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Test JsonRest store</title>
      <style type="text/css" title="text/css">
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojo/resources/dojo.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojox/grid/resources/claroGrid.css";
#gridDiv {
    height: 20em;
}
   </style>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="parseOnLoad: true,isDebug: true"></script>
  <script type="text/javascript">
   require(["dojo/on","dojo/store/Memory", "dojo/store/Cache","dgrid/List", "dgrid/OnDemandGrid","dgrid/Selection", "dgrid/Keyboard","dgrid/Editor" , "dojo/_base/declare", "dojo/store/JsonRest","dojox/grid/DataGrid", "dojo/domReady!"],
    function(on,Memory, Cache, List, Grid, Selection, Keyboard, Editor, declare, JsonRest, DojoGrid){
 
     var testStore = dojo.store.Cache(dojo.store.JsonRest({target:"../../../spr/getGridJSON/"}), dojo.store.Memory());
 
     var columns = [
      {label:'id', field:'id', sortable: false},
      Editor({label: 'Address', field: 'address', autoSave: false},"text", "dblclick"),
      {label:"ID", field:"id"},
      {label:"Address", field:"address", editable: true},
      {label:"Name", field:"name"},
      {label:"Gender", field:"gender"},
      {label:"DOB", field:"dob"},
      {label:"Email", field:"email"},
      {label:"Mobile", field:"mobile"},
      {label:"Phone", field:"phone"}
 
     ];
 
      var columns21 = [
          {label:'id', field:'id', sortable: false},
          Editor({label: 'Address', field: 'address', autoSave: false},"text", "dblclick"),
          {label:'name', field:'name', sortable: false},
          {label:'gender', field:'gender', sortable: false},
          {label:'dob', field:'dob', sortable: false},
          {label:'email', field:'email', sortable: false},
          {label:'mobile', field:'mobile', sortable: false},
          {label:'phone', field:'phone', sortable: false}
         ];
 
     window.grid = new (declare([Grid, Selection, Keyboard]))({
      query: "../../spr/getGridJSON/",
      store: testStore,
      columns: columns21,
      selectionMode: "single"
     }, "grid");
 
     on(document.getElementById("save"), "click", function(){
      alert("here in save button");
      var testId;
      for(var rowId in grid.dirty){
       if(rowId)
       testId = rowId;
      }
      testId = 0;
      alert(testId);
      grid.save();
 
     });
 
    });
 
  </script>
</head>
<body class="claro">
  <h2>A basic grid with JsonRest store</h2>
  <div id="grid"  data-dojo-type="dgrid.Grid"></div>
 
  <!-- <div id="gridElement" data-dojo-type="dgrid.Grid"></div> -->
 
   <button id="save">Save</button>
</body>
</html>