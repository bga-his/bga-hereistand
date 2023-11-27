#!/usr/bin/env ruby

require "csv"
require "set"
IDNAMES = Hash.new
IDNAMES["spaces"] = "SpaceIDs::"
IDNAMES["cards"] = "CardIDs::"
IDNAMES["tokens"] = "tokenIDs::"
IDNAMES["types"] = "tokenTypeIDs::"
IDNAMES["locations"] = "locationIDs::" # TODO split into subsections
IDNAMES["seazones"] = "SeazoneIds::"
IDNAMES["powers"] = "Powers::"
def php_print_value(value)
	if value.class == Hash then
		return "[\n#{php_print_obj value}\n]"
	end
	if value.class == Array then
		return "[#{php_print_array value}]"
	end
	if value.class == String then
		if value.upcase == value or value.count(":") == 2 then
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
	if arr.empty? then
		return
	end
	arr.each do |value|
		ret.push php_print_value value
	end
	"\n  "+ret.join(",\n  ")
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
token_constants_by_type = Hash.new {|hash, key| hash[key] = Array.new}
type_constants = Set.new
i = 1000 
token_csv.each do |row|
	token = Hash.new
	constant_name = row['CONSTANT_NAME']
	token['name'] = row['Name']
	if constant_name == 'SULEIMAN'
		puts constant_name+" "+row['Group']
	end
	if row['Group'] == 'VP' or row['Group'].nil? then
			token['power'] =  IDNAMES["powers"]+'OTHER'
		else
			token['power'] = IDNAMES["powers"] + row['Group']
	end
	token['style'] = "#{row['type']} #{constant_name.downcase}"
	token['db_id'] = row['db_id'].nil? ? "tbd_#{i}" : row['db_id']
	token['strength'] = row['strength'].to_i unless row['strength'].nil?
	token['command_rating'] = row['command_rating'].to_i unless row['command_rating'].nil?
	token['battle_rating'] = row['battle_rating'].to_i unless row['battle_rating'].nil?
	token['piracy_rating'] = row['piracy_rating'].to_i unless row['piracy_rating'].nil?
	token['debate_value'] = row['debate_value'].to_i unless row['debate_value'].nil?
	token['explorer_value'] = row['explorer_value'].to_i unless row['explorer_value'].nil?
	token['admin_rating'] = row['admin_rating'].to_i unless row['admin_rating'].nil?
	token['card_bonus'] = row['card_bonus'].to_i unless row['card_bonus'].nil?
	token['types'] = row['type'].upcase.split.map{|s| IDNAMES["types"]+s}
	type_constants.merge row['type'].upcase.split
	row['type'].upcase.split do |type|
		token_constants_by_type[type].push constant_name
	end
	count = row['Count'].to_i
	count = 1 if count == nil or count < 1
	if count > 1 then
		token['db_id'] = "#{token['db_id']}_{INDEX}"
	end
	token_counts[IDNAMES["tokens"]+constant_name] = count
	sides = row['Sides'].to_i
	if sides == 2 then
		back = Hash.new
		back['name'] = row['back_name']
		back['style'] = "#{row['back_type']} #{constant_name.downcase}"
		back['strength'] = row['back_strength'].to_i unless row['back_strength'].nil?
		back['types'] = row['back_type'].upcase.split.map{|s| IDNAMES["types"]+s}
		type_constants.merge row['back_type'].upcase.split
		token['"BACK"'] = back
	end
	
	tokens[IDNAMES["tokens"]+constant_name] = token
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
	card_name = row['CONSTANT_NAME'].sub! "CARD_", ""
	card['class_name'] = row['css_class_name']
	card['name'] = row['name']
	card['type'] = "CardTypes::"+row['type']
	card['cp'] = row['cp']
	card['remove'] = row['remove'] unless row['remove'].nil?
	card['turn_added'] = row['turn_added'] unless row['turn_added'].nil?
	card['scenario'] = row['scenario'] unless row['scenario'].nil?
	cards[IDNAMES["cards"]+card_name] = card
	card_constants.push card_name
	css = Hash.new
	id = row['num'].to_s.rjust(3, '0')
	css['front'] = "HIS-#{id}.svg"
	card_css[row['css_class_name']] = css
	i += 1
end

space_csv = CSV.read('spaces.csv', headers: true)

spaces = Hash.new
space_constants = Array.new
space_csv.each do |row|
	space_id = IDNAMES["spaces"]+row['SPACE_ID']
	space_constants.push row['SPACE_ID']
	space = Hash.new
	space['x'] = row['posX'] || 0
	space['y'] = row['posY'] || 0
	space['name'] = row['name'] || 'tbd'
	space['type'] = "SpaceTypes::"+row['type']
	if ["VENICE", "SCOTLAND", "GENOA", "HUNGARY"].include? row['home_power'].upcase then
		row['home_power'] = "MINOR_" + row['home_power']
	end
	space['home_power'] = IDNAMES["powers"]+row['home_power'].upcase
	space['language'] = "LanguageZones::"+row['language'].upcase
	space['connections'] = Array.new
	space['id'] = space_id
	if space_id.upcase.eql? "COLOGNE" then
		puts space['id']
	end
	6.times do |i|
		space['connections'].push IDNAMES["spaces"]+row["connection_#{i}"] unless row["connection_#{i}"].nil?
	end
	space['passes'] = Array.new
	2.times do |i|
		space['passes'].push IDNAMES["spaces"]+row["pass_#{i}"] unless row["pass_#{i}"].nil?
	end
	space['seazones'] = Array.new
	2.times do |i|
		space['seazones'].push IDNAMES["seazones"]+row["seazone_#{i}"] unless row["seazone_#{i}"].nil?
	end
	spaces[space_id] = space
	
end

seazones_csv = CSV.read('seazones.csv', headers: true)

seazones = Hash.new
seazones_constants = Array.new
seazones_csv.each do |row|
	seazone_id = IDNAMES["seazones"]+row['SEAZONE_ID']
	seazone = Hash.new
	seazone['x'] = row['posX'] || 0
	seazone['y'] = row['posY'] || 0
	seazone['name'] = row['name'] || 'tbd'
	seazone['connections'] = Array.new
	seazone['id'] = seazone_id
	6.times do |i|
		seazone['connections'].push IDNAMES["seazones"]+row["Connection_#{i}"] unless row["Connection_#{i}"].nil?
	end
	seazone['harbours'] = Array.new
	9.times do |i|
		seazone['harbours'].push IDNAMES["spaces"]+row["Harbour_#{i}"] unless row["Harbour_#{i}"].nil?
	end
	seazones[seazone_id] = seazone
	seazones_constants.push row['SEAZONE_ID']
end

location_csv = CSV.read('locations.csv', headers: true)

locations = Hash.new
location_constants = Array.new
location_csv.each do |row|
	location_id = IDNAMES["locations"]+row['LOCATION_ID']
	location = Hash.new
	location['x'] = row['posX'] ||= 0
	location['y'] = row['posY'] ||= 0
	location['board'] = row['board']
	locations[location_id] = location
	location_constants.push row['LOCATION_ID']
end

# check that data is correct
# if spaceA is connect to spaceB, then spaceB should be connected to spaceA.
#spaces.each do |spaceA|
#	6.times do |i|
#		unless spaceA['connections'][i].nil?
#			if not spaces[spaceA['connections'][i]]['connections'].include? spaceA['id'] then
#				puts "space " + spaceA['id'] + " has an connection to " + spaceA['connections'][i] + ", but not the other way round."
#			end
#		end
#	end
#	2.times do |i|
#		unless spaceA['passes'][i].nil?
#			if not spaces[spaceA['passes'][i]]['passes'].include? spaceA['id'] then
#				puts "space " + spaceA['id'] + " has an pass to " + spaceA['connections'][i] + ", but not the other way round."
#			end
#		end
#	end
#	2.times do |i|
#		unless spaceA['seazones'][i].nil?
#			if not seazones[spaceA['seazones'][i]]['ports'].include? spaceA['id'] then
#				puts "space " + spaceA['id'] + " has an port to " + spaceA['seazones'][i] + ", but not the other way round."
#			end
#		end
#	end
#end
# same for seazones

File.open('../../material.inc.php', 'w') do |file|
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
 *  2023-10-03 14:54
 */

require_once 'modules/php/constants.inc.php';\n\n"
	file.write php_print('spaces', spaces)
	file.write "\n\n"
	file.write php_print('tokens', tokens)
	file.write "\n\n"
    file.write php_print('starting_token_counts', token_counts)
	file.write "\n\n"
	file.write php_print('board_locations', locations)
	file.write "\n\n"
	file.write php_print('cards', cards)
	file.write "\n\n"
	file.write php_print('seazones', seazones)
end #materials

hashTokenNameNumber = Hash.new

File.open('../../modules/php/generated_constants.inc.php', 'w') do |file|
	file.write "<?php\n"
	file.write "/*
 * Token constants
 */\n
 abstract class " + IDNAMES["tokens"].sub("::", "") + " \n{"
	token_constants.each_with_index do |name, i|
		hashTokenNameNumber[name] = 1000+i
		file.write print_constant(name, i, 1000) + "\n"
	end
	file.write "}\n/*
 * Token constans grouped by type
 * see below
 */

 /*
  * Token type constants
*/\n
 abstract class " + IDNAMES["types"].sub("::", "") + " \n{"
	type_constants.to_a.each_with_index do |name, i|
		file.write print_constant(name, i, 2000) + "\n"
	end
	file.write "}\n/*
 * Space constants
 */\n
 abstract class " + IDNAMES["spaces"].sub("::", "") + " \n{"
	space_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 3000) + "\n"
	end
	file.write "}\n/*
 * seazone constants
 */\n
 abstract class " + IDNAMES["seazones"].sub("::", "") + " \n{"
	seazones_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 6000) + "\n"
	end
	file.write "}\n/*
 * Location constants
 */
 abstract class " + IDNAMES["locations"].sub("::", "") + " \n{"
	location_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 4000) + "\n"
	end
	file.write "}\n/*
 * Card constants
 */\n
 abstract class " + IDNAMES["cards"].sub("::", "") + "\n {"
	card_constants.each_with_index do |name, i|
		file.write print_constant(name, i, 5000) + "\n"
	end
	file.write "}\n
/* token types by type*/"
	token_constants_by_type.each_key do |key|
	file.write "abstract class " + IDNAMES["tokens"].sub("::", "_") + key.gsub(" ", "_") + "\n{"
	token_constants_by_type[key].each_with_index do |name, i|
		file.write print_constant(name, hashTokenNameNumber[name], 0) + "\n"
 	end
	file.write "}\n\n"
 end
end
File.open('../../modules/css/tokens.scss', 'w') do |file|
	token_css.each_pair do | key, value |
		file.write print_css(key, value) + "\n"
	end
end
File.open('../../modules/css/cards.scss', 'w') do |file|
	card_css.each_pair do | key, value |
		file.write print_css(key, value) + "\n"
	end
end
puts "done"