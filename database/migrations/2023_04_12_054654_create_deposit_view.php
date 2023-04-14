<?php

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
        Schema::statement(  
    "CREATE VIEW subsurface.deposit_view AS
    SELECT subsurface.region.region, subsurface.subject.short_name, 
subsurface.deposit.deposit, subsurface.deposit.development, 
concat(subsurface.license_area.area,' (',subsurface.license.series, subsurface.license.number, subsurface.license.type,') ', 'от ', subsurface.license.date_reg) 'area',
subsurface.subsurface_user.subsurface_user FROM subsurface.deposit
	INNER JOIN subsurface.subject_deposit ON subsurface.deposit.id_deposit = subsurface.subject_deposit.deposit_id
	INNER JOIN subsurface.subject ON subsurface.subject.id_subject = subsurface.subject_deposit.subject_id
	INNER JOIN subsurface.region ON subsurface.subject.region_id = subsurface.region.id_region
    INNER JOIN subsurface.deposit_area ON subsurface.deposit.id_deposit = subsurface.deposit_area.deposit_id
	INNER JOIN subsurface.license_area ON subsurface.license_area.id_area = subsurface.deposit_area.area_id
	INNER JOIN subsurface.license ON subsurface.license_area.id_area = subsurface.license.area_id
	INNER JOIN subsurface.subsurface_user ON subsurface.subsurface_user.id_user = subsurface.license.user_id");
    }

    public function down()
    {
        Schema::dropIfExists('deposit_view');
    }
};
