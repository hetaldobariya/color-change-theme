<?php
include('db.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$background=$_POST['background'];
$header=$_POST['header'];
$sidebar=$_POST['sidebar'];
$footer=$_POST['footer'];
$links=$_POST['links'];
$text=$_POST['text'];

mysqli_query($db, "UPDATE users SET background='$background',header='$header',sidebar='$sidebar',footer='$footer',texts='$text',links='$links' WHERE user_id='1'");
$msg='Design updated.';
}

$sql=mysqli_query($db, "SELECT background,header,sidebar,footer,texts,links FROM users WHERE user_id='1'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$background=$row['background'];
$header=$row['header'];
$sidebar=$row['sidebar'];
$footer=$row['footer'];
$text=$row['texts'];
$links=$row['links'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live Design Changing with Jquery</title>
<meta content='Live Design Changing with Jquery' name='description'/> 
<meta content='Live, Design, Changing, with Jquery' name='keywords'/> 
<link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

<script type="text/javascript" src="js/colorpicker.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{
	$('.color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});

$(".colorpicker_submit").click(function() 
{
var B = $("#background").val();
var sidebar = $("#sidebarinput").val();
var header = $("#headerinput").val();
var footer = $("#footerinput").val();
var T = $("#textinput").val();
var L = $("#linkinput").val();

$("#header").css("background-color", "#"+header);
$("#main_right").css("background-color", "#"+sidebar);
$("#footer").css("background-color", "#"+footer);
$('body').css("background-color", "#"+B);
$('#container').css("color", "#"+T);
$('#container a').css("color", "#"+L);

});

});
</script>

<style>
*{ margin:0px; padding:0px}
body
{
	background-color:#<?php echo $background; ?>;
	
	font-family:Arial, Helvetica, sans-serif;
}
#container
{
margin:0 auto;
width:800px;
color:#<?php echo $text; ?>;
}
#container a
{
	color:#<?php echo $links; ?>;
	
}

#header
{
	background-color:#<?php echo $header; ?>;
	height:100px;
	margin-top:15px;
	
}
#main
{
	
	min-height:600px;
	overflow:auto;
	margin-top:10px;

}
#main_left
{
	background-color:#ffffff;
	min-height:600px;
	width:590px;
	margin-right:10px;
	overflow:auto;
		float:left;
	

}
#main_right
{
	background-color:#<?php echo $sidebar; ?>;
	min-height:600px;
	width:200px;
	overflow:auto;
	float:left;
	

}
#footer
{
	background-color:#<?php echo $footer; ?>;
	height:70px;
	margin-top:10px;
	

}
.rounded
{
border-radius:8px;
-moz-border-radius:8px;
-webkit-border-radius:8px;	
}
.space
{
	margin-bottom:15px;
}
label
{
	font-size:13px;
	margin-bottom:5px;
	font-weight:bold;
}
.color
{
	border:solid 1px #333;
	padding:4px;
	margin-top:8px;

}
.savebutton
{
	color:#fff;
	border:solid 1px #333;
	padding:5px;
	background-color:#333;
	font-weight:bold
	
	
}

</style>
</head>

<body>
<div id="container">
<div id="header" class="rounded">


</div>

<div id="main">
<div id="main_left"  class="rounded">
<div style="padding:25px">
<h1>Live Design Changing with Jquery </h1>
<h3>Tutorial link <a href="http://9lessons.info">Click Here</a></h3>
<br/>
<form method="post" action="" />
<div class="space">
<label>Background:</label><br/> <input type="text" name="background" id="background" class="color" value="<?php echo $background; ?>" readonly="readonly"/>
</div>

<div  class="space">
<label>Header:</label> <br/><input type="text" name="header" class="color" id="headerinput" value="<?php echo $header; ?>" readonly="readonly" />
</div>

<div  class="space">
<label>Sidebar:</label><br/> <input type="text" name="sidebar" class="color" id="sidebarinput"  value="<?php echo $sidebar; ?>" readonly="readonly"/>
</div>

<div  class="space">
<label>Footer:</label><br/> <input type="text" name="footer" class="color"  id="footerinput" value="<?php echo $footer; ?>" readonly="readonly"/>
</div>

<div  class="space">
<label>Text:</label><br/> <input type="text" name="text" class="color" id="textinput" value="<?php echo $text; ?>" readonly="readonly"/>
</div>

<div  class="space">
<label>Links:</label><br/> <input type="text" name="links" class="color" id="linkinput" value="<?php echo $links; ?>" readonly="readonly"/>
</div>

<div  class="space">
<input type="submit" value=" Save Changes " class='savebutton'/> <?php echo $msg; ?>
</div>
</form>
</div>
</div>
<div id="main_right"  class="rounded">
<div style="padding:10px"></div>
</div>
</div>

<div id="footer"  class="rounded">
</div>

</div>


</body>
</html>
