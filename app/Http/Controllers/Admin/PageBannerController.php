<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PageBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['banners'] = PageBanner::latest('id')->get();
        return view('admin.pages.pageBanner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.pageBanner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_name'   => 'required',
            'image'       => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'badge'       => 'nullable|string|max:191',
            'button_name' => 'nullable|string|max:200',
            'button_link' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ], [
            'page_name.required'        => 'The Page Name is required.',
            'image.required'            => 'The Image field is required.',
            'image.file'                => 'The Image must be a file.',
            'image.mimes'               => 'The Image must be a file of type: jpeg, png, jpg, gif.',
            'image.max'                 => 'The Image may not be greater than 2MB.',
            'status.required'           => 'The Status field is required.',
            'status.in'                 => 'The status must be one of: active, inactive.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $filePath = 'pagebanner/' . $request->page_name;
        $uploadedFiles = [];

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = customUpload($request->file('image'), $filePath);

            if ($uploadedFiles['image']['status'] === 0) {
                return redirect()->back()->with('error', $uploadedFiles['image']['error_message']);
            }
        }
        if ($request->hasFile('bg_image')) {
            $uploadedFiles['bg_image'] = customUpload($request->file('bg_image'), $filePath);

            if ($uploadedFiles['bg_image']['status'] === 0) {
                return redirect()->back()->with('error', $uploadedFiles['bg_image']['error_message']);
            }
        }

        PageBanner::create([
            'page_name'   => $request->page_name,
            'image'       => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
            'bg_image'    => $uploadedFiles['bg_image']['status'] == 1 ? $uploadedFiles['bg_image']['file_path'] : null,
            'badge'       => $request->badge,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
            'title'       => $request->title,
            'subtitle'    => $request->subtitle,
            'banner_link' => $request->banner_link,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Data has been uploaded successfully!');
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
        $data['banner'] = PageBanner::findOrFail($id);
        return view('admin.pages.pageBanner.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = PageBanner::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'page_name'   => 'required',
            'image'       => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'badge'       => 'nullable|string|max:191',
            'button_name' => 'nullable|string|max:200',
            'button_link' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ], [
            'page_name.required'        => 'The Page Name is required.',
            'image.required'            => 'The Image field is required.',
            'image.file'                => 'The Image must be a file.',
            'image.mimes'               => 'The Image must be a file of type: jpeg, png, jpg, gif.',
            'image.max'                 => 'The Image may not be greater than 2MB.',
            'status.required'           => 'The Status field is required.',
            'status.in'                 => 'The status must be one of: active, inactive.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $filePath = 'pagebanner/' . $request->page_name;
        $uploadedFiles = [];

        if ($request->hasFile('image')) {
            $oldFile = $banner->image ?? null;

            if ($oldFile) {
                Storage::delete("public/" . $oldFile);
            }
            $uploadedFiles['image'] = customUpload($request->file('image'), $filePath);

            if ($uploadedFiles['image']['status'] === 0) {
                return redirect()->back()->with('error', $uploadedFiles['image']['error_message']);
            }
        }
        if ($request->hasFile('bg_image')) {
            $oldFile = $banner->bg_image ?? null;

            if ($oldFile) {
                Storage::delete("public/" . $oldFile);
            }
            $uploadedFiles['bg_image'] = customUpload($request->file('bg_image'), $filePath);

            if ($uploadedFiles['bg_image']['status'] === 0) {
                return redirect()->back()->with('error', $uploadedFiles['bg_image']['error_message']);
            }
        }

        $banner->update([
            'page_name'   => $request->page_name,
            'image'       => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $banner->image,
            'bg_image'    => $uploadedFiles['bg_image']['status'] == 1 ? $uploadedFiles['bg_image']['file_path'] : $banner->bg_image,
            'badge'       => $request->badge,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
            'title'       => $request->title,
            'subtitle'    => $request->subtitle,
            'banner_link' => $request->banner_link,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Data has been uploaded successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = PageBanner::findOrFail($id);
        $files = [
            'image'    => $banner->image,
            'bg_image' => $banner->bg_image,
        ];
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $oldFile = $banner->$key ?? null;
                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
            }
        }
        $banner->delete();
    }
}
