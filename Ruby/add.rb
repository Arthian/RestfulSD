require 'net/http'

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