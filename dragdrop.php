<html>
<head>
<title>Drag And Drop!</title>
<style type="text/css" title="text/css">
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dijit/themes/claro/claro.css";
      @import "http://ajax.googleapis.com/ajax/libs/dojo/1.5/dojox/form/resources/CheckedMultiSelect.css";


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
</script>
<script type="text/javascript">
dojo.require("dojo.dnd.Source");
dojo.require("dojo.parser");
dojo.require("dijit.TitlePane");


require([
    "dojo/store/Memory",
    "dijit/form/FilteringSelect",
    "dojox/form/CheckedMultiSelect",
    "dojo/domReady!"
], function(Memory, FilteringSelect,CheckedMultiSelect){
    var stateStore = new Memory({
        data: [
            {name:"Alabama", id:"AL"},
            {name:"Alaska", id:"AK"},
            {name:"American Samoa", id:"AS"},
            {name:"Arizona", id:"AZ"},
            {name:"Arkansas", id:"AR"},
            {name:"Armed Forces Europe", id:"AE"},
            {name:"Armed Forces Pacific", id:"AP"},
            {name:"Armed Forces the Americas", id:"AA"},
            {name:"California", id:"CA"},
            {name:"Colorado", id:"CO"},
            {name:"Connecticut", id:"CT"},
            {name:"Delaware", id:"DE"}
        ]
    });

    var filteringSelect = new FilteringSelect({
        id: "stateSelect",
        name: "state",
        value: "CA",
        store: stateStore,
        searchAttr: "name"
    }, "stateSelect").startup();
});

</script>


</head>

<body class="claro">


<table border="1" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top" width="50%">
<div dojoType="dojo.dnd.Source" id="sourceId" jsId="sourceData" class="source" accept="vinod,suman,amar,ravi,aman,sainath">
	<center><h2><b style="background-color:#999999 ">Source Data</b></h2></center>
	<div class="dojoDndItem" dndType="vinod">
						<div style=" color: red;"><h3>Dragable Div (Cricketers)</h3></div>
						<div data-dojo-type="dijit/TitlePane" open="true"  data-dojo-props="title: 'Virat Kohli'">
						Born and raised in Delhi, Kohli represented the city's cricket team at various age-group levels before making his first-class debut in 2006. He captained India Under-19s to victory at the 2008 Under-19 World Cup in Malaysia, and a few months later, made his ODI debut for India against Sri Lanka at the age of 19. Initially having played as a reserve batsman in the Indian team, he soon established himself as a regular in the ODI middle-order and was part of the squad that won the 2011 World Cup. He made his Test debut in 2011, and shrugged off the tag of "ODI specialist" by 2013 with Test hundreds in Australia and South Africa.[4] Having reached the number one spot in the ICC rankings for ODI batsmen for the first time in 2013,[5] Kohli also found success in the Twenty20 format, winning the Man of the Tournament twice at the ICC World Twenty20 (in 2014 and 2016). In 2014, he became the top-ranked T20I batsman in the ICC rankings and holds the position, as of January 2017.[6]
S				    </div>
				    <div data-dojo-type="dijit/TitlePane" open="false"  data-dojo-props="title: 'MS Dhoni'">
				        Dhoni holds numerous captaincy records such as most wins by an Indian captain in Tests and ODIs, and most back-to-back wins by an Indian captain in ODIs. He took over the ODI captaincy from Rahul Dravid in 2007 and led the team to its first-ever bilateral ODI series wins in Sri Lanka and New Zealand. Under his captaincy, India won the 2007 ICC World Twenty20, the CB Series of 2007–08, the 2010 Asia Cup, the 2011 ICC Cricket World Cup and the 2013 ICC Champions Trophy. In the final of the 2011 World Cup, Dhoni scored 91 not out off 79 balls handing India the victory for which he was awarded the Man of the Match. In June 2013, when India defeated England in the final of the Champions Trophy in England, Dhoni became the first captain to win all three ICC limited-overs trophies (World Cup, Champions Trophy and the World Twenty20). After taking up the Test captaincy in 2008, he led the team to series wins in New Zealand and West Indies, and the Border-Gavaskar Trophy in 2008, 2010 and 2013. In 2009, Dhoni also led the Indian team to number one position for the first time in the ICC Test rankings. In 2013, under his captaincy, India became the first team in more than 40 years to whitewash Australia in a Test series. In the Indian Premier League, he captained the Chennai Super Kings to victory at the 2010 and 2011 seasons, along with wins in the 2010 and 2014 editions of Champions League Twenty20. He announced his retirement from Tests on 30 December 2014.[6]

				    </div>
				    <div data-dojo-type="dijit/TitlePane" open="false"  data-dojo-props="title: 'Yuvraj Singh'">
				       Yuvraj Singh (About this sound pronunciation (help·info)) (born 12 December 1981) is an Indian international cricketer, an all-rounder who bats left-handed in the middle order and bowls slow left-arm orthodox. He is the son of former Indian fast bowler and Punjabi actor Yograj Singh. Yuvraj has been a member of the Indian cricket team in ODIs since October 2000 and played his first Test match in October 2003. He was the vice-captain of the Indian ODI team between 2007-2008. He was the Man of the Tournament in the 2011 ICC Cricket World Cup, and one of the top performers at the 2007 ICC World Twenty20, both of which India won. He was the first person to take a 5 wicket-haul and score a 50 in a World Cup innings. In a match against England at the 2007 World Twenty20, he famously hit six sixes in one over bowled by Stuart Broad — a feat performed only three times previously in any form of senior cricket, and never in an international match between two Test cricket teams. He holds the record for the fastest fifty in Twenty20 Internationals and in all Twenty20 matches, scoring 50 runs in 12 balls against England in 2007.
    </div>

	</div>
	
	<div class="dojoDndItem" dndType="suman">
		<div>Suman</div>
	</div>
	
	<div class="dojoDndItem" dndType="amar">
		<div>Amar</div>
	</div>
	
	<div class="dojoDndItem" dndType="ravi">
		<div>Ravi</div>
	</div>
	
	<div class="dojoDndItem" dndType="aman">
		<div>Aman</div>
	</div>
</div>
</td>

<td valign="top" width="50%">
<!-- Target -->
<div dojoType="dojo.dnd.Source" id="targetId" jsId="sourceId" class="target" accept="vinod,suman,amar,ravi,aman,sainath">
	<center><h2><b style="background-color:#999999 ">Target Data</b></h2></center>

		<div class="dojoDndItem" dndType="sainath">
Draggble Drop Down:<input id="stateSelect">
</div>


</div>
</td>

</tr>

</table>

</body>

</html>