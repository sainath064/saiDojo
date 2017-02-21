<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    

    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dijit/themes/claro/claro.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dojox/form/resources/CheckedMultiSelect.css">
        <script>dojoConfig = {parseOnLoad: true}</script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.10.4/dojo/dojo.js"></script>
    <title></title>

    <script>
require(["dojox/form/CheckedMultiSelect"]);
    </script>
</head>
<body class="claro">

    <select multiple="true" name="multiselect" data-dojo-type="dojox.form.CheckedMultiSelect">
      <option value="TN">Tennessee</option>
      <option value="VA" selected="selected">Virginia</option>
      <option value="WA" selected="selected">Washington</option>
      <option value="FL">Florida</option>
      <option value="CA">California</option>
 </select>

</body>
</html>