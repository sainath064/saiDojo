<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Searchable Select</title>
      <style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true,parseOnLoad: true,isDebug: true"></script>
</head>
<body class="claro">


<input id="stateSelect">


<script>
require([
    "dojo/store/Memory",
    "dijit/form/FilteringSelect",
    "dojox/form/CheckedMultiSelect",
    "dojo/domReady!"
], function(Memory, FilteringSelect,CheckedMultiSelect){
    var stateStore = new Memory({
        data: [
            {name:"Alabama", id:"AL"},
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
            {name:"Delaware", id:"DE"}
        ]
    });

    var filteringSelect = new FilteringSelect({
        id: "stateSelect",
        name: "state",
        value: "CA",
        store: stateStore,
        searchAttr: "name"
    }, "stateSelect").startup();
});

</script>



</body>
</html>