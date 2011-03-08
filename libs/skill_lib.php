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
//get skill type by its id

function skill_get_type($id, &$sqlm)
{
    $skill_type = $sqlm->fetch_assoc($sqlm->query('SELECT field_1 FROM dbc_skillline WHERE id='.$id.' LIMIT 1'));
    return $skill_type['field_1'];
}


//#############################################################################
//get skill name by its id

function skill_get_name($id, &$sqlm)
{
    $skill_name = $sqlm->fetch_assoc($sqlm->query('SELECT field_3 FROM dbc_skillline WHERE id='.$id.' LIMIT 1'));
    return $skill_name['field_3'];
}


?>