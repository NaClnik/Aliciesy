# Aliciesy Framework

## External libraries
* [__Eloquent ORM__](https://github.com/illuminate/database)

## Using
```
git clone
composer update
```

## Define routes example
Go to `app/Routes/ApiRouteDefiner.php` and define your routes in `getRoutes()` method:
```php
class ApiRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        $this->routesCollection->get('/test/verify', TestController::class, 'index');
        $this->routesCollection->get('/ok/index', TestController::class, 'index');

        return $this->routesCollection;
    } // getRoutes.
} // ApiRouteDefiner.
```
For now, you can define routes with methods `GET` `POST`, `PUT`, `DELETE`.
You must pass the route name, controller name and action name as arguments.


You should definitely return `$this->routesCollection;`

## Controllers example
In order to send responses to the client, you must create
a controller class and extend the abstract `BaseController` class.

For convenience, place your controllers along this path: `app/Http/Controllers/`

Note that in controller actions, you must return
class objects that extend the abstract `CoreResponse` class,
otherwise you will get an error!

```php
class TestController extends BaseController
{
    // Write actions here.
    public function index(): JsonResponse {
        return JsonResponse::make(['message' => 'example']);
    } // index.
} // TestController.
```


## Dependency Injection example
```php
class TestController
{
    // Services.
    private TestService $testService;

    public function __construct(
        TestService $testService
    )
    {
        $this->testService = $testService;
    } // __construct.

    public function index(): string {
        return JsonResponse::make($this->testService->test());
    } // index.
} // TestController.
```
And here everything is simple. You define the service you need as a parameter and the framework itself will implement this service for you

## Get values from route segments
In order to get parameters from a route segment, you must define a route in this format:
`/user/get/{your_parameter}`

For example:

`in app/Routes/ApiRouteDefiner.php`
```php
class ApiRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        $this->routesCollection->get('/test/verify/{id}', TestController::class, 'index');

        return $this->routesCollection;
    } // getRoutes.
} // ApiRouteDefiner.
```
`in app/Http/Controllers/TestController`
```php
class TestController
{
  
    public function index($id): string {
        return $id;
    } // index.
} // TestController.
```

## Exception handling example
If you need to handle some kind of exception, then you have the opportunity to do it!
Just go to `app/Exceptions/ExceptionsHandler.php` and handle your exceptions.
```php
class ExceptionsHandler extends CoreExceptionsHandler
{
    // Register handlers in register method!
    public function register(): void
    {
        $this->registerException(function (RouteNotFoundException $exception){
            echo 'RouteNotFoundException!';
        }); // RouteNotFoundException.
    } // register.
} // ExceptionsHandler.
```
In the register method, you must call the `$this->registerException()` method and pass in a closure with a typed exception parameter. It is important!

## Send JSON response example
In order to send a `JSON` response, you must return an instance
of the `JsonResponse` class in the controller action, which can
be created using the static `make()` method. You must pass the
object you want to send to this method. Also, if you wish,
you can add headers and response status `(200 by default)`.

For example:

`in app/Htpp/Controllers/TestController.php`

```php
class TestController extends BaseController
{
    public function index(): JsonResponse {
        return JsonResponse::make(['message' => 'example']);
    } // index.

    public function headers(): JsonResponse {
        return JsonResponse::make(['message' => 'headers example'], ['Content-Length' => '...']);
    } // foo.

    public function statusCode(): JsonResponse {
        return JsonResponse::make(['message' => 'statusCode example'], [], 201);
    } // bar.
} // TestController.
```