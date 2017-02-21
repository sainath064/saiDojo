<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Enable Disable Operation</title>
</head>
<body class="claro">
    <h4 id="greeting">Disable Enable Program</h4>


<input type="text" name="_textId" id="_textId" />


<button id="_buttonId2">Disable</button>
<button id="_buttonId1">Enable</button>


<table>
    
<tr><td><button id="_bold">Bold</button></td>
<td><button id="_italic">italic</button></td>
<td><button id="_red">Red</button></td>
<td><button id="_green">Green</button></td></tr>


</table>


    <!-- load Dojo -->
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: true"></script>

    <script type="text/javascript">
 require(["dojo","dijit/dijit","dojo/on", "dojo/dom", "dojo/dom-style","dojo/dom-attr","dojo/mouse","dijit/registry","dijit/form/TextBox", "dojo/domReady!"],
    function(dojo, dijit,on, dom, domStyle,domAttr,mouse,registry) {

        var _Tid=dom.byId("_textId");
        var _buttonId1 = dom.byId("_buttonId1");
        var _buttonId2 = dom.byId("_buttonId2");

        var _bold = dom.byId("_bold");
        var _italic = dom.byId("_italic");
        var _red = dom.byId("_red");
        var _green = dom.byId("_green");




// var obj = { color:"#fff", backgroundColor:"#000" };
// domAttr.set(_Tid, "disabled",true);
        on(_buttonId2, "click", function(){		
	 		domAttr.set(dom.byId("_textId"), "disabled",true);
                alert('Disabled');
			//	_Tid.setAttribute('readonly', 'readonly');   
        });

        on(_buttonId1, "click", function(){        	
			 domAttr.set(dom.byId("_textId"), "disabled",false);
			alert('Enabled');
            //_Tid.setAttribute('readonly', 'readonly');
	        //alert("sa");
          // domStyle.set(_textId, "disabled", true);
        });     
         on(_bold, "click", function(){        
                      domStyle.set(_Tid, {fontWeight: "bold"});                     
                });

 on(_red, "click", function(){        
                      domStyle.set(_Tid, "color", "red");                        
                });

  on(_green, "click", function(){        
                      domStyle.set(_Tid, "color", "green");                        
                });

    on(_italic, "click", function(){        
                      domStyle.set(_Tid, {fontStyle: "italic"});                        
                });





});


    </script>
</body>
</html>