import urllib2,urllib

datos=urllib.urlencode({"titulo": "python","autor" : "idle", "isbn": "111111"})
web=urllib2.urlopen("http://localhost/rest/index.php/nuevo", datos)
print web.read()
