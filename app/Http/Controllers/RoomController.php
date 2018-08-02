<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

	public function index(){
    	$users = DB::connection('mysql')->select('select units.unitName, rooms.roomNumber, rooms.roomBedNumber, receiveloc.locationname AS receivelocation, preploc.locationname AS preparelocation from  rooms inner join units on rooms.roomUnitID = units.unitId inner join locations receiveloc on rooms.roomReceiveLocation = receiveloc.locationID inner join locations preploc on rooms.roomPrepareLocation = preploc.locationID');
    	return response()->json($users, 200);
    }

    // Get room by Id
    public function show($id){
    	$users = DB::connection('mysql')->select('select * from rooms where roomId = ?', [$id]);
    	return response()->json($users, 200);
    }
}
