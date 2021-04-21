<?php


namespace App\Exceptions;


use App\Mail\CurrencyError;
use Illuminate\Support\Facades\Mail;

class BadRequestApiException extends ApiException
{
    public function render($request)
    {
        try{
            Mail::to('olya.tabaran1@gmail.com')->send(new CurrencyError($request->getContent()));

        } catch (\Exception $e){

        }
        return parent::render($request);
    }
}
