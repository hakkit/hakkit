<?hh //strict

namespace Hakkit\Core\Http;

class Request
{
	protected Map<string, mixed> $request;
	protected Map<string, mixed> $query;
	protected Map<string, mixed> $files;
	protected Map<string, mixed> $cookies;
	protected Map<string, mixed> $server;

 	final private function __construct(
 		Map<string, mixed> $request,
 		Map<string, mixed> $query,
 		Map<string, mixed> $files,
 		Map<string, mixed> $cookies,
 		Map<string, mixed> $server
 	) : void {
 		$this->request = $request;
 		$this->query = $query;
 		$this->files = $files;
 		$this->cookies = $cookies;
 		$this->server = $server;
 	}

	public static function constructFromGlobals(
		array<string, mixed> $request,
		array<string, mixed> $query,
		array<string, mixed> $files,
		array<string, mixed> $cookies,
		array<string, mixed> $server
	) : Request {
		return new self(
			new Map($request),
			new Map($query),
			new Map($files),
			new Map($cookies),
			new Map($server)
		);
	}

	public function request(string $key) : mixed 
	{
		return $this->request->get($key);
	}

	public function query(string $key) : mixed 
	{
		return $this->query->get($key);
	}

	public function files(string $key) : mixed 
	{
		return $this->files->get($key);
	}

	public function cookies(string $key) : mixed 
	{
		return $this->cookies->get($key);
	}

	public function server(string $key) : mixed 
	{
		return $this->server->get($key);
	}

    private function __clone() : void {}
    private function __wakeup() : void {}
}