<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\SubscriberCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        $categories = SubscriberCategory::all();
        return view('admin.subscribers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image',
            'video' => 'nullable|url',
            'subscriber_category_id' => 'required|exists:subscriber_categories,id',
        ]);

        $subscriber = new Subscriber();
        $subscriber->name = $request->name;
        $subscriber->description = $request->description;
        $subscriber->photo = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;
        $subscriber->video = $request->video;
        $subscriber->subscriber_category_id = $request->subscriber_category_id;
        $subscriber->save();

        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber created successfully!');
    }

    public function show($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return view('admin.subscribers.show', compact('subscriber'));
    }

    public function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $categories = SubscriberCategory::all();
        return view('admin.subscribers.edit', compact('subscriber', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image',
            'video' => 'nullable|url',
            'subscriber_category_id' => 'required|exists:subscriber_categories,id',
        ]);

        $subscriber = Subscriber::findOrFail($id);
        $subscriber->name = $request->name;
        $subscriber->description = $request->description;
        $subscriber->photo = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : $subscriber->photo;
        $subscriber->video = $request->video;
        $subscriber->subscriber_category_id = $request->subscriber_category_id;
        $subscriber->save();

        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber updated successfully!');
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber deleted successfully!');
    }
}