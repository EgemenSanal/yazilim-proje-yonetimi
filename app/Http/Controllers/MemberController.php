<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFromRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $member = DB::table('members')->where('id', $userId)->first();
        if (!$member) {
            return response()->json(['error' => 'Member not found'], 404);
        }
        if ($member->role === 'A') {
            return response()->json([
                'message' => 'success',
                'members' => Member::all(),
                'data' => $member

            ]);
    }
        return response()->json([
            'message' => 'success',
            'data' => $member
        ]);
    }
    public function getAll(){
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
            'role' => $user->role,
            'token' => $token->accessToken
        ];

    }
    public function register(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email|',
            'password' => 'required',
            'passwordagain' => 'required|same:password',
            'role' => 'required',
            'name' => 'required',
            'surname' => 'required'
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
    public function show($id)
    {
        $member_searched = Member::find($id);
        $userId = Auth::id();
        $member = DB::table('members')->where('id', $userId)->first();
        if (!$member) {
            return response()->json(['error' => 'Member not found'], 404);
        }
        if ($member->role === 'A') {
            return response()->json([
                'message' => 'success',
                'email' => $member_searched->email,
                'role' => $member_searched->role,
            ]);
        }else{
            return response()->json([
                'message' => 'Cant access',
            ]);
        }

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
    public function update(Request $request, Member $member)
    {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'sometimes,required',
            'role' => 'required'
        ]);

        $member->update($fields);

        return ([
            'success',
            'The user was updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return response()->json([
           "message" => "Member deleted successfully"
        ]);
    }
}
