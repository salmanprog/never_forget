<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ECardCategory;
use Illuminate\Http\Request;

class ECardCategoryController extends Controller
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
            $query = ECardCategory::orderBy('sort_order')->orderBy('id');

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            if ($request->status !== 'All') {
                $status = $request->status == 2 ? 0 : $request->status;
                $query->where('status', $status);
            }

            $models = $query->paginate(10);

            return (string) view('admin.e_card_category.search', compact('models'));
        }

        return view('admin.e_card_category.index', [
            'models' => ECardCategory::orderBy('sort_order')->orderBy('id')->paginate(10),
            'page_title' => 'All E Card Categories',
            'page_title_add' => 'Add E Card Category',
        ]);
    }

    public function create()
    {
        return view('admin.e_card_category.create', ['page_title' => 'Add E Card Category']);
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

        $model = new ECardCategory();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->button_text = $request->button_text ?: 'Create E Card';
        $model->sort_order = $request->sort_order ?? 0;
        $model->status = $request->status ?? '1';
        $model->image = $this->uploadImage($request, 'assets/website/images/e-card');
        $model->save();

        return redirect()->route('e_card_category.index')->with('message', 'E Card Category Added Successfully!');
    }

    public function edit($id)
    {
        return view('admin.e_card_category.edit', [
            'page_title' => 'Edit E Card Category',
            'model' => ECardCategory::findOrFail($id),
        ]);
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

        $update = ECardCategory::findOrFail($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->button_text = $request->button_text ?: 'Create E Card';
        $update->sort_order = $request->sort_order ?? 0;
        $update->status = $request->status ?? '1';

        if ($request->hasFile('image')) {
            $this->deleteImage($update->image);
            $update->image = $this->uploadImage($request, 'assets/website/images/e-card');
        }

        $update->save();

        return redirect()->route('e_card_category.index')->with('message', 'E Card Category Updated Successfully!');
    }

    public function destroy($id)
    {
        $model = ECardCategory::find($id);

        if (!$model) {
            return response()->json(['message' => 'Failed'], 404);
        }

        $this->deleteImage($model->image);
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
