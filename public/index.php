<?hh

use Hakkit\Core\Http\Request;

define('APP_ROOT', realpath(__DIR__ . '/../'));
require_once APP_ROOT . '/vendor/autoload.php';

function main() : void {
	$request = Request::constructFromGlobals();
}

main();