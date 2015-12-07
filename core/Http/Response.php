<?hh //strict

namespace Hakkit\Core\Http;

class Response
{
	private int $statusCode;
	private string $statusText;
	private string $content;
	private Map<string, string> $headers;
	private string $version;

	const int HTTP_CONTINUE = 100;
	const int HTTP_SWITCHING_PROTOCOLS = 101;
	const int HTTP_PROCESSING = 102;
	const int HTTP_OK = 200;
	const int HTTP_CREATED = 201;
	const int HTTP_ACCEPTED = 202;
	const int HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
	const int HTTP_NO_CONTENT = 204;
	const int HTTP_RESET_CONTENT = 205;
	const int HTTP_PARTIAL_CONTENT = 206;
	const int HTTP_MULTI_STATUS = 207;
	const int HTTP_ALREADY_REPORTED = 208;
	const int HTTP_IM_USED = 226;
	const int HTTP_MULTIPLE_CHOICES = 300;
	const int HTTP_MOVED_PERMANENTLY = 301;
	const int HTTP_FOUND = 302;
	const int HTTP_SEE_OTHER = 303;
	const int HTTP_NOT_MODIFIED = 304;
	const int HTTP_USE_PROXY = 305;
	const int HTTP_TEMPORARY_REDIRECT = 307;
	const int HTTP_PERMANENT_REDIRECT = 308;
	const int HTTP_BAD_REQUEST = 400;
	const int HTTP_UNAUTHORIZED = 401;
	const int HTTP_PAYMENT_REQUIRED = 402;
	const int HTTP_FORBIDDEN = 403;
	const int HTTP_NOT_FOUND = 404;
	const int HTTP_METHOD_NOT_ALLOWED = 405;
	const int HTTP_NOT_ACCEPTABLE = 406;
	const int HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
	const int HTTP_REQUEST_TIMEOUT = 408;
	const int HTTP_CONFLICT = 409;
	const int HTTP_GONE = 410;
	const int HTTP_LENGTH_REQUIRED = 411;
	const int HTTP_PRECONDITION_FAILED = 412;
	const int HTTP_PAYLOAD_TOO_LARGE = 413;
	const int HTTP_REQUEST_URI_TOO_LONG = 414;
	const int HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
	const int HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
	const int HTTP_EXPECTATION_FAILED = 417;
	const int HTTP_IM_A_TEAPOT = 418;
	const int HTTP_MISDIRECTED_REQUEST = 421;
	const int HTTP_UNPROCESSABLE_ENTITY = 422;
	const int HTTP_LOCKED = 423;
	const int HTTP_FAILED_DEPENDENCY = 424;
	const int HTTP_UPGRADE_REQUIRED = 426;
	const int HTTP_PRECONDITION_REQUIRED = 428;
	const int HTTP_TOO_MANY_REQUESTS = 429;
	const int HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
	const int HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
	const int HTTP_CLIENT_CLOSED_REQUEST = 499;
	const int HTTP_INTERNAL_SERVER_ERROR = 500;
	const int HTTP_NOT_IMPLEMENTED = 501;
	const int HTTP_BAD_GATEWAY = 502;
	const int HTTP_SERVICE_UNAVAILABLE = 503;
	const int HTTP_GATEWAY_TIMEOUT = 504;
	const int HTTP_HTTP_VERSION_NOT_SUPPORTED = 505;
	const int HTTP_VARIANT_ALSO_NEGOTIATES = 506;
	const int HTTP_INSUFFICIENT_STORAGE = 507;
	const int HTTP_LOOP_DETECTED = 508;
	const int HTTP_NOT_EXTENDED = 510;
	const int HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;
	const int HTTP_NETWORK_CONNECT_TIMEOUT_ERROR = 599;

	public static Map<int, string> $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Reserved',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',                                            
        422 => 'Unprocessable Entity',                                     
        423 => 'Locked',                                                   
        424 => 'Failed Dependency',                                        
        425 => 'Reserved for WebDAV advanced collections expired proposal',
        426 => 'Upgrade Required',                                         
        428 => 'Precondition Required',                                    
        429 => 'Too Many Requests',                                        
        431 => 'Request Header Fields Too Large',                          
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates (Experimental)',                   
        507 => 'Insufficient Storage',                                     
        508 => 'Loop Detected',                                            
        510 => 'Not Extended',                                             
        511 => 'Network Authentication Required',                          
    ];

	public function __construct(
		string $content, 
		int $status = 200,
		Map<string, string> $headers = new Map(null)
	) : void {
		$this->content = $content;
		$this->statusCode = $code;
		$this->statusText = $this->getStatusTextFromCode($code);
		$this->headers = new Map(['blah' => 'hello']);
		
		$this->statusText($this->statusCode);
		$this->setVersion('1.0');
	}

	public function send() : this
	{
		$this->sendHeaders();
		$this->sendContent();
		die();
	}

	public function getStatusTextFromCode(int $code) : string 
	{
		if(self::$statusTexts->contains($code))
		{
			return self::$statusTexts->get($code);
		}

		return '';
	}

	public function getHeaders() : Map<string, string>
	{
		return $this->headers;
	}

	public function getContent() : string
	{
		return $this->content;
	}

	private function sendHeaders() : this
	{
		if(headers_sent()) {
			return $this;
		}

		header("HTTP/$this->version $this->statusCode $this->statusText", true, $this->statusCode);

		foreach($this->headers as $name => $value)
		{
			header($name, $value, true, $this->statusCode);
		}

		return $this;
	}

	private function sendContent() : this
	{
		echo $this->content;

		return $this;
	}

	public function setVersion(string $version) : void
	{
		$this->version = $version;
	}
}