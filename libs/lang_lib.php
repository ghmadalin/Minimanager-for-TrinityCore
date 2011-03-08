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
 
class lang
{
    private $lang; // contains the used language
    private $modules; // contains the loaded language modules

    public function __construct($lang, $global)
    {
        $this->modules['global'] = $global;
    }

    public function loadModule($name, $module)
    {
        if(!isset($this->modules[$name]))
        {
            $this->modules[$name] = $module;
        }
    }

    public function _($module, $index)
    {
        if(isset($this->modules[$module][$index]))
            return $this->modules[$module][$index];
        else
            return '{' . $index . '}';
    }

    public function exists($module, $index)
    {
        return isset($this->modules[$module][$index]);
    }
}

?>
