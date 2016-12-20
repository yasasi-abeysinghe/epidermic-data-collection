<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/18/2016
 * Time: 5:22 PM
 */

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Report_Controller extends Controller{
    
    public static function add_report($report_id, $email, $disease_name, $location){
        DB::insert('INSERT INTO report_disease (report_id, email, disease_name, location) VALUES 
        ($report_id, $email, $disease_name, $location)');
    }

    public static function get_disease_details($disease_name){
       $results = DB::select('select location from report_disease where disease_name = $disease_name');
        return $results;
    }

    public static function get_location_diseases($location){
        $results = DB::select('select disease_name from report_disease where location = $location');
        return $results;
    }

}