<?
    include "simple_html_dom.php";    
 
    /*if(!$_GET[page]) $page = 1;
    else $page = $_GET[page];*/
        
    $html = file_get_html("https://datalab.naver.com/");
	$i = 0;
    if($html)
    {
        
        header('Content-Type: text/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
 
    <rss version="2.0">
        <channel>
<?
        foreach($html->find('li[class=list]') as $article) {
            $name    = $article->find('span.title', 0)->plaintext;
			if($name != null){
				$name1[$i] = $name;
				echo $name1[$i];
				echo "\n";
				echo $i;
				echo "\n";
				$i = $i+1;
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
