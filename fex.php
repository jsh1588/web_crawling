<?
    include "simple_html_dom.php";    
 
    /*if(!$_GET[page]) $page = 1;
    else $page = $_GET[page];*/
        
    $html = file_get_html("https://datalab.naver.com/");
	$i = 0;
	$o = -1;
    if($html)
    {
        
        header('Content-Type: text/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
 
    <rss version="2.0">
        <channel>
<?
        foreach($html->find('div[class=rank_inner v2]') as $article) {
			$date    = $article->find('span.title_cell', 0)->plaintext;
			if($date != null && $o <=10){
				$o = $o+1;
				$i = 0;
				echo $o;
				echo " ";
				echo $i;
				echo " ";
				$list[$o][$i] = $date;
				echo $list[$o][$i];
				echo "\n";
			}
			$i = 1;
			foreach($article->find('li[class=list]') as $article1) {
			$name    = $article1->find('span.title', 0)->plaintext;
			if($name != null){
				echo $o;
				echo " ";
				echo $i;
				echo " ";
				$list[$o][$i] = $name;
				echo $list[$o][$i];
				echo "\n";
				$i = $i+1;
			}
			}
        }
?>
        </channel>
    </rss>
<?
	

    }
    else
        echo "error document";
 
?>
