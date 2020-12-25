<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kobo_data extends Model
{
    protected $table='kobo_datas';
    protected $fillable=[
        'name_of_surveyor',
        'date',
        'ward_no',
        'id_kobo',
        'gps_location',
        'primary_source_of_water',
        'other_source_of_water',
        'frequency_of_water_supply',
        'hours_of_water_supply',
        'type_of_toilet',
        'other_type_of_toilet',
        'no_of_users',
        'kind_of_containment',
        'other_kind_of_containment',
        'what_happens_when_filled',
        'other_done_when_filled',
        'why_call',
        'other_reason_to_call',
        'last_desludged_pit_tank',
        'how_often_desludged',
        'who_desludges',
        'who_other_desludges',
        'how_much_payment',
        'where_does_waste_water_go',
        'where_other_waste_water_go',
        'color_of_liquid',
        'other_which_color',
        'how_many_rings_single_pit',
        'height_of_rings_single_pit',
        'diameter_of_rings_single_pit',
        'if_not_ring_diameter_single_pit',
        'does_pit_cover_have_a_provision_single_pit',
        'mention_type_of_arrangement_single_pit',
        'outlet_in_the_pit_for_overflow_single_pit',
        'where_does_it_overflow_to_single_pit',
        'distance_of_pit_from_parking_place_single_pit',
        'how_many_rings_twin_pit',
        'height_of_rings_twin_pit',
        'diameter_of_rings_twin_pit',
        'if_not_ring_diameter_twin_pit',
        'interlinking_connection_between_two_pits',
        'outlet_in_the_pit_for_overflow_twin_pit',
        'where_does_it_overflow_to_twin_pit',
        'distance_of_pit_from_parking_place_twin_pit',
        'length_of_septic_tank',
        'width_of_septic_tank',
        'depth_of_septic_tank',
        'no_of_chambers_septic_tank',
        'septic_tank_have_manhole_covers',
        'no_of_manholes',
        'septic_tank_connection_to_soak_pit',
        'which_outlet_septic_tank_connected_to',
        'distance_of_pit_from_parking_place_septic_tank',
        'name_of_respondent',
        'gender',
        'location_of_survey',
        'no_of_family_members'
    ];
}
