<?php
/**
 * adminform クラス (extends \moodleform)
 *
 * @package    report_my_report
 * @copyright  2016 Toru Shinohara
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace report_my_report;
global $CFG;
defined('MOODLE_INTERNAL') || die();
require_once "$CFG->libdir/formslib.php";

class adminform extends \moodleform
{
    /**
     * Export form definition.
     *
     */
    public function definition()
    {
        $mform   = $this->_form;
        
        // ヘッダ
        $mform->addElement('html',
                '<h3>'.get_string('admin_title', 'report_my_report').'</h3>');
        // ボタン
        $this->add_action_buttons(
            true, 
            get_string('ok', 'report_my_report')
        );
//        $mform->disable_form_change_checker();

    }
}
