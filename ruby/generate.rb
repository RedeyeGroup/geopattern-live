require 'sinatra'
require 'geo_pattern'

get '/' do
	string = params["string"]
        if string
	  pattern = GeoPattern.generate(string)
        else
          pattern = GeoPattern.generate()
        end
	response['Access-Control-Allow-Origin'] = '*'
	pattern.base64_string
end
