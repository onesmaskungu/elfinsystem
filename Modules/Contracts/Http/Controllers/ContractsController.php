<?php

namespace Modules\Contracts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('contracts::index');
    }

    public function login(Request $req){
        $username = $req->username;
        //$_POST['username'];

        return view('contracts::login',['username'=>$username]);
       // return "The test function is reached ".$username;
    }
    public function getUsers(Request $req){        
	//	$userdata = array('username'=>'SALHE','email_address'=>'salehe@g,mail.com');
        $userdata = DB::table('users')->get();
        return $userdata;
       // return response()->json(array('success' => true));
    }
    public function insertUsers(Request $req){

        $userdata =DB::table('users')->insert([
                        ['username' => 'Victory', 'password' => '0000'],
                        ['username' => 'Eric', 'password' => '00000']
                    ]);

        return $userdata;
    }

   public function getTblData($table_name,$filter=''){

        $result = DB::table($table_name);

        if($filter != ''){

            $result->whereRaw($filter);
        }

        $data = $result->get();

        return $data;
    }

public function listUsers(Request $req){
//$userdata = array('username'=>'salhe','email_address'=>'salehe@g,mail.com');
// $userdata = DB::table('tmda_users')
// ->where('id','<',4)
// ->orderBy('id','DESC')
// ->select('id','username')
// ->get();

$userdata = $this->getTblData('tmda_users');


$updateHistory = array();

foreach ($userdata as $result) {
    $user_id = $result->id;
    //insert operation
    $res = DB::table('tmda_users')
    ->where('id', $user_id)
    ->update(array('is_active'=>1));

if($res == 0){
$updateHistory[] = "User_id".$result->id." was not updated";
}
}

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('contracts::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('contracts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('contracts::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
//additional function
    
    
}
