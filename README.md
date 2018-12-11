1.web_crawling
========================
 
 (1) simple html dom paser
-----------------------------
    1) 데이터 가져오기(https://datalab.naver.com/ & 12일치)
    2) 2차원 배열 저장
   ![enter image description here](https://lh3.googleusercontent.com/REhhEDIPI39nvh86OdLa80yAmFW6fq1r1DXYyqBTw4ir7BSMFlMX2QQmu1CX2KMqtOr76cgERn6C=s0 "webcrawling_output.png")
  
 (2) phpmyadmin
-----------------------------
    1) DBTable 구성
![enter image description here](https://lh3.googleusercontent.com/MdII4WaZbOgoNpG7nsm1y2Q0kMRFiM3gqAT1CvTQtF5k2Cc9VAnHADpYo4MtdvjWY0jaE3LYiwkN=s0 "DBTable.png")
		
    2) phpmyadmin에 저장(insert query사용)
     ①최초 12일치
   ![enter image description here](https://lh3.googleusercontent.com/Q3WghJE1HBElb-NwoZAZxpYdH3duk1keB4rrfB4omWtmebPBb7jtQRPtUlH5L20Z7vvkYlI1DioT=s0 "DBTable_save.png")
	      ②최근 1일치(데이터 중복 저장 방지)
         ![enter image description here](https://lh3.googleusercontent.com/v-7LhFc3gAjkZxinP0og8W7ahaI6AFvAnuz8QoW5Irf5kxd8H-gYcIh3bM09LkjPhYUCqJ5UAyd0=s0 "gplus9219611.png")
         

2.R
============
 
 (1) php에서 R스크립트 사용
---------------------------------------
 
 (2) R스크립트
---------------------------
    1) phpmyadmin 접속
    2) web_crawling에서 저장한 데이터 불러오기
    3) 데이터 중복 제거

 (3) 웹페이지 출력
-------------------------------
    1) shiny패키지 사용
    2) 그래프 출력
    3) 날짜에 맞는 순위 출력
   ![enter image description here](https://lh3.googleusercontent.com/j-HSC567TsDRQfhZRl5TeoR8Qp8Qp6N-pS-2UcuFt7rAKiZFkPNH4EnsN9UHX2R5zVPZzjWQorpJ=s0 "gplus2057848799.png")
   ![enter image description here](https://lh3.googleusercontent.com/uY3gro-0cUydRYZ9xJJBHpqyPFiXKmvACmYw6BwlIbT3yOYjCbGe2lISUfolQJ636yfD6gMKvxyV=s0 "gplus385939521.png")
 
3.주기적 웹크롤링
===============
    1)crontab 사용 & 로그로 확인
  ![enter image description here](https://lh3.googleusercontent.com/tMi1EqaawLLoKVJXB80NK5qI2VWDJ3hq6lw9SBE6fbzc5pHMwlnPNU4pMGf7SkmoJ7vRVvvaZJDh=s0 "gplus2057851888.png")
  
![enter image description here](https://lh3.googleusercontent.com/uQbY86JYzKEKB70uEIB9Z_4vkJvTvI_Uqa-qjO186At7Fko23QT5NjOQIxLPDPEdiRb_QTdbzbqb=s0 "gplus1756957686.png")

4.Installation
=============
 
 (1) simple html dom paser 설치
---------------------------
    1) http://simplehtmldom.sourceforge.net/
 
 (2) apache 설치
------------------------
    1) apt-get install apache2 
    2) https://webnautes.tistory.com/1028
    3) apache 서버 php 실행 오류
     ① https://stackoverflow.com/questions/47024111/apache-installing-and-running-php-files

 (3) php 설치
----------------
    1) apt-get install php5 php5-common
       apt-get install libapache2-mod-php5
       apt-get install php5-mysql
    2) http://sarghis.com/blog/680/
 
 (4) mysql 설치
--------------------
    1) apt-get install mysql-server mysql-client
    2) https://webnautes.tistory.com/1185

 (5) phpmyadmin 설치
--------------------
    1) apt-get install phpmyadmin
    2) http://kkotkkio.tistory.com/40
    3) demo server error 해결방법
     ① https://stackoverflow.com/questions/41191400/phpmyadmin-admin-page-   displays-only-demo-server
 
 (6) R & R Studio설치
--------------------
    1) apt-get install r-base
       apt-get install gdebi-core
    2) https://www.rstudio.com/products/rstudio/download-server/
 
 (7) DBI & RMySQL 설치
-------------------
    1) apt-get install mysql-devel
       apt-get install r-devel
    2) https://hjpco.wordpress.com/2017/05/30/aws-rmysql-%EB%B0%8F-dbi-%EC%84%A4%EC%B9%98%ED%95%98%EA%B8%B0/
    3) 설치 오류
     ① https://stackoverflow.com/questions/25368708/cant-install-rmysql-on-r-3-0-2-ubuntu-14-04

 (8) Shiny 설치
-----------------------------
    1) apt-get install gdebi-core
       wget https://download2.rstudio.org/rstudio-server-1.1.456-amd64.deb
       gdebi rstudio-server-1.1.456-amd64.deb
    2) http://blog.hyeongeun.com/23
    3) shiny tutorial
     ①http://shiny.rstudio.com/
