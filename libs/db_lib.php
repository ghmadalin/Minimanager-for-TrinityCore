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

if ($db_type === 'MySQL')
    require_once 'db_lib/mysql.php';
elseif ($db_type === 'PgSQL')
    require_once 'db_lib/pgsql.php';
elseif ($db_type === 'MySQLi')
    require_once 'db_lib/mysqli.php';
elseif ($db_type === 'SQLLite')
    require_once 'db_lib/sqlite.php';
else
    exit('<center /><br /><code />'.$db_type.'</code> is not a valid database type.<br>
    Please check settings in <code>\'scripts/config.php\'</code>.</center>');


?>
