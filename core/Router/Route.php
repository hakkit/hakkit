<?hh //strict

namespace Hakkit\Core\Router;

final class Route
{
	public string $path;
	public string $controller;
	public string $handler;

	public function __construct(string $path, array<string, string> $options)
	{
		$this->path = $path;
		$this->controller = $options['controller'];
		$this->handler = $options['handler'];
	}
}