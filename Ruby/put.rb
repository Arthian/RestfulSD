require 'net/http'

puts "Ingrese id del update"
id = gets
ids = id.to_s
uri = URI('http://localhost/rest/index.php/editar/'+ids)
params = {
  'titulo' => 'ruby cmd',
  'autor' => 'edit',
  'isbn' => '234123'
}

resp = Net::HTTP.post_form(uri, params)

resp_text = resp.body