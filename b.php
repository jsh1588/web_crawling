<?
header("content-type: image/png");
//바탕크기설정
$im=imagecreate(500,250);

//색상을 설정
$gray=ImageColorAllocate($im,192,192,192);
$blue=ImageColorAllocate($im,0,0,255);
$red=ImageColorallocate($im,255,0,0);
$green=ImageColorallocate($im,0,50,0);
$pink=ImageColorallocate($im,100,0,100);
$black=ImageColorallocate($im,0,0,0);
$gray2=ImageColorallocate($im,128,128,128);

//가로선 ( ,시작x,시작y,종료x,종료y,색상)
imageline($im,20,230,480,230,$black);

//세로선 ( ,시작x,시작y,종료x,종료y,색상)
imageline($im,20,230,20,20,$black);

//글씨( , 폰트크기, x, y, "string", color)
imagestring ($im, 2, 13, 233, 0, $blue);

//가로선(시간) 모눈
$yy=20;
$time=1;
for($y=40; $time<24; $y+=20){
 $yy+=20;
 imageline($im,$y,229,$y,20,$gray2);
 imagestring ($im, 2, $yy-4, 233, $time++, $blue);
 
}

$xx=230;
$vel=0;
//세로선(속도) 모눈
for($x=30; $x<230; $x+=20){
 $xx-=20;
 imageline($im,21,$x,480,$x,$gray2);
 imagestring ($im, 2, 1, $xx-5, $vel+=10, $blue);
}

//속도 표기(3분당1회)( , 시간변화, 속도변화, 시간변화, 속도변화)

$t=20;
$v=230;
for($i=0; $i<50; $i++){
$t+=1;
$v-=2;
 imageline($im,$t,$v,$t,$v-1,$red);
}


//원
//for ($n=1;$n<220;$n+=20) imagearc($im,125,125,$n,$n,0,360,$green);

//$y0=125;
//for($x=0;$x<248;$x+=2) 
// {$y1=round(125 - rand(10,30) );
//  imageline($im,$x,$y0,$x+2,$y1,$pink);
//  $y0=$y1;
// }
//  
imagepng($im);
imagedestroy($im);
?>
