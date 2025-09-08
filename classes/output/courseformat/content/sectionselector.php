<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Collapsed Topics
 *
 * Contains the default section selector.
 *
 * @package    format_topcoll
 * @copyright  &copy; 2023-onwards G J Barnard in respect to modifications of standard topics format.
 * @author     G J Barnard - {@link https://moodle.org/user/profile.php?id=442195}
 * @copyright  2020 Ferran Recio <ferran@moodle.com>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace format_topcoll\output\courseformat\content;

use core\output\renderer_base;
use core\output\url_select;
use stdClass;

/**
 * Represents the section selector.
 */
class sectionselector extends \core_courseformat\output\local\content\sectionselector {
    /**
     * Get the name of the template to use for this templatable.
     *
     * @param renderer_base $renderer The renderer requesting the template name
     * @return string
     */
    public function get_template_name(renderer_base $renderer): string {
        return 'format_topcoll/local/content/sectionselector';
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output typically, the renderer that's calling this function
     * @return stdClass data context for a mustache template
     */
    public function export_for_template(renderer_base $output): stdClass {

        $format = $this->format;
        $course = $format->get_course();

        $modinfo = $this->format->get_modinfo();

        $data = $this->navigation->export_for_template($output);
        
        // let's truncate some long section names
        // added by MD Sep 2025
        $char_length = 18;
        $shortmenu = 0;
        if(strlen($data->previousname) > $char_length) {
					$data->previousname = truncate_at_space($data->previousname, $char_length);
					$shortmenu = 1;
				}
				if(strlen($data->nextname) > $char_length) {
					$data->nextname = truncate_at_space($data->nextname, $char_length);
					$shortmenu = 1;
        }

        // Add the section selector.
        $sectionmenu = [];
        $sectionmenu[course_get_url($course)->out(false)] = get_string('maincoursepage');
        $section = 0;
        /* Note: Deligated sections are put at the end of the array returned by 'get_section_info_all',
                 so real 'sections' are indexable sequentially by number. */
        $numsections = $format->get_last_section_number_without_deligated();
        while ($section <= $numsections) {
            $thissection = $modinfo->get_section_info($section);
            $url = $format->get_view_url($section, ['navigation' => false]);
            if ($url && $section != $data->currentsection) {
                if ($format->is_section_visible($thissection)) {
                    $sectionmenu[$url->out(false)] = get_section_name($course, $section);
                }
            }
            $section++;
        }

        $select = new url_select($sectionmenu, '', ['' => get_string('jumpto')]);
        $select->class = 'jumpmenu';
        if($shortmenu) {
        	$select->class = $select->class . ' shorten'; // added by MD to shorten the menu between two long links
        }
        $select->formid = 'sectionmenu';

        $data->selector = $output->render($select);

        return $data;
    }
}
function truncate_at_space($input_string, $max_length, $append_char = ' ...') {
	/*
	Given a string and a maximum length,
	shortens a given string at a word boundary,
	adds an ellipsis
	Added by MD Sep 2025
	*/
	$truncated_string = substr($input_string, 0, $max_length);
	$last_space = strrpos($truncated_string, ' ');

	if ($last_space > 0) {
		$truncated_string = substr($truncated_string, 0, $last_space);
	}

	return $truncated_string . $append_char;
}
