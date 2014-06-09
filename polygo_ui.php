<?php

//session_start();
$gridImgStr = array();
$gridImgStr['opq'] = '<img src="polygo.php">';
$gridImgStr['x0'] = '<img src="polygo.php?plain=x0">';
$gridImgStr['x1'] = '<img src="polygo.php?plain=x1">';
$gridImgStr['x2'] = '<img src="polygo.php?plain=x2">';
$gridImgStr['x3'] = '<img src="polygo.php?plain=x3">';
$gridImgStr['y0'] = '<img src="polygo.php?plain=y0">';
$gridImgStr['y1'] = '<img src="polygo.php?plain=y1">';
$gridImgStr['y2'] = '<img src="polygo.php?plain=y2">';
$gridImgStr['y3'] = '<img src="polygo.php?plain=y3">';
$gridImgStr['z0'] = '<img src="polygo.php?plain=z0">';
$gridImgStr['z1'] = '<img src="polygo.php?plain=z1">';
$gridImgStr['z2'] = '<img src="polygo.php?plain=z2">';
$gridImgStr['z3'] = '<img src="polygo.php?plain=z3">';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>try 3D GO</title>
<script type="text/javascript">
var currentLayer = "opq";
function onover(idStr) {
  document.getElementById(idStr).style.visibility = "visible";
  if (currentLayer != idStr) {
    document.getElementById(currentLayer).style.visibility = "hidden";
  }
  document.getElementById("debug_string").innerHTML = "layer:" + currentLayer + " --> " + idStr;
  currentLayer = idStr;
}
</script>
</head>
<body bgcolor=black>
<div style="height:100px">&nbsp;</div>
<div align="center">
<div style="position:relative; width:300px; height:300px">

<div id="opq" style="position: absolute; top:0px; left:0px;">
<?php echo $gridImgStr['opq']; ?>
</div>

<!-- x plain layers -->
<div id="x0" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['x0']; ?></div>
<div id="x1" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['x1']; ?></div>
<div id="x2" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['x2']; ?></div>
<div id="x3" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['x3']; ?></div>

<!-- y plain layers -->
<div id="y0" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['y0']; ?></div>
<div id="y1" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['y1']; ?></div>
<div id="y2" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['y2']; ?></div>
<div id="y3" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['y3']; ?></div>

<!-- z plain layers -->
<div id="z0" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['z0']; ?></div>
<div id="z1" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['z1']; ?></div>
<div id="z2" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['z2']; ?></div>
<div id="z3" style="position: absolute; top:0px; left:0px; visibility:hidden;"><?php echo $gridImgStr['z3']; ?></div>

<div id="over_opq" style="position:absolute; top:0px; left:0px; width:300px; height:300px;" onMouseOver="onover('opq')"></div>
<div id="over_opq" style="position:absolute; top:100px; left:150px; width:60px; height:100px;"></div>

<div id="over_x3" style="position:absolute; top:100px; left:200px; width:90px; height:180px;" onMouseOver="onover('x3')"></div>
<div id="over_y0" style="position:absolute; top:120px; left:20px; width:140px; height:150px;" onMouseOver="onover('y0')"></div>
<div id="over_z0" style="position:absolute; top:20px; left:50px; width:220px; height:80px;" onMouseOver="onover('z0')"></div>2

<!-- x plain switches -->
<div id="over_x0" style="position:absolute; top:60px; left:10px; width:50px; height:70px;" onMouseOver="onover('x0')"></div>
<div id="over_x1" style="position:absolute; top:80px; left:60px; width:50px; height:70px;" onMouseOver="onover('x1')"></div>
<div id="over_x2" style="position:absolute; top:100px; left:110px; width:50px; height:70px;" onMouseOver="onover('x2')"></div>

<!-- y plain switches -->
<div id="over_y3" style="position:absolute; top:40px; left:255px; width:30px; height:80px;" onMouseOver="onover('y3')"></div>
<div id="over_y2" style="position:absolute; top:60px; left:225px; width:30px; height:80px;" onMouseOver="onover('y2')"></div>
<div id="over_y1" style="position:absolute; top:80px; left:195px; width:30px; height:80px;" onMouseOver="onover('y1')"></div>

<!-- z plain switches -->
<div id="over_z3" style="position:absolute; top:260px; left:160px; width:40px; height:40px;" onMouseOver="onover('z3')"></div>
<div id="over_z2" style="position:absolute; top:210px; left:160px; width:40px; height:50px;" onMouseOver="onover('z2')"></div>
<div id="over_z1" style="position:absolute; top:160px; left:160px; width:40px; height:50px;" onMouseOver="onover('z1')"></div>


</div>
<font color=white>
<span id="debug_string">debug string</span>
</font>
</div>
</body>
</html>



