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
 
    require_once("header.php");
    
    //##############################################################################################
    // MAIN
    //##############################################################################################
    
    $username = (isset($_GET['username'])) ? $_GET['username'] : NULL;
    $authkey = (isset($_GET['authkey'])) ? $_GET['authkey'] : NULL;
    
    $output .= "<div class=\"top\">";
    
    $sql = new SQL;
    $sql->connect($mmfpm_db['addr'], $mmfpm_db['user'], $mmfpm_db['pass'], $mmfpm_db['name']);
    
    $query = $sql->query("SELECT `id`, `username`, `sha_pass_hash`, `email`, `joindate`, `last_ip`, `failed_logins`, `locked`, `last_login`, `expansion` FROM mmftc_account WHERE username = '$username' AND authkey = '$authkey'");
    
    $lang_verify = lang_verify();
    
    if ($sql->num_rows($query) < 1)
        $output .= "<h1><font class=\"error\">{$lang_verify['verify_failed']}</font></h1>";
    else 
    {
        $output .= "<h1><font class=\"error\">{$lang_verify['verify_success']}</font></h1>";
        $sql2 = new SQL;
        $sql2->connect($realm_db['addr'], $realm_db['user'], $realm_db['pass'], $realm_db['name']);
    
        $data = mysql_fetch_array($query);
        list($id,$username,$pass,$mail,$joindate,$last_ip,$failed_logins,$locked,$last_login,$expansion) = $data;
        $sql2->query("INSERT INTO account (username,sha_pass_hash,email,joindate,last_ip,failed_logins,locked,last_login,expansion) VALUES (UPPER('$username'),'$pass','$mail',now(),'$last_ip','0','$locked',NULL,'$expansion')");
        $result = $sql2->query("SELECT * FROM account WHERE username='$username'");
        $data = mysql_fetch_assoc($result); 
        $sql2->query("INSERT INTO account_access (`id`,`gmlevel`) VALUES ('{$data['id']}','0')");
        $sql->query("DELETE FROM mmftc_account WHERE username='$username'");
    }
    
    $output .= "</div>";
    $output .= "<center><br /><table class=\"hidden\"><tr><td>".makebutton($lang_global['home'], 'index.php', 130)."</td></tr></table></center>";
    
    require_once("footer.php");
?>