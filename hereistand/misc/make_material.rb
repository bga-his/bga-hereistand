#!/usr/bin/env ruby

require "csv"

def php_print_value(value)
	if value.class == Hash then
		return "[\n#{php_print_obj value}\n]"
	end
	if value.class == String then
		if value.upcase == value then
			return value
		else
			return "\"#{value}\""
		end
	end
	if value.class == Integer then
		return value
	end
end

def php_print_obj(obj)
	ret = Array.new
	obj.each_pair do | key, value |
		ret.push "#{php_print_value key} => #{php_print_value value}"
	end
	ret.join ",\n"
end

def php_print(variable_name, obj)
	puts "$this->#{variable_name} = #{php_print_value obj};"
end

def print_constant(name, i)
	puts "const #{name} = #{i};"
end

def print_css(name, row)
	back = ''
	if row['back'] != nil then
		back = "\n\t.flipped {\n\t\tbackground-image: url(\"img/svg/#{row['back']}\");\n\t}"
	end
	puts ".#{name} {
	background-image: url(\"img/svg/#{row['front']}\");#{back}
}"
end

token_csv = CSV.read('tokens.csv', headers: true)

tokens = Hash.new
token_counts = Hash.new
token_css = Hash.new
token_constants = Array.new
i = 0
token_csv.each do |row|
	token = Hash.new
	constant_name = row['CONSTANT_NAME']
	token['name'] = row['Name']
	token['power'] = row['Group']
	token['power'] = 'OTHER' if token['power'].nil?
	token['style'] = "#{row['Type']} #{constant_name.downcase}"
	row['db_id'] = "tbd_#{i}" if row['db_id'].nil?
	token['db_id'] = row['db_id']
	if row['Count'].to_i > 1 then
		token['db_id'] = "#{token['db_id']}_{INDEX}"
	end
	count = row['Count'].to_i
	count = 1 if count == nil or count < 1
	token_counts[constant_name] = count
	tokens[constant_name] = token
	token_constants.push constant_name 
	css = Hash.new
	css['front'] = row['SVG']
	css['back'] = row['SVG_back']
	token_css[constant_name.downcase] = css
	i += 1
end

php_print('tokens', tokens)
php_print('starting_token_counts', token_counts)
exit
token_constants.each_with_index do |name, i|
	print_constant(name, i)
end
token_css.each_pair do | key, value |
	print_css(key, value)
end