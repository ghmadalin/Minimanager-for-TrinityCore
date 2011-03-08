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

//#############################################################################
//get country code and country name by IP
// given IP, returns array('code','country')
// 'code' is country code, 'country' is country name.

function misc_get_country_by_ip($ip, &$sqlm)
{
    $country = $sqlm->fetch_assoc($sqlm->query('SELECT c.code, c.country FROM ip2nationCountries c, ip2nation i WHERE i.ip < INET_ATON("'.$ip.'") AND c.code = i.country ORDER BY i.ip DESC LIMIT 0,1;'));

    return $country;
}


//#############################################################################
//get country code and country name by IP
// given account ID, returns array('code','country')
// 'code' is country code, 'country' is country name.

function misc_get_country_by_account($account, &$sqlr, &$sqlm)
{
    $ip = $sqlr->fetch_assoc($sqlr->query('SELECT last_ip FROM account WHERE id='.$account.';'));

    return misc_get_country_by_ip($ip['last_ip'], $sqlm);
}


?>