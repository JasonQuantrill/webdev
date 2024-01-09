#!/usr/local/bin/ruby -w

require 'cgi'
cgi = CGI.new

# Get parameters and capitalize
city = cgi['city'].split.map(&:capitalize).join(' ')
state = cgi['state'].split.map(&:capitalize).join(' ')
country = cgi['country'].split.map(&:capitalize).join(' ')
picurl = cgi['picurl']

puts "Content-type: text/html\n\n"
puts "<html><head><title>City Info</title></head><body>"
puts "<h1 style='text-align:center; background-color:lightblue; color:white;'>#{city}, #{country}</h1>"
puts "<img src='#{picurl}' style='width:100%; height:auto;'>"
puts "</body></html>"