require 'net/http'

url = 'http://localhost/rest/' # ACME boomerang
resp = Net::HTTP.get_response(URI.parse(url))

resp_text = resp.body
print resp_text