<?php


namespace Modules\Astrologer\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Astrologer\Constants\AstrologerConstants;
use Modules\Astrologer\Constants\ErrorConstants;
use Modules\Astrologer\Helpers\AstrologerDataHelper;
use Modules\Astrologer\Repositories\AstrologerRepository;
use Modules\Astrologer\Repositories\ServiceRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class AstrologerController
 * @package Modules\Astrologer\Http\Controllers
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
