require 'net/http'
require 'open-uri'

def read()
	url = 'http://localhost/rest/' # ACME boomerang
	resp = Net::HTTP.get_response(URI.parse(url))
	resp_text = resp.body
	print resp_text
end

def create()
	uri = URI('http://localhost/rest/index.php/nuevo')
	puts "Ingrese titulo del libro"
	titulo = gets
	puts "Ingrese autor del libro"
	autor = gets
	puts "Ingrese isbn del libro"
	isbn = gets
	params = {
	  'titulo' => titulo,
	  'autor' => autor,
	  'isbn' => isbn
	}

	resp = Net::HTTP.post_form(uri, params)

	resp_text = resp.body
end

def update()
	puts "Ingrese id del update"
	id = gets
	ids = id.to_s
	uri = URI('http://localhost/rest/index.php/editar/'+ids)
	puts "Ingrese titulo del libro"
	titulo = gets
	puts "Ingrese autor del libro"
	autor = gets
	puts "Ingrese isbn del libro"
	isbn = gets
	params = {
	  'titulo' => titulo,
	  'autor' => autor,
	  'isbn' => isbn
	}

	resp = Net::HTTP.post_form(uri, params)

	resp_text = resp.body
end

def del()
	puts "Ingrese id del delete"
	id = gets
	ids = id.to_s
	web_contents  = open('http://localhost/rest/index.php/del/'+ids)
end

puts "Ingrese opción C: 1, R: 2, U: 3, D:4"
entrada = gets
case entrada.to_i
when 1
	read()
when 2
	create()
when 3
	update()
when 4
	del()
end
