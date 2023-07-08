#!/usr/bin/env ruby

require "csv"
require "set"

def php_print_value(value)
	if value.class == Hash then
		return "[\n#{php_print_obj value}\n]"
	end
	if value.class == Array then
		return "[\n#{php_print_array value}\n]"
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

def php_print_array(arr)
	ret = Array.new
	arr.each do |value|
		ret.push php_print_value value
	end
	ret.join ",\n"
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

def print_constant(name, i, offset)
	"const #{name} = #{offset + i};"
end

def print_css(name, row)
	back = ''
	if row['back'] != nil then
		back = ".#{name}.flipped {\n\tbackground-image: url(\"img/svg/#{row['back']}\");\n}"
	end
	".#{name} {\n\tbackground-image: url(\"img/svg/#{row['front']}\");\n}\n#{back}"
end

token_csv = CSV.read('tokens.csv', headers: true)

tokens = Hash.new
token_counts = Hash.new
token_css = Hash.new
token_constants = Array.new
type_constants = Set.new
i = 1000 
token_csv.each do |row|
	token = Hash.new
	constant_name = row['CONSTANT_NAME']
	token['name'] = row['Name']
	token['power'] = row['Group'].nil? ? 'OTHER' : row['Group']
	token['style'] = "#{row['type']} #{constant_name.downcase}"
	token['db_id'] = row['db_id'].nil? ? "tbd_#{i}" : row['db_id']
	token['strength'] = row['strength'].to_i unless row['strength'].nil?
	token['command_rating'] = row['command_rating'].to_i unless row['command_rating'].nil?
	token['battle_rating'] = row['battle_rating'].to_i unless row['battle_rating'].nil?
	token['piracy_rating'] = row['piracy_rating'].to_i unless row['piracy_rating'].nil?
	token['debate_value'] = row['debate_value'].to_i unless row['debate_value'].nil?
	token['explorer_value'] = row['explorer_value'].to_i unless row['explorer_value'].nil?
	token['types'] = row['type'].upcase.split
	type_constants.merge token['types'] 
	count = row['Count'].to_i
	count = 1 if count == nil or count < 1
	if count > 1 then
		token['db_id'] = "#{token['db_id']}_{INDEX}"
	end
	sides = row['Sides'].to_i
	if sides == 2 then
		back = Hash.new
		back['name'] = row['back_name']
		back['style'] = "#{row['back_type']} #{constant_name.downcase}"
		back['strength'] = row['back_strength'].to_i unless row['back_strength'].nil?
		back['types'] = row['back_type'].upcase.split
		type_constants.merge back['types'] 
		token['BACK'] = back
	end
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
i = 5000
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
	cards[card_name] = card
	card_constants.push card_name 
	css = Hash.new
	id = row['num'].to_s.rjust(3, '0')
	css['front'] = "HIS-#{id}.svg"
	card_css[row['css_class_name']] = css
	i += 1
end

city_csv = CSV.read('cities.csv', headers: true)

cities = Hash.new
city_constants = Array.new
city_csv.each do |row|
	city_id = row['CITY_ID']
	city = Hash.new
	city['x'] = row['posX'] || 0
	city['y'] = row['posY'] || 0
	city['name'] = row['name'] || 'tbd'
	city['home_power'] = row['home_power'].upcase
	city['language'] = row['language'].upcase
	city['connections'] = Array.new
	city['id'] = city_id
	6.times do |i|
		city['connections'].push row["connection_#{i}"] unless row["connection_#{i}"].nil?
	end
	city['passes'] = Array.new
	2.times do |i|
		city['passes'].push row["pass_#{i}"] unless row["pass_#{i}"].nil?
	end
	cities[city_id] = city
	city_constants.push city_id
end

location_csv = CSV.read('locations.csv', headers: true)

locations = Hash.new
location_constants = Array.new
location_csv.each do |row|
	location_id = row['LOCATION_ID']
	location = Hash.new
	location['x'] = row['posX'] ||= 0
	location['y'] = row['posY'] ||= 0
	location['board'] = row['board']
	locations[location_id] = location
	location_constants.push location_id
end

File.open('../material.inc.php', 'w') do |file|
	file.write "<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * hereistandfork implementation : © CONTRIBUTORS
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * material.inc.php
 *
 * hereistandfork game material description
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
 * Token constants
 */\n"
	token_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 1000) + "\n"
	end
	file.write "/*
 * Token type constants
 */\n"
	type_constants.to_a.each_with_index do |name, i|
		file.write print_constant(name, i, 2000) + "\n"
	end
	file.write "/*
 * City constants
 */\n"
	city_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 3000) + "\n"
	end
	file.write "/*
 * Location constants
 */\n"
	location_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 4000) + "\n"
	end
	file.write "/*
 * Card constants
 */\n"
	card_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 5000) + "\n"
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
