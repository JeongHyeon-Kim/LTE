#python 3.x버전에서의 DB 연동
import pymysql

#정규식 사용
import re

from bs4 import BeautifulSoup
import urllib.request

# 출력 파일 명
OUTPUT_FILE_NAME = 'output.php'
# 긁어 올 URL
URL = 'http://sugang.inha.ac.kr/sugang/SU_51001/Lec_Time_Search.aspx'

#DB 연동 부분/charset='utf8'로 한글 깨짐 현상 해결
db = pymysql.connect(host='localhost', user='mfics2', passwd='mfics2', db='mfics2', charset='utf8')

#커서 객체 생성
cur = db.cursor()
 
# 크롤링 함수
def get_text(URL):
    source_code_from_URL = urllib.request.urlopen(URL)
    soup = BeautifulSoup(source_code_from_URL, 'lxml', from_encoding='utf-8')
    text = ''
    for item in soup.find_all("font"):
        rawSubNum = str(item.find_all(text=True))
        #[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"] 기존의 정규식에서 '-'빼서 '-'는 살림
        SubNum = re.sub('[\{\}\[\]\/?.,;:|\)*~`!^\_+<>@\#$%&\\\=\(\'\"]', '', rawSubNum)
        
        text = text + SubNum + '<br>'
        #쿼리문 작성
        if(SubNum == 'CEM1001-001'):
            sql = "INSERT INTO inha_sugang Values('%s','%s','%s','%s','%d','%s','%s','%s','%s','%s');"%(SubNum, '', '수지학개론', 3, 3, 'saf', 'dnjf1,2,3', 'fas', 'fas', '')
            cur.execute(sql)
            cur.connection.commit() 

    return text

# 메인 함수
def main():
    #open_output_file = open(OUTPUT_FILE_NAME, 'w')
    result_text = get_text(URL)
    #open_output_file.write(result_text)
    #open_output_file.close()
    print(result_text)
    return result_text
    
 
if __name__ == '__main__':
    main()