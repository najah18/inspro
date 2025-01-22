<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller

{
    public function index()
    {
        $information = Information::first();  // استرجاع أول (أو الوحيد) سجل من الجدول
        return view('admin.informations.index', compact('information'));
    }

        // عرض تفاصيل المعلومات (show)
        public function show($id)
        {
            $information = Information::findOrFail($id);
            return view('admin.informations.show', compact('information'));
        }

    public function create()
    {
        return view('admin.informations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'logo' => 'nullable|image',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'threads_link' => 'nullable|url',
            'small_details' => 'nullable|string',
            'details' => 'nullable|string',
            'address_1' => 'nullable|string',
            'address_2' => 'nullable|string',
            'map_link' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
            'email' => 'nullable|email',
            'videos_nb' => 'nullable|integer',
            'photos_nb' => 'nullable|integer',
            'contents_nb' => 'nullable|integer',
            'website_nb' => 'nullable|integer',
            'work_link' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Information::create($data);

        return redirect()->route('admin.informations.index');
    }


    public function edit($id)
    {
        $information = Information::findOrFail($id);
        return view('admin.informations.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'logo' => 'nullable|image',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'threads_link' => 'nullable|url',
            'small_details' => 'nullable|string',
            'details' => 'nullable|string',
            'address_1' => 'nullable|string',
            'address_2' => 'nullable|string',
            'map_link' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
            'email' => 'nullable|email',
            'videos_nb' => 'nullable|integer',
            'photos_nb' => 'nullable|integer',
            'contents_nb' => 'nullable|integer',
            'website_nb' => 'nullable|integer',
            'work_link' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $information = Information::findOrFail($id);
        $information->update($data);

        return redirect()->route('admin.informations.index');
    }

    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();
        
        return redirect()->route('admin.informations.index');
    }

    }

