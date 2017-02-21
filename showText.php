<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Display Text</title>
</head>
<body class="claro">
    <h4 id="greeting">Display Text</h4>



<input type="text" name="showtext" id="_textbox1">

<button  id="_buttonId1">Show</button>




    <!-- load Dojo -->
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true"></script>

    <script type="text/javascript">

 require(["dojo","dijit/dijit","dojo/on", "dojo/dom", "dojo/dom-style","dojo/dom-attr","dojo/mouse","dijit/registry","dijit/form/TextBox", "dojo/domReady!"],
    function(dojo, dijit,on, dom, domStyle,domAttr,mouse,registry) {

        var _Tid=dom.byId("_textbox1");
        var buttonId1 = dom.byId("_buttonId1");
      
      //   domAttr.set(dom.byId("_textbox1"), "value","Sainath");



       on(buttonId1, "click", function(){
        //domAttr.set(dom.byId("_textId"), "value","Sainath")
         alert(domAttr.get(_Tid, "value"));

          //alert('j');
           //     textbox1.get("value");//innerHTML = "Hello World";

        });

});


    </script>
</body>
</html>


