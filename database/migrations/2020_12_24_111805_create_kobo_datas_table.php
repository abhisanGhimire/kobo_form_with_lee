<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoboDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kobo_datas', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_surveyor')->nullable();
            $table->string('location_of_survey')->nullable();
            $table->string('date')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('id_kobo')->nullable();
            $table->string('gps_location_lat')->nullable();
            $table->string('gps_location_long')->nullable();
            $table->string('primary_source_of_water')->nullable();
            $table->string('other_source_of_water')->nullable();
            $table->string('frequency_of_water_supply')->nullable();
            $table->string('hours_of_water_supply')->nullable();
            $table->string('type_of_toilet')->nullable();
            $table->string('other_type_of_toilet')->nullable();
            $table->string('no_of_users')->nullable();
            $table->string('kind_of_containment')->nullable();
            $table->string('other_kind_of_containment')->nullable();
            $table->string('what_happens_when_filled')->nullable();
            $table->string('other_done_when_filled')->nullable();
            $table->string('why_call')->nullable();
            $table->string('other_reason_to_call')->nullable();
            $table->string('last_desludged_pit_tank')->nullable();
            $table->string('how_often_desludged')->nullable();
            $table->string('who_desludges')->nullable();
            $table->string('who_other_desludges')->nullable();
            $table->string('how_much_payment')->nullable();
            $table->string('where_does_waste_water_go')->nullable();
            $table->string('where_other_waste_water_go')->nullable();
            $table->string('color_of_liquid')->nullable();
            $table->string('other_which_color')->nullable();
            $table->string('how_many_rings_single_pit')->nullable();
            $table->string('height_of_rings_single_pit')->nullable();
            $table->string('diameter_of_rings_single_pit')->nullable();
            $table->string('if_not_ring_diameter_single_pit')->nullable();
            $table->string('does_pit_cover_have_a_provision_single_pit')->nullable();
            $table->string('mention_type_of_arrangement_single_pit')->nullable();
            $table->string('outlet_in_the_pit_for_overflow_single_pit')->nullable();
            $table->string('where_does_it_overflow_to_single_pit')->nullable();
            $table->string('distance_of_pit_from_parking_place_single_pit')->nullable();
            $table->string('how_many_rings_twin_pit')->nullable();
            $table->string('height_of_rings_twin_pit')->nullable();
            $table->string('diameter_of_rings_twin_pit')->nullable();
            $table->string('if_not_ring_diameter_twin_pit')->nullable();
            $table->string('interlinking_connection_between_two_pits')->nullable();
            $table->string('outlet_in_the_pit_for_overflow_twin_pit')->nullable();
            $table->string('where_does_it_overflow_to_twin_pit')->nullable();
            $table->string('distance_of_pit_from_parking_place_twin_pit')->nullable();
            $table->string('length_of_septic_tank')->nullable();
            $table->string('width_of_septic_tank')->nullable();
            $table->string('depth_of_septic_tank')->nullable();
            $table->string('no_of_chambers_septic_tank')->nullable();
            $table->string('septic_tank_have_manhole_covers')->nullable();
            $table->string('no_of_manholes')->nullable();
            $table->string('septic_tank_connection_to_soak_pit')->nullable();
            $table->string('which_outlet_septic_tank_connected_to')->nullable();
            $table->string('distance_of_pit_from_parking_place_septic_tank')->nullable();
            $table->string('name_of_respondent')->nullable();
            $table->string('gender')->nullable();
            $table->string('no_of_family_members')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kobo_datas');
    }
}
