<?php
/**
 * Version info
 *
 * @package    report_my_report
 * @copyright  2016 Toru Shinohara
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace report_my_report;

require('../../config.php');
require_once(dirname(__FILE__) . '/classes/form/reportform.php');
require_once(dirname(__FILE__) . '/classes/logging.php');
        
// ---- 引数の取得 ----
/* @var $courseid int : course id */
$courseid = required_param('id', PARAM_INT);

// ---- パーミッションとログインとケイパビリティのチェック ----
if (!$course = $course = get_course($courseid)){
    print_error('invalidcourse');
}
require_login($course);

$context = \context_course::instance($course->id);
require_capability('report/my_report:view', $context);

// ---- PAGEの設定 ----
/* @var $PAGE object */
$PAGE->set_title($course->shortname .': '. get_string('title', 'report_my_report'));
$PAGE->set_url(new \moodle_url($CFG->wwwroot . '/report/my_report/index.php', ["id" => $course->id]));
$PAGE->set_heading($course->fullname);
$PAGE->set_pagelayout('incourse');

// ---- フォームの設定 ----
/* @var $mform object : Form object */
$mform = new reportform( null, ['course'  => $course, 'context' => $context]);

if ($mform->is_cancelled()) {
    // ---- キャンセル処理 ----
    if($courseid == 1)
        redirect(new \moodle_url('/'));
    redirect(new \moodle_url($CFG->wwwroot . "/course/view.php", ["id" => $course->id]));
} 
elseif ($inputs = $mform->get_data()) {

    
} else {
    // ---- ページ表示 ----
    echo $OUTPUT->header();
    $mform->display();
    echo $OUTPUT->footer();
    logging::view_report($context);

}
