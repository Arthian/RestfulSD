import urllib

url = 'http://localhost/rest/index.php/read'
u = urllib.urlopen(url)
# u is a file-like object
data = u.read()
print data
