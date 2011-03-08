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

// page header, and any additional required libraries
require_once 'header.php';
// minimum permission to view page
valid_login($action_permission['read']);

if (file_exists('lang/irc/'.$lang.'.lang') && file_exists('lang/irc/pixx-'.$lang.'.lang'))
    $irclang = $lang;
else
    $irclang = 'english';

// we start with a lead of 10 spaces,
//  because last line of header is an opening tag with 8 spaces
//  keep html indent in sync, so debuging from browser source would be easy to read
$output .= '
                <!-- start of irc.php -->
                <center>
                <br />
                    <applet code="IRCApplet.class" archive="libs/js/irc/irc.jar, libs/js/irc/pixx.jar" width="780" height="400">
                        <param name="nick" value="'.$user_name.'" />
                        <param name="alternatenick" value="'.$user_name.'_tmp" />
                        <param name="name" value="'.$user_name.'" />
                        <param name="host" value="'.$irc_cfg['server'].'" />
                        <param name="port" value="'.$irc_cfg['port'].'" />
                        <param name="gui"  value="pixx" />
                        <param name="asl"  value="false" />
                        <param name="language"      value="lang/irc/'.$lang.'" />
                        <param name="pixx:language" value="lang/irc/pixx-'.$lang.'" />
                        <param name="style:bitmapsmileys"  value="false" />
                        <param name="style:floatingasl"    value="true" />
                        <param name="style:highlightlinks" value="true" />
                        <param name="pixx:highlight"     value="true" />
                        <param name="pixx:highlightnick" value="true" />
                        <param name="pixx:nickfield" value="true" />
                        <param name="pixx:showabout" value="false" />
                        <param name="pixx:helppage" value="http://www.trinityscripts.xe.cx" />
                        <param name="pixx:timestamp" value="true" />
                        <param name="pixx:color5"  value="2a2a2a" />
                        <param name="pixx:color6"  value="383838" />
                        <param name="pixx:color7"  value="565656" />
                        <param name="pixx:color9"  value="d4d4d4" />
                        <param name="pixx:color10" value="d4d4d4" />
                        <param name="pixx:color11" value="d4d4d4" />
                        <param name="pixx:color12" value="d4d4d4" />
                        <param name="command1" value="/join #'.$irc_cfg['channel'].'" />
                    </applet>
                <br /><br />
                </center>
                <!-- end of irc.php -->';

require_once 'footer.php';
?>
