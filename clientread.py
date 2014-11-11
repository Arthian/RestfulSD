# -*- coding: cp1252 -*-
import urllib, random, urllib2
def leer():
    url = 'http://localhost/rest/index.php'
    u = urllib.urlopen(url)
    # u is a file-like object
    data = u.read()
    print data

def create():
    datos=urllib.urlencode({"titulo": "python","autor" : "idle", "isbn": "111111"})
    web=urllib2.urlopen("http://localhost/rest/index.php/nuevo", datos)
    print web.read()

def update():
    id = raw_input('id del libro que actualizará-->')
    datos=urllib.urlencode({"titulo": "update py","autor" : "dgo", "isbn": "111111"})
    web=urllib2.urlopen("http://localhost/rest/index.php/editar/" + str(id), datos)

def delete():
    id = raw_input('-->')
    url= 'http://localhost/rest/index.php/del/' + str(id)
    web=urllib2.urlopen(url)


foo = random.choice(['1', '2', '3', '4'])
print("Elija CRUD. R:1, C:2, U:3, D:4"),

if foo == '1':
    leer()
    
elif foo == '2':
    create()

elif foo == '3':
    update()

elif foo == '4':
    delete()
