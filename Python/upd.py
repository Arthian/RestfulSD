# -*- coding: cp1252 -*-
import urllib, random, urllib2

id = raw_input('id del libro que actualizará-->')
datos=urllib.urlencode({"titulo": "update py","autor" : "dgo", "isbn": "111111"})
web=urllib2.urlopen("http://localhost/rest/index.php/editar/" + str(id), datos)


