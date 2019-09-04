<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Information Box </title>
      <style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";
      #dialogColor_underlay {
    background-color:green;
}
 </style>
<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
<script type="text/javascript">
require(["dijit/Dialog", "dijit/form/Button", "dijit/form/RadioButton", "dojo/dom","dojo/request/xhr", "dojo/dom-style"],
        function(Dialog, Button, RadioButton, dom,xhr, domStyle){

var secondDlg = new dijit.Dialog({
        title: "Information Dialog Box",
        style: "width: 800px;height:400px;",
        id:"test_id"
    });
showDialogTwo = function(){
                    console.log("Requesting For Remote Data.........!");
                    xhr("sample.html", {
                      handleAs: "html"
                    }).then(function(data){
                            secondDlg.set("content", data);
                            secondDlg.show();              
                    },function(err){
                            secondDlg.set("content","Unable To Load Data From Remote Server");
                            secondDlg.show();
                    });
                }
    accept = function(){
        dom.byId("decision").innerHTML = "Terms and conditions  accepted.";
        domStyle.set("decision", "color", "#00CC00");
        myFormDialog.hide();
    };
    decline = function(){
        dom.byId("decision").innerHTML = "Terms and conditions have not been accepted.";
        domStyle.set("decision", "color", "#FF0000");
        myFormDialog.hide();
    }
});
</script>
</head>
<body class="claro">
<table>
<tr><td>Dialog Box with Small Form(Remote)</td><td>
<button id="buttonTwo" data-dojo-type="dijit.form.Button" data-dojo-props="onClick:showDialogTwo" type="button">Information Dialog ALert!</button></td></tr>
</table>

</body>
</html>