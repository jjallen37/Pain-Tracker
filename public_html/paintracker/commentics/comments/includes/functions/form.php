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


function cmtx_is_form_enabled ($display_msg) { //checks whether form is enabled

	global $cmtx_mysql_table_prefix, $cmtx_settings, $cmtx_page_id; //globalise variables

	if (!$cmtx_settings->enabled_form) {
		if ($display_msg) {
			?><span class="cmtx_all_forms_disabled_message"><?php echo CMTX_ALL_FORMS_DISABLED ?></span><?php
		}
		return false;
	} else if (mysql_num_rows(mysql_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "pages` WHERE `id` = '$cmtx_page_id' AND `is_form_enabled` = '0'"))) {
		if ($display_msg) {
			?><span class="cmtx_this_form_disabled_message"><?php echo CMTX_THIS_FORM_DISABLED ?></span><?php
		}
		return false;
	}
	
	return true;
	
} //end of is-form-enabled function


function cmtx_load_form_login() { //load login form field values

	global $cmtx_set_name_value, $cmtx_set_email_value, $cmtx_set_website_value, $cmtx_set_town_value, $cmtx_set_country_value; //globalise variables
	
	global $cmtx_default_name, $cmtx_default_email, $cmtx_default_website, $cmtx_default_town, $cmtx_default_country; //globalise variables
	
	if (isset($cmtx_set_name_value) && !empty($cmtx_set_name_value)) {
		if (!isset($cmtx_default_name)) { $cmtx_default_name = $cmtx_set_name_value; }
	}
	
	if (isset($cmtx_set_email_value) && !empty($cmtx_set_email_value)) {
		if (!isset($cmtx_default_email)) { $cmtx_default_email = $cmtx_set_email_value; }
	}
	
	if (isset($cmtx_set_website_value) && !empty($cmtx_set_website_value)) {
		if (!isset($cmtx_default_website)) { $cmtx_default_website = $cmtx_set_website_value; }
	}
	
	if (isset($cmtx_set_town_value) && !empty($cmtx_set_town_value)) {
		if (!isset($cmtx_default_town)) { $cmtx_default_town = $cmtx_set_town_value; }
	}
	
	if (isset($cmtx_set_country_value) && !empty($cmtx_set_country_value)) {
		if (!isset($cmtx_default_country)) { $cmtx_default_country = $cmtx_set_country_value; }
	}
	
} //end of load-form-login function


function cmtx_load_form_defaults() { //load default form field values

	global $cmtx_settings, $cmtx_default_name, $cmtx_default_email, $cmtx_default_website, $cmtx_default_town, $cmtx_default_country, $cmtx_default_rating, $cmtx_default_comment, $cmtx_default_notify, $cmtx_default_remember, $cmtx_default_privacy, $cmtx_default_terms; //globalise variables

	if (!isset($cmtx_default_name)) { $cmtx_default_name = $cmtx_settings->default_name; }
	if (!isset($cmtx_default_email)) { $cmtx_default_email = $cmtx_settings->default_email; }
	if (!isset($cmtx_default_website)) { $cmtx_default_website = $cmtx_settings->default_website; }
	if (!isset($cmtx_default_town)) { $cmtx_default_town = $cmtx_settings->default_town; }
	if (!isset($cmtx_default_country)) { $cmtx_default_country = $cmtx_settings->default_country; }
	if (!isset($cmtx_default_rating)) { $cmtx_default_rating = $cmtx_settings->default_rating; }
	if (!isset($cmtx_default_comment)) { $cmtx_default_comment = $cmtx_settings->default_comment; }
	if (!isset($cmtx_default_notify)) { $cmtx_default_notify = $cmtx_settings->default_notify; }
	if (!isset($cmtx_default_remember)) { $cmtx_default_remember = $cmtx_settings->default_remember; }
	if (!isset($cmtx_default_privacy)) { $cmtx_default_privacy = $cmtx_settings->default_privacy; }
	if (!isset($cmtx_default_terms)) { $cmtx_default_terms = $cmtx_settings->default_terms; }
	
} //end of load-form-defaults function


function cmtx_load_form_cookie() { //load cookie form field values

	global $cmtx_default_name, $cmtx_default_email, $cmtx_default_website, $cmtx_default_town, $cmtx_default_country; //globalise variables
	
	if (isset($_COOKIE['Commentics-Form']) && cmtx_strlen($_COOKIE['Commentics-Form']) < 500) {
		
		$values = explode('|', $_COOKIE['Commentics-Form']);
		
		if (count($values) == 5) {
		
			$cmtx_default_name = $values[0];
			$cmtx_default_email = $values[1];
			$cmtx_default_website = $values[2];
			$cmtx_default_town = $values[3];
			$cmtx_default_country = $values[4];
		
		}
		
	}
	
} //end of load-form-cookie function


function cmtx_has_rated() { //checks whether user has already rated

	global $cmtx_mysql_table_prefix, $cmtx_page_id; //globalise variables
	
	$ip_address = cmtx_get_ip_address();
	
	$rated = false; //initialise flag as false

	if (mysql_num_rows(mysql_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "comments` WHERE `page_id` = '$cmtx_page_id' AND `ip_address` = '$ip_address' AND `rating` != '0'")) != 0) {
		$rated = true;
	}
	
	return $rated;
	
} //end of has-rated function


function cmtx_clean_form_defaults() { //clean default form field values

	global $cmtx_default_name, $cmtx_default_email, $cmtx_default_website, $cmtx_default_town; //globalise variables

	$cmtx_default_name = str_replace('"', '', $cmtx_default_name);
	$cmtx_default_email = str_replace('"', '', $cmtx_default_email);
	$cmtx_default_website = str_replace('"', '', $cmtx_default_website);
	$cmtx_default_town = str_replace('"', '', $cmtx_default_town);
	
} //end of clean-form-defaults function
?>