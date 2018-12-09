#! /usr/bin/env Rscript

library(DBI)
library(RMySQL)

con <- dbConnect(dbDriver("MySQL"), user="root", password="Jsh1588!", dbname="web_crawling", host="localhost")

dbListTables(con)

dbGetQuery(con, "set names utf8")

result <- dbGetQuery(con, "SELECT * FROM crawling")

str(result)

dbDisconnect(con)
