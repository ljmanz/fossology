#!/usr/bin/php
<?php
/***********************************************************
 Copyright (C) 2008 Hewlett-Packard Development Company, L.P.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 version 2 as published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 ***********************************************************/

/**
 * Simpletest run script template
 *
 * Run a test using simpletest, useful when working on a new test.
 *
 * @version "$Id$"
 *
 * Created on Aug 27, 2008
 */

$path = '/usr/local/simpletest' . PATH_SEPARATOR;
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

/* simpletest includes */
require_once '/usr/local/simpletest/unit_tester.php';
require_once '/usr/local/simpletest/web_tester.php';
require_once '/usr/local/simpletest/reporter.php';

require_once ('fossologyWebTestCase.php');
require_once ('TestEnvironment.php');

/* replace the TestSuite string with one that describes what the test suite is */
$test = & new TestSuite("Run Fossology tests");
/*
 * To run a test use addTestFile method. as many tests as needed can be run this way.
 * Just keep adding more $test->addTestFile(sometest) lines to this
 * file for each new test.
 */
$test->addTestFile('mytest');
/*
 * leave the code below alone, it allows the tests to be run either by
 * the cli or in a web browser
 */
if (TextReporter :: inCli())
{
  exit ($test->run(new TextReporter()) ? 0 : 1);
}
$test->run(new HtmlReporter());
?>
