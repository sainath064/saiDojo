<html>
<head>
<title>Template!</title>
<style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://downloads.dojotoolkit.org/release-1.10.1/dojo-release-1.10.1/dojo/resources/dojo.css";
      @import "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css";

.dijitAccordionInnerContainer{
	line-height: 25px;
	font-weight: bold;
	font-size: 14px;
}
#catalogNode{
	background-color: 
}
.dijitAccordionTitle {
    line-height: 48px;
    background-color: #0266a3;
    border-radius: 0;
    text-align: left;
    text-indent: 65px;
    padding: 0;
    margin: 0;
    width: 100%;
    border-style: solid;
    border-width: 0;
    border-color: #003258;
    color: white;
    font-size: 17px;
    background: #0266a3 no-repeat 27px center;
 }.dijitAccordionChildWrapper {
    padding-top: 20px;
    padding-bottom: 20px;
}
.product{
    z-index: 50;
    padding: 5px 10px;
    margin: 4px 0px;
    background: #fff;
    box-shadow: inset 0px 0px 1px rgba(0,0,0,0.5);
    border: 1px solid #a9a9a9;
    border-radius: 4px;
    position: relative;
    	font-size: 14px;

}

      </style>
<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
<script>
require(["dijit/layout/AccordionContainer", "dijit/layout/ContentPane","dojo/request/xhr","dojo/_base/array","dojo/dom-class", "dojo/dnd/Source","dojo/domReady!"],

           


        function(AccordionContainer, ContentPane,xhr,array,domClass, Source){
    var aContainer = new AccordionContainer({style:"height:250px"}, "catalogNode");
    aContainer.addChild(new ContentPane({
        title: "Dex Hub",
		onClick: function(){
					 console.log("Requesting For Remote Data.........!");
                    xhr("products.json", {
                      handleAs: "json"
                    }).then(function(data){
                    //	var objdata = JSON.parse(data);

if(data.response.length!=0)
{
var objects = {};
	console.log(objects);
 	var catalog = new Source("productSubId", {  });
 			array.forEach(data.response, function(entry, i){  
 			catalog.insertNodes(false,[{data:entry.name}]);
  	});
		catalog.forInItems(function(item, id, map){
					domClass.add(id,'product');
			});

var cart = new Source("cartNode", {});
}

                            console.log("Success Requesting For Remote Data.........!"+data.response);
          
                    },function(err){
                                            console.log("Error Requesting For Remote Data.........!");

                    });
              

}

    	}));
    aContainer.addChild(new ContentPane({
        title:"This is as well",
    }));
    aContainer.addChild(new ContentPane({
        title:"This too",
    }));
    aContainer.startup();
});
	</script>

</head>

<body class="claro">




<h1>Template</h1>
<div class="container-fluid">
	<div class="row-fluid" >

			<div class="col-md-4 container">
					<h4 class="section-title">Product Catalog</h4>
					<div id="catalogNode"></div>
			</div>

			<div class="col-md-4 container" id="cartContainer">
					<h4 class="section-title">Select your product</h4>
						<div id="productSubId"></div>
			</div>
			<div class="col-md-4 container" id="wishlistNode">
					<h4 class="section-title">Media Cart</h4>
											<div id="cartNode" style="height: 250px; border: 0px solid black;"></div>

			</div>
	</div>
</div>
</body>
</html>