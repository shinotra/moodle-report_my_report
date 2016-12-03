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
 * Defines the view event.
 *
 * @package    report_my_report
 * @copyright  2016 Toru Shinohara
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace report_my_report\event;

defined('MOODLE_INTERNAL') || die();

class view_my_report extends \core\event\base {

    /**
     * Initialize the event
     */
    protected function init() {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_TEACHING;
        $this->data['objecttable'] = null;
    }

    /**
     * Get string for success event on export
     * 
     * @return string success description string
     */
    public static function get_name(){
        return get_string('view_report', 'report_my_report');
    }

    /**
     * Get string for description
     * 
     * @return string Result information
     */
    public function get_description() {
        return "Success to view reports.";
    }

    /**
     * Get the URL with the course id
     * 
     * @return string url
     */
     public function get_url() {
        global $CFG;
        return new \moodle_url($CFG->wwwroot . "/report/my_report/index.php");
    }
}
