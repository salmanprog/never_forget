<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GustoOption;
use App\Models\GustoService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GustoServiceController extends Controller
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
            $query = GustoService::withCount('options')->orderBy('sort_order')->orderBy('id');

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            if ($request->status !== 'All' && $request->status !== null && $request->status !== '') {
                $status = $request->status == 2 ? 0 : $request->status;
                $query->where('status', $status);
            }

            $models = $query->paginate(10);

            return (string) view('admin.gusto_service.search', compact('models'));
        }

        return view('admin.gusto_service.index', [
            'models' => GustoService::withCount('options')->orderBy('sort_order')->orderBy('id')->paginate(10),
            'page_title' => 'Gusto Services',
        ]);
    }

    public function create()
    {
        return view('admin.gusto_service.create', [
            'page_title' => 'Add Gusto Service',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'options_text' => 'nullable|string',
        ]);

        $model = new GustoService();
        $model->title = $request->title;
        $model->slug = GustoService::makeUniqueSlug($request->title);
        $model->description = $request->description;
        $model->sort_order = $request->sort_order ?? 0;
        $model->status = $request->status ?? '1';
        $model->save();

        $this->syncOptionsFromText($model, $request->input('options_text'));

        return redirect()->route('gusto_service.index')
            ->with('message', 'Gusto service added successfully!');
    }

    public function edit($id)
    {
        $model = GustoService::with('options')->findOrFail($id);

        return view('admin.gusto_service.edit', [
            'page_title' => 'Edit Gusto Service',
            'model' => $model,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'options_text' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $model = GustoService::findOrFail($id);
        $model->title = $request->title;
        $model->slug = GustoService::makeUniqueSlug($request->title, $model->id);
        $model->description = $request->description;
        $model->sort_order = $request->sort_order ?? 0;
        $model->status = $request->status ?? '1';
        $model->save();

        $this->syncOptionsFromText($model, $request->input('options_text'));

        return redirect()->route('gusto_service.index')
            ->with('message', 'Gusto service updated successfully!');
    }

    public function destroy($id)
    {
        $model = GustoService::find($id);
        if (!$model) {
            return response()->json(['message' => 'Failed'], 404);
        }

        $model->delete();

        return true;
    }

    private function syncOptionsFromText(GustoService $service, ?string $optionsText): void
    {
        $lines = collect(preg_split("/\r\n|\n|\r/", (string) $optionsText))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values();

        $service->options()->delete();

        foreach ($lines as $i => $title) {
            GustoOption::create([
                'gusto_service_id' => $service->id,
                'title' => Str::limit($title, 150, ''),
                'sort_order' => $i + 1,
                'status' => '1',
            ]);
        }
    }
}
