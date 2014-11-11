import urllib, random, urllib2

id = raw_input('-->')
url= 'http://localhost/rest/index.php/del/' + str(id)
web=urllib2.urlopen(url)


