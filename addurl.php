<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Url Display Text</title>
</head>
<body class="claro">
    <h4 id="greeting">Dynamic URL</h4>


<input type="text" name="showtext" id="_textbox1">
<button  id="_buttonId1">Apply</button>


<br/>
<br/>
<br/>
<a href="http://www.google.com" id="_dynamic_url" target="_blank">Dynamic URL</a>

    <!-- load Dojo -->
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true"></script>

    <script type="text/javascript">

 require(["dojo","dijit/dijit","dojo/on", "dojo/dom", "dojo/dom-style","dojo/dom-attr","dojo/mouse","dijit/registry","dijit/form/TextBox", "dojo/domReady!"],
    function(dojo, dijit,on, dom, domStyle,domAttr,mouse,registry) {

        var _textbox1=dom.byId("_textbox1");
        var _buttonId1 = dom.byId("_buttonId1");
        var _dynamic_url = dom.byId("_dynamic_url");
     
      //   domAttr.set(dom.byId("_textbox1"), "value","Sainath");
       on(_buttonId1, "click", function(){
        //domAttr.set(dom.byId("_textId"), "value","Sainath")
        var dynUrl="http://"+domAttr.get(_textbox1, "value");
        domAttr.set(_dynamic_url, "href",dynUrl);
        //     textbox1.get("value");//innerHTML = "Hello World";
        });

});


    </script>
</body>
</html>


