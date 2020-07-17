<?php

namespace App\Exceptions;

<<<<<<< HEAD
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
=======
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0

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
<<<<<<< HEAD
     * @param  \Exception  $exception
=======
     * @param  \Throwable  $exception
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
     * @return void
     *
     * @throws \Exception
     */
<<<<<<< HEAD
    public function report(Exception $exception)
=======
    public function report(Throwable $exception)
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
=======
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    {
        return parent::render($request, $exception);
    }
}
