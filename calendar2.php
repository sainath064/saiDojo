<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Searchable Select</title>
      <style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true,parseOnLoad: true,isDebug: true"></script>
<script>
require(["dojo/_base/declare", "dijit/form/DateTextBox", "dojo/date/locale", "dojo/dom", "dojo/domReady!"],
        function(declare, DateTextBox, locale, dom){

            
    declare("OracleDateTextBox", DateTextBox, {
        oracleFormat: {selector: 'date', datePattern: 'dd-MMM-yyyy', locale: 'en-us'},
        value: "", // prevent parser from trying to convert to Date object
        
        postMixInProperties: function(){ // change value string to Date object
        alert('1');
            this.inherited(arguments);
            // convert value to Date object
            this.value = locale.parse(this.value, this.oracleFormat);
        },

        // To write back to the server in Oracle format, override the serialize method:
        serialize: function(dateObject, options){
            alert('2');
            return locale.format(dateObject, this.oracleFormat);
        }
    });
    function showServerValue(){
        alert('3');
        dom.byId('toServerValue').value = document.getElementsByName('oracle')[0].value;
    }
    var oracleDateTextBox = new OracleDateTextBox({
        value: "31-DEC-2009",
        name: "oracle",
        onChange: function(v){ setTimeout(showServerValue, 0)}
    }, "oracle");
    oracleDateTextBox.startup();
    showServerValue();
});

  </script>
</head>
<body class="claro">
<label>Client date:</label>
<input id="oracle"><br>
<label>Oracle date going back to server:</label>
<input id="toServerValue" readonly="readonly" disabled="disabled">

</body></html>