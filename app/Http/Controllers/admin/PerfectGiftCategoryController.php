<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PerfectGiftCategory;
use Illuminate\Http\Request;

class PerfectGiftCategoryController extends Controller
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
            $query = PerfectGiftCategory::orderBy('sort_order')->orderBy('id');

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            if ($request->status !== 'All') {
                $status = $request->status == 2 ? 0 : $request->status;
                $query->where('status', $status);
            }

            $models = $query->paginate(10);

            return (string) view('admin.perfect_gift_category.search', compact('models'));
        }

        return view('admin.perfect_gift_category.index', [
            'models' => PerfectGiftCategory::orderBy('sort_order')->orderBy('id')->paginate(10),
            'page_title' => 'All Perfect Gift Categories',
            'page_title_add' => 'Add Perfect Gift Category',
        ]);
    }

    public function create()
    {
        return view('admin.perfect_gift_category.create', ['page_title' => 'Add Perfect Gift Category']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:10000',
        ]);

        $model = new PerfectGiftCategory();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->sort_order = $request->sort_order ?? 0;
        $model->status = $request->status ?? '1';
        $model->images = $this->uploadImage($request, 'assets/website/images/perfect_gifts');
        $model->save();

        return redirect()->route('perfect_gift_category.index')->with('message', 'Perfect Gift Category Added Successfully!');
    }

    public function edit($id)
    {
        return view('admin.perfect_gift_category.edit', [
            'page_title' => 'Edit Perfect Gift Category',
            'model' => PerfectGiftCategory::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:10000',
        ]);

        $update = PerfectGiftCategory::findOrFail($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->sort_order = $request->sort_order ?? 0;
        $update->status = $request->status ?? '1';

        if ($request->hasFile('image')) {
            $this->deleteImage($update->images);
            $update->images = $this->uploadImage($request, 'assets/website/images/perfect_gifts');
        }

        $update->save();

        return redirect()->route('perfect_gift_category.index')->with('message', 'Perfect Gift Category Updated Successfully!');
    }

    public function destroy($id)
    {
        $model = PerfectGiftCategory::find($id);

        if (!$model) {
            return response()->json(['message' => 'Failed'], 404);
        }

        $this->deleteImage($model->images);
        $model->delete();

        return true;
    }

    private function uploadImage(Request $request, string $relativeDir): ?string
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $uploadDir = public_path($relativeDir);
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $photo = date('YmdHis') . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move($uploadDir, $photo);

        return $relativeDir . '/' . $photo;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && file_exists(public_path($path))) {
            @unlink(public_path($path));
        }
    }
}
