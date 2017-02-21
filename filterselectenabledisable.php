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


    <h4 id="greeting">Please Type Somthing To Select Country</h4>

<select data-dojo-type="dijit/form/FilteringSelect" id="id_country" name="id_country" data-dojo-props="
value: '',
placeHolder: 'Type To Select Country'">
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran (Islamic Republic of)</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
</select>



<button id="_buttonId2">Disable</button>
<button id="_buttonId1">Enable</button>
<br>
<br>



  <button onclick="alert(dijit.byId('id_country').get('value'))">Alert Option Value</button>
    <button onclick="alert(dijit.byId('id_country').get('displayedValue'))">Alert Option Display Value</button>

</body>
</html>

    <script type="text/javascript">
 
  require(["dojo","dijit/dijit","dojo/on", "dojo/dom", "dojo/dom-style","dojo/dom-attr","dojo/mouse","dijit/registry","dojo/parser","dijit/form/ValidationTextBox","dijit/form/TextBox","dijit/form/FilteringSelect", "dojo/domReady!"],
    function(dojo,dijit,on, dom, domStyle,domAttr,mouse,registry,parser,ValidationTextBox,FilteringSelect) {

        parser.parse();
      
        var _id_country = registry.byId("id_country");
          on(_id_country,"change", function(){
          //   domAttr.set(dom.byId("id_country"),"disabled",true);

       //     alert(this.get('value'));
        //    alert('Ajax Operation Starts at this level');      
         });

        var _buttonId2 = dom.byId("_buttonId2");
        var _buttonId1 = dom.byId("_buttonId1");
       
        on(_buttonId2,"click", function(){
              dijit.byId('id_country').set('disabled', true);
          // domAttr.set(dom.byId("id_country"),"disabled",true);
           alert('Disabled');
         });

        on(_buttonId1,"click", function(){
            dijit.byId('id_country').set('disabled', false);
          // domAttr.set(dom.byId("id_country"),"disabled",false);
           alert('Enabled');
         });



}); 


    </script>
