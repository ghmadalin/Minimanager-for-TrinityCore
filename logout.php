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
 
if (ini_get('session.auto_start'));
else 
    session_start();

session_destroy();
unset($_SESSION['user_id']);
unset($_SESSION['uname']);
unset($_SESSION['user_lvl']);
unset($_SESSION['realm_id']);
unset($_SESSION['client_ip']);
unset($_SESSION['logged_in']);

setcookie ('uname',    '', time() - 3600);
setcookie ('realm_id', '', time() - 3600);
setcookie ('p_hash',   '', time() - 3600);

if (strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') === false)
{
    header('Location: http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/login.php');
    exit();
}
else
    die('<meta http-equiv="refresh" content="0;URL=login.php" />');

?>
