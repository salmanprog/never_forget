<?php

namespace App\Http\Controllers\admin;

use App\Models\Collaborator;
use App\Models\CollaboratorFaq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollaboratorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:collaborator-list|collaborator-create|collaborator-edit|collaborator-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:collaborator-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:collaborator-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:collaborator-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Collaborator::orderby('sort_order')->orderby('id', 'desc')->where('id', '>', 0);
            if ($request['search'] != "") {
                $query->where('title', 'like', '%' . $request['search'] . '%');
            }
            if ($request['status'] != "All") {
                if ($request['status'] == 2) {
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.collaborators.search', compact('models'));
        }
        $page_title = 'All Collaborators';
        $models = Collaborator::orderby('sort_order')->orderby('id', 'desc')->paginate(10);
        return view('admin.collaborators.index', compact("models", "page_title"));
    }

    public function create()
    {
        $page_title = 'Add Collaborator';
        return view('admin.collaborators.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp,svg|max:10000',
            'short_description' => 'nullable|string|max:500',
            'overview' => 'nullable|string',
            'services_text' => 'nullable|string',
            'features_text' => 'nullable|string',
            'benefits_text' => 'nullable|string',
            'industries_text' => 'nullable|string',
            'why_choose' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'faq_questions' => 'nullable|array',
            'faq_answers' => 'nullable|array',
        ]);

        $model = new Collaborator();
        $model->created_by = Auth::user()->id;
        $this->fillCollaborator($model, $request);
        $model->save();
        $this->syncFaqs($model, $request);

        return redirect()->route('collaborator.index')->with('message', 'Collaborator Added Successfully !');
    }

    public function edit($id)
    {
        $page_title = 'Edit Collaborator';
        $model = Collaborator::with('faqs')->where('id', $id)->firstOrFail();
        return view('admin.collaborators.edit', compact('model', 'page_title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:150',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp,svg|max:10000',
            'short_description' => 'nullable|string|max:500',
            'overview' => 'nullable|string',
            'services_text' => 'nullable|string',
            'features_text' => 'nullable|string',
            'benefits_text' => 'nullable|string',
            'industries_text' => 'nullable|string',
            'why_choose' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|in:0,1',
            'faq_questions' => 'nullable|array',
            'faq_answers' => 'nullable|array',
        ]);

        $model = Collaborator::where('id', $id)->firstOrFail();
        $this->fillCollaborator($model, $request, true);
        $model->save();
        $this->syncFaqs($model, $request);

        return redirect()->route('collaborator.index')->with('message', 'Collaborator Updated Successfully !');
    }

    public function destroy($id)
    {
        $model = Collaborator::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        }

        return response()->json(['message' => 'Failed '], 404);
    }

    private function fillCollaborator(Collaborator $model, Request $request, bool $isUpdate = false): void
    {
        if ($request->hasFile('image')) {
            $photo = date('YmdHis') . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/admin/assets/images/collaborators'), $photo);
            $model->image = $photo;
        }

        $model->title = $request->title;
        $model->slug = Collaborator::makeUniqueSlug($request->title, $model->id ?? null);
        $model->short_description = $request->short_description;
        $model->overview = $request->overview;
        $model->services = Collaborator::linesToArray($request->input('services_text'));
        $model->features = Collaborator::linesToArray($request->input('features_text'));
        $model->benefits = Collaborator::linesToArray($request->input('benefits_text'));
        $model->industries_served = Collaborator::linesToArray($request->input('industries_text'));
        $model->why_choose = $request->why_choose;
        $model->sort_order = (int) ($request->sort_order ?? 0);

        if ($isUpdate) {
            $model->status = $request->status ?? $model->status;
        } else {
            $model->status = $request->status ?? '1';
        }
    }

    private function syncFaqs(Collaborator $collaborator, Request $request): void
    {
        $questions = $request->input('faq_questions', []);
        $answers = $request->input('faq_answers', []);

        $collaborator->faqs()->delete();

        foreach ($questions as $i => $question) {
            $question = trim((string) $question);
            $answer = trim((string) ($answers[$i] ?? ''));
            if ($question === '') {
                continue;
            }

            CollaboratorFaq::create([
                'collaborator_id' => $collaborator->id,
                'question' => $question,
                'answer' => $answer,
                'sort_order' => $i + 1,
                'status' => '1',
            ]);
        }
    }
}
