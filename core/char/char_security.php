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
 
    //-------------------Global SQL Injection Prevention Common to all Char pages-------------------
    // we need at least an id or we would have nothing to show
    if (empty($_GET['id']))
        error($lang_global['empty_fields']);

    // this is multi realm support, as of writing still under development
    //  this page is already implementing it
    if (empty($_GET['realm']))
        $realmid = $realm_id;
    else
    {
        $realmid = $sqlr->quote_smart($_GET['realm']);
        if (is_numeric($realmid))
            $sqlc->connect($characters_db[$realmid]['addr'], $characters_db[$realmid]['user'], $characters_db[$realmid]['pass'], $characters_db[$realmid]['name']);
        else
            $realmid = $realm_id;
    }

    $id = $sqlc->quote_smart($_GET['id']);
    if (is_numeric($id));
    else
        error($lang_global['empty_fields']);
    //-------------------Global SQL Injection Prevention Common to all Char pages-------------------

?>