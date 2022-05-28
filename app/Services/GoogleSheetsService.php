<?php


namespace App\Services;

use App\Constants\ErrorConstants;
use App\Helpers\OrderDataHelper;
use App\Models\Order;
use App\Repositories\AstrologerRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\Facades\Log;
use Revolution\Google\Sheets\Facades\Sheets;

/**
 * Class GoogleSheetsService
 * @package App\Services
 */
class GoogleSheetsService
{
    /**
     * @param Order $orderModel
     */
    public static function addOrder(Order $orderModel): void
    {
        $serviceObj = ServiceRepository::getById($orderModel->getServiceId());
        $astrologerObj = AstrologerRepository::getById($orderModel->getAstrologerId());

        $rowData = OrderDataHelper::prepareDataForSheets($orderModel, $serviceObj, $astrologerObj);

        self::addRow($rowData);
    }

    /**
     * @param array $data
     */
    private static function addRow(array $data): void
    {
        try {
            Sheets::spreadsheet(config('google.spreadsheet_id'))
                ->sheet(config('google.sheet_id'))
                ->append([$data]);
        } catch (\Exception $exception) {
            Log::error(ErrorConstants::ERROR_GOOGLE_SPREADSHEETS, [
                'data' => $data,
                'message' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]);
        }
    }
}
