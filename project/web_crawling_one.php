#!/usr/bin/php

<?
    include "/home/jsh1588/simplehtmldom_1_5/simple_html_dom.php";

    $html = file_get_html("https://datalab.naver.com/");
	$i = 0;
	$o = -1;
    if($html)
    {

        header('Content-Type: text/xml; charset=utf-8');
	$servername = "localhost";
	$username = "root";
	$password = "Jsh1588!";
	$dbname = "web_crawling";

	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_query($conn, "set names utf8");

	if($conn -> connect_error){
		die("connection failed: ".$conn->connect_error);
	}

        foreach($html->find('div[class=rank_inner v2]') as $article) {
			$date    = $article->find('span.title_cell', 0)->plaintext;
			if($date != null && $o <=10){
				$o = $o+1;
				$i = 0;
				echo $o;
				echo " ";
				echo $i;
				echo " ";
				$date_remove = substr($date, 0, 10);
				$list[$o][$i] = $date_remove;
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
	for($i=1; $i<11; $i++)
	{
		$sql = "INSERT INTO crawling(date, rank, name)
			VALUES('{$list[0][0]}', '{$i}', '{$list[0][$i]}')";
		if($conn->query($sql) == TRUE)
		{
			//echo "success!!";
		}
		else
		{
			echo "error: ".$sql."<br>".$conn->error;
		}
	}
	$conn->close();

    }
    else
        echo "error document";
?>

