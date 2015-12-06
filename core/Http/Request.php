<?hh //strict

namespace Hakkit\Core\Http;

class Request
{
	protected ?Map<string, mixed> $request;
	protected ?Map<string, mixed> $query;
	protected ?Map<string, mixed> $files;
	protected ?Map<string, mixed> $cookies;
	protected ?Map<string, mixed> $server;

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

	public static function constructFromGlobals() : Request
	{
		return new self(
			new Map($_POST),
			new Map($_GET),
			new Map($_FILES),
			new Map($_COOKIE),
			new Map($_SERVER)
		);
	}

    private function __clone() : void {}
    private function __wakeup() : void {}
}