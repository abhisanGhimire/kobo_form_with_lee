<?php

namespace App\Http\Controllers;

use App\Kobo_data;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Authentication middleware
        $this->middleware('auth');
    }

    public function index()
    {
        //   /$this->get_kobo_data();
        $title_page = "Survey dashboard";
        //function() calls
        $unique_date = $this->get_unique_dates();
        $value       = $this->get_unique_dates_values();

        //return View
        return view('home', compact('title_page', 'unique_date', 'value'));
    }

    public function get_unique_dates()
    {
        //Get unique dates from database
        $unique_date = DB::table('kobo_datas')->get()->pluck('date')->unique();
        return $unique_date;
    }

    public function get_unique_dates_values()
    {
        //Get unique dates from database
        $unique_date = DB::table('kobo_datas')->get()->pluck('date')->unique();
        //Iteration variable
        $iteration_variable = 0;
        //For obtaining total survey on each date
        foreach ($unique_date as $dates) {

            $value[$iteration_variable] = DB::table('kobo_datas')->where('date', $dates)->get()->count();
            $iteration_variable++;
        }
        return $value;
    }

    public function KoboDataTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Kobo_data::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title_page = "Survey Information";
        return view('kobo_data_table', compact('title_page'));
    }

    private function get_kobo_data()
    {

        //Assign variable for all data property
        $location_of_survey                             = "Please_take_a_fer_mi_";
        $name_of_surveyor                               = "Name_of_the_surveyor_";
        $date                                           = "Date_";
        $ward_no                                        = "Location_Name_of_ro_number_";
        $id                                             = "_id";
        $gps_location                                   = "_geolocation";
        $primary_source_of_water                        = "_1_What_is_the_primary_source_";
        $other_source_of_water                          = "What_is_the_other_so_ater_";
        $frequency_of_water_supply                      = "_2_What_is_the_frequency_of_po";
        $hours_of_water_supply                          = "Hours_of_supply_";
        $type_of_toilet                                 = "_3_What_is_the_type_of_toilet";
        $other_type_of_toilet                           = "What_is_the_other_ty_f_toilet_";
        $no_of_users                                    = "_4_Number_of_users_";
        $kind_of_containment                            = "What_is_the_kind_of_containmen";
        $other_kind_of_containment                      = "What_is_the_other_ki_";
        $what_happens_when_filled                       = "What_happens_when_a_pit_septic";
        $other_done_when_filled                         = "What_is_the_other_th_ne_";
        $why_call                                       = "_7_Why_did_the_housefold_call_";
        $other_reason_to_call                           = "What_was_the_other_r_o_call_";
        $last_desludged_pit_tank                        = "_8_When_was_the_pit_";
        $how_often_desludged                            = "_9_How_often_do_you_";
        $who_desludges                                  = "_10_Who_desludges_the_pit_sept";
        $who_other_desludges                            = "if_other_who_";
        $how_much_payment                               = "_11_How_much_do_you_";
        $where_does_waste_water_go                      = "_12_Where_does_the_wastewater_f";
        $where_other_waste_water_go                     = "If_other_where_does_it_go_";
        $color_of_liquid                                = "_13_What_is_the_color_of_liqui";
        $other_which_color                              = "If_other_which_color_";
        $how_many_rings_single_pit                      = "group_wz1sn61/group_hu4oh09/a_How_many_rings_ar_the_pit_";
        $height_of_rings_single_pit                     = "group_wz1sn61/group_hu4oh09/b_What_is_the_heigh_feet_";
        $diameter_of_rings_single_pit                   = "group_wz1sn61/group_hu4oh09/c_What_is_the_diame_n_feet_";
        $if_not_ring_diameter_single_pit                = "group_wz1sn61/group_hu4oh09/d_In_case_the_pit_i_";
        $does_pit_cover_have_a_provision_single_pit     = "group_wz1sn61/group_hu4oh09/e_Does_the_pit_cove_";
        $mention_type_of_arrangement_single_pit         = "group_wz1sn61/group_hu4oh09/If_yes_mention_the_ent_";
        $outlet_in_the_pit_for_overflow_single_pit      = "group_wz1sn61/group_hu4oh09/f_Is_there_an_outle_";
        $where_does_it_overflow_to_single_pit           = "group_wz1sn61/group_hu4oh09/If_yes_where_does_i_w_to_";
        $distance_of_pit_from_parking_place_single_pit  = "group_wz1sn61/group_hu4oh09/g_What_is_the_dista_";
        $how_many_rings_twin_pit                        = "group_wz1sn61/group_dk2kr06/a_How_many_rings_ar_ch_pit_";
        $height_of_rings_twin_pit                       = "group_wz1sn61/group_dk2kr06/b_What_is_the_heigh_feet__001";
        $diameter_of_rings_twin_pit                     = "group_wz1sn61/group_dk2kr06/c_What_is_the_diame_n_feet__001";
        $if_not_ring_diameter_twin_pit                  = "group_wz1sn61/group_dk2kr06/d_In_case_the_pit_i__001";
        $interlinking_connection_between_two_pits       = "group_wz1sn61/group_dk2kr06/e_Is_there_an_inter_pits_";
        $outlet_in_the_pit_for_overflow_twin_pit        = "group_wz1sn61/group_dk2kr06/f_Is_there_an_outlet_in_the_p";
        $where_does_it_overflow_to_twin_pit             = "group_wz1sn61/group_dk2kr06/If_yes_where_does_i_w_to__001";
        $distance_of_pit_from_parking_place_twin_pit    = "group_wz1sn61/group_dk2kr06/g_What_is_the_dista__001";
        $length_of_septic_tank                          = "group_wz1sn61/group_uw4sj24/a_What_is_the_lengt_feet_";
        $width_of_septic_tank                           = "group_wz1sn61/group_uw4sj24/b_What_is_the_width_feet_";
        $depth_of_septic_tank                           = "group_wz1sn61/group_uw4sj24/c_What_is_the_depth_";
        $no_of_chambers_septic_tank                     = "group_wz1sn61/group_uw4sj24/d_How_many_numbers_c_tank_";
        $septic_tank_have_manhole_covers                = "group_wz1sn61/group_uw4sj24/e_Does_the_septic_t_covers_";
        $no_of_manholes                                 = "group_wz1sn61/group_uw4sj24/If_yes_number_of_manholes_";
        $septic_tank_connection_to_soak_pit             = "group_wz1sn61/group_uw4sj24/f_Is_the_septic_tan_pit_";
        $which_outlet_septic_tank_connected_to          = "group_wz1sn61/group_uw4sj24/If_no_which_outlet_d_to_";
        $distance_of_pit_from_parking_place_septic_tank = "group_wz1sn61/group_uw4sj24/g_What_is_the_dista__002";
        $name_of_respondent                             = "group_dx0bg42/_14_Name_of_respondent_";
        $gender                                         = "group_dx0bg42/_15_Gender_";
        $no_of_family_members                           = "group_dx0bg42/_16_Number_of_people_sehold_";

        //Get data from API and store in $response_data_kobo
        $response_data_kobo = Http::withHeaders(['Authorization' => 'Token 4740f964c904b2eb34b9390d7e0d42c9eb2cd13a'])->get('https://kf.kobotoolbox.org/api/v2/assets/ahuBJcXH8mvvW2GjBPdKfM/data/?format=json');

        //Decode data received from API and get results(answers)
        $decode_data_kobo = json_decode($response_data_kobo)->results;

        //Decode data received from API and get count
        $kobo_data_count = json_decode($response_data_kobo)->count;

        //dd($decode_data_kobo);
        //Assign iteration variable
        $iteration_variable = 0;

        //Remove previously saved values
        Kobo_data::truncate();
        //Initiate loop
        for ($iteration_variable; $iteration_variable < $kobo_data_count; $iteration_variable++) {
            $kobo_info = new Kobo_data;

            //Check if property exists and store
            if (property_exists($decode_data_kobo[$iteration_variable], $name_of_surveyor)) {
                $kobo_info->name_of_surveyor = $decode_data_kobo[$iteration_variable]->$name_of_surveyor;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $location_of_survey)) {
                $kobo_info->location_of_survey = $decode_data_kobo[$iteration_variable]->$location_of_survey;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $no_of_users)) {
                $kobo_info->no_of_users = $decode_data_kobo[$iteration_variable]->$no_of_users;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $date)) {

                $temp_date       = $decode_data_kobo[$iteration_variable]->$date;
                $kobo_info->date = date('Y-m-d', strtotime($temp_date));
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $ward_no)) {
                $kobo_info->ward_no = $decode_data_kobo[$iteration_variable]->$ward_no;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $id)) {
                $kobo_info->id_kobo = $decode_data_kobo[$iteration_variable]->$id;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $gps_location)) {
                $kobo_info->gps_location_lat  = $decode_data_kobo[$iteration_variable]->$gps_location[0];
                $kobo_info->gps_location_long = $decode_data_kobo[$iteration_variable]->$gps_location[1];
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $primary_source_of_water)) {
                $kobo_info->primary_source_of_water = $decode_data_kobo[$iteration_variable]->$primary_source_of_water;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $other_source_of_water)) {
                $kobo_info->other_source_of_water = $decode_data_kobo[$iteration_variable]->$other_source_of_water;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $frequency_of_water_supply)) {
                $kobo_info->frequency_of_water_supply = $decode_data_kobo[$iteration_variable]->$frequency_of_water_supply;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $hours_of_water_supply)) {
                $kobo_info->hours_of_water_supply = $decode_data_kobo[$iteration_variable]->$hours_of_water_supply;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $type_of_toilet)) {
                $kobo_info->type_of_toilet = $decode_data_kobo[$iteration_variable]->$type_of_toilet;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $other_type_of_toilet)) {
                $kobo_info->other_type_of_toilet = $decode_data_kobo[$iteration_variable]->$other_type_of_toilet;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $no_of_users)) {
                $kobo_info->no_of_users = $decode_data_kobo[$iteration_variable]->$no_of_users;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $kind_of_containment)) {
                $kobo_info->kind_of_containment = $decode_data_kobo[$iteration_variable]->$kind_of_containment;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $other_kind_of_containment)) {
                $kobo_info->other_kind_of_containment = $decode_data_kobo[$iteration_variable]->$other_kind_of_containment;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $what_happens_when_filled)) {
                $kobo_info->what_happens_when_filled = $decode_data_kobo[$iteration_variable]->$what_happens_when_filled;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $other_done_when_filled)) {
                $kobo_info->other_done_when_filled = $decode_data_kobo[$iteration_variable]->$other_done_when_filled;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $why_call)) {
                $kobo_info->why_call = $decode_data_kobo[$iteration_variable]->$why_call;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $other_reason_to_call)) {
                $kobo_info->other_reason_to_call = $decode_data_kobo[$iteration_variable]->$other_reason_to_call;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $last_desludged_pit_tank)) {
                $kobo_info->last_desludged_pit_tank = $decode_data_kobo[$iteration_variable]->$last_desludged_pit_tank;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $how_often_desludged)) {
                $kobo_info->how_often_desludged = $decode_data_kobo[$iteration_variable]->$how_often_desludged;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $who_desludges)) {
                $kobo_info->who_desludges = $decode_data_kobo[$iteration_variable]->$who_desludges;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $who_other_desludges)) {
                $kobo_info->who_other_desludges = $decode_data_kobo[$iteration_variable]->$who_other_desludges;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $how_much_payment)) {
                $kobo_info->how_much_payment = $decode_data_kobo[$iteration_variable]->$how_much_payment;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $where_does_waste_water_go)) {
                $kobo_info->where_does_waste_water_go = $decode_data_kobo[$iteration_variable]->$where_does_waste_water_go;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $where_other_waste_water_go)) {
                $kobo_info->where_other_waste_water_go = $decode_data_kobo[$iteration_variable]->$where_other_waste_water_go;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $color_of_liquid)) {
                $kobo_info->color_of_liquid = $decode_data_kobo[$iteration_variable]->$color_of_liquid;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $other_which_color)) {
                $kobo_info->other_which_color = $decode_data_kobo[$iteration_variable]->$other_which_color;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $how_many_rings_single_pit)) {
                $kobo_info->how_many_rings_single_pit = $decode_data_kobo[$iteration_variable]->$how_many_rings_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $height_of_rings_single_pit)) {
                $kobo_info->height_of_rings_single_pit = $decode_data_kobo[$iteration_variable]->$height_of_rings_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $diameter_of_rings_single_pit)) {
                $kobo_info->diameter_of_rings_single_pit = $decode_data_kobo[$iteration_variable]->$diameter_of_rings_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $if_not_ring_diameter_single_pit)) {
                $kobo_info->if_not_ring_diameter_single_pit = $decode_data_kobo[$iteration_variable]->$if_not_ring_diameter_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $does_pit_cover_have_a_provision_single_pit)) {
                $kobo_info->does_pit_cover_have_a_provision_single_pit = $decode_data_kobo[$iteration_variable]->$does_pit_cover_have_a_provision_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $mention_type_of_arrangement_single_pit)) {
                $kobo_info->mention_type_of_arrangement_single_pit = $decode_data_kobo[$iteration_variable]->$mention_type_of_arrangement_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $outlet_in_the_pit_for_overflow_single_pit)) {
                $kobo_info->outlet_in_the_pit_for_overflow_single_pit = $decode_data_kobo[$iteration_variable]->$outlet_in_the_pit_for_overflow_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $where_does_it_overflow_to_single_pit)) {
                $kobo_info->where_does_it_overflow_to_single_pit = $decode_data_kobo[$iteration_variable]->$where_does_it_overflow_to_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $distance_of_pit_from_parking_place_single_pit)) {
                $kobo_info->distance_of_pit_from_parking_place_single_pit = $decode_data_kobo[$iteration_variable]->$distance_of_pit_from_parking_place_single_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $how_many_rings_twin_pit)) {
                $kobo_info->how_many_rings_twin_pit = $decode_data_kobo[$iteration_variable]->$how_many_rings_twin_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $height_of_rings_twin_pit)) {
                $kobo_info->height_of_rings_twin_pit = $decode_data_kobo[$iteration_variable]->$height_of_rings_twin_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $diameter_of_rings_twin_pit)) {
                $kobo_info->diameter_of_rings_twin_pit = $decode_data_kobo[$iteration_variable]->$diameter_of_rings_twin_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $if_not_ring_diameter_twin_pit)) {
                $kobo_info->if_not_ring_diameter_twin_pit = $decode_data_kobo[$iteration_variable]->$if_not_ring_diameter_twin_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $interlinking_connection_between_two_pits)) {
                $kobo_info->interlinking_connection_between_two_pits = $decode_data_kobo[$iteration_variable]->$interlinking_connection_between_two_pits;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $outlet_in_the_pit_for_overflow_twin_pit)) {
                $kobo_info->outlet_in_the_pit_for_overflow_twin_pit = $decode_data_kobo[$iteration_variable]->$outlet_in_the_pit_for_overflow_twin_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $where_does_it_overflow_to_twin_pit)) {
                $kobo_info->where_does_it_overflow_to_twin_pit = $decode_data_kobo[$iteration_variable]->$where_does_it_overflow_to_twin_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $distance_of_pit_from_parking_place_twin_pit)) {
                $kobo_info->distance_of_pit_from_parking_place_twin_pit = $decode_data_kobo[$iteration_variable]->$distance_of_pit_from_parking_place_twin_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $length_of_septic_tank)) {
                $kobo_info->length_of_septic_tank = $decode_data_kobo[$iteration_variable]->$length_of_septic_tank;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $width_of_septic_tank)) {
                $kobo_info->width_of_septic_tank = $decode_data_kobo[$iteration_variable]->$width_of_septic_tank;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $depth_of_septic_tank)) {
                $kobo_info->depth_of_septic_tank = $decode_data_kobo[$iteration_variable]->$depth_of_septic_tank;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $no_of_chambers_septic_tank)) {
                $kobo_info->no_of_chambers_septic_tank = $decode_data_kobo[$iteration_variable]->$no_of_chambers_septic_tank;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $septic_tank_have_manhole_covers)) {
                $kobo_info->septic_tank_have_manhole_covers = $decode_data_kobo[$iteration_variable]->$septic_tank_have_manhole_covers;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $no_of_manholes)) {
                $kobo_info->no_of_manholes = $decode_data_kobo[$iteration_variable]->$no_of_manholes;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $septic_tank_connection_to_soak_pit)) {
                $kobo_info->septic_tank_connection_to_soak_pit = $decode_data_kobo[$iteration_variable]->$septic_tank_connection_to_soak_pit;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $which_outlet_septic_tank_connected_to)) {
                $kobo_info->which_outlet_septic_tank_connected_to = $decode_data_kobo[$iteration_variable]->$which_outlet_septic_tank_connected_to;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $distance_of_pit_from_parking_place_septic_tank)) {
                $kobo_info->distance_of_pit_from_parking_place_septic_tank = $decode_data_kobo[$iteration_variable]->$distance_of_pit_from_parking_place_septic_tank;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $name_of_respondent)) {
                $kobo_info->name_of_respondent = $decode_data_kobo[$iteration_variable]->$name_of_respondent;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $gender)) {
                $kobo_info->gender = $decode_data_kobo[$iteration_variable]->$gender;
            }
            if (property_exists($decode_data_kobo[$iteration_variable], $no_of_family_members)) {
                $kobo_info->no_of_family_members = $decode_data_kobo[$iteration_variable]->$no_of_family_members;
            }
            $kobo_info->save();

        }

    }
}
