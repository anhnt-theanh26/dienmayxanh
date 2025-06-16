<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index setting')) {
            $settings = Setting::paginate(10);
            return view('admin.page.setting.index', compact('settings'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create setting')) {
            return view('admin.page.setting.create');
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create setting')) {
            try {
                $seo_products = [
                    'title_products' => $request['title_products'],
                    'description_products' => $request['description_products'],
                    'seoimage_products' => $request['seoimage_products'],
                    'robots_products' => $request['robots_products'],
                ];
                $seo_posts = [
                    'title_posts' => $request['title_posts'],
                    'description_posts' => $request['description_posts'],
                    'seoimage_posts' => $request['seoimage_posts'],
                    'robots_posts' => $request['robots_posts'],
                ];
                $title_login_admin = [
                    'greeting' => $request['greeting'],
                    'instruct' => $request['instruct'],
                ];
                $support = [];
                if ($request['support']) {
                    $index = 1;
                    foreach ($request['support'] as $value) {
                        $support[] = [
                            'id' => $index++,
                            'method' => $value['method'],
                            'phone' => $value['phone'],
                            'time' => $value['time'],
                            'href' => $value['href'],
                        ];
                    }
                }
                $data = [
                    'name' => $request['name'] ?? 'Setting',
                    'logo' => $request['logo'],
                    'support' => json_encode($support),
                    'main_color' => $request['main_color'],
                    'secondary_color' => $request['secondary_color'],
                    'seo_products' => json_encode($seo_products),
                    'seo_posts' => json_encode($seo_posts),
                    'layout_not_found' => $request['layout'],
                    'informational' => $request['informational'],
                    'title_login_admin' => json_encode($title_login_admin),
                ];
                $settings = Setting::paginate(10);
                if (count($settings) == 0) {
                    $data['status'] = true;
                }
                Setting::create($data);
                DB::commit();
                Alert::success('Thành công', 'Thêm mới setting thành công');
                return redirect()->route('admin.setting.index')->with('success', 'Thêm mới setting thành công');
            } catch (\Throwable $th) {
                DB::rollBack();
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function edit(string $id)
    {
        if (Auth::user()->can('edit setting')) {
            try {
                $setting = Setting::where('id', $id)->first();
                if (!$setting) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay setting');
                    return redirect()->back()->with('error', 'Khong tim thay setting!');
                }
                return view('admin.page.setting.edit', compact('setting'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit setting')) {
            try {
                $setting = Setting::where('id', $id)->first();
                if (!$setting) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay setting');
                    return redirect()->back()->with('error', 'Khong tim thay setting!');
                }
                $seo_products = [
                    'title_products' => $request['title_products'],
                    'description_products' => $request['description_products'],
                    'seoimage_products' => $request['seoimage_products'],
                    'robots_products' => $request['robots_products'],
                ];
                $seo_posts = [
                    'title_posts' => $request['title_posts'],
                    'description_posts' => $request['description_posts'],
                    'seoimage_posts' => $request['seoimage_posts'],
                    'robots_posts' => $request['robots_posts'],
                ];
                $title_login_admin = [
                    'greeting' => $request['greeting'],
                    'instruct' => $request['instruct'],
                ];
                $support = [];
                if ($request['support']) {
                    $index = 1;
                    foreach ($request['support'] as $value) {
                        $support[] = [
                            'id' => $index++,
                            'method' => $value['method'],
                            'phone' => $value['phone'],
                            'time' => $value['time'],
                            'href' => $value['href'],
                        ];
                    }
                }
                $data = [
                    'name' => $request['name'] ?? 'Setting',
                    'logo' => $request['logo'],
                    'support' => json_encode($support),
                    'main_color' => $request['main_color'],
                    'secondary_color' => $request['secondary_color'],
                    'seo_products' => json_encode($seo_products),
                    'seo_posts' => json_encode($seo_posts),
                    'layout_not_found' => $request['layout'],
                    'informational' => $request['informational'],
                    'title_login_admin' => json_encode($title_login_admin),
                ];
                $setting->update($data);
                DB::commit();
                Alert::success('Thành công', 'Cập nhật cài đặt thành công');
                return redirect()->back()->with('success', 'Cập nhật cài đặt thành công');
            } catch (\Throwable $th) {
                DB::rollBack();
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function status(Request $request, string $id)
    {
        if (Auth::user()->can('edit setting')) {
            try {

                $settings = Setting::where('id', '!=', $id)->paginate(10);
                $setting = Setting::where('id', $id)->first();
                if (!$setting) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay setting');
                    return redirect()->back()->with('error', 'Khong tim thay setting!');
                }
                foreach ($settings as $item) {
                    $item->update(['status' => false]);
                }
                $setting->update(['status' => true]);
                Alert::success('Thành công', 'Sử dụng cài đặt thành công');
                return redirect()->back()->with('success', 'Sử dụng cài đặt thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function destroy(string $id)
    {
        if (Auth::user()->can('delete setting')) {
            try {
                $setting = Setting::where('id', $id)->first();
                if (!$setting) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay setting');
                    return redirect()->back()->with('error', 'Khong tim thay setting!');
                }
                $setting->delete();
                if ($setting->status == true) {
                    $settingOther = Setting::where('id', '!=', $id)->first();
                    $settingOther->update(['status' => true]);
                }
                Alert::success('Thành công', 'Xóa cài đặt thành công');
                return redirect()->back()->with('success', 'Xóa cài đặt thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function search(Request $request, string $keyword)
    {
        if (Auth::user()->can('index setting')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = Setting::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = Setting::orderBy('id', 'desc')->paginate(10);
                }
            }
            return view('admin.page.setting.search', compact('results', 'status'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
