<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::statement(
        "CREATE VIEW subsurface.subject_view AS 
SELECT subsurface.subject.name, subsurface.subject.short_name, subsurface.subject.id_subject, subsurface.region.region
    FROM subsurface.subject 
    INNER JOIN subsurface.region ON subsurface.subject.region_id = subsurface.region.id_region;
        ");
    }

    public function down()
    {

    }
};
