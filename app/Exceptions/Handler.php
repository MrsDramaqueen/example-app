<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\Custom\BaseException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Throwable $e
     * @return void
     *
     * @throws Throwable
     */
    public function report(Throwable $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $e
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($e instanceof BaseException) {
            $data = [
                'message' => $e->getMessage(),
            ];
            if ($e->status() == 422) {
                $data = array_merge($data, $e->errors());
            }
            return response()->json($data)->setStatusCode($e->status());
        }

        return parent::render($request, $e);
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return bool
     */
    protected function shouldReturnJson($request, Throwable $e): bool
    {
        return $request->is('api/*') || $request->expectsJson();
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        if ($e->response) {
            return $e->response;
        }

        return $request->is('api/*') || $request->expectsJson()
            ? $this->invalidJson($request, $e)
            : $this->invalid($request, $e);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $loginRoute = $request->is('admin*') ? 'admin.login' : 'login';
        return $this->shouldReturnJson($request, $exception)
            ? response()->json(['message' => $exception->getMessage()], 401)
            : redirect()->guest($exception->redirectTo() ?? route($loginRoute));
    }
}
