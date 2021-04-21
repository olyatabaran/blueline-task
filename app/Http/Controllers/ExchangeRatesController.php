<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Exceptions\BadRequestApiException;
use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Http\Request;

class ExchangeRatesController extends Controller
{
    public function createAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        if ($data['secret'] !== env('API_SECRET')) {
            throw new ApiException('Unauthorized', 401);
        }

        $currencies = Currency::all();

        foreach ($data['rates'] as $item) {
            $currency = $currencies->where('shortened_value', $item['currency'])->first();
            if (empty($currency) || !is_float($item['value']) || $item['value'] <= 0) {
                throw new BadRequestApiException('Bad Request', 400);
            }
        }

        foreach ($data['rates'] as $item) {
            $currency = $currencies->where('shortened_value', $item['currency'])->pluck('id')->first();

            $rate = Rate::firstOrNew(
                ['currency_day' => $data['day'], 'currency_id' => $currency],
            );
            $rate->value = $item['value'];
            $rate->save();
        }

        return response(json_encode(['status' => 'OK']));
    }

    public function listAction(Request $request)
    {
        $day = $request->get('day', date('Y-m-d'));
        $rates = Rate::with('currency')->where('currency_day', $day)->get();
        $data = [];
        foreach ($rates as $rate) {
            $data[] = [
                'currency' => $rate->currency->shortened_value,
                'currency_name' => $rate->currency->value,
                'value' => $rate->value,
            ];
        }

        return json_encode(['day' => $day, 'rates' => $data]);
    }
}
