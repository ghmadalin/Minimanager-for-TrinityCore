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

//#############################################################################
//get map name by its id

function get_map_name($id, &$sqlm)
{
    $map_name = $sqlm->fetch_assoc($sqlm->query('SELECT name01 FROM dbc_map WHERE id='.$id.' LIMIT 1'));
    return $map_name['name01'];
}


//#############################################################################
//get zone name by its id

function get_zone_name($id, &$sqlm)
{
    $zone_name = $sqlm->fetch_assoc($sqlm->query('SELECT name01 FROM dbc_areatable WHERE id='.$id.' LIMIT 1'));
    return $zone_name['name01'];
}


?>