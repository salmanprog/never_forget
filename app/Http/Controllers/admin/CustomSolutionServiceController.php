<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomSolutionOption;
use App\Models\CustomSolutionService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomSolutionServiceController extends Controller
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
            $query = CustomSolutionService::withCount('options')->orderBy('sort_order')->orderBy('id');

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            if ($request->status !== 'All' && $request->status !== null && $request->status !== '') {
                $status = $request->status == 2 ? 0 : $request->status;
                $query->where('status', $status);
            }

            $models = $query->paginate(10);

            return (string) view('admin.custom_solution_service.search', compact('models'));
        }

        return view('admin.custom_solution_service.index', [
            'models' => CustomSolutionService::withCount('options')->orderBy('sort_order')->orderBy('id')->paginate(10),
            'page_title' => 'Custom Solution Services',
        ]);
    }

    public function create()
    {
        return view('admin.custom_solution_service.create', [
            'page_title' => 'Add Custom Solution Service',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:10000',
            'has_other_text' => 'nullable|boolean',
            'options_text' => 'nullable|string',
        ]);

        $model = new CustomSolutionService();
        $model->title = $request->title;
        $model->slug = CustomSolutionService::makeUniqueSlug($request->title);
        $model->description = $request->description;
        $model->sort_order = $request->sort_order ?? 0;
        $model->has_other_text = $request->boolean('has_other_text');
        $model->status = $request->status ?? '1';
        $model->image = $this->uploadImage($request);
        $model->save();

        $this->syncOptionsFromText($model, $request->input('options_text'));

        return redirect()->route('custom_solution_service.index')
            ->with('message', 'Service added successfully!');
    }

    public function edit($id)
    {
        $model = CustomSolutionService::with('options')->findOrFail($id);

        return view('admin.custom_solution_service.edit', [
            'page_title' => 'Edit Custom Solution Service',
            'model' => $model,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:10000',
            'has_other_text' => 'nullable|boolean',
            'options_text' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $model = CustomSolutionService::findOrFail($id);
        $model->title = $request->title;
        $model->slug = CustomSolutionService::makeUniqueSlug($request->title, $model->id);
        $model->description = $request->description;
        $model->sort_order = $request->sort_order ?? 0;
        $model->has_other_text = $request->boolean('has_other_text');
        $model->status = $request->status ?? '1';

        if ($request->hasFile('image')) {
            $this->deleteImage($model->image);
            $model->image = $this->uploadImage($request);
        }

        $model->save();
        $this->syncOptionsFromText($model, $request->input('options_text'));

        return redirect()->route('custom_solution_service.index')
            ->with('message', 'Service updated successfully!');
    }

    public function destroy($id)
    {
        $model = CustomSolutionService::find($id);
        if (!$model) {
            return response()->json(['message' => 'Failed'], 404);
        }

        $this->deleteImage($model->image);
        $model->delete();

        return true;
    }

    /**
     * Replace options from textarea (one option per line).
     */
    private function syncOptionsFromText(CustomSolutionService $service, ?string $optionsText): void
    {
        $lines = collect(preg_split("/\r\n|\n|\r/", (string) $optionsText))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values();

        // Keep it simple and flexible: wipe & recreate from editor text
        $service->options()->delete();

        foreach ($lines as $i => $title) {
            CustomSolutionOption::create([
                'custom_solution_service_id' => $service->id,
                'title' => Str::limit($title, 150, ''),
                'sort_order' => $i + 1,
                'status' => '1',
            ]);
        }
    }

    private function uploadImage(Request $request): ?string
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $relativeDir = 'assets/website/images/custom-solution';
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
        if (!$path) {
            return;
        }

        // Only delete uploaded custom-solution images, never seed asset paths
        if (!Str::contains($path, 'custom-solution/')) {
            return;
        }

        if (file_exists(public_path($path))) {
            @unlink(public_path($path));
        }
    }
}
