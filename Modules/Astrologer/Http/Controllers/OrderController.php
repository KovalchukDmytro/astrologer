<?php


namespace Modules\Astrologer\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Astrologer\Constants\ErrorConstants;
use Modules\Astrologer\Constants\OrderStatusConstants;
use Modules\Astrologer\Http\Requests\OrderRequest;
use Modules\Astrologer\Repositories\OrderRepository;
use Modules\Astrologer\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class OrderController
 * @package Modules\Astrologer\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * @param OrderRequest $request
     * @return false|string
     */
    public function make(OrderRequest $request): bool|string
    {
        $orderData = $request->toArray();

        // TODO: delete after connecting payment service
        $orderData['status'] = OrderStatusConstants::PAID;

        $serviceRelation = ServiceRepository::getByServiceOfAstrologerByIdMask($orderData['service_mask']);

        $newOrder = false;
        try {
            $newOrder = OrderRepository::create($orderData, $serviceRelation);
        } catch (\Exception $exception) {
            Log::error(ErrorConstants::ERROR_CREATING_NEW_ORDER_MESSAGE, [
                'message' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]);
        }

        if (!$newOrder) {
            $errorMessage = ErrorConstants::ERROR_CREATING_NEW_ORDER_MESSAGE;

            $errorData = [
                'message' => $errorMessage,
                'errors' => [
                    ErrorConstants::ERROR_CREATING_NEW_ORDER_CODE => $errorMessage,
                ],
            ];

            return json_encode($errorData);
        }

        return json_encode(['success' => true]);
    }

    /**
     * Endpoint for payment service
     *
     * @param Request $request
     * @return false|string
     */
    public function payment(Request $request): bool|string
    {
        return json_encode($request->toArray());
    }
}
