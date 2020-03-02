<?php

namespace Modules\UserManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function loginAuth(Request $req){
            $username = $req->username;
            $pass = $req->password;

            $check = DB::table('users')
                    ->where('username',$username)
                    ->where('password',$pass)
                    ->get();

            if($check->count() > 0){
                $response = array(
                    'success' => true,
                    'username' => $username,
                    'message' => "Logged in Successfully"
                );
            }else{
                $response = array(
                    'success' => false,
                    'message' => "Failed to login"
                );
            }
        return json_encode($response);
    }
    public function getUsers(Request $req){
        $users = DB::table('users')->get();

        $response = array(
            'success'=> true,
            'results' => $users
        );
        return json_encode($response);
    }


    public function index()
    {
        return view('usermanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('usermanagement::create');
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
        return view('usermanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('usermanagement::edit');
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
}
