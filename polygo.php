<?php

class pos3d {
  public $x, $y, $z;
  public function __construct ($_x, $_y, $_z) {
    $this->x = $_x;
    $this->y = $_y;
    $this->z = $_z;
    //echo "pos3d ".$this->x."|".$this->y."|".$this->z."<br>";
  }
  public function set ($_x, $_y, $_z) {
    $this->x = $_x;
    $this->y = $_y;
    $this->z = $_z;
    //echo "pos3d ".$this->x."|".$this->y."|".$this->z."<br>";
  }
}

function p3d($_x, $_y, $_z) {
  $pos3d = new pos3d($_x, $_y, $_z);
  return $pos3d;
}

class pos2d {
  public $x, $y;
  public function __construct ($_x, $_y) {
    $this->x = $_x;
    $this->y = $_y;
  }
  public function set ($_x, $_y) {
    $this->x = $_x;
    $this->y = $_y;
  }
}

class axis {
  private $sin;
  private $cos;
  private $zcos;
  private $zero;
  public function __construct($_zero)
  {
    $this->sin = 0.48;
    $this->cos = 1.73205/2;
    $this->zcos = 1.73205/2;
    $this->zero = $_zero;
    //echo "conv3dto2d sin:".$this->sin."|cos:".$this->cos."|zcos:".$this->zcos."<br>";
  }
  public function conv3dto2d($pos)
  {
    //echo "conv3dto2d sin:".$this->sin."|cos:".$this->cos."|zcos:".$this->zcos."<br>";
    $x = $this->zero->x + $pos->x*$this->cos + $pos->y*$this->sin;
    //$x = 250 + $pos->x*$this->cos + $pos->y*$this->sin;
    $y = $this->zero->y + ($pos->x*$this->sin - $pos->y*$this->cos)/2 + $this->zcos*$pos->z;
    //$y = 250 + ($pos->x*$this->sin - $pos->y*$this->cos)/2 + $this->zcos*$pos->z;
    //echo "conv3dto2d ".$x."|".$y."<br>";
    $ret = new pos2d( $x, $y );
    return $ret;
  }
}

class plain {
  private $center;
  private $dim;
  private $width = 40;
  public $color;
  public function __construct ($_width, $_center, $_dim, $_color) {
    $this->width = $_width;
    $this->center = $_center;
    $this->dim = $_dim;
    $this->color = $_color;
  }
  public function set ($_center, $_dim, $_color) {
    $this->center = $_center;
    $this->dim = $_dim;
    $this->color = $_color;
  }
  public function getArray ($ax)
  {
    if ($this->dim->x == 0) {
      $p3d = new pos3d($this->center->x, $this->center->y - $this->width, $this->center->z - $this->width);
      $p2d_1 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x, $this->center->y + $this->width, $this->center->z - $this->width);
      $p2d_2 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x, $this->center->y + $this->width, $this->center->z + $this->width);
      $p2d_3 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x, $this->center->y - $this->width, $this->center->z + $this->width);
      $p2d_4 = $ax->conv3dto2d($p3d);
      $ret = array( $p2d_1->x, $p2d_1->y, $p2d_2->x, $p2d_2->y, $p2d_3->x, $p2d_3->y, $p2d_4->x, $p2d_4->y );
      //echo "polygon:".$p2d_1->x."|".$p2d_1->y."||".$p2d_2->x."|".$p2d_2->y."||".$p2d_3->x."|".$p2d_3->y."||".$p2d_4->x."|".$p2d_4->y."||";
      return $ret;
    }
    else if ($this->dim->y == 0) {
      $p3d = new pos3d($this->center->x - $this->width, $this->center->y, $this->center->z - $this->width);
      $p2d_1 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x + $this->width, $this->center->y, $this->center->z - $this->width);
      $p2d_2 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x + $this->width, $this->center->y, $this->center->z + $this->width);
      $p2d_3 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x - $this->width, $this->center->y, $this->center->z + $this->width);
      $p2d_4 = $ax->conv3dto2d($p3d);
      $ret = array( $p2d_1->x, $p2d_1->y, $p2d_2->x, $p2d_2->y, $p2d_3->x, $p2d_3->y, $p2d_4->x, $p2d_4->y );
      //echo "polygon:".$p2d_1->x."|".$p2d_1->y."||".$p2d_2->x."|".$p2d_2->y."||".$p2d_3->x."|".$p2d_3->y."||".$p2d_4->x."|".$p2d_4->y."||";
      return $ret;
    }
    else {
      $p3d = new pos3d($this->center->x - $this->width, $this->center->y - $this->width, $this->center->z);
      $p2d_1 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x + $this->width, $this->center->y - $this->width, $this->center->z);
      $p2d_2 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x + $this->width, $this->center->y + $this->width, $this->center->z);
      $p2d_3 = $ax->conv3dto2d($p3d);
      $p3d->set($this->center->x - $this->width, $this->center->y + $this->width, $this->center->z);
      $p2d_4 = $ax->conv3dto2d($p3d);
      $ret = array( $p2d_1->x, $p2d_1->y, $p2d_2->x, $p2d_2->y, $p2d_3->x, $p2d_3->y, $p2d_4->x, $p2d_4->y );
      //echo "polygon:".$p2d_1->x."|".$p2d_1->y."||".$p2d_2->x."|".$p2d_2->y."||".$p2d_3->x."|".$p2d_3->y."||".$p2d_4->x."|".$p2d_4->y."||";
      return $ret;
    }
  }
}

class stone {
  private $center;
  private $rad = 10;
  private $r_ratio = 2;
  private $color;
  private $color_l;
  private $color_s;
  public function __construct ($_center, $_rad, $_color, $_color_l, $_color_s) {
    $this->center = $_center;
    $this->rad = $_rad;
    $this->color = $_color;
    $this->color_l = $_color_l;
    $this->color_s = $_color_s;
  }
  public function set_center ($_center) {
    $this->center = $_center;
  }
  public function set_rad ($_rad) {
    $this->rad = $_rad;
  }
  public function set_color ($_color, $_color_l, $_color_s) {
    $this->color = $_color;
    $this->color_l = $_color_l;
    $this->color_s = $_color_s;
  }
  public function get_center () {
    return $this->center;
  }
  public function get_z () {
    return p3d( $this->center->x + $this->rad,
                $this->center->y - $this->rad,
                $this->center->z - $this->rad );
  }
  public function draw ($img, $ax, $thick) {
    $pos2d = $ax->conv3dto2d($this->center);
    imagesetthickness( $img, $thick*0.2 );
    imagefilledellipse ( $img, $pos2d->x, $pos2d->y, $this->rad*$this->r_ratio,  $this->rad*$this->r_ratio, $this->color );
    imagearc ( $img, $pos2d->x, $pos2d->y, $this->rad*$this->r_ratio,  $this->rad*$this->r_ratio, 1, 360, $this->color_s );
    imagesetthickness( $img, $thick );
    imagearc ( $img, $pos2d->x, $pos2d->y, $this->rad*$this->r_ratio*0.6,  $this->rad*$this->r_ratio*0.6, 0, 90, $this->color_l );
  }
}

function draw3dline($img, $ax, $from, $to, $color)
{
  $from2d = $ax->conv3dto2d($from);
  $to2d = $ax->conv3dto2d($to);
  imageline($img, $from2d->x, $from2d->y, $to2d->x, $to2d->y, $color);
}

class stick {
  private $from;
  private $to;
  public $color;
  public function __construct ($_from, $_to, $_color) {
    $this->from = $_from;
    $this->to = $_to;
    $this->color = $_color;
  }
  public function set_from ($_from) {
    $this->from = $_from;
  }
  public function set_to ($_to) {
    $this->to = $_to;
  }
  public function set_color ($_color) {
    $this->color = $_color;
  }
  public function get_center () {
    return p3d( ($this->from->x + $this->to->x)/2,
                ($this->from->y + $this->to->y)/2,
                ($this->from->z + $this->to->z)/2 );
  }
  public function get_z () {
    return $this->get_center();
  }
  public function draw ($img, $ax, $thick) {
    imagesetthickness( $img, $thick );
    draw3dline($img, $ax, $this->from, $this->to, $this->color);
  }
}

// main:
$multi = 2;
$img = imagecreatetruecolor(500*$multi, 500*$multi);
//imageantialias($img, true);

imageAlphaBlending($img, false);
imageSaveAlpha($img, true);

$transparent = imageColorAllocateAlpha($img, 0xFF, 0x00, 0xFF, 127);
imageFill($img, 0, 0, $transparent);

// alpha for dim:
$alpha = 80;

$red = imagecolorallocatealpha($img, 200, 50, 50, 0);
$red_l = imagecolorallocatealpha($img, 200, 100, 100, 0);
$red_s = imagecolorallocatealpha($img, 120, 50, 50, 0);
$t_red = imagecolorallocatealpha($img, 200, 50, 50, $alpha);
$t_red_l = imagecolorallocatealpha($img, 200, 100, 100, $alpha);
$t_red_s = imagecolorallocatealpha($img, 120, 50, 50, $alpha);

$blu = imagecolorallocatealpha($img,  50, 50, 200, 0);
$blu_l = imagecolorallocatealpha($img, 100, 100, 200, 0);
$blu_s = imagecolorallocatealpha($img, 50, 50, 120, 0);
$t_blu = imagecolorallocatealpha($img,  50, 50, 200, $alpha);
$t_blu_l = imagecolorallocatealpha($img, 100, 100, 200, $alpha);
$t_blu_s = imagecolorallocatealpha($img, 50, 50, 120, $alpha);

$grn = imagecolorallocatealpha($img,  50,200, 50, 10);
$wht = imagecolorallocatealpha($img, 200,200,200, 10);

$ylw = imagecolorallocatealpha($img, 180,180, 50, 10);
$org = imagecolorallocatealpha($img, 200,120, 50, 10);
$t_ylw = imagecolorallocatealpha($img, 180,180, 50, $alpha);
$t_org = imagecolorallocatealpha($img, 200,120, 50, $alpha);

//imagefilledrectangle($img, 50, 50, 450, 450, $red);
//imageline($img, 50, 50, 450, 450, $red);

//axis
$zero = new pos2d( $multi*250, $multi*250 );
$ax = new axis($zero);
imagesetthickness( $img, 3*$multi );

$stone_thick = $multi*10;
$stick_thick = $multi*5;

if ( isset($_GET['singleStone']) ) {
  $center = new pos3d( 0, 0, 0 );
  if ( $_GET['singleStone'] == "blue" ) {
    $item = new stone( $center, 50, $blu, $blu_l, $blu_s );
    $item->draw($img, $ax, $stone_thick);
  } else {
    $item = new stone( $center, 50, $red, $red_l, $red_s );
    $item->draw($img, $ax, $stone_thick);
  }

  $smallImg = imagecreatetruecolor( 50, 50 );
  imageAlphaBlending($smallImg, false);
  imageSaveAlpha($smallImg, true);

  imagecopyresampled( $smallImg, $img, 0, 0, $multi*200, $multi*200, 60, 60, $multi*100, $multi*100 );
}

else {

//axis
draw3dline($img, $ax, p3d(-200,0,0), p3d(200,0,0), $red);
draw3dline($img, $ax, p3d(0,-200,0), p3d(0,200,0), $blu);
draw3dline($img, $ax, p3d(0,0,-200), p3d(0,0,200), $grn);

$currentStoneStr = "a000|0b00|0000|000b#0000|a0b0|0000|000b#00a0|b000|0000|0b00#a000|00b0|0a00|0000";
if ( isset($_GET['stone'])) {
  $currentStoneStr = $_GET["stone"];
}
$currentStoneStr = str_replace("|", "", $currentStoneStr);
$currentStoneStr = str_replace("#", "", $currentStoneStr);

$plain_x = -1;
$plain_y = -1;
$plain_z = -1;
$opaque = TRUE;

if ( isset($_GET['plain'])) {
  switch (substr( $_GET['plain'], 0, 1)) {
    case "x":
      $plain_x = intval(substr( $_GET['plain'], 1, 1));
      $opaque = FALSE;
      break;
    case "y":
      $plain_y = intval(substr( $_GET['plain'], 1, 1));
      $opaque = FALSE;
      break;
    case "z":
      $plain_z = intval(substr( $_GET['plain'], 1, 1));
      $opaque = FALSE;
      break;
    default:
      break;
  }
}

$center = new pos3d( 100, 0, 0 );
$st = new stone($center, $multi*50, $red, $red_l, $red_s);

$step = 200;
$r = 50;
$spoke = $step - 2*$r;

#imagesetthickness( $img, 5*$multi );

// grids:
for ( $y = 3; $y >= 0; $y--) {
  for ( $z = 3; $z >= 0; $z--) {
    for ( $x = 0; $x < 4; $x++) {
      if ( $opaque || $x == $plain_x || $y == $plain_y || $z == $plain_z ) {
          $red_stone_color = $red;
          $red_stone_l = $red_l;
          $red_stone_s = $red_s;
          $blu_stone_color = $blu;
          $blu_stone_l = $blu_l;
          $blu_stone_s = $blu_s;
      } else {
          $red_stone_color = $t_red;
          $red_stone_l = $t_red_l;
          $red_stone_s = $t_red_s;
          $blu_stone_color = $t_blu;
          $blu_stone_l = $t_blu_l;
          $blu_stone_s = $t_blu_s;
      }
      
      $center = new pos3d( $x*200-300, $y*200-300, $z*200-300 );
      
      $stoneChar = substr( $currentStoneStr, ($x*4 + $y)*4 + $z, 1 );
      switch ($stoneChar) {
        case "a":
          $item = new stone( $center, $r, $red_stone_color, $red_stone_l, $red_stone_s );
          $item->draw($img, $ax, $stone_thick);
          break;
        case "b":
          $item = new stone( $center, $r, $blu_stone_color, $blu_stone_l, $blu_stone_s );
          $item->draw($img, $ax, $stone_thick);
          break;
        default:
          if ($x > 0) {
            if ( $opaque || $y == $plain_y || $z == $plain_z ) {
              $item= new stick( $center, p3d($center->x - $r, $center->y, $center->z ), $ylw);
            } else {
              $item= new stick( $center, p3d($center->x - $r, $center->y, $center->z ), $t_ylw);
            }
            $item->draw($img, $ax, $stick_thick);
          }
          if ($y > 0) {
            if ( $opaque || $x == $plain_x || $z == $plain_z ) {
              $item = new stick( $center, p3d($center->x, $center->y - $r, $center->z ), $ylw);
            } else {
              $item = new stick( $center, p3d($center->x, $center->y - $r, $center->z ), $t_ylw);
            }
            $item->draw($img, $ax, $stick_thick);
          }
          if ($z > 0) {
            if ( $opaque || $x == $plain_x || $y == $plain_y ) {
              $item = new stick( $center, p3d($center->x, $center->y, $center->z - $r ), $ylw);
            } else {
              $item = new stick( $center, p3d($center->x, $center->y, $center->z - $r ), $t_ylw);
            }
            $item->draw($img, $ax, $stick_thick);
          }
          if ($x < 3) {
            if ( $opaque || $y == $plain_y || $z == $plain_z ) {
              $item = new stick( $center, p3d($center->x + $r, $center->y, $center->z ), $ylw);
            } else {
              $item = new stick( $center, p3d($center->x + $r, $center->y, $center->z ), $t_ylw);
            }
            $item->draw($img, $ax, $stick_thick);
          }
          if ($y < 3) {
            if ( $opaque || $x == $plain_x || $z == $plain_z ) {
              $item = new stick( $center, p3d($center->x, $center->y + $r, $center->z ), $ylw);
            } else {
              $item = new stick( $center, p3d($center->x, $center->y + $r, $center->z ), $t_ylw);
            }
            $item->draw($img, $ax, $stick_thick);
          }
          if ($z < 3) {
            if ( $opaque || $x == $plain_x || $y == $plain_y ) {
              $item = new stick( $center, p3d($center->x, $center->y, $center->z + $r ), $ylw);
            } else {
              $item = new stick( $center, p3d($center->x, $center->y, $center->z + $r ), $t_ylw);
            }
            $item->draw($img, $ax, $stick_thick);
          }
      }
      
      if ($x < 3) {
        if ( $opaque || $y == $plain_y || $z == $plain_z ) {
          $item = new stick( p3d($center->x + $r, $center->y, $center->z ), p3d($center->x + $r + $spoke, $center->y, $center->z ), $org);
        } else {
          $item = new stick( p3d($center->x + $r, $center->y, $center->z ), p3d($center->x + $r + $spoke, $center->y, $center->z ), $t_org);
        }
        $item->draw($img, $ax, $stick_thick);
      }
      if ($y > 0) {
        if ( $opaque || $x == $plain_x || $z == $plain_z ) {
          $item = new stick( p3d($center->x, $center->y - $r, $center->z ), p3d($center->x, $center->y - $r - $spoke, $center->z ), $org);
        } else {
          $item = new stick( p3d($center->x, $center->y - $r, $center->z ), p3d($center->x, $center->y - $r - $spoke, $center->z ), $t_org);
        }
        $item->draw($img, $ax, $stick_thick);
      }
      if ($z > 0) {
        if ( $opaque || $x == $plain_x || $y == $plain_y ) {
          $item = new stick( p3d($center->x, $center->y, $center->z - $r ), p3d($center->x, $center->y, $center->z - $r - $spoke ), $org);
        } else {
          $item = new stick( p3d($center->x, $center->y, $center->z - $r ), p3d($center->x, $center->y, $center->z - $r - $spoke ), $t_org);
        }
        $item->draw($img, $ax, $stick_thick);
      }
      
    }
  }
}

imagesetthickness( $img, 1 );

$smallImg = imagecreatetruecolor( 300, 300 );
imageAlphaBlending($smallImg, false);
imageSaveAlpha($smallImg, true);

imagecopyresampled( $smallImg, $img, 0, 0, 0, 0, 300, 300, $multi*500, $multi*500 );

}

header('Content-type: image/png');
imagepng($smallImg);
//imagepng($img);
imagedestroy($img);
imagedestroy($smallImg);
?>