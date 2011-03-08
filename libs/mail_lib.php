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

//##########################################################################################
//get player name
function get_char_name($id)
{
    global $characters_db, $realm_id;

    if($id)
    {
        $sqlc = new SQL;
        $sqlc->connect($characters_db[$realm_id]['addr'], $characters_db[$realm_id]['user'], $characters_db[$realm_id]['pass'], $characters_db[$realm_id]['name']);

        $result = $sqlc->query("SELECT `name` FROM `characters` WHERE `guid` = '$id'");
        $player_name = $sqlc->result($result, 0);

        return $player_name;
    }
    else
        return NULL;
}

// Mail Source
$mail_source = Array
(
    "0" => "Normal",
    "2" => "Auction",
    "3" => "Creature",
    "4" => "GameObject",
    "5" => "Item",
);

function get_mail_source($id)
{
    global $mail_source;
    return $mail_source[$id] ;
}

// Check State
$check_state = Array
(
    //"0" => "Not Read",
    "1" => "Read",
    "2" => "Ret", //"Returned"
    "4" => "Co", //"Copied Checked"
    "8" => "COD", //"COD Pay Checked"
    "16" => "B" //"Mail has body"
);

function bitMask($mask = 0) 
{
    if(!is_numeric($mask))
        return array();

    $return = array();
    while ($mask > 0) 
    {
        for($i = 0, $n = 0; $i <= $mask; $i = 1 * pow(2, $n), $n++)
            $end = $i;

        $return[] = $end;
        $mask = $mask - $end;
    }
    sort($return);
    return $return;
}

function get_check_state($id)
{
    global $check_state;
    $result = "";
    
    if ($id == 0)
        return "Not Read";
    
    foreach (bitMask($id) as $k => $v)
        $result .= $check_state[$v].", ";

    return $result;
}

?>