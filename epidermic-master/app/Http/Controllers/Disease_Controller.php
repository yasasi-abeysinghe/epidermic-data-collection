<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/18/2016
 * Time: 11:23 AM
 */

namespace app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use app\Http\Controllers\Response;

class Disease_Controller extends Controller{
    public static function add_disease($disease_name, $symptoms, $causes, $precautions, $first_aid){
        DB::insert('INSERT INTO details (disease_name, symptoms, causes, precautions, first_aid) VALUES 
        ($disease_name, $symptoms, $causes, $precautions, $first_aid)');
    }

    public static function view_disease($disease_name){
        $result = DB::select('Select * from details where diseade_name = $disease_name');
        return $result;
    }

    public static function  update_disease($disease_name, $symptoms, $causes, $precautions, $first_aid){
        $affected = DB::update('Update details set symptoms = $symptoms, causes = $causes, precuations = $precautions, first_aid = $first_aid
        where disease_name = $disease_name');
    }

    /**
     * Trigger should be executed at where the DB and tables are created
     *
        DELIMITER $$

        CREATE TRIGGER Before_Insert_Disease
        BEFORE INSERT ON Details
        FOR EACH ROW
        BEGIN
        IF (EXISTS(SELECT 1 FROM Details WHERE Disease_name = NEW.Disease_name)) THEN
        SIGNAL SQLSTATE VALUE '45000' SET MESSAGE_TEXT = 'INSERT failed due to duplicate Disease_name';
        END IF;
        END$$

        DELIMITER ;
     */
};