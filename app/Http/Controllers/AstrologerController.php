<?php


namespace App\Http\Controllers;


use App\Constants\AstrologerConstants;
use App\Constants\ErrorConstants;
use App\Helpers\AstrologerDataHelper;
use App\Repositories\AstrologerRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class AstrologerController
 * @package App\Http\Controllers
 */
class AstrologerController extends Controller
{
    /**
     * @return false|string
     */
    public function all(): bool|string
    {
        $allAstrologers = AstrologerRepository::getAllWithShortInfo();

        foreach ($allAstrologers as &$astrologer) {
            $services = ServiceRepository::getNamesServicesByAstrologerId($astrologer->{AstrologerConstants::DB_ID_FIELD});
            $astrologer->services = $services;
        }

        return json_encode($allAstrologers);
    }

    /**
     * @param $astrologerId
     * @return false|string
     */
    public function details($astrologerId): bool|string
    {
        $astrologerObj = AstrologerRepository::getById((int)$astrologerId);

        if (!$astrologerObj) {
            $errorMessage = sprintf(ErrorConstants::ERROR_UNDEFINED_ASTROLOGER_MESSAGE, $astrologerId);

            $errorData = [
                'message' => $errorMessage,
                'errors' => [
                    ErrorConstants::ERROR_UNDEFINED_ASTROLOGER_CODE => $errorMessage,
                ],
            ];

            Log::error($errorData['message'], $errorData);

            return json_encode($errorData);
        }

        $astrologerServices = ServiceRepository::getServicesByAstrologerId(
                $astrologerObj->{AstrologerConstants::DB_ID_FIELD}
            );

        $viewData = AstrologerDataHelper::prepareAstrologerDataForView($astrologerObj, $astrologerServices);

        return json_encode($viewData);
    }
}
