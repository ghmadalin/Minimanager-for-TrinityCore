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
 
require_once 'header.php';
require_once 'libs/telnet_lib.php';
valid_login($action_permission['read']);

$telnet = new telnet_lib();
$result = $telnet->Connect($server[$realm_id]['addr'], $server[$realm_id]['telnet_port'], $server[$realm_id]['telnet_user'], $server[$realm_id]['telnet_pass']);
if (0 == $result)
{
    $telnet->DoCommand('server info', $result);
    $result = str_replace("TC>","",$result);
    $result = str_replace("\r\n", "\r\n  ", $result);
    $telnet->Disconnect();
}
unset($telnet);

$doutput = '';
/*
$show_version['svnrev'] = '';

if ( is_readable('.svn/entries') )
{
    $file_obj = new SplFileObject('.svn/entries');
    $file_obj->seek(3);
    $show_version['svnrev'] = $file_obj->current();
    unset($file_obj);
    $doutput .= 'MiniManager : '.$show_version['version'].' r'.$show_version['svnrev'];
}
*/
$doutput .= 'Client: '.$_SERVER['HTTP_USER_AGENT'].' OS: '.php_uname('s').' '.php_uname('r').' '.php_uname('v').' '.php_uname('m').' http: '.$_SERVER['SERVER_SOFTWARE'].' PHP: '.phpversion().' '.php_sapi_name().' MySQL: '.mysql_get_server_info();

if ($result)
    $doutput .= $result;

$l_rev = @file_get_contents('http://minimanager-tc.googlecode.com/svn/trunk/', NULL, NULL, 36, 3);
$output .= '<center>';

if ($l_rev)
{
    if (is_readable('.svn/entries'))
    {
        $output .='This revision of miniManager is r'.$show_version['svnrev'].'<br />Latest revision of miniManager is r'.$l_rev.'<br />';
        if ($l_rev > $show_version['svnrev'])
            $output .='Please update to latest revision before posting any bug reports.<br /><br />';
        else
            $output .='You are using the latest revision.<br /><br />';
    }
    else
        $output .='Latest revision of MiniManager is r'.$l_rev.'<br />Please update to latest revision before posting any bug reports.<br /><br />';
}
unset($l_rev);
$output .= 'Copy the selected text below and paste it in your bug report.<br /><br /><textarea id="codearea" readonly="readonly" rows="'.($result ? '22' : '12').'" cols="80">'.$doutput.'</textarea><br /><br /><a href="http://www.trinityscripts.xe.cx/tracker/" target="_blank">Report a bug: http://www.trinityscripts.xe.cx/tracker/<br />(link opens in new tab/window)</a><br /><br /><script type="text/javascript">document.getElementById(\'codearea\').focus(); document.getElementById(\'codearea\').select(); </script></center>';
require_once 'footer.php';
?>
