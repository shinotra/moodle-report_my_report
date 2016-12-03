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
require_once(dirname(__FILE__) . '/classes/form/adminform.php');
require_once(dirname(__FILE__) . '/classes/logging.php');
require_once "$CFG->libdir/adminlib.php";


// ---- ページセットアップ ----
admin_externalpage_setup('my_report', '', null, '', array('pagelayout'=>'report'));

// ---- ログインとケイパビリティのチェック ----
require_login();
$context = \context_system::instance();
require_capability('report/my_report:view_all', $context);

// ---- PAGEの設定 ----
$PAGE->set_context($context);
$PAGE->set_title(get_string('title', 'report_my_report'));
$PAGE->set_url(new \moodle_url($CFG->wwwroot . '/report/my_report/admin.php'));
$PAGE->set_heading(get_string('title', 'report_my_report'));
$PAGE->set_pagelayout('admin');

// ---- フォームの設定 ----
/* @var $mform object : Form object */
$mform = new adminform( null, ['context' => $context]);

if ($mform->is_cancelled()) {
    // ---- キャンセル処理 ----
    redirect(new \moodle_url('/'));
} 
elseif ($inputs = $mform->get_data()) {
    // ---- OKの場合の処理 ----
    redirect(new \moodle_url('/'));
} else {
    // ---- ページ表示 ----
    echo $OUTPUT->header();
    $mform->display();
    echo $OUTPUT->footer();
    logging::view_report($context);

}
