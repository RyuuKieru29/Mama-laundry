<?php
/**
 * DOMPDF - PHP5 HTML to PDF renderer
 *
 * File: $RCSfile: dompdf_config.inc.php,v $
 * Created on: 2004-08-04
 *
 * Copyright (c) 2004 - Benj Carson <benjcarson@digitaljunkies.ca>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this library in the file LICENSE.LGPL; if not, write to the
 * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 * 02111-1307 USA
 *
 * Alternatively, you may distribute this software under the terms of the
 * PHP License, version 3.0 or later.  A copy of this license should have
 * been distributed with this file in the file LICENSE.PHP .  If this is not
 * the case, you can obtain a copy at http://www.php.net/license/3_0.txt.
 *
 * The latest version of DOMPDF might be available at:
 * http://www.dompdf.com/
 *
 * @link http://www.dompdf.com/
 * @copyright 2004 Benj Carson
 * @author Benj Carson <benjcarson@digitaljunkies.ca>
 * @contributor Helmut Tischer <htischer@weihenstephan.org>
 * @package dompdf
 *
 * Changes
 * @contributor Helmut Tischer <htischer@weihenstephan.org>
 * @version 0.5.1.htischer.20090507
 * - Allow overriding of configuration settings by calling php script.
 *   This allows replacing of dompdf by a new version in an application
 *   without any modification,
 * - Optionally separate font cache folder from font folder.
 *   This allows write protecting the entire installation
 * - Add settings to enable/disable additional debug output categories
 * - Change some defaults to more practical values
 * - Add comments about configuration parameter implications
 */

/* $Id: dompdf_config.inc.php 363 2011-02-17 21:18:25Z fabien.menager $ */

// ... (previous code)

// Autoload required for Composer-installed version
require_once 'vendor/autoload.php';

// Pastikan DOMPDF_INC_DIR sudah didefinisikan
if (!defined('DOMPDF_INC_DIR')) {
  define('DOMPDF_INC_DIR', __DIR__); // Sesuaikan dengan path yang benar jika diperlukan
}

/**
 * DOMPDF autoload function
 *
 * If you have an existing autoload function, add a call to this function
 * from your existing __autoload() implementation.
 *
 * @param string $class
 */
function DOMPDF_autoload($class) {
  $filename = DOMPDF_INC_DIR . "/" . mb_strtolower($class) . ".cls.php";

  if (is_file($filename)) {
      require_once($filename);
  }
}

// Jika fungsi autoload SPL tersedia (PHP >= 5.1.2)
if (function_exists("spl_autoload_register")) {
  spl_autoload_register("DOMPDF_autoload");
} else {
  // Gunakan fungsi spl_autoload_register() untuk PHP 5.1.2 ke bawah
  function dompdf_default_autoloader($class) {
      DOMPDF_autoload($class);
  }

  spl_autoload_register("dompdf_default_autoloader");
}

// ### End of user-configurable options ###

/**
 * Ensure that PHP is working with text internally using UTF8 character encoding.
 */
mb_internal_encoding('UTF-8');

global $_dompdf_warnings;
$_dompdf_warnings = array();

global $_dompdf_show_warnings;
$_dompdf_show_warnings = false;

global $_dompdf_debug;
$_dompdf_debug = false;

global $_DOMPDF_DEBUG_TYPES;
$_DOMPDF_DEBUG_TYPES = array();

define('DEBUGPNG', false);
define('DEBUGKEEPTEMP', false);
define('DEBUGCSS', false);
define('DEBUG_LAYOUT', false);
define('DEBUG_LAYOUT_LINES', true);
define('DEBUG_LAYOUT_BLOCKS', true);
define('DEBUG_LAYOUT_INLINE', true);
define('DEBUG_LAYOUT_PADDINGBOX', true);

register_shutdown_function(function () {
    global $_dompdf_warnings, $_dompdf_show_warnings;
    if ($_dompdf_show_warnings && !empty($_dompdf_warnings)) {
        echo "<h2>DOMPDF Warnings</h2>";
        echo "<ul>";
        foreach ($_dompdf_warnings as $warning) {
            echo "<li>{$warning}</li>";
        }
        echo "</ul>";
    }
});

?>