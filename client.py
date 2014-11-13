# -*- coding: cp1252 -*-
import urllib, random, urllib2



foo = raw_input('Elija CRUD. R:1, C:2, U:3, D:4\n->')

if foo == '1':
    url = 'http://localhost/rest/index.php'
    u = urllib.urlopen(url)
    # u is a file-like object
    data = u.read()
    print data
    
elif foo == '2':
    tit = raw_input('Ingrese titulo del libro: ')
    aut = raw_input('Ingrese autor del libro: ')
    isb = raw_input('Ingrese isbn del libro: ')
    datos=urllib.urlencode({"titulo": tit ,"autor" : aut, "isbn": isb})
    web=urllib2.urlopen("http://localhost/rest/index.php/nuevo", datos)
    print('Operación realizada exitosamente')


elif foo == '3':
    id = raw_input('id del libro que actualizará-->')
    tit = raw_input('Ingrese titulo del libro: ')
    aut = raw_input('Ingrese autor del libro: ')
    isb = raw_input('Ingrese isbn del libro: ')
    datos=urllib.urlencode({"titulo": tit,"autor" : aut, "isbn": isb})
    web=urllib2.urlopen("http://localhost/rest/index.php/editar/" + str(id), datos)
    print('Operación realizada exitosamente')


elif foo == '4':
    id = raw_input('-->')
    url= 'http://localhost/rest/index.php/del/' + str(id)
    web=urllib2.urlopen(url)
    print('Operación realizada exitosamente')
