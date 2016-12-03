<?php
/**
 * logging クラス (ログ出力処理)
 *
 * @package    report_my_report
 * @copyright  2016 Toru Shinohara
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace report_my_report;
defined('MOODLE_INTERNAL') || die;

class logging
{
    public static function view_report($context)
    {
        $event = event\view_my_report::create([
            'objectid' => null,
            'context' => $context,
        ]);
        $event->trigger();
    }
      
}