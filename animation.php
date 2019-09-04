<!DOCTYPE html>
<html >
<head>

 <style type="text/css" title="text/css">
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojo/resources/dojo.css";
            @import "http://ajax.googleapis.com/ajax/libs/dojo/1.8.9/dojox/grid/resources/claroGrid.css";

            /* Any demo specific styling needed for this tutorial only */

.box {
    position: absolute;
    height: 200px;
    width: 200px;
    background-color: #ddd;
    border: 1px #eee;
    padding: 5px;
}
.innerBox {
    margin: 5%;
    padding: 5px;
    background-color: white;
}

#container {
    position: relative;
    padding: 10px;
    height: 300px;
    width: 450px;
}

.contentBox {
    background-color: white;
    position: absolute;
    width: 200px;
    border: solid 1px #99c;
    margin: 5px;

    -moz-box-shadow: 10px 10px 5px #888;
    -webkit-box-shadow: 2px 3px 5px #888;
    box-shadow: 10px 10px 5px #888;
}



            </style>	


      <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
          
	
	<script>
require(["dojo/query", "dojo/_base/fx", "dojo/fx", "dojo/dom","dojo/on","dojo/domReady!"], function(query, fx, coreFx,dom,on){
    var demoDoit = function(){
        var int = 175;
        var delay = 300;
        var anims = [];
        query(".entry p,tr").reverse()
            .forEach(function(n){
                anims.push(fx.fadeOut({ node:n, delay: parseInt(delay), duration:420 }));
                delay += int;
            }).reverse().forEach(function(n){
                delay += int;
                anims.push(fx.animateProperty({
                    node:n,
                    delay: parseInt(delay),
                    duration:500, properties: { height:1 }
                }));
            });
        coreFx.combine(anims).play();
    };
    demoDoit();








    var dropButton = dom.byId("dropButton"),
                    ariseSirButton = dom.byId("ariseSirButton"),
                    anim8target = dom.byId("anim8target");

                // Set up a couple of click handlers to run our animations
                on(dropButton, "click", function(evt){
                    fx.animateProperty({
                        node: anim8target,
                        properties: {
                            top: { start: 100, end: 150 },
                            left: 0,
                            opacity: { start: 1, end: 0 }
                        },
                        duration: 800
                    }).play();
                });
                on(ariseSirButton, "click", function(evt){
                    fx.animateProperty({
                        node: anim8target,
                        properties: { top: 100, left: 300, opacity: 1 }
                    }).play();
                });



});
	</script>
</head>
<body class="claro">
    <div class="entry">
    <p>The English Wikipedia is the English-language edition of the free online encyclopedia Wikipedia. Founded on 15 January 2001, it is the first edition of Wikipedia and, as of July 2016, has the most articles of any of the editions.[2] As of February 2017, nearly 12.2% of articles in all Wikipedias belong to the English-language edition. This share has gradually declined from more than 50 percent in 2003, due to the growth of Wikipedias in other languages.[3] There are 5,331,033 articles on the site (live count).[4] In October 2015, the combined text of the English Wikipedia's articles totalled 11.5 gigabytes when compressed.[5] On 1 November 2015, the English Wikipedia announced it had reached 5,000,000 articles[6] and ran a special logo to reflect the milestone.[7]

<table border="1" width="100%"> <caption>A complex table</caption> <thead> <tr> <th colspan="3">Invoice #123456789</th> <th>14 January 2025 </tr> <tr> <td colspan="2"> <strong>Pay to:</strong><br> Acme Billing Co.<br> 123 Main St.<br> Cityville, NA 12345 </td> <td colspan="2"> <strong>Customer:</strong><br> John Smith<br> 321 Willow Way<br> Southeast Northwestershire, MA 54321 </td> </tr> </thead> <tbody> <tr> <th>Name / Description</th> <th>Qty.</th> <th>@</th> <th>Cost</th> </tr> <tr> <td>Paperclips</td> <td>1000</td> <td>0.01</td> <td>10.00</td> </tr> <tr> <td>Staples (box)</td> <td>100</td> <td>1.00</td> <td>100.00</td> </tr> </tbody> <tfoot> <tr> <th colspan="3">Subtotal</th> <td> 110.00</td> </tr> <tr> <th colspan="2">Tax</th> <td> 8% </td> <td>8.80</td> </tr> <tr> <th colspan="3">Grand Total</th> <td>$ 118.80</td> </tr> </tfoot> </table>





</div>



    <button id="dropButton">Drop out block</button>
        <button id="ariseSirButton">Return block</button>

        <div id="anim8target" class="box" style="top: 100px; left: 300px; background-color: #fc9">
            <div class="innerBox">A box</div>
        </div>




</body>
</html>