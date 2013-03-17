<?php
/**
 * Collapsed Topics Information
 *
 * A topic based format that solves the issue of the 'Scroll of Death' when a course has many topics. All topics
 * except zero have a toggle that displays that topic. One or more topics can be displayed at any given time.
 * Toggles are persistent on a per browser session per course basis but can be made to persist longer by a small
 * code change. Full installation instructions, code adaptions and credits are included in the 'Readme.txt' file.
 *
 * @package    course/format
 * @subpackage topcoll
 * @version    See the value of '$plugin->version' in version.php.
 * @copyright  &copy; 2009-onwards G J Barnard in respect to modifications of standard topics format.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}
 * @link       http://docs.moodle.org/en/Collapsed_Topics_course_format
 * @license    http://www.gnu.org/copyleft/gpl.html GNU Public License
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// English American Translation of Collapsed Topics Course Format

// Used in format.php
$string['topcollsidewidth']='28px';

// Colour enhancement - Moodle Tracker CONTRIB-3529
$string['setcolour'] = 'Set color';
$string['colourrule'] = "Please enter a valid RGB color, a '#' and then six hexadecimal digits.";
$string['resetcolour'] = 'Reset color';
$string['resetallcolour'] = 'Reset colors for all Collapsed Topics courses';

// Help
// Moodle Tracker CONTRIB-3529
$string['setcolour_help'] = 'Contains the settings to do with the color of the format within the course.';
$string['settoggleforegroundcolour_help'] = 'Sets the color of the text on the toggle.';
$string['settogglebackgroundcolour_help'] = 'Sets the background color of the toggle.';
$string['settogglebackgroundhovercolour_help'] = 'Sets the background color of the toggle when the mouse moves over it.';
$string['resetcolour_help'] = 'Resets the colors to the default values in "/course/format/topcoll/tcconfig.php" so it will be the same as a course the first time it is in the Collapsed Topics format.';
$string['resetallcolour_help'] = 'Resets the colors to the default values in "/course/format/topcoll/tcconfig.php" for all courses so it will be the same as a course the first time it is in the Collapsed Topics format.';
?>
