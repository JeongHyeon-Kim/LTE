#python 3.x버전에서의 DB 연동
import pymysql

#charset='utf8'로 한글 깨짐 현상 해결
db = pymysql.connect(host='localhost', user='mfics2', passwd='mfics2', db='mfics2', charset='utf8')

cur = db.cursor()
sql = "INSERT INTO inha_sugang Values('%s','%s','%s','%s','%d','%s','%s','%s','%s','%s');"%(1, '', '수지학개론', 3, 3, 'saf', 'dnjf1,2,3', 'fas', 'fas', '')
cur.execute(sql)
cur.connection.commit()