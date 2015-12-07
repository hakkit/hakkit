<?hh //strict

namespace Hakkit\Core\Router;

final class Router
{
	const ROUTES = '/appl/routes.php';
	public Map<string, Route> $routes;

	public function __construct(array<string, array<string, string>> $routes)
	{
		$this->routes = new Map(null);

		foreach($routes as $path => $options)
		{
			$route = new Route($path, $options);
			$this->routes[$route->path] = $route;
		}
	}
}