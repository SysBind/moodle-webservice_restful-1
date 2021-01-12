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
 * Course routes.
 *
 * @package    webservice_restful
 * @copyright  2017 Frédéric Massart <fred@branchup.tech>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace webservice_restful;
defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../lib/include.php');

$routescategories = [
    [
        'regex' => '/categories/([0-9]+)',
        'precheck' => precheck_exists_or_not_found('course_categories', 0),
        'methods' => [
            'GET' => external_api_method('core_course_get_categories', [
                'argsmapper' => function($args, $request, $options) {
                    return [
                        'criteria' => [
                            [
                                'key' => 'id',
                                'value' => $args[0]
                            ]
                        ]
                    ];
                }
            ])
        ]
    ]
];
