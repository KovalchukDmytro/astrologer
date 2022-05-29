<?php

use App\Helpers\ServiceDataHelper;
use App\Models\ServiceOfAstrologer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services_of_astrologers', function (Blueprint $table) {
            $table->string('mask', 30)->default('')->index();
        });


        $servicesRelations = ServiceOfAstrologer::all();
        /** @var ServiceOfAstrologer $servicesRelation */
        foreach ($servicesRelations as $servicesRelation) {
            if ($servicesRelation->getMask() === '') {
                $mask = ServiceDataHelper::encodeServiceIdMask(
                    $servicesRelation->getAstrologerId(), $servicesRelation->getServiceId()
                );
                $servicesRelation->setMask($mask);
                $servicesRelation->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_of_astrologers', function (Blueprint $table) {
            $table->dropColumn('mask');
        });
    }
};
