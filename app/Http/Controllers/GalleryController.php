<?php

namespace App\Http\Controllers;

use App\Models\FeaturedService;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = FeaturedService::all();
        return view('gallery', compact('services'));
    }



    public function showSubscriber(){

        // جلب المشتركين من قاعدة البيانات
        $subscribers = Subscriber::all(); 

        // إرجاع الصفحة مع البيانات
        return view('subscribers.index', compact('subscribers'));
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
    public function store(Request $request)
    {
        //
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
        //
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
