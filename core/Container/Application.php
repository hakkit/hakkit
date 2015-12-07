<?hh //strict

namespace Hakkit\Core\Container;

use Hakkit\Core\Http\Request;
use Hakkit\Core\Http\Response;
use Hakkit\Core\Router\Router;

final class Application 
{
	private Router $router;
	
	public function __construct(Router $router) 
	{
		$this->router = $router;
	}
	
	public function handle(Request $request) : mixed 
	{
		$response = new Response(
			$this->passRequestToRouter($request)
		);

		return $response->getData();
	}
	
	public function getRouter() : Router 
	{
		return $this->router;
	}

	private function passRequestToRouter(Request $request) : mixed 
	{
		return $request->server('REQUEST_URI');
	}
}