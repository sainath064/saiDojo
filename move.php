<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Moveable  </title>
      <style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";
  #dndOne {
  width: 100px;
  height: 100px;
  padding: 10px;
  border: 1px solid #000;
  background: red;
}

#dndArea {
  height: 200px;
  padding: 10px;
  border: 1px solid #000;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
<script>
require(["dojo/dnd/Moveable", "dojo/dom", "dojo/on", "dojo/domReady!"],
function(Moveable, dom, on){
  var dnd = new Moveable(dom.byId("dndOne"));
    //  on(dom.byId("doIt"), "click", function(){
    //    var dnd = new Moveable(dom.byId("dndOne"));
    //  });
});
</script>
</head>

<body class="claro">
    <div id="dndArea">
      <div id="dndOne">Hi, I am moveable when you want to.</div>
    </div>
 <!--   <p><button id="doIt" type="button">Make moveable</button></p> -->
</body>

</html>