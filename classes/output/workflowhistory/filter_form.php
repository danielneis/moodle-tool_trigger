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
 * Filter form class for workflowhistory.
 *
 * @package    tool_trigger
 * @copyright  Catalyst IT, 2021
 * @author     Nicholas Hoobin <nicholashoobin@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_trigger\output\workflowhistory;

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

/**
 * Filter form class for workflowhistory.
 *
 * @package    tool_trigger
 * @copyright  Catalyst IT, 2021
 * @author     Nicholas Hoobin <nicholashoobin@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter_form extends \moodleform {

    public function definition() {
        $mform = $this->_form;

        $mform->addElement('hidden', 'workflow');
        $mform->setType('workflow', PARAM_INT);

        $mform->addElement('header', 'filterheader', get_string('filter', 'tool_trigger'));
        $mform->setExpanded('filterheader', true);

        $mform->addElement('checkbox', 'filterpassed', get_string('filterlabelrunstatus', 'tool_trigger'), get_string('filterpassed', 'tool_trigger'));
        $mform->addElement('checkbox', 'filterdeferred', '', get_string('filterdeferred', 'tool_trigger'));
        $mform->addElement('checkbox', 'filterfailed', '', get_string('filterfailed', 'tool_trigger'));
        $mform->addElement('checkbox', 'filtererrored', '', get_string('filtererrored', 'tool_trigger'));
        $mform->addElement('checkbox', 'filtercancelled', '', get_string('filtercancelled', 'tool_trigger'));

        $mform->addElement('text', 'filterusername', get_string('filterlabelusername', 'tool_trigger'), ['placeholder' => '']);
        $mform->setType('filterusername', PARAM_TEXT);

        $mform->addElement('text', 'filteruserid', get_string('filterlabeluserid', 'tool_trigger'), ['placeholder' => '']);
        $mform->setType('filteruserid', PARAM_TEXT);

        $resetlink = \html_writer::link(new \moodle_url('/admin/tool/trigger/history.php', ['workflow' => '1']), get_string('filterreset', 'tool_trigger'));
        $resetbutton = \html_writer::div($resetlink, 'btn btn-primary');
        $buttonarray = [
            $mform->createElement('submit', 'filtersubmit', get_string('filtersubmit', 'tool_trigger')),
        ];
        $mform->addGroup($buttonarray, 'buttonar', '', [' '], false);
    }
}
