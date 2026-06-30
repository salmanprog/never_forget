<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BalloonsCategory;
use Illuminate\Http\Request;

class BalloonsCategoryController extends Controller
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
            $query = BalloonsCategory::orderBy('sort_order')->orderBy('id');

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            if ($request->status !== 'All') {
                $status = $request->status == 2 ? 0 : $request->status;
                $query->where('status', $status);
            }

            $models = $query->paginate(10);

            return (string) view('admin.balloons_category.search', compact('models'));
        }

        return view('admin.balloons_category.index', [
            'models' => BalloonsCategory::orderBy('sort_order')->orderBy('id')->paginate(10),
            'page_title' => 'All Balloon Categories',
            'page_title_add' => 'Add Balloon Category',
        ]);
    }

    public function create()
    {
        return view('admin.balloons_category.create', ['page_title' => 'Add Balloon Category']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:10000',
        ]);

        $model = new BalloonsCategory();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->sort_order = $request->sort_order ?? 0;
        $model->status = $request->status ?? '1';
        $model->images = $this->uploadImage($request, 'assets/website/images/balloons');
        $model->save();

        return redirect()->route('balloons_category.index')->with('message', 'Balloon Category Added Successfully!');
    }

    public function edit($id)
    {
        return view('admin.balloons_category.edit', [
            'page_title' => 'Edit Balloon Category',
            'model' => BalloonsCategory::findOrFail($id),
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

        $update = BalloonsCategory::findOrFail($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->sort_order = $request->sort_order ?? 0;
        $update->status = $request->status ?? '1';

        if ($request->hasFile('image')) {
            $this->deleteImage($update->images);
            $update->images = $this->uploadImage($request, 'assets/website/images/balloons');
        }

        $update->save();

        return redirect()->route('balloons_category.index')->with('message', 'Balloon Category Updated Successfully!');
    }

    public function destroy($id)
    {
        $model = BalloonsCategory::find($id);

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
