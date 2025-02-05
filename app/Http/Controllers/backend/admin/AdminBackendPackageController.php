<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Mail\PaymentAccept;
use App\Mail\PaymentNotification;
use App\Mail\PaymentRequest;
use App\Models\Balance;
use App\Models\Deposit;
use App\Models\DepositPackage;
use App\Models\management;
use App\Models\Package;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminBackendPackageController extends Controller
{
    /*
    ====================
        PACKAGE
    ====================
    */
    public function index(Request $request)
    {
        $dataType = Package::latest() -> get();

        return view('admin.pages.package.index', compact('dataType'));
    }
    public function add(Request $request)
    {
        return view('admin.pages.package.add');
    }
    public function store(Request $request)
    {
        $package = new Package();
        $package->name = $request->name;
        $package->amount = $request->amount;
        $package->login_time = $request->login_time;
        $package->validity = $request->validity;
        $package->save();

        return redirect(route('package.index'))-> with('msg', 'Your data successfully added!');
    }
    public function edit(Package $package)
    {
        return view('admin.pages.package.edit',compact('package'));
    }
    public function update(Package $package, Request $request)
    {
        $package->name = $request->name;
        $package->amount = $request->amount;
        $package->login_time = $request->login_time;
        $package->validity = $request->validity;
        $package->save();

        return redirect(route('package.index'))-> with('msg', 'Your data successfully updated!');
    }
    public function delete(Package $package)
    {
        $package->delete();

        return redirect(route('package.index'))-> with('msg', 'Your data successfully deleted!');
    }
    public function lists()
    {
        $dataType = Package::latest() -> get();

        return view("admin.pages.package.lists", compact('dataType'));
    }
    /*
    ====================
        Deposit 
    ====================
    */
    public function deposit(Request $request)
    {
        $user = user();
        $dataType = Deposit::latest()->where('status', 0)->where('parent_id', $user->creator_role)->paginate(10);

        return view('admin.pages.deposit.index', compact('dataType'));
    }
    public function depositSuccess(Request $request)
    {
        $user = user();
        $dataType = Deposit::latest()->where('status', 1)->where('parent_id', $user->creator_role)->paginate(10);

        return view('admin.pages.deposit.index', compact('dataType'));
    }
    public function depositSettings(Request $request)
    {
        $dataType = management::where('id', 1) -> first();
        $user = user();

        // submit
        if($request->isMethod('POST')){
            $dataType->deposit_bkash_number = $request->deposit_bkash_number;
            $dataType->deposit_bkash_info = $request->deposit_bkash_info;
            $dataType->deposit_nagad_number = $request->deposit_nagad_number;
            $dataType->deposit_nagad_info = $request->deposit_nagad_info;
            $dataType->deposit_rocket_number = $request->deposit_rocket_number;
            $dataType->deposit_rocket_info = $request->deposit_rocket_info;
            $dataType->deposit_upay_number = $request->deposit_upay_number;
            $dataType->deposit_upay_info = $request->deposit_upay_info;
            $dataType->deposit_submit_info = $request->deposit_submit_info;
            $dataType->save();

            return back()-> with('msg', 'Your deposit successfully added!');
        }

        return view('admin.pages.deposit.settings', compact('dataType'));
    }
    public function addDeposit(Request $request, $id)
    {
        return view('admin.pages.deposit.add', compact('id'));
    }
    public function storeDeposit(Request $request)
    {
        // balance 
        $balance = new Balance();
        $balance->user_id = $request->user_id;
        $balance->info = "Admin Adjustment";
        $balance->amount = $request->amount;
        $balance->save();

        return redirect(route('users.admin_all_web'))-> with('msg', 'Your deposit successfully added!');
    }
    public function acceptDeposit(Deposit $deposit)
    {
        // balance 
        $balance = new Balance();
        $balance->user_id = $deposit->user_id;
        $balance->info = "Deposit";
        $balance->amount = $deposit->amount;
        $balance->save();

        // depost  
        $deposit->status = 1;
        $deposit->save();

        // send email 
        $user = users::find($deposit->user_id);
        $details = [
            'title' => 'Your Order is now complete',
            'username' => $user->username,
            'method' => $deposit->method,
        ];
        Mail::to($user->email)->send(new PaymentAccept($details));

        return redirect(route('deposit.index'))-> with('msg', 'Your deposit successfully added!');
    }
    public function deleteDeposit(Deposit $deposit)
    {
        $deposit->delete();

        return redirect(route('deposit.index'))-> with('msg', 'Your data successfully deleted!');
    }
    public function process(Request $request)
    {
        $user = users::where('username', $request->session()->get('username'))->first();
        $manage = management::where('id', 1) -> first();

        return view('admin.pages.deposit.process', compact('user', 'manage'));
    }
    public function processSubmit(Request $request)
    {
        $user = users::where('username', $request->session()->get('username'))->first();
        $manage = management::where('id', 1) -> first();

        // image   
        $image = $request -> file('file');
        $image_name = time().".".$image -> getClientOriginalExtension();
        $image -> move(public_path("images/deposit"), $image_name);

        $deposit = new Deposit();
        $deposit->user_id = $user->id;
        $deposit->parent_id = $user->creator_role;
        $deposit->tranx_id = $request->tranx_id;
        $deposit->method = $request->method;
        $deposit->amount = $request->amount;
        $deposit->file = $image_name;
        $deposit->save();

        // send email 
        $user = user();
        $details = [
            'title' => 'Your order has been received!',
            'username' => $user->username,
            'method' => $deposit->method,
        ];
        Mail::to($user->email)->send(new PaymentRequest($details));

        $details = [
            'title' => $user->username.', submit a order!',
            'username' => $user->username,
            'method' => $deposit->method,
            'amount' => $request->amount,
            'tranx_id' => $request->tranx_id,
        ];
        Mail::to(env('MAIL_ADMIN_EMAIL'))->send(new PaymentNotification($details));

        return redirect(route('users.admin_all_web'))-> with('msg', $manage->deposit_submit_info);
    }


    /*
    ================
    USER DEPOSIT 
    ================
    */
    public function depositUser(Request $request)
    {
        $user = user();
        $dataType = DepositPackage::latest()->where('status', 0)->where('parent_id', $user->creator_role)->paginate(10);

        return view('admin.pages.deposit.user.index', compact('dataType'));
    }
    public function depositSuccessUser(Request $request)
    {
        $user = user();
        $dataType = DepositPackage::latest()->where('status', 1)->where('parent_id', $user->creator_role)->paginate(10);

        return view('admin.pages.deposit.user.index', compact('dataType'));
    }
    public function acceptDepositUser(DepositPackage $deposit)
    {
        $user = users::find($deposit->user_id);

        // balance 
        users::where('id', $user->id) -> update([
            "products_access" =>"Yes",
            "login_time" => $deposit->package->login_time,
            "expired" => time()+($deposit->package->validity*86400)
        ]);

        // depost  
        $deposit->status = 1;
        $deposit->save();

        // send email 
        $details = [
            'title' => 'Your Order is now complete',
            'username' => $user->username,
            'method' => $deposit->method,
        ];
        Mail::to($user->email)->send(new PaymentAccept($details));

        return back()-> with('msg', 'Your deposit successfully added!');
    }
    public function deleteDepositUser(DepositPackage $deposit)
    {
        $deposit->delete();

        return back()-> with('msg', 'Your data successfully deleted!');
    }
    public function processSubmitUser(Request $request)
    {
        $user = user();
        $createUser = users::find($user->creator_role);
        $package = Package::find($request->package);

        // image   
        $image = $request -> file('file');
        $image_name = time().".".$image -> getClientOriginalExtension();
        $image -> move(public_path("images/deposit"), $image_name);

        $deposit = new DepositPackage();
        $deposit->user_id = $user->id;
        $deposit->package_id = $package->id;
        $deposit->parent_id = $user->creator_role;
        $deposit->tranx_id = $request->tranx_id;
        $deposit->method = $request->method;
        $deposit->file = $image_name;
        $deposit->save();

        // send email 
        $details = [
            'title' => 'Your order has been received!',
            'username' => $user->username,
            'method' => $deposit->method,
        ];
        Mail::to($user->email)->send(new PaymentRequest($details));

        $details = [
            'title' => $user->username.', submit a order!',
            'username' => $user->username,
            'method' => $deposit->method,
            'amount' => $package->amount,
            'tranx_id' => $request->tranx_id,
        ];
        Mail::to($createUser->email)->send(new PaymentNotification($details));

        return back()-> with('msg', "Your deposit was successfully submitted. Please wait for approval.");
    }
    public function depositSettingsReseller(Request $request)
    {
        $user = users::where('username', session()->get('username'))->first();

        // submit
        if($request->isMethod('POST')){
            $user->deposit_bkash_number = $request->deposit_bkash_number;
            $user->deposit_bkash_info = $request->deposit_bkash_info;
            $user->deposit_nagad_number = $request->deposit_nagad_number;
            $user->deposit_nagad_info = $request->deposit_nagad_info;
            $user->deposit_rocket_number = $request->deposit_rocket_number;
            $user->deposit_rocket_info = $request->deposit_rocket_info;
            $user->deposit_upay_number = $request->deposit_upay_number;
            $user->deposit_upay_info = $request->deposit_upay_info;
            $user->save();

            return back()-> with('msg', 'Your deposit successfully added!');
        }

        return view('admin.pages.deposit.reseller-settings', compact('user'));
    }
}
