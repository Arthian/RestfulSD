require 'net/http'

uri = URI('http://localhost/rest/index.php/nuevo')
params = {
  'titulo' => 'add',
  'autor' => 'ruby',
  'isbn' => '234123'
}

resp = Net::HTTP.post_form(uri, params)

resp_text = resp.body