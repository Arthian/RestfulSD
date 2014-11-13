require 'open-uri'

puts "Ingrese id del delete"
id = gets
ids = id.to_s
web_contents  = open('http://localhost/rest/index.php/del/'+ids)