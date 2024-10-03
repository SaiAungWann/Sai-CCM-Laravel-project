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
            'my_address_is_correct' => 'accepted',
        ], [
            'first_name.required' => 'The First Name field is required.',
            'last_name.required' => 'The Last Name field is required.',
            'email.required' => 'The Email field is reuqired.',
            'SRTZ.required' => 'The SRTZ field is required.',
            'address_name.required' => 'The Address Name field is required.',
            'address_name.unique' => 'The Address Name is already taken.',
            'address.required' => 'The Address field is required.',
            'telephone.required' => 'The Telephone field is required.',

        ]);

        $user = User::find(auth()->user()->id);
        $user_addresses = new UserAddress();
        $user_addresses->user_id = $user->id;
        $user_addresses->address_name = $request->address_name;
        $user_addresses->state_or_region_township_zip = $request->SRTZ;
        $user_addresses->address = $request->address;
        $user_addresses->telephone = $request->telephone;
        $user_addresses->save();

        if (UserAddress::count() > 3) {
            return redirect('/user/' . auth()->user()->id . '/profile')->with('message', 'You already added 3 addresses. Please delete an address to add another one.');
        }

        return redirect('/user/' . auth()->user()->id . '/profile')->with('message', 'Address Added Successfully');
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

    public function destroy(UserAddress $user_address)
    {
        $user_address->delete();
        return redirect('/user/' . auth()->user()->id . '/profile')->with('message', 'Address Deleted Successfully');
    }

    public function getAddressName(UserAddress $user_address)
    {
        $address_name = $user_address->address_name;
        return response()->json($address_name);
        return \back();
    }

    public function edit(UserAddress $user_address)
    {
        $user = User::find(auth()->user())->load('user_addresses');;
        $state_or_regions = StateOrRegion::all()->load('townships');
        $townships = Township::all()->load('stateOrRegion');
        return view('user-address', [
            'user' => $user,
            'user_addresses' => $user_address,
            'state_or_regions' => $state_or_regions,
            'townships' => $townships
        ]);

        return response()->json([]);
    }

    public function update(UserAddress $user_address, Request $request)
    {
        \request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address_name' => 'required',
            'SRTZ' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'my_address_is_correct' => 'accepted',
        ], [
            'first_name.required' => 'The First Name field is required.',
            'last_name.required' => 'The Last Name field is required.',
            'email.required' => 'The Email field is reuqired.',
            'SRTZ.required' => 'The SRTZ field is required.',
            'address_name.required' => 'The Address Name field is required.',
            'address_name.unique' => 'The Address Name is already taken.',
            'address.required' => 'The Address field is required.',
            'telephone.required' => 'The Telephone field is required.',

        ]);

        $user_addresses = UserAddress::find($user_address->id);

        $user = User::find(auth()->user()->id);

        $user_addresses->user_id = $user->id;
        $user_addresses->address_name = $request->address_name;
        $user_addresses->state_or_region_township_zip = $request->SRTZ;
        $user_addresses->address = $request->address;
        $user_addresses->telephone = $request->telephone;
        $user_addresses->save();

        return redirect('/user/' . auth()->user()->id . '/profile')->with('message', 'Address Added Successfully');
    }
}
