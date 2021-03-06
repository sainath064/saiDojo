<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dijit/themes/claro/claro.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dojox/form/resources/CheckedMultiSelect.css">
    <link rel="stylesheet" type="text/css" href="MSDropDown.css">
    <script></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js"></script>
    <title></title>
</head>
<body class="claro">
<script>

    require([
        "dojo/_base/declare",
        "dojo/_base/lang",
        "dojo/_base/array",
        "dojo/on",
        "dojo/dom",
        "dojo/store/Memory",
        "dojo/store/Observable",
        "dojo/data/ObjectStore",
        "dojox/form/CheckedMultiSelect",
        "dijit/form/FilteringSelect",
        "dojo/domReady!"
    ], function(
            declare,
            lang,
            array,
            on,
            dom,
            Memory,
            Observable,
            DataStore,
            CheckedMultiSelect,
            FilteringSelect
    ) {
        var memoryStore = new Memory({
            idProperty: "value",
            data: [
                {value: "AL", label: "Alabama"},
                {value: "AK", label: "Alaska"},
                {value: "AZ", label: "Arizona"},
                {value: "AR", label: "Arkansas"},
                {value: "CA", label: "California"},
                {value: "CO", label: "Colorado"},
                {value: "CT", label: "Connecticut"}
            ]
        });

        var dataStore = new DataStore({
            objectStore: memoryStore,
            // choose store property to display:
            labelProperty: "label"
        });

        var MyCheckedMultiSelect = declare(CheckedMultiSelect, {
            startup: function() {
                this.inherited(arguments);
                setTimeout(lang.hitch(this, function() {
                    this.dropDownButton.set("label", this.label);
                }));
            },
            _updateSelection: function() {
                this.inherited(arguments);
                if(this.dropDown && this.dropDownButton){
                    var label = "";
                    array.forEach(this.options, function(option){
                        if(option.selected){
                            label += (label.length ? ", " : "") + option.label;
                        }
                    });
                    this.dropDownButton.set("label", label.length ? label : this.label);
                }
            }
        });

        var checkedMultiSelect = new MyCheckedMultiSelect ({
            dropDown: true,
            multiple: true,
            label: "Select something...",
            store: dataStore
        }, "placeholder");

        checkedMultiSelect.startup();

            on(dom.byId("btn1"), "click", function() {
                    console.log("Changing data...");
                    // changing an single item:
                    // var al = memoryStore.get("AL");
                    // al.label = "Changed Alabama";
                    // memoryStore.put(al);
                    // checkedMultiSelect.setStore(dataStore);

                    memoryStore.setData([
                        {value: "a", label: "A"},
                        {value: "b", label: "B"},
                        {value: "c", label: "C"}
                    ]);

                    // this should not be necessary as the dijit
                    // should observe its model (store) and change
                    // its view (html) according to changes performed
                    // on store, but in the case of CheckedMultiSelect
                    // it does not work
                    checkedMultiSelect.setStore(dataStore);
            });


    /*   var filteringSelect = new FilteringSelect({
                    id: "placeholder",
                    name: "state",
                    value: "AL",
                    searchAttr: "name"
                }, "placeholder").startup();
*/




    });
</script>


<div style="padding: 30px;">
    <div id="placeholder"></div>
</div>
<div style="margin-top: 30px">
    <button id="btn1">Change Data</button>
</div>
</body>
</html>