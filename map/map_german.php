<?php
/*
 *  Copyright (C) 2010-2011  TrinityScripts <http://www.trinityscripts.xe.cx/>
 *
 *  This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

$character_race = Array(
  1 => 'Mensch',
  2 => 'Ork',
  3 => 'Zwerg',
  4 => 'Nachtelf',
  5 => 'Untoter',
  6 => 'Taure',
  7 => 'Gnom',
  8 => 'Troll',
  9 => 'Goblin',
  10 => 'Blutelf',
  11 => 'Draenai');

$character_class = Array(
  1 => 'Krieger',
  2 => 'Paladin',
  3 => 'J&auml;ger',
  4 => 'Schurke',
  5 => 'Priester',
  6 => 'Todesritter',
  7 => 'Schamane',
  8 => 'Magier',
  9 => 'Hexenmeister',
  11 => 'Druide');

$lang_defs = Array(
  'maps_names' => Array('Azeroth','Scherbenwelt','Nordend'),
  'total' => 'Gesamt',
  'faction' => Array('Allianz', 'Horde'),
  'name' => 'Name',
  'race' => 'Rasse',
  'class' => 'Klasse',
  'level' => 'Level',
  'click_to_next' => 'Klick: go to next', // Needs translation
  'click_to_first' => 'Klick: go to first' // Needs translation
);

include "zone_names_".$lang.".php";
?>
