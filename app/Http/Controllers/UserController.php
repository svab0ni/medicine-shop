<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Delivery;
use App\Models\Medicine;
use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.profile.index');
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $user->fill($request->validated())->save();

        return view('pages.profile.index');
    }

    public function purchaseHistory()
    {
        if(! $user = Auth::user())
            return view('auth.login');

        $deliveries = Delivery::with('status')->where('user_id', $user->id)->simplePaginate(10);

        return view('pages.profile.purchase-history', compact('deliveries'));
    }

    public function purchasePreview(int $id)
    {
        $delivery = Delivery::find($id);
        $medicines = $delivery->medicines;

        return view('pages.profile.purchase-preview', compact('medicines', 'delivery'));
    }

    public function medicine()
    {
        if(! $user = Auth::user())
            return view('auth.login');

        $medicines = Medicine::orderBy('id', 'desc')->simplePaginate(15);

        return view('pages.profile.medicines', compact('medicines'));
    }

    public function queuedDeliveries()
    {
        if(! $user = Auth::user())
            return view('auth.login');

        $deliveries = Delivery::with('status')->where('status_id', 1)->simplePaginate(10);

        return view('pages.profile.queued-deliveries', compact('deliveries'));
    }

    public function updateDeliveryStatus(int $id)
    {
        if(! $user = Auth::user())
            return view('auth.login');

        $delivery = Delivery::find($id);

        $delivery->courier_id = $user->id;
        $delivery->status_id = $delivery->status_id + 1;

        $delivery->save();

        $deliveries = $this->getOngoingDeliveries($user);

        return view('pages.profile.ongoing-deliveries', compact('deliveries'));
    }

    private function getOngoingDeliveries($user)
    {
        return Delivery::where('courier_id', $user->id)->where('status_id', '>', '1')->where('status_id', '<', '4')->simplePaginate(10);
    }

    public function ongoingDeliveries()
    {
        if(! $user = Auth::user())
            return view('auth.login');

        $deliveries = $this->getOngoingDeliveries($user);

        return view('pages.profile.ongoing-deliveries', compact('deliveries'));
    }

    public function finishedDeliveries()
    {
        if(! $user = Auth::user())
            return view('auth.login');

        $deliveries = $this->getFinishedDeliveries($user);

        return view('pages.profile.finished-deliveries', compact('deliveries'));
    }

    private function getFinishedDeliveries($user)
    {
        return Delivery::where('courier_id', $user->id)->where('status_id', '4')->simplePaginate(10);
    }
}
