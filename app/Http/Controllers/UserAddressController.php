<?php

namespace App\Http\Controllers;

use App\Models\StateOrRegion;
use App\Models\Township;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class UserAddressController extends Controller
{

    public function create()
    {
        $user = User::find(auth()->user())->load('user_addresses');
        $user_addresses = $user->first()->user_addresses;
        $state_or_regions = StateOrRegion::all()->load('townships');
        $townships = Township::all()->load('stateOrRegion');
        return view('user-address', [
            'user' => $user,
            'user_addresses' => $user_addresses,
            'state_or_regions' => $state_or_regions,
            'townships' => $townships
        ]);

        return response()->json([]);
    }

    public function store(Request $request, User $user)
    {
        \request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address_name' => 'required',
            'SRTZ' => 'required',
            'address' => 'required',
            'telephone' => 'required',

        ]);

        $user = User::find(auth()->user()->id);
        $user_addresses = new UserAddress();
        $user_addresses->user_id = $user->id;
        $user_addresses->address_name = $request->address_name;
        $user_addresses->state_or_region_township_zip = $request->SRTZ;
        $user_addresses->address = $request->address;
        $user_addresses->telephone = $request->telephone;
        $user_addresses->save();


        return redirect('/user/profile')->with('message', 'Address Added Successfully');
    }
    public function getTownships(StateOrRegion $state_or_region_id, Township $township_id)
    {
        $townships = Township::where($state_or_region_id, 'state_or_region_id')->get();

        return response()->json($townships);
        // return response()->json($zip_code);
    }
    public function getZipCode(Township $township_id)
    {
        $zip_code = Township::findOrFail($township_id)->zip_code;
        return response()->json($zip_code);
    }

    public function update($regionId, Request $request)
    {
        \request()->validate([
            'address_name' => 'required',
            'state_or_region' => 'required',
            'township' => 'required',
        ]);
        $user = User::find(auth()->user());
        $user->user_addresses()->where('id', $regionId)->update($request->all());
        return back();
    }
}
