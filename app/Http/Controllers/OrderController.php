<?php


namespace App\Http\Controllers;

use App\Constants\ErrorConstants;
use App\Constants\OrderStatusConstants;
use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $orderData = $request->toArray();

        // TODO: delete after connecting payment service
        $orderData['status'] = OrderStatusConstants::PAID;

        $serviceRelation = ServiceRepository::getByServiceOfAstrologerByIdMask($orderData['service_mask']);

        $isCreated = false;
        try {
            $isCreated = OrderRepository::create($orderData, $serviceRelation);
        } catch (\Exception $exception) {
            Log::error(ErrorConstants::ERROR_CREATING_NEW_ORDER_MESSAGE, [
                'message' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]);
        }

        if (!$isCreated) {
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
