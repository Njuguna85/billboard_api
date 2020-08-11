<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Billboard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getData()
    {
        $arr = array();
        // $data= DB::table('nairobisubcounties')->select('ST_AsGeoJSON(SHAPE)')->get();
        $arr['subcounty'] = DB::table('nairobisubcounties')
            ->select(DB::raw('subcontnam, total5abov,
                        male5above,fema5above, totaldisab, maledisabl, femaledisa, totalable, maleable, 
            femaleable, totalnotst, malenotsta, femalenots, percentdis, totalvisua, malevisual, femalevisu, totalheari, malehearin, femalehear, totalmobil,malemobili, femalemobi, totalcogni, malecognit, femalecogn, totalselfc,maleselfca, femaleself, totalcommu, malecommun, femalecomm, totalpopul,
            malepopula, femalepopu, totalalbin, malealbini, femalealbi, ST_AsGeoJSON(SHAPE) As geojson'))
            ->get();

        $arr['billboard'] = DB::table('billboard_locations')
            ->select(DB::raw(' billboardi, routename, selectmedi, site_light, zone_, size_,"condition", orientatio, visibility, traffic, photo, road_type, lat As latitude, long_ As longitude'))
            ->get();
        $arr['uber'] = DB::table('uber_mean_travel_time')
            ->select(DB::raw('movement_i, display_na, moveid, objectid_1, origin_mov, origin_dis, destinatio, destinat_1, date_range, mean_trave, range___lo, range___up, destiid, shape_leng, shape_area, ST_AsGeoJSON(SHAPE) As geojson'))
            ->get();
        $arr['aq'] = DB::table('africanqueenregister')
            ->select(DB::raw('customer_n, customer_t, address_1, address_2, latitude, longitude, customer_1, created_da, gt_country, bt_territo, bt_area, bt_town, cs_chanel, cs_type_of '))
            ->get();
        $arr['sublocation'] = DB::table('nairobisublocations')
            ->select(DB::raw('ST_AsGeoJSON(SHAPE) As geojson, slname, aligned_su, subloc_20, count_, pop_09, male_09, female_09, pop_19, male_19, female_19, makeshift_, pop_makesh, total_hh, hh_convern, hh_group_q, densityper, percnt_50Plus, percnt_65Plus, percnt_pop, improved_w, unimproved, likely_pri, open_waste, percent_mo, mean_habit, median_hab, informal_s, selfemploy, percent_in, ratio_avg_'))
            ->get();
        $arr['atm'] = DB::table('atms')
            ->select(DB::raw('ST_AsGeoJSON(SHAPE) As geojson, operator'))
            ->limit(20)
            ->get();
        $arr['bank'] = DB::table('banks')
            ->select(DB::raw('ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['hospital'] = DB::table('hospitals')
            ->select(DB::raw('ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->get();
        $arr['police'] = DB::table('police_post')
            ->select(DB::raw('ST_AsGeoJSON(SHAPE) As geojson, name '))
            ->limit(20)
            ->get();
        $arr['school'] = DB::table('schools')
            ->select(DB::raw('ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['university'] = DB::table('universities')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['bar'] = DB::table('bars')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['fuel'] = DB::table('fuel')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['grocery'] = DB::table('grocery')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['kiosk'] = DB::table('kiosks')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['pharmacy'] = DB::table('pharmacy')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['restaraunt'] = DB::table('restaurant')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['saloon'] = DB::table('saloon')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['supermarket'] = DB::table('supermarket')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['nssf'] = DB::table('ug_nssf')
            ->select(DB::raw(' ST_AsGeoJSON(SHAPE) As geojson, name'))
            ->limit(20)
            ->get();
        $arr['ghanaDistrictPopPulation'] = DB::table('ghanapopulation')
            ->select(DB::raw('adm2_name, totpop_cy, mrstsingle, mrstmarrie, mrstdiv, purchppc, males_cy, females_cy, tothh_cy, ttfoodbeva, alcoholbev, tobacco, clothing, electronis, toysportsg,ST_AsGeoJSON(SHAPE) As geojson'))
            ->get();
        return json_encode($arr);
    }
}
