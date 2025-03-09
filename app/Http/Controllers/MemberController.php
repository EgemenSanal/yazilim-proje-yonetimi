<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFromRequest;
use App\Models\Member;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(LoginFromRequest $request){
        $request->validate([
            'email' => 'required|email|exists:members',
            'password' => 'required'
        ]);
        $user = Member::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'errors' => [
                    'email' => ['The provided credentials are incorrect.']
                ]
            ];

        }
        $token = $user->createToken($user->name);
        $userid = $user->id;
        return [
            'user' => $user,
            'token' => $token->accessToken
        ];

    }
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|',
            'password' => 'required',
            'age' => 'required',
        ]);
        $fields['password'] = Hash::make($fields['password']);
        $user = Member::create($fields);

        $token = $user->createToken($request->name);
        $userid = $user->id;
        return [
            'user' => $user,
            'token' => $token->accessToken
        ];
    }
    public function store(StoreMemberRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
