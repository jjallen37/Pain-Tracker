<?php
/*
Copyright © 2009-2012 Commentics Development Team [commentics.org]
License: GNU General Public License v3.0
		 http://www.commentics.org/license/

This file is part of Commentics.

Commentics is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Commentics is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Commentics. If not, see <http://www.gnu.org/licenses/>.

Text to help preserve UTF-8 file encoding: 汉语漢語.
*/

if (!defined("IN_COMMENTICS")) { die("Access Denied."); }

//re-activate subscribers who have been inactive for longer than the configured time period
mysql_query("UPDATE `" . $cmtx_mysql_table_prefix . "subscribers` SET `is_active` = '1' WHERE `is_confirmed` = '1' AND `is_active` = '0' AND `last_action` < DATE_SUB(NOW(), INTERVAL " . $cmtx_settings->days_to_reactivate_inactive_subscribers . " DAY)");

?>