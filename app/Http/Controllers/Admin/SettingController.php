<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::get();
        return view('admin.page.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
                foreach ($request['support'] as $key => $value) {
                    $support[] = [
                        'id' => ++$key,
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
                'seo_products' => json_encode($seo_products),
                'seo_posts' => json_encode($seo_posts),
                'layout_not_found' => $request['layout'] ?? '<h1>Xin lỗi, chúng tôi không tìm thấy trang mà bạn cần!<h1>',
                'title_login_admin' => json_encode($title_login_admin),
            ];
            $settings = Setting::get();
            if(count($settings) == 0){
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::where('id', $id)->first();
        return view('admin.page.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
