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
        oracleFormat: {selector: 'date', datePattern: 'yyyy-dd-MMM', locale: 'en-us'},
        value: "", // prevent parser from trying to convert to Date object
        postMixInProperties: function(){ // change value string to Date object
            this.inherited(arguments);
            // convert value to Date object
            this.value = locale.parse(this.value, this.oracleFormat);
        },
        // To write back to the server in Oracle format, override the serialize method:
        serialize: function(dateObject, options){
            return locale.format(dateObject, this.oracleFormat).toUpperCase();
        }
    });

 var oracleDateTextBox = new OracleDateTextBox({
        value: "31-DEC-2009",
        name: "oracle"
    }, "oracle");

    oracleDateTextBox.startup();


        });


  </script>
</head>
<body class="claro">

  <label for="oracle">Client date:</label>
<input id="oracle"><br>


</body></html>