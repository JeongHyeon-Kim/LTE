from bs4 import BeautifulSoup
import urllib.request
 
# 출력 파일 명
OUTPUT_FILE_NAME = 'output.php'
# 긁어 올 URL
URL = 'http://sugang.inha.ac.kr/sugang/SU_51001/Lec_Time_Search.aspx'
 
 
# 크롤링 함수
def get_text(URL):
    source_code_from_URL = urllib.request.urlopen(URL)
    soup = BeautifulSoup(source_code_from_URL, 'lxml', from_encoding='utf-8')
    #print(soup)
    print('asdf')
    text = ''
    for item in soup.find_all("font"):
        text = text + str(item.find_all(text=True)) + '<br>'
    return text

# 메인 함수
def main():
    #open_output_file = open(OUTPUT_FILE_NAME, 'w')
    result_text = get_text(URL)
    #open_output_file.write(result_text)
    #open_output_file.close()
    #print(result_text)
    return result_text
    
 
if __name__ == '__main__':
    main()