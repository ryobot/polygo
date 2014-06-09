<?php

//session_start();
$plain = "x0";
if ( isset($_GET['plain']) ) {
  $plain = $_GET['plain'];
}
$stoneImgStr = '<img src="polygo.php?singleStone=blue">';
if ( isset($_GET['turn']) && $_GET['turn'] == "red" ) {
  $stoneImgStr = '<img src="polygo.php?singleStone=red">';
}

$gridImgStr = '<img src="polygo.php?plain='.$plain.'">';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>try 3D GO</title>
<script type="text/javascript">

var currentLayer = "opq";
var ballPos = new Array();

function onover(idStr) {
  document.getElementById("debug_string").innerHTML = "layer:" + idStr;
  document.getElementById("ball").style.top = ballPos[idStr + "t"].toString() + "px";
  document.getElementById("ball").style.left = ballPos[idStr + "l"].toString() + "px";
  document.getElementById("ball").style.visibility = "visible";
}

function initLayer(plain) {
  //window.alert("init layer");
  
  switch (plain) {

    case "x0":
      w = 28; h = 49; t_init =  60; l_init =  13; ydx = 52; ydy = -25; xdx = 0; xdy = 29; offset_t = -1; offset_l = -14; break;
    case "x1":
      w = 28; h = 49; t_init =  77; l_init =  66; ydx = 52; ydy = -25; xdx = 0; xdy = 29; offset_t = -1; offset_l = -14;  break;
    case "x2":
      w = 28; h = 49; t_init =  94; l_init = 119; ydx = 52; ydy = -25; xdx = 0; xdy = 29; offset_t = -1; offset_l = -14;  break;
    case "x3":
      w = 28; h = 49; t_init = 111; l_init = 172; ydx = 52; ydy = -25; xdx = 0; xdy = 29; offset_t = -1; offset_l = -14;  break;
      
    case "y0":
      w = 49; h = 49; t_init =  60; l_init =  10; ydx = 50; ydy = 18; xdx = 0; xdy = 50; offset_t = 0; offset_l = -15;  break;
    case "y1":
      w = 49; h = 49; t_init =  35; l_init =  39; ydx = 50; ydy = 18; xdx = 0; xdy = 50; offset_t = 0; offset_l = -15;  break;
    case "y2":
      w = 49; h = 49; t_init =  10; l_init =  68; ydx = 50; ydy = 18; xdx = 0; xdy = 50; offset_t = 0; offset_l = -15;  break;
    case "y3":
      w = 49; h = 49; t_init = -15; l_init =  97; ydx = 50; ydy = 18; xdx = 0; xdy = 50; offset_t = 0; offset_l = -15;  break;

    case "z0":
      w = 28; h = 49; t_init =  62; l_init =  13; ydx = 15; ydy = -25; xdx = 52; xdy = 29; offset_t = 0; offset_l = -15;  break;
    case "z1":
      w = 28; h = 49; t_init = 112; l_init =  13; ydx = 15; ydy = -25; xdx = 52; xdy = 29; offset_t = 0; offset_l = -15;  break;
    case "z2":
      w = 28; h = 49; t_init = 162; l_init =  13; ydx = 15; ydy = -25; xdx = 52; xdy = 29; offset_t = 0; offset_l = -15;  break;
    case "z3":
      w = 28; h = 49; t_init = 212; l_init =  13; ydx = 15; ydy = -25; xdx = 52; xdy = 29; offset_t = 0; offset_l = -15;  break;
      
    default:
      w = 30; h = 50; t_init = 60; l_init = 10; ydx = 50; ydy = -20; xdx = 0; xdy = 30; offset_t = 0; offset_l = -15;  break;
  }
  for ( x = 0; x < 4; x++ ) {
    for ( y = 0; y < 4; y++ ) {
      t = t_init + x*ydx + y*ydy;
      l = l_init + x*xdx + y*xdy;
      document.getElementById("over_" + x.toString() + y.toString()).style.top = t.toString() + "px";
      document.getElementById("over_" + x.toString() + y.toString()).style.left = l.toString() + "px";
      document.getElementById("over_" + x.toString() + y.toString()).style.width = w.toString() + "px";
      document.getElementById("over_" + x.toString() + y.toString()).style.height = h.toString() + "px";
      ballPos[x.toString() + y.toString() + "t"] = t + offset_t;
      ballPos[x.toString() + y.toString() + "l"] = l + offset_l;
    }
  }
}
</script>
</head>
<body bgcolor=black onload="initLayer('<?php echo $plain; ?>')">
<div style="height:100px">&nbsp;</div>
<div align="center">
<div style="position:relative; width:300px; height:300px">

<div id="opq" style="position: absolute; top:0px; left:0px;">
<?php echo $gridImgStr; ?>
</div>

<!-- switches -->
<div id="over_00" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('00')"></div>
<div id="over_01" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('01')"></div>
<div id="over_02" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('02')"></div>
<div id="over_03" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('03')"></div>
<div id="over_10" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('10')"></div>
<div id="over_11" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('11')"></div>
<div id="over_12" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('12')"></div>
<div id="over_13" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('13')"></div>
<div id="over_20" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('20')"></div>
<div id="over_21" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('21')"></div>
<div id="over_22" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('22')"></div>
<div id="over_23" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('23')"></div>
<div id="over_30" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('30')"></div>
<div id="over_31" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('31')"></div>
<div id="over_32" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('32')"></div>
<div id="over_33" style="position:absolute; background-color:red; opacity:0.0;" onMouseOver="onover('33')"></div>

<!-- ball -->
<div id="ball" style="position:absolute; visibility:hidden;"><?php echo $stoneImgStr; ?></div>

</div>
<font color=white>
<span id="debug_string">debug string</span>
</font>
</div>
</body>
</html>



