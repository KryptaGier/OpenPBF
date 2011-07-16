<?PHP
/**
 * Example that uses the DB reader
 *
 * $Id$
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.de
 */

 error_reporting( E_ALL );
 
/**
* requires patErrorManager
* make sure that it is in your include path
*/
require_once 'pat/patErrorManager.php';
	
require_once '../patTemplate.php';
	
$tmpl = &new patTemplate();

// set the location for database templates
$tmpl->setRoot('mysql://root:@localhost/test', 'DB');

// set the location for file templates
$tmpl->setRoot('templates', 'File');

// read from the database
$result = $tmpl->readTemplatesFromInput('templates[@id=table]/@content', 'DB');
if (patErrorManager::isError($result)) {
	$result->getMessage();
}

// read from a file
$result = $tmpl->readTemplatesFromInput('example_function_phphighlight.tmpl');
if (patErrorManager::isError($result)) {
	$result->getMessage();
}

$rows = array(
				array( '<Col 1>', '<Col 2>', '<Col 3>' ),
				array( '1-1', '1-2', '1-3' ),
				array( '2-1', '2-2', '2-3' ),
				array( '3-1', '3-2', '3-3' ),
				array( '4-1', '4-2', '4-3' ),
			);

$tmpl->addVar( 'row', 'value', $rows );

$tmpl->displayParsedTemplate('table');
$tmpl->displayParsedTemplate('root');
?>