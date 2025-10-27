<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(20);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['nullable', 'max:255', 'unique:tags,slug'],
        ]);
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        Tag::create($data);
        return redirect()->route('admin.tags.index')->with('success', 'Tag created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tag::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['nullable', 'max:255', Rule::unique('tags', 'slug')->ignore($tag->id)],
        ]);
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $tag->update($data);
        return redirect()->route('admin.tags.index')->with('success', 'Tag updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted');
    }
}
