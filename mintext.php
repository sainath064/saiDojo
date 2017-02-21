<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Minimum Characters</title>
      <style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true,parseOnLoad: true,isDebug: true"></script>
</head>
<body class="claro">
    <h4 id="greeting">Please Enter Minimum 3 Characters</h4>
<input type="text" id="_textbox1" required="true" data-dojo-type="dijit/form/ValidationTextBox" data-dojo-props="pattern: '[a-zA-Z0-9$%!_]{3,15}', required: true, invalidMessage: 'The value must be at least 3 character'" />    




</body>
</html>

    <script type="text/javascript">
 
  require(["dojo","dijit/dijit","dojo/on", "dojo/dom", "dojo/dom-style","dojo/dom-attr","dojo/mouse","dijit/registry","dojo/parser","dijit/form/ValidationTextBox","dijit/form/TextBox", "dojo/domReady!"],
    function(dojo,dijit,on, dom, domStyle,domAttr,mouse,registry,parser,ValidationTextBox) {

        parser.parse();

        
        var _textbox1 = registry.byId("_textbox1");
        
          on(_textbox1,"change", function(){
              if(this.get('value').length>=3){
                alert('You Entered 3 or More Characters');
              } 
          });
}); 

//require(["dojo/parser", "dijit/form/ValidationTextBox"]);

    </script>
















        
   <!-- <label for="zip2">Please Enter Something:</label>
<input type="text" name="zip" id="zip2" required="true"
    data-dojo-type="dijit/form/ValidationTextBox"
    data-dojo-props="


    pattern:after5, invalidMessage:'Please Enter Minimum 3 Characters'" />


        <label for="zip2">Please Enter Something:</label>
<input type="text" name="zip" id="zip2" required="true"
    data-dojo-type="dijit/form/ValidationTextBox"
    data-dojo-props="
pattern: '[\\w]+',
       required: true,
        maxLength: 4,
        minLength: 3,
        invalidMessage:'Please Enter Minimum 3 Characters'" />

        -->
