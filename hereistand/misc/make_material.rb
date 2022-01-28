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
	"$this->#{variable_name} = #{php_print_value obj};"
end

def print_constant(name, i)
	"const #{name} = #{i};"
end

def print_css(name, row)
	back = ''
	if row['back'] != nil then
		back = "\n\t.flipped {\n\t\tbackground-image: url(\"img/svg/#{row['back']}\");\n\t}"
	end
	".#{name} {
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

card_csv = CSV.read('cards.csv', headers: true)

cards = Hash.new
card_css = Hash.new
card_constants = Array.new
i = 0
card_csv.each do |row|
	card = Hash.new
	card_name = row['CONSTANT_NAME']
	card['class_name'] = row['css_class_name']
	card['name'] = row['name']
	card['type'] = row['type']
	card['cp'] = row['cp']
	card['remove'] = row['remove'] unless row['remove'].nil?
	card['turn_added'] = row['turn_added'] unless row['turn_added'].nil?
	card['scenario'] = row['scenario'] unless row['scenario'].nil?
	card_constants.push card_name 
	css = Hash.new
	id = row['num'].to_s.ljust(3, '0')
	css['front'] = "HIS-#{id}.svg"
	token_css[constant_name.downcase] = css
	i += 1
end

city_csv = CSV.read('cities.csv', headers: true)

cities = Hash.new
city_constants = Array.new
city_csv.each do |row|
	city_id = row['CITY_ID']
	city = Hash.new
	city['x'] = row['posX']
	city['y'] = row['posY']
	city['name'] = row['name']
	cities[city_id] = city
	city_constants.push city_id
end

location_csv = CSV.read('locations.csv', headers: true)

locations = Hash.new
location_constants = Array.new
location_csv.each do |row|
	location_id = row['LOCATION_ID']
	location = Hash.new
	location['x'] = row['posX']
	location['y'] = row['posY']
	locations[location_id] = location
	location_constants.push location_id
end

File.open('../material.inc.php', 'w') do |file|
	file.write "<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * hereistand implementation : © CONTRIBUTORS
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * material.inc.php
 *
 * hereistand game material description
 *
 * Here, you can describe the material of your game with PHP variables.
 *
 * This file is loaded in your game logic class constructor, ie these variables
 * are available everywhere in your game logic code.
 *
 */

require_once 'modules/php/constants.inc.php';\n\n"
	file.write php_print('cities', cities)
	file.write "\n\n"
	file.write php_print('tokens', tokens)
	file.write "\n\n"
    file.write php_print('starting_token_counts', token_counts)
	file.write "\n\n"
	file.write php_print('board_locations', locations)
	file.write "\n\n"
	file.write php_print('cards', cards)
end
File.open('../modules/php/generated_constants.inc.php', 'w') do |file|
	file.write "<?php\n"
	file.write "/*
 * Token type constants
 */\n"
	token_constants.each_with_index do |name, i|
		file.write print_constant(name, i) + "\n"
	end
	file.write "/*
 * City constants
 */\n"
	city_constants.each_with_index do |name, i|
		file.write print_constant(name, i) + "\n"
	end
	file.write "/*
 * Location constants
 */\n"
	locations.each_with_index do |name, i|
		file.write print_constant(name, i) + "\n"
	end
	file.write "/*
 * Card constants
 */\n"
	cards.each_with_index do |name, i|
		file.write print_constant(name, i) + "\n"
	end
end
File.open('../modules/css/tokens.scss', 'w') do |file|
	token_css.each_pair do | key, value |
		file.write print_css(key, value) + "\n"
	end
end
File.open('../modules/css/cards.scss', 'w') do |file|
	card_css.each_pair do | key, value |
		file.write print_css(key, value) + "\n"
	end
end
