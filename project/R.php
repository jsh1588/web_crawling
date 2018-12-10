#!/usr/bin/php
<?
final class R_script
{
	private static $pathTmp = '/tmp/';
	private static $pathRbin = '/usr/bin/R';

	static function run($s)
	{
		$sKey = 'r-php-script-' . md5(time() . rand());
		$fInput = self::$pathTmp . $sKey;

		$fp = fopen($fInput, 'w+');
		fwrite($fp ,$s);
		fclose($fp);

		$res = shell_exec(self::$pathRbin . ' --slave -q --no-save < ' . $fInput);

		unlink($fInput);

		return $res;
	}
}
$s='
	library(DBI)
	library(RMySQL)
	library(ggplot2)
	library(dplyr)
	library(shiny)

	con <- dbConnect(dbDriver("MySQL"), user="root", password="Jsh1588!", dbname="web_crawling", host="localhost")

	dbListTables(con)

	dbGetQuery(con, "set names utf8")

	result <- dbGetQuery(con, "SELECT * FROM crawling")

	date_uni <- result %>% select(date) %>% arrange(desc(date))

	date_uni <- unique(date_uni)

	n = as.matrix(date_uni)

	date_vec = c()

	for(j in seq(1:nrow(date_uni))){
		date_vec = c(date_vec, n[j,])
	}

	name_uni <- result %>% select(name)

	name_uni <- unique(name_uni)

	m = as.matrix(name_uni)

	name_vec = c()

	for(i in seq(1:nrow(name_uni))){
		name_vec = c(name_vec, m[i,])
	}

	name_length <- length(name_vec)

	ui <- fluidPage(
		titlePanel("Naver Fashion Ranking"),

		sidebarLayout(
			sidebarPanel(
				selectInput(inputId="type",
					label = strong("choose item"),
					choices = unique(result$name),
					selected = name_vec[1]
				)
			),
			mainPanel(
				plotOutput(outputId = "graph"),
				textOutput(outputId = "text"),
				h2("12 days from yesterday DATA"),
				h2("Date : ", date_vec[12], " ~ ", date_vec[1])
			)
		)
	)

	server <- function(input, output){
		output$graph <- renderPlot({
			data_graph <- result %>% filter(name == input$type)
                        ggplot(data_graph, aes(x=date, y=rank, group=1)) + geom_line(color="red", size=2)
		})
		output$text <- renderText({
			paste("https://search.shopping.naver.com/search/all.nhn?where=all&frm=NVSCTAB&query=", input$type)
		})
	}

	shinyApp(ui=ui, server=server)

	dbDisconnect(con)
';

echo R_script::run($s);

?>
