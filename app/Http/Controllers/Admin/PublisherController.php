<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PublisherStoreRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::latest()->paginate(5);
        $title = 'Delete Publisher!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.publishers.index', [
            'publishers' => $publishers
        ]);
    }

    public function create()
    {
        return view('admin.publishers.create');
    }

    public function store(PublisherStoreRequest $request)
    {
        Publisher::create([
            'name' => $request->publisher_name,
        ]);

        return redirect('publishers')->with('toast_success', 'Publisher has been created successfully!');
    }

    public function edit(Publisher $publisher)
    {
        $publisher = Publisher::findOrFail($publisher->book_publisher_id);

        return view('admin.publishers.edit', [
            'publisher' => $publisher
        ]);
    }

    public function update(PublisherStoreRequest $request, Publisher $publisher)
    {
        $publisher = Publisher::findOrFail($publisher->book_publisher_id);

        $publisher->update([
            'name' => $request->publisher_name
        ]);

        return redirect('publishers')->with('toast_success', 'Publisher has been updated successfully!');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher = Publisher::findOrFail($publisher->book_publisher_id);

        $publisher->delete();

        return redirect('publishers')->with('toast_success', 'Publisher has been deleted successfully!');
    }
}
