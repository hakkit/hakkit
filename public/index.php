<?hh

use Hakkit\Core\Http\Request;
use Hakkit\Core\Http\Response;
use Hakkit\Core\Router\Router;
use Hakkit\Core\Container\Application;

define('APP_ROOT', realpath(__DIR__ . '/../'));
require_once APP_ROOT . '/vendor/autoload.php';

function main() : void 
{
	$app = new Application(
		new Router(require_once APP_ROOT . '/appl/routes.php')
	);
	
	echo $app->handle(
		Request::constructFromGlobals()
	);
}

main();