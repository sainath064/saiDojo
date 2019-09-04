<html>
<head>
<title>Drag And Drop!</title>
<style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://downloads.dojotoolkit.org/release-1.10.1/dojo-release-1.10.1/dojo/resources/dojo.css";



ol, ul, div {
    margin: 0;
}
.container {
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #aaa;
    cursor: default;
    padding: 1em;
}
.wishlistContainer, .catalogContainer, .cartContainer {
    float: left;
    margin-right: 20px;
    width: 233px;
}
.catalogContainer ul {
    height: 300px;
}

.instructions {
    clear: both;
    padding-top: 2em;
}
.details {
    clear: both;
    padding-top: 1em;
}
#catalogNode {
    list-style: none outside none;
}
#cartNode, #wishlistNode {
    padding: 1em 3em;
}

#sourceId{
	width: 100%;
	height: 900px;
	background-color: #fadbd8 ;
	border: 1px solid #fff;
	font-size: 14px;
      }
#targetId{
	width: 100%;
	height: 900px;
	background-color:  #a3e4d7 ;
	border: 1px solid #fff;
	font-size: 14px;
    }
.dojoDndItem {
	border-bottom: 1px solid #fafafa;
	border-top: 1px solid #fafafa;
	margin-bottom: 0px;
	min-height: 35px;
	cursor:  move;
	text-align: center;
	vertical-align: top;
}
      </style>
<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js" data-dojo-config="async: false,parseOnLoad: true,isDebug: true"></script>
<script type="text/javascript">
require([ "dojo/dom-class", "dojo/dnd/Source", "dojo/domReady!" ], function(domClass, Source){
			var catalog = new Source("catalogNode", { accept: [ "inStock", "outOfStock" ] });
			catalog.insertNodes(false, [
				{ data: "Wrist watch",        type: [ "inStock" ] },
				{ data: "Life jacket",        type: [ "inStock" ] },
				{ data: "Toy bulldozer",      type: [ "inStock" ] },
				{ data: "Vintage microphone", type: [ "outOfStock" ] },
				{ data: "TIE fighter",        type: [ "outOfStock" ] },
				{ data: "Apples",             type: [ "inStock" ] },
				{ data: "Bananas",            type: [ "inStock" ] },
				{ data: "Tomatoes",           type: [ "outOfStock" ] },
				{ data: "Bread",              type: [ "inStock" ] }
			]);
			catalog.forInItems(function(item, id, map){
				domClass.add(id, item.type[0]);
			});


			console.log(catalog.getAllNodes());

			var cart = new Source("cartNode", { accept: [ "inStock" ] });
			var wishlist = new Source("wishlistNode", { accept: [ "inStock", "outOfStock" ] });
		});
</script>
</head>

<body class="claro">
<h1>dojo.dnd :: Step 2 (programmatic)</h1>

	<div id="toggle"><a href="2-dnd.markup.html">View the declarative version of this demo</a></div>

	<div id="store">
		<div class="catalogContainer">
			<h2>Catalog</h2>
			<ul id="catalogNode" class="container"></ul>
		</div>

		<div class="cartContainer">
			<h2>Cart</h2>
			<ol id="cartNode" class="container"></ol>
		</div>
		<div class="wishlistContainer">
			<h2>Wishlist</h2>
			<ol id="wishlistNode" class="container"></ol>
		</div>

		<p class="instructions"><b>Instructions:</b> Drag products from the Catalog into either the Cart or Wishlist.</p>

		<p class="details"><b>Notes:</b></p>
		<ul>
			<li>This is step 2 in the SitePen blog’s <a href="http://www.sitepen.com/blog/?p=3198">Dojo Drag’n’Drop Redux</a>.</li>
			<li>The Wishlist accepts anything in the store; the Cart only accepts items marked as in stock.</li>
			<li>Reassignments between lists are possible, as long as the target list will accept the item being reassigned.</li>
			<li>Standard multiple selection works here. Beware; you can only drop a group if every item can be dropped into the list you’re attempting to drop them on!</li>
			<li>The Wishlist and Cart are both regular ordered lists; feel free to re-order them internally via drag and drop as well.</li>
			<li>Breakthrough at the lab! It’s possible to clone products!</li>
		</ul>
	</div>


</body>

</html>