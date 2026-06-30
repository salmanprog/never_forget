<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TangoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TangoCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = TangoCategory::orderBy('sort_order')->orderBy('id');

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            if ($request->status !== 'All') {
                $status = $request->status == 2 ? 0 : $request->status;
                $query->where('status', $status);
            }

            $models = $query->paginate(10);

            return (string) view('admin.tango_category.search', compact('models'));
        }

        $page_title = 'All Tango Categories';
        $page_title_add = 'Add Tango Category';
        $models = TangoCategory::orderBy('sort_order')->orderBy('id')->paginate(10);

        return view('admin.tango_category.index', compact('models', 'page_title', 'page_title_add'));
    }

    public function create()
    {
        $page_title = 'Add Tango Category';

        return view('admin.tango_category.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:10000',
        ]);

        $model = new TangoCategory();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->button_text = $request->button_text ?: 'Create Tango';
        $model->sort_order = $request->sort_order ?? 0;
        $model->status = $request->status ?? '1';

        if ($request->hasFile('image')) {
            $uploadDir = public_path('assets/website/images/tango');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $photo = date('YmdHis') . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($uploadDir, $photo);
            $model->image = 'assets/website/images/tango/' . $photo;
        }

        $model->save();

        return redirect()->route('tango_category.index')->with('message', 'Tango Category Added Successfully!');
    }

    public function edit($id)
    {
        $page_title = 'Edit Tango Category';
        $model = TangoCategory::findOrFail($id);

        return view('admin.tango_category.edit', compact('model', 'page_title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:10000',
        ]);

        $update = TangoCategory::findOrFail($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->button_text = $request->button_text ?: 'Create Tango';
        $update->sort_order = $request->sort_order ?? 0;
        $update->status = $request->status ?? '1';

        if ($request->hasFile('image')) {
            if ($update->image && file_exists(public_path($update->image))) {
                @unlink(public_path($update->image));
            }

            $uploadDir = public_path('assets/website/images/tango');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $photo = date('YmdHis') . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($uploadDir, $photo);
            $update->image = 'assets/website/images/tango/' . $photo;
        }

        $update->save();

        return redirect()->route('tango_category.index')->with('message', 'Tango Category Updated Successfully!');
    }

    public function destroy($id)
    {
        $model = TangoCategory::find($id);

        if (!$model) {
            return response()->json(['message' => 'Failed'], 404);
        }

        if ($model->image && file_exists(public_path($model->image))) {
            @unlink(public_path($model->image));
        }

        $model->delete();

        return true;
    }
}
