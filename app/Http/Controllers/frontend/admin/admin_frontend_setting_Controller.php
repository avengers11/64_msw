<?php

namespace App\Http\Controllers\frontend\admin;

use App\Models\slider;
use App\Models\live_tv;
use App\Models\Category;
use App\Models\products;
use App\Models\Sliders2;
use App\Models\LoginPage;
use App\Models\products2;
use App\Models\management;
use Illuminate\Http\Request;
use App\Models\download_links;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class admin_frontend_setting_Controller extends Controller
{
    //admin_settings_products_controller
    public function admin_settings_products_controller()
    {
        $products = products::orderBy('role', 'ASC') -> paginate(10);
        return view('admin.pages.settings.products.products') -> with(compact('products'));
    }

    // admin_settings_products_add_controller
    public function admin_settings_products_add_controller($id='empty')
    {
        $cat_f = Category::latest()->first();
        if($id == 'empty'){
            $cat = Category::latest()->get();
        }else{
            $cat = Category::latest()->where('id', $id)->get();
        }


        return view('admin.pages.settings.products.add')->with(compact('cat'));
    }

    // admin_settings_products_update_controller
    public function admin_settings_products_update_controller($id)
    {
        $data = products::where('id', $id) -> first();
        $cat = Category::latest()->get();
        return view('admin.pages.settings.products.update') -> with(compact('id', 'data', 'cat'));
    }

    // admin_settings_contact_controller
    public function admin_settings_contact_controller(Request $req)
    {
        $data = management::where('id', 1) -> first();
        return view('admin.pages.settings.contact') -> with(compact('data'));
    }

    // admin_settings_slider_controller
    public function admin_settings_slider_controller()
    {
        $slider = slider::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.slider.slider') -> with(compact('slider'));
    }

    // admin_settings_slider_add_controller
    public function admin_settings_slider_add_controller()
    {
        return view('admin.pages.settings.slider.up_new');
    }

    // admin_settings_slider_update_controller
    public function admin_settings_slider_update_controller($id)
    {
        $sl = slider::find($id);
        return view('admin.pages.settings.slider.update')->with(compact('sl'));
    }

    // admin_settings_slider2_controller
    public function admin_settings_slider2_controller()
    {
        $slider = Sliders2::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.slider2.slider') -> with(compact('slider'));
    }

    // admin_settings_slider2_add_controller
    public function admin_settings_slider2_add_controller()
    {
        return view('admin.pages.settings.slider2.up_new');
    }

    // admin_settings_slider2_update_controller
    public function admin_settings_slider2_update_controller($id)
    {
        $sl = Sliders2::find($id);
        return view('admin.pages.settings.slider2.update')->with(compact('sl'));
    }
    /*
    ========================
          LIVE TV
    ========================
    */
    // admin_settings_live_tv_controller
    public function admin_settings_live_tv_controller()
    {
        $products = live_tv::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.live_tv.live_tv') -> with(compact('products'));
    }

    // admin_settings_live_tv_add_controller
    public function admin_settings_live_tv_add_controller()
    {
        return view('admin.pages.settings.live_tv.add');
    }

    // admin_settings_live_tv_update_controller
    public function admin_settings_live_tv_update_controller($id)
    {
        $data = live_tv::where('id', $id) -> first();
        return view('admin.pages.settings.live_tv.update') -> with(compact('data'));
    }


    /*
    ===============
       products2
    ===============
    */
    //admin_settings_products2_controller
    public function admin_settings_products2_controller()
    {
        $products2 = products2::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.products2.index') -> with(compact('products2'));
    }

    // admin_settings_products2_add_controller
    public function admin_settings_products2_add_controller()
    {
        return view('admin.pages.settings.products2.add');
    }

    // admin_settings_products2_update_controller
    public function admin_settings_products2_update_controller($id)
    {
        $data = products2::where('id', $id) -> first();
        return view('admin.pages.settings.products2.update') -> with(compact('id', 'data'));
    }

    /*
    ===============
       UPDATE
    ===============
    */
    //admin_settings_update_links_controller
    public function admin_settings_update_links_controller()
    {
        $data = download_links::where('id', 1) -> first();
        return view('admin.pages.settings.update') -> with(compact('data'));
    }



    /*
    ===============
    ===============
    */
    // admin_settings_category_controller
    public function admin_settings_category_controller()
    {
        $dataType = Category::orderBy('role', 'ASC') -> paginate(10);
        return view('admin.pages.settings.category.index') -> with(compact('dataType'));
    }
    // admin_settings_category_add_controller
    public function admin_settings_category_add_controller()
    {
        return view('admin.pages.settings.category.add');
    }

    // admin_settings_category_update_controller
    public function admin_settings_category_update_controller($id)
    {
        $data = Category::where('id', $id) -> first();
        return view('admin.pages.settings.category.update') -> with(compact('id', 'data'));
    }

    // admin_settings_category_products_controller
    public function admin_settings_category_products_controller($id)
    {
        $products = products::orderBy('role', 'ASC') ->where('cat_id', $id) -> paginate(10);
        return view('admin.pages.settings.category.products') -> with(compact('products', 'id'));
    }

    /*
    ===============================================
                    LOGIN PAGE
    ===============================================
    */
    // admin_settings_login_page_controller
    public function admin_settings_login_page_controller()
    {
        $slider = LoginPage::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.login-page.login') -> with(compact('slider'));
    }

    // admin_settings_login_page_add_controller
    public function admin_settings_login_page_add_controller()
    {
        return view('admin.pages.settings.login-page.add');
    }

    // admin_settings_login_page_add_submit_controller
    function admin_settings_login_page_add_submit_controller(Request $request)
    {
        $contactUs = [];

        if(!empty($request->links)){
            foreach ($request->links as $index => $value) {
                $fileName = "";
                $file = isset($request->file('logos')[$index]) ? $request->file('logos')[$index] : null;
                if (!empty($file)) {
                    $fileName = time() . $index . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('images/contact'), $fileName);
                }
                $contactUs[] = [
                    "link" => $value,
                    "logo" => $fileName
                ];
            }
        }

        $logoFile = "";
        $file = $request->file('logo');
        if (!empty($file)) {
            $logoFile = time() . $index . "." . $file->getClientOriginalExtension();
            $file->move(public_path('images/contact'), $logoFile);
        }

        $bgFile = "";
        $file = $request->file('background_img');
        if (!empty($file)) {
            $bgFile = time() . $index . "." . $file->getClientOriginalExtension();
            $file->move(public_path('images/contact'), $bgFile);
        }

        $login = new LoginPage();
        $login->login_page = $request->login_page;
        $login->buy_now = $request->buy_now;
        $login->notice = $request->notice;
        $login->logo = $logoFile;
        $login->background_img = $bgFile;
        $login->contact_us = json_encode($contactUs);
        $login->save();

        return back()->with('msg', 'You are successfully add a new login page!');
    }
    public function admin_settings_login_page_delete_controller(LoginPage $login)
    {
        $login->delete();

        return back()->with('msg', 'You are successfully delete a login page!');
    }

    public function admin_settings_login_page_update_controller(LoginPage $login)
    {
        return view('admin.pages.settings.login-page.update', compact('login'));

    }
    public function admin_settings_login_page_update_submit_controller(Request $request, LoginPage $login)
    {
        $contactUs = [];
        $oldContactUs = json_decode($login->contact_us);
        if(!empty($request->links)){
            foreach ($request->links as $index => $value) {

                $fileName = isset($oldContactUs[$index]->logo) ? $oldContactUs[$index]->logo : "";
                if (!empty($request->file('logos')[$index])) {
                    $file = $request->file('logos')[$index];
                    File::delete(public_path("images/contact/$fileName"));

                    $fileName = time() . $index . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('images/contact'), $fileName);
                }

                $contactUs[] = [
                    "link" => $value,
                    "logo" => $fileName
                ];
            }
        }


        $logoFile = $login->logo;
        $file = $request->file('logo');
        if (!empty($file)) {
            $logoFile = time() . $index . "." . $file->getClientOriginalExtension();
            $file->move(public_path('images/contact'), $logoFile);
        }

        $bgFile = $login->background_img;
        $file = $request->file('background_img');
        if (!empty($file)) {
            $bgFile = time() . $index . "." . $file->getClientOriginalExtension();
            $file->move(public_path('images/contact'), $bgFile);
        }

        $login->login_page = $request->login_page;
        $login->buy_now = $request->buy_now;
        $login->notice = $request->notice;
        $login->logo = $logoFile;
        $login->background_img = $bgFile;
        $login->contact_us = json_encode($contactUs);
        $login->save();

        return back()->with('msg', 'You are successfully add a new login page!');
    }
}
