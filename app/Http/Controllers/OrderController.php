<?php


namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * @param OrderRequest $request
     * @return false|string
     */
    public function make(OrderRequest $request): bool|string
    {
        return json_encode($request->toArray());
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function payment(Request $request): bool|string
    {
        return json_encode($request->toArray());
    }
}
