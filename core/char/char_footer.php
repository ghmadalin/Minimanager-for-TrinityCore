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
 
$output .= '
<center>
    <table class="hidden">
    <tr>
        <td>';
// only higher level GM with update access can edit accounts via user.php
// button to user account page, user account page has own security
if ( ($user_lvl > $owner_gmlvl) && ($user_lvl >= $action_permission['update']) )
{
    makebutton($lang_char['chars_acc'], 'user.php?action=edit_user&amp;id='.$owner_acc_id.'', 130);
    $output .= '
            </td>
            <td>';
}
else
// players edit their own accs via edit.php
{
    makebutton($lang_char['chars_acc'], 'edit.php', 130);
    $output .= '
            </td>
            <td>';
}
// only higher level GM with delete access can edit character
//  character edit allows removal of character items, so delete permission is needed
if ( ($user_lvl > $owner_gmlvl) && ($user_lvl >= $action_permission['delete']) )
{
    makebutton($lang_char['edit_button'], 'char_edit.php?id='.$id.'&amp;realm='.$realmid.'', 130);
    $output .= '
            </td>
            <td>';
}
// only higher level GM with delete access, or character owner can delete character
if ( ( ($user_lvl > $owner_gmlvl) && ($user_lvl >= $action_permission['delete']) ) || ($owner_name === $user_name) )
{
    makebutton($lang_char['del_char'], 'char_list.php?action=del_char_form&amp;check%5B%5D='.$id.'" type="wrn', 130);
    $output .= '
            </td>
            <td>';
}
// only GM with update permission can send mail, mail can send items, so update permission is needed
if ($user_lvl >= $action_permission['update'])
{
    makebutton($lang_char['send_mail'], 'mail.php?type=ingame_mail&amp;to='.$char['name'].'', 130);
    $output .= '
            </td>
            <td>';
}
    makebutton($lang_global['back'], 'javascript:window.history.back()" type="def', 130);
    $output .= '
            </td>
        </tr>
    </table>
</center>';

?>