<?hh

use Hakkit\Core\Http\Request;

require_once APP_FOLDER . '/vendor/autoload.php';

function main() : void {
	$request = Request::constructFromGlobals();
}

main();