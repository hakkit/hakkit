<?hh

return [

	'/' => [
		'controller' => \App\Controllers\PagesController::class,
		'handler' => 'home',
	],

	'/message/{message}' => [
		'controller' => \App\Controllers\MessageController::class,
		'handler' => 'get',
	],
];