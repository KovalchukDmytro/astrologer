<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Astrologer\Constants\AstrologerConstants;
use Modules\Astrologer\Models\Astrologer;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Astrologer::query()->where(AstrologerConstants::DB_AVATAR_FIELD, '=', '')->update([
            AstrologerConstants::DB_AVATAR_FIELD => AstrologerConstants::DEFAULT_AVATAR_PATH
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
