<?hh //strict

namespace Hakkit\Core\Http;

class Response
{
	private mixed $data;

	public function __construct(mixed $data) : void
	{
		$this->data = $data;
	}

	public function getData() : mixed
	{
		return $this->data;
	}
}