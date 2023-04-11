<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW subsurface.subject_view AS 
SELECT subsurface.subject.name, subsurface.subject.short_name, subsurface.subject.id_subject, subsurface.region.region
    FROM subsurface.subject 
    INNER JOIN subsurface.region ON subsurface.subject.region_id = subsurface.region.id_region;

    CREATE VIEW subsurface.deposit_view AS
    SELECT subsurface.region.region, subsurface.subject.short_name, subsurface.deposit.deposit, subsurface.deposit.development, subsurface.license_area.area, subsurface.subsurface_user.subsurface_user FROM subsurface.deposit
	INNER JOIN subsurface.subject_deposit ON subsurface.deposit.id_deposit = subsurface.subject_deposit.deposit_id
	INNER JOIN subsurface.subject ON subsurface.subject.id_subject = subsurface.subject_deposit.subject_id
	INNER JOIN subsurface.region ON subsurface.subject.region_id = subsurface.region.id_region
    INNER JOIN subsurface.deposit_area ON subsurface.deposit.id_deposit = subsurface.deposit_area.deposit_id
	INNER JOIN subsurface.license_area ON subsurface.license_area.id_area = subsurface.deposit_area.area_id
	INNER JOIN subsurface.license ON subsurface.license_area.id_area = subsurface.license.area_id
	INNER JOIN subsurface.subsurface_user ON subsurface.subsurface_user.id_user = subsurface.license.user_id
        ");
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
