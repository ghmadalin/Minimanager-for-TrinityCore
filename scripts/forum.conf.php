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

$maxqueries = 20; // Max topic / post by pages
$minfloodtime = 15; // Minimum time beetween two post
$enablesidecheck = false; // if you dont use side specific forum, desactive it, because it will do one less query.

$forum_skeleton = Array(
    1 => Array(
        "name" => "Server Category",
        "forums" => Array(
            1 => Array(
                "name" => "News",
                "desc" => "News and infos about the server",
                "level_post_topic" => 3
            ),
            2 => Array(
                "name" => "General Talks",
                "desc" => "Talk about everything related to the server"
            )
        )
    ),
    2 => Array(
        "name" => "Game Category",
        "forums" => Array(
            3 => Array(
                "name" => "Bugs and problems",
                "desc" => "Ask here help from GM or Admin, not to beg money item or xp, thx.",
            ),
            4 => Array(
                "name" => "Horde and alliance forums",
                "desc" => "Talk about everything related to the game"
            ),
            5 => Array(
                "name" => "Horde forum only",
                "desc" => "Only horde players can see this",
                "side_access" => "H"
            ),
            6 => Array(
                "name" => "Alliance forum only",
                "desc" => "Only alliance players can see this",
                "side_access" => "A"
            ),
            7 => Array(
                "name" => "Admins forums only",
                "desc" => "Only admins can see this",
                "level_read" => "3",
                "level_post" => "3"
            )
        )
    )
);
?>