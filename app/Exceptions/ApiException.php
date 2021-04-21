<?php


namespace App\Exceptions;

use Exception;
use Throwable;

class ApiException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $response = ['message' => $this->getMessage(), 'code' => $this->getCode()];
        return response(json_encode($response), $this->getCode());
    }
}
