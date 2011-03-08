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
// we get the error message which was passed to us
$err = (isset($_GET['err'])) ? ($_GET['err']) : ((defined('ERROR_MSG')) ? ERROR_MSG : 'Oopsy...');

//  we start with a lead of 10 spaces,
//  because last line of header is an opening tag with 8 spaces
//  keep html indent in sync, so debuging from browser source would be easy to read
$output .= '
                <!-- start of error.php -->
                <center>
                <br />
                    <table width="400" class="flat">
                        <tr>
                            <td align="center">
                                <h1>
                                    <font class="error">
                                        <img src="img/warn_red.gif" width="48" height="48" alt="error" />
                                        <br />ERR!
                                    </font>
                                </h1>
                                <br />'.$err.'<br />
                            </td>
                        </tr>
                    </table>
                <br />
                <table width="300" class="hidden">
                    <tr>
                        <td align="center">';
                        
makebutton($lang_global['home'], 'index.php', 130);
makebutton($lang_global['back'], 'javascript:window.history.back()', 130);
unset($err);

$output .= '
                        </td>
                    </tr>
                </table>
                <br />
                </center>
                <!-- end of error.php -->';
                
require_once 'footer.php';

?>
