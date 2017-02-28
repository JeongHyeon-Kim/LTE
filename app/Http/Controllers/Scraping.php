<?php
include "Scraping.py";

$result = get_text('http://sugang.inha.ac.kr/sugang/SU_51001/Lec_Time_Search.aspx');
echo $result;
//이 부분이 안되고 있고 막힘
//그래서 파일 입출력망할 
//파이썬 파일 인클루드
?>