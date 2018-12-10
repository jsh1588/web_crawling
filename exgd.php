<?
$im=imagecreate(300,300);
$gray=imagecolorallocate($im, 0, 255, 0);
$red=imagecolorallocate($im, 255, 0, 0);
imagepng($im);
?>
