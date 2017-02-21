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
</head>
<body class="claro">


    <h4 id="greeting">Please Select Color To Apply</h4>

<select data-dojo-type="dijit/form/FilteringSelect" id="id_color" name="id_color" data-dojo-props="
value: '',
placeHolder: 'Type To Select Color'">

<option value="red">Red</option>
<option value="green">green</option>
<option value="black">black</option>
<option value="yellow">yellow</option>
</select>

<span id="color_change"><h1>Hello SwingWind....</h1></span>
<br>
<br>
</body>
</html>

    <script type="text/javascript">
 
  require(["dojo","dijit/dijit","dojo/on", "dojo/dom", "dojo/dom-style","dojo/dom-attr","dojo/mouse","dijit/registry","dojo/parser","dijit/form/ValidationTextBox","dijit/form/TextBox","dijit/form/FilteringSelect", "dojo/domReady!"],
    function(dojo,dijit,on, dom, domStyle,domAttr,mouse,registry,parser,ValidationTextBox,FilteringSelect) {

        parser.parse();
      
        var _id_color = registry.byId("id_color");
        var _color_change=dom.byId("color_change");
          on(_id_color,"change", function(){
            domStyle.set(_color_change, "color",this.get('value'));
            domStyle.set(id_color, "color",this.get('value'));            
        });
}); 


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
