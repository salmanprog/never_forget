<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Catering;
use App\Models\Faq;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\WhyChooseUs;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\Variations;
use App\Models\Favorite;
use App\Models\CareerCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Career;
use App\Models\Collaborator;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Company;
use App\Models\BalloonsCategory;
use App\Models\BalloonsEnquiry;
use App\Models\BalloonEnquiryItem;
use App\Models\PerfectGiftCategory;
use App\Models\PerfectGiftEnquiry;
use App\Models\PerfectGiftEnquiryItem;
use App\Models\ECardEnquiry;
use App\Models\Enquires;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


use DB;

class WebController extends Controller
{
    public function index()
    {
        $page_title = 'Home || Never Forget';
        $abouts = AboutUs::where('status', 1)->first();
        $testimonials = Testimonial::where('status',  1)->get();
        $products = Product::where('status', 1)->get();
        $questions = Faq::where('status', 1)->get();
        $chooseus = WhyChooseUs::where('status', 1)->get();
        $collaborators = Collaborator::where('status', 1)->get();
        $categories = Category::with(['products' => function ($query) {
            $query->where('status', 1);  // Only get active products
        }])->where('status', 1)->get();
        $products = Product::orderby('id', 'ASC')->where('status', 1)->get();
        return view('website.index', compact('page_title', 'abouts', 'products', 'testimonials', 'questions', 'chooseus', 'categories', 'products', 'collaborators'));
    }

    public function aboutUs()
    {
        $page_title = 'About Us || Never Forget';
        $abouts = AboutUs::where('status',  1)->first();
        $collaborators = Collaborator::where('status', 1)->get();
        return view('website.about-us', compact('abouts', 'page_title', 'collaborators'));
    }

    public function corporateSolutions()
    {
        $page_title = 'Corporate Solutions || Never Forget';
        $corporatesolutions = AboutUs::where('status',  1)->first();
        return view('website.corporate-solutions', compact('corporatesolutions', 'page_title'));
    }

    public function testimonials()
    {
        $page_title = 'Testimonials || Never Forget';
        $testimonials = Testimonial::where('status',  1)->get();
        $videos = Testimonial::where('status',  1)->where('video', '!=', null)->get();
        return view('website.testimonials', compact('testimonials', 'page_title', 'videos'));
    }

    public function blogs()
    {
        $page_title = 'Blogs || Never Forget';
        // Show only first 3 blogs initially
        $blogs = Blog::where('status', '1')->orderBy('id', 'desc')->take(3)->get();
        $totalBlogs = Blog::where('status', '1')->count();
        return view('website.blogs', compact('page_title', 'blogs', 'totalBlogs'));
    }

    public function loadMoreBlogs(Request $request)
    {
        try {
            $page = $request->get('page', 2); // Start from page 2 since page 1 is already loaded
            $perPage = 3; // Load 3 blogs at a time
            $skip = ($page - 1) * $perPage; // Skip calculation: page 2 = skip 3, page 3 = skip 6, etc.

            $blogs = Blog::where('status', '1')
                ->orderBy('id', 'desc')
                ->skip($skip)
                ->take($perPage)
                ->get();

            $totalBlogs = Blog::where('status', '1')->count();
            $hasMore = ($skip + $perPage) < $totalBlogs;

            $html = '';
            foreach ($blogs as $index => $blog) {
                $imageUrl = $blog->image
                    ? asset('public/admin/assets/posts/' . $blog->image)
                    : asset('public/assets/website/images') . '/blogs/' . (($index % 9) + 1) . '.png';

                $html .= '<div class="col-lg-4 col-md-6">';
                $html .= '<div class="blogs-card-wrapper">';
                $html .= '<img src="' . $imageUrl . '" class="w-100 mb-10" alt="' . htmlspecialchars($blog->title, ENT_QUOTES, 'UTF-8') . '">';
                $html .= '<h5 class="pl-20 heading fs-24 mb-30">' . htmlspecialchars($blog->title, ENT_QUOTES, 'UTF-8') . '</h5>';
                $html .= '<p class="pl-20 blog-text-' . $blog->id . '">';
                $html .= '<span class="truncated-text-' . $blog->id . ' fs-18 secondry-font">';
                $html .= htmlspecialchars(\Illuminate\Support\Str::limit(strip_tags($blog->description), 100), ENT_QUOTES, 'UTF-8') . '...';
                $html .= '</span>';
                $html .= '</p>';
                $html .= '<div class="pl-20 pb-20">';
                $html .= '<a href="' . route('blog-detail', $blog->slug) . '" class="btn primary-btn border-0">View</a>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
            }

            return response()->json([
                'html' => $html,
                'hasMore' => $hasMore,
                'totalLoaded' => $skip + $blogs->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Error loading blogs: ' . $e->getMessage(),
                'html' => '',
                'hasMore' => false
            ], 500);
        }
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', '1')->first();
        if (!$blog) {
            return redirect()->route('blogs')->with('error', 'Blog not found');
        }
        $page_title = $blog->title . ' || Never Forget';
        return view('website.blog-detail', compact('page_title', 'blog'));
    }


    public function shop()
    {

        $wishlistProductIds = [];

        if (auth()->check()) {
            $wishlistProductIds = auth()->user()
                ->wishlists()
                ->pluck('product_id')
                ->toArray();
        }

        $page_title = 'Shop || Never Forget';
        $products = Product::orderby('id', 'ASC')->where('status', 1)->get();
        $categories = Category::with(['products' => function ($query) {
            $query->where('status', 1);  // Only get active products
        }])->where('status', 1)->get();

        $customer_favorites = Product::whereIn('id', function ($query) {
            $query->select('product_id')
                ->from('favorites')
                ->where('status', 1);
        })->where('status', 1)->get();

        $balloons = BalloonsCategory::all();
        $perfectGifts = PerfectGiftCategory::all();

        $addedBalloonIds = [];
        if (auth()->check()) {
            $addedBalloonIds = BalloonEnquiryItem::where('user_id', auth()->id())->whereNull('enquiry_id')->pluck('balloon_id')->toArray();
        } elseif (session()->has('guest_token')) {
            $addedBalloonIds = BalloonEnquiryItem::where('guest_token', session('guest_token'))->whereNull('enquiry_id')->pluck('balloon_id')->toArray();
        }

        $addedPerfectGiftIds = [];
        if (auth()->check()) {
            $addedPerfectGiftIds = PerfectGiftEnquiryItem::where('user_id', auth()->id())->whereNull('enquiry_id')->pluck('perfect_gift_id')->toArray();
        } elseif (session()->has('guest_token')) {
            $addedPerfectGiftIds = PerfectGiftEnquiryItem::where('guest_token', session('guest_token'))->whereNull('enquiry_id')->pluck('perfect_gift_id')->toArray();
        }
        return view('website.shop', compact('page_title', 'categories', 'products', 'customer_favorites', 'wishlistProductIds', 'balloons', 'addedBalloonIds', 'perfectGifts', 'addedPerfectGiftIds'));
        
    }

    public function createEcard()
    {
        $page_title = 'Create E-Card || Never Forget';
        return view('website.create-e-card', compact('page_title'));
    }

    public function storeEcard(Request $request)
    {
        $rules = [
            'occasion' => 'required|string|max:100',
            'recipient_name' => 'required|string|max:255',
            'recipient_email_phone' => 'required|string|max:255',
            'send_date' => 'required|date|after_or_equal:today',
            'send_time' => 'required',
            'physical_gift' => 'required|in:Yes,No',
            'upload_logo_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ];
        if (!auth()->check()) {
            $rules['sender_name'] = 'required|string|max:255';
            $rules['sender_email'] = 'required|email';
        }
        $request->validate($rules);

        $uploadPath = null;
        if ($request->hasFile('upload_logo_photo')) {
            $file = $request->file('upload_logo_photo');
            $name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $file->move(public_path('e_card_uploads'), $name);
            $uploadPath = 'e_card_uploads/' . $name;
        }

        $user = auth()->user();
        $data = [
            'occasion' => $request->occasion,
            'recipient_name' => $request->recipient_name,
            'recipient_email_phone' => $request->recipient_email_phone,
            'message' => $request->message,
            'card_style' => $request->card_style,
            'upload_logo_photo' => $uploadPath,
            'send_date' => $request->send_date,
            'send_time' => $request->send_time,
            'physical_gift' => $request->physical_gift,
            'physical_gift_type' => $request->physical_gift === 'Yes' ? $request->physical_gift_type : null,
            'user_id' => $user ? $user->id : null,
        ];
        if ($user) {
            $data['sender_name'] = trim($user->name . ' ' . ($user->last_name ?? ''));
            $data['sender_email'] = $user->email;
            $data['sender_phone'] = $user->phone;
            $data['company_name'] = optional($user->company)->name;
        } else {
            $data['sender_name'] = $request->sender_name;
            $data['sender_email'] = $request->sender_email;
            $data['sender_phone'] = $request->sender_phone;
            $data['company_name'] = $request->company_name;
        }

        ECardEnquiry::create($data);

        $senderEmail = $data['sender_email'];
        if ($senderEmail) {
            try {
                $details = [
                    'from' => 'e-card-confirmation',
                    'sender_name' => $data['sender_name'],
                    'occasion' => $data['occasion'],
                    'recipient_name' => $data['recipient_name'],
                    'recipient_email_phone' => $data['recipient_email_phone'],
                    'send_date' => \Carbon\Carbon::parse($data['send_date'])->format('d M Y'),
                    'send_time' => \Carbon\Carbon::parse($data['send_time'])->format('h:i A'),
                    'card_style' => $data['card_style'],
                ];
                \Mail::to($senderEmail)->send(new \App\Mail\Email($details));
            } catch (\Exception $e) {
                \Log::error('E-Card confirmation email failed: ' . $e->getMessage());
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Your E-Card enquiry has been submitted successfully.',
        ]);
    }

    public function myEcardEnquiries(Request $request)
    {
        $page_title = 'E-Card Enquiry';
        $query = ECardEnquiry::where('user_id', auth()->id())->latest();

        if ($request->ajax()) {
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('recipient_name', 'like', '%' . $search . '%')
                        ->orWhere('recipient_email_phone', 'like', '%' . $search . '%')
                        ->orWhere('occasion', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            }
            $enquiries = $query->paginate(10);
            return (string) view('admin.my-e-card-enquiries.partials.table', compact('enquiries'));
        }

        $enquiries = $query->paginate(10);
        return view('admin.my-e-card-enquiries.index', compact('page_title', 'enquiries'));
    }

    /**
     * Individual's own balloon enquiries (Name, Email, Phone, Message, Date only - no Action/Contacts).
     * Show enquiries linked via items (user_id) OR by logged-in user's email (saved on enquiry when submitted).
     */
    public function myBalloonEnquiries(Request $request)
    {
        $page_title = 'Balloons Enquiry';
        $user = auth()->user();
        $query = BalloonsEnquiry::with(['items.balloon'])
            ->where('is_submitted', 1)
            ->where(function ($q) use ($user) {
                $q->whereHas('items', function ($q2) {
                    $q2->where('user_id', auth()->id());
                });
                if ($user && $user->email) {
                    $q->orWhere('email', $user->email);
                }
            })
            ->latest();

        $balloonEnquiries = $query->paginate(10);

        if ($request->ajax()) {
            return view('website.individual-dashboard.balloon-enquiries-partials.table', compact('balloonEnquiries'))->render();
        }

        return view('website.individual-dashboard.balloon-enquiries', compact('page_title', 'balloonEnquiries'));
    }

    /**
     * Individual's own perfect gift enquiries (Name, Email, Phone, Business Type, Message, Date only - no Action/Contacts).
     * Show enquiries linked via items (user_id) OR by logged-in user's email (saved on enquiry when submitted).
     */
    public function myPerfectGiftEnquiries(Request $request)
    {
        $page_title = 'Perfect Gift Enquiry';
        $user = auth()->user();
        $query = PerfectGiftEnquiry::with(['items.perfectGift'])
            ->where('is_submitted', 1)
            ->where(function ($q) use ($user) {
                $q->whereHas('items', function ($q2) {
                    $q2->where('user_id', auth()->id());
                });
                if ($user && $user->email) {
                    $q->orWhere('email', $user->email);
                }
            })
            ->latest();

        $perfectGiftEnquiries = $query->paginate(10);

        if ($request->ajax()) {
            return view('website.individual-dashboard.perfect-gift-enquiries-partials.table', compact('perfectGiftEnquiries'))->render();
        }

        return view('website.individual-dashboard.perfect-gift-enquiries', compact('page_title', 'perfectGiftEnquiries'));
    }

    /**
     * Individual's own business card orders (Order No#, Product, Price, Date only - no Action/Contacts).
     */
    public function myBusinessCardOrders(Request $request)
    {
        $page_title = 'Business Card Order';
        $query = Order::with(['hasOrderDetails' => function ($q) {
            $q->with('productsItem');
        }])
            ->where('customer_id', auth()->id())
            ->whereHas('orderDetails', function ($q) {
                $q->where('product_type', 'business_card');
            })
            ->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $query->where('order_number', 'like', '%' . $request->input('search') . '%');
        }

        $models = $query->paginate(10)->withPath(route('member.business-card-orders'))->withQueryString();

        if ($request->ajax()) {
            return view('website.individual-dashboard.business-card-orders-partials.table', compact('models'))->render();
        }

        return view('website.individual-dashboard.business-card-orders', compact('page_title', 'models'));
    }

    /**
     * Individual's own quality logo enquiries (Product Name, Name, Email, Phone, Message, Date - no Action/Contacts).
     */
    public function myQualityLogoEnquiries(Request $request)
    {
        $page_title = 'Quality Logo Enquiry';
        $user = auth()->user();
        $query = Enquires::where('identifier', 'quality_logo')
            ->where(function ($q) use ($user) {
                if ($user && $user->email) {
                    $q->where('user_id', $user->id)->orWhere('email', $user->email);
                } else {
                    $q->where('user_id', auth()->id());
                }
            })
            ->latest();

        $enquiries = $query->paginate(10);

        if ($request->ajax()) {
            return view('website.individual-dashboard.quality-logo-enquiries-partials.table', compact('enquiries'))->render();
        }

        return view('website.individual-dashboard.quality-logo-enquiries', compact('page_title', 'enquiries'));
    }

    /**
     * Individual's own journey expert enquiries (Name, Email, Phone, Message, Date - no Action/Contacts).
     */
    public function myJourneyExpertEnquiries(Request $request)
    {
        $page_title = 'Journey Expert Enquiry';
        $user = auth()->user();
        $query = Enquires::where('identifier', 'journey_expert')
            ->where(function ($q) use ($user) {
                if ($user && $user->email) {
                    $q->where('user_id', $user->id)->orWhere('email', $user->email);
                } else {
                    $q->where('user_id', auth()->id());
                }
            })
            ->latest();

        $enquiries = $query->paginate(10);

        if ($request->ajax()) {
            return view('website.individual-dashboard.journey-expert-enquiries-partials.table', compact('enquiries'))->render();
        }

        return view('website.individual-dashboard.journey-expert-enquiries', compact('page_title', 'enquiries'));
    }

    /**
     * Get user IDs that belong to the current user's company (admin + users with company_id).
     * Used for Company role to filter enquiries to only those submitted by someone in the company.
     */
    protected function getCompanyUserIds(): array
    {
        $user = auth()->user();
        $company = $user->company ?? $user->administeredCompany;
        if (!$company) {
            return [];
        }
        return collect([$company->admin_user_id])
            ->merge(User::where('company_id', $company->id)->pluck('id'))
            ->unique()
            ->filter()
            ->values()
            ->all();
    }

    /**
     * Company's own balloon enquiries (same UI as Individual, filtered by company user ids).
     */
    public function companyBalloonEnquiries(Request $request)
    {
        $page_title = 'Balloons Enquiry';
        $companyUserIds = $this->getCompanyUserIds();
        if (empty($companyUserIds)) {
            $balloonEnquiries = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
            if ($request->ajax()) {
                return view('website.individual-dashboard.balloon-enquiries-partials.table', compact('balloonEnquiries'))->render();
            }
            $page_url = route('company.balloon-enquiries');
            return view('website.individual-dashboard.balloon-enquiries', compact('page_title', 'balloonEnquiries', 'page_url'));
        }

        $user = auth()->user();
        $query = BalloonsEnquiry::with(['items.balloon'])
            ->where('is_submitted', 1)
            ->where(function ($q) use ($companyUserIds, $user) {
                $q->whereHas('items', function ($q2) use ($companyUserIds) {
                    $q2->whereIn('user_id', $companyUserIds);
                });
                if ($user && $user->email) {
                    $q->orWhere('email', $user->email);
                }
            })
            ->latest();

        $balloonEnquiries = $query->paginate(10)->withPath(route('company.balloon-enquiries'));

        if ($request->ajax()) {
            return view('website.individual-dashboard.balloon-enquiries-partials.table', compact('balloonEnquiries'))->render();
        }

        $page_url = route('company.balloon-enquiries');
        return view('website.individual-dashboard.balloon-enquiries', compact('page_title', 'balloonEnquiries', 'page_url'));
    }

    /**
     * Company's own perfect gift enquiries (same UI as Individual, filtered by company user ids).
     */
    public function companyPerfectGiftEnquiries(Request $request)
    {
        $page_title = 'Perfect Gift Enquiry';
        $companyUserIds = $this->getCompanyUserIds();
        if (empty($companyUserIds)) {
            $perfectGiftEnquiries = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
            if ($request->ajax()) {
                return view('website.individual-dashboard.perfect-gift-enquiries-partials.table', compact('perfectGiftEnquiries'))->render();
            }
            $page_url = route('company.perfect-gift-enquiries');
            return view('website.individual-dashboard.perfect-gift-enquiries', compact('page_title', 'perfectGiftEnquiries', 'page_url'));
        }

        $user = auth()->user();
        $query = PerfectGiftEnquiry::with(['items.perfectGift'])
            ->where('is_submitted', 1)
            ->where(function ($q) use ($companyUserIds, $user) {
                $q->whereHas('items', function ($q2) use ($companyUserIds) {
                    $q2->whereIn('user_id', $companyUserIds);
                });
                if ($user && $user->email) {
                    $q->orWhere('email', $user->email);
                }
            })
            ->latest();

        $perfectGiftEnquiries = $query->paginate(10)->withPath(route('company.perfect-gift-enquiries'));

        if ($request->ajax()) {
            return view('website.individual-dashboard.perfect-gift-enquiries-partials.table', compact('perfectGiftEnquiries'))->render();
        }

        $page_url = route('company.perfect-gift-enquiries');
        return view('website.individual-dashboard.perfect-gift-enquiries', compact('page_title', 'perfectGiftEnquiries', 'page_url'));
    }

    /**
     * Company's own business card orders (same UI as Individual, filtered by company user ids).
     */
    public function companyBusinessCardOrders(Request $request)
    {
        $page_title = 'Business Card Order';
        $companyUserIds = $this->getCompanyUserIds();
        if (empty($companyUserIds)) {
            $models = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
            if ($request->ajax()) {
                return view('website.individual-dashboard.business-card-orders-partials.table', compact('models'))->render();
            }
            $page_url = route('company.business-card-orders');
            return view('website.individual-dashboard.business-card-orders', compact('page_title', 'models', 'page_url'));
        }

        $query = Order::with(['hasOrderDetails' => function ($q) {
            $q->with('productsItem');
        }])
            ->whereIn('customer_id', $companyUserIds)
            ->whereHas('orderDetails', function ($q) {
                $q->where('product_type', 'business_card');
            })
            ->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $query->where('order_number', 'like', '%' . $request->input('search') . '%');
        }

        $models = $query->paginate(10)->withPath(route('company.business-card-orders'))->withQueryString();

        if ($request->ajax()) {
            return view('website.individual-dashboard.business-card-orders-partials.table', compact('models'))->render();
        }

        $page_url = route('company.business-card-orders');
        return view('website.individual-dashboard.business-card-orders', compact('page_title', 'models', 'page_url'));
    }

    /**
     * Company's own quality logo enquiries (same UI as Individual, filtered by company user ids).
     */
    public function companyQualityLogoEnquiries(Request $request)
    {
        $page_title = 'Quality Logo Enquiry';
        $companyUserIds = $this->getCompanyUserIds();
        if (empty($companyUserIds)) {
            $enquiries = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
            if ($request->ajax()) {
                return view('website.individual-dashboard.quality-logo-enquiries-partials.table', compact('enquiries'))->render();
            }
            $page_url = route('company.quality-logo-enquiries');
            return view('website.individual-dashboard.quality-logo-enquiries', compact('page_title', 'enquiries', 'page_url'));
        }

        $query = Enquires::where('identifier', 'quality_logo')
            ->whereIn('user_id', $companyUserIds)
            ->latest();

        $enquiries = $query->paginate(10)->withPath(route('company.quality-logo-enquiries'));

        if ($request->ajax()) {
            return view('website.individual-dashboard.quality-logo-enquiries-partials.table', compact('enquiries'))->render();
        }

        $page_url = route('company.quality-logo-enquiries');
        return view('website.individual-dashboard.quality-logo-enquiries', compact('page_title', 'enquiries', 'page_url'));
    }

    /**
     * Company's own journey expert enquiries (same UI as Individual, filtered by company user ids).
     */
    public function companyJourneyExpertEnquiries(Request $request)
    {
        $page_title = 'Journey Expert Enquiry';
        $companyUserIds = $this->getCompanyUserIds();
        if (empty($companyUserIds)) {
            $enquiries = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
            if ($request->ajax()) {
                return view('website.individual-dashboard.journey-expert-enquiries-partials.table', compact('enquiries'))->render();
            }
            $page_url = route('company.journey-expert-enquiries');
            return view('website.individual-dashboard.journey-expert-enquiries', compact('page_title', 'enquiries', 'page_url'));
        }

        $query = Enquires::where('identifier', 'journey_expert')
            ->whereIn('user_id', $companyUserIds)
            ->latest();

        $enquiries = $query->paginate(10)->withPath(route('company.journey-expert-enquiries'));

        if ($request->ajax()) {
            return view('website.individual-dashboard.journey-expert-enquiries-partials.table', compact('enquiries'))->render();
        }

        $page_url = route('company.journey-expert-enquiries');
        return view('website.individual-dashboard.journey-expert-enquiries', compact('page_title', 'enquiries', 'page_url'));
    }

    public function createBalloonEnquiryItem(Request $request)
    {
        if (!session()->has('guest_token')) {
            session(['guest_token' => Str::uuid()->toString()]);
        }

        BalloonEnquiryItem::create([
            'user_id' => auth()->id(),
            'guest_token' => auth()->check() ? null : session('guest_token'),
            'balloon_id' => $request->balloon_id,
            'quantity' => 1,
        ]);
        return response()->json( [
            'success' => true,
            'message' => 'Balloon enquiry item created successfully',
        ]);
        // return redirect()->route('balloon-items')->with('success', 'Balloon enquiry item created successfully');
    }

    public function balloonItems()
    {
        $page_title = 'Balloon Item || Never Forget';

        $enquiries = BalloonEnquiryItem::with(['balloon', 'enquiry'])
            ->where(function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->id());
                } else {
                    $query->where('guest_token', session('guest_token'));
                }
            })
            ->whereNull('enquiry_id')
            ->get();

        return view('website.balloon-items', compact(
            'page_title',
            'enquiries'
        ));
    }



    public function storeBalloonEnquiry(Request $request)
    {
        if (!auth()->check()) {
            $request->validate([
                'user_name'  => 'required|string|max:100',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:20',
            ]);
        };

        $user = auth()->user();
        $enquiry = BalloonsEnquiry::create([
            'message' => $request->message,
            'is_submitted' => 1,
            'user_name' => $user ? $user->name : $request->user_name,
            'email'     => $user ? $user->email : $request->email,
            'phone' => $user ? $user->phone : $request->phone,
        ]);

        $itemsId = explode(',', $request->balloon_ids);
        foreach ($itemsId as $itemId) {
            $query = BalloonEnquiryItem::where('balloon_id', $itemId)->whereNull('enquiry_id');
            if (auth()->check()) {
                $query->where('user_id', auth()->id());
            } else {
                $query->where('guest_token', session('guest_token'));
            }
            $item = $query->first();
            if ($item) {
                $item->update([
                    'enquiry_id' => $enquiry->id,
                ]);
            }
        }

        $senderEmail = $enquiry->email;
        if ($senderEmail) {
            try {
                $enquiry->load(['items.balloon']);
                $itemsSummary = $enquiry->items->map(function ($item) {
                    return $item->balloon ? ($item->balloon->title . ' (Qty: ' . $item->quantity . ')') : '';
                })->filter()->implode(', ');
                $confirmationDetails = [
                    'from' => 'balloon-confirmation',
                    'sender_name' => $enquiry->user_name,
                    'email' => $enquiry->email,
                    'phone' => $enquiry->phone,
                    'message' => $enquiry->message,
                    'items_summary' => $itemsSummary ?: '—',
                ];
                \Mail::to($senderEmail)->send(new \App\Mail\Email($confirmationDetails));
            } catch (\Throwable $e) {
                \Log::error('Balloon confirmation email failed: ' . $e->getMessage(), [
                    'exception' => $e->getTraceAsString(),
                    'recipient' => $senderEmail,
                ]);
            }
        }

        return redirect()->route('balloon-items');
    }

    public function destroyBalloonEnquiry($id)
    {

        $enquiryItem = BalloonEnquiryItem::findOrFail($id);

        if (!$enquiryItem) {
            return response()->json([
                'success' => false,
                'message' => 'Record not found'
            ]);
        }
        $enquiryItem->delete();


        return response()->json([
            'success' => true,
            'message' => 'Item Successfully Removed',
        ]);
    }

    public function submitBalloonEnquiry(Request $request)
    {


        $balloon_ids = $request->balloon_ids;
        $quantity = $request->quantity;
        $enquiry_id = $request->enquiry_id;
        $message = $request->message;
        $quantities = $request->quantity;
        $enquiry = BalloonEnquiryItem::where('enquiry_id', $enquiry_id)->first();
        if ($enquiry) {
            $enquiry->update([
                'message' => $message,
                'is_submitted' => 1,
            ]);
        }

        $balloon_ids = explode(',', $balloon_ids);
        foreach ($balloon_ids as $balloon_id) {
            BalloonEnquiryItem::where('enquiry_id', $enquiry_id)->update([
                'quantity' => $quantity,
            ]);
        }
        BalloonEnquiryItem::where('enquiry_id', $enquiry_id)->delete();
        // return redirect()->route('balloon-items');
        return response()->json([
            'success' => true,
            'message' => 'Your Enquiry Submitted Successfully',
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        BalloonEnquiryItem::where('id', $request->id)
            ->update([
                'quantity' => $request->quantity
            ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function createPerfectGiftEnquiryItem(Request $request)
    {
        if (!session()->has('guest_token')) {
            session(['guest_token' => Str::uuid()->toString()]);
        }

        PerfectGiftEnquiryItem::create([
            'user_id' => auth()->id(),
            'guest_token' => auth()->check() ? null : session('guest_token'),
            'perfect_gift_id' => $request->perfect_gift_id,
            'quantity' => 1,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Perfect Gift enquiry item created successfully',
        ]);
    }

    public function perfectGiftItems()
    {
        $page_title = 'Perfect Gift | Never Forget';

        $enquiries = PerfectGiftEnquiryItem::with(['perfectGift', 'enquiry'])
            ->where(function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->id());
                } else {
                    $query->where('guest_token', session('guest_token'));
                }
            })
            ->whereNull('enquiry_id')
            ->get();

        return view('website.perfect-gift-items', compact('page_title', 'enquiries'));
    }

    public function storePerfectGiftEnquiry(Request $request)
    {
        $request->validate([
            'business_type' => 'required|in:small_business,corporate',
        ]);
        if (!auth()->check()) {
            $request->validate([
                'user_name'  => 'required|string|max:100',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:20',
            ]);
        }

        $user = auth()->user();
        $enquiry = PerfectGiftEnquiry::create([
            'message' => $request->message,
            'is_submitted' => 1,
            'user_name' => $user ? $user->name : $request->user_name,
            'email'     => $user ? $user->email : $request->email,
            'phone' => $user ? $user->phone : $request->phone,
            'business_type' => $request->business_type,
        ]);

        $itemsId = explode(',', $request->perfect_gift_ids);
        foreach ($itemsId as $itemId) {
            $query = PerfectGiftEnquiryItem::where('perfect_gift_id', $itemId)->whereNull('enquiry_id');
            if (auth()->check()) {
                $query->where('user_id', auth()->id());
            } else {
                $query->where('guest_token', session('guest_token'));
            }
            $item = $query->first();
            if ($item) {
                $item->update([
                    'enquiry_id' => $enquiry->id,
                ]);
            }
        }

        $senderEmail = $enquiry->email;
        if ($senderEmail) {
            try {
                $businessTypeLabel = $enquiry->business_type === 'small_business' ? 'Small Business' : ($enquiry->business_type === 'corporate' ? 'Corporate' : $enquiry->business_type);
                $confirmationDetails = [
                    'from' => 'perfect-gift-confirmation',
                    'sender_name' => $enquiry->user_name,
                    'email' => $enquiry->email,
                    'phone' => $enquiry->phone,
                    'message' => $enquiry->message,
                    'business_type_label' => $businessTypeLabel,
                ];
                \Mail::to($senderEmail)->send(new \App\Mail\Email($confirmationDetails));
            } catch (\Throwable $e) {
                \Log::error('Perfect Gift confirmation email failed: ' . $e->getMessage(), [
                    'exception' => $e->getTraceAsString(),
                    'recipient' => $senderEmail,
                ]);
            }
        }

        return redirect()->route('perfect-gift-items');
    }

    public function destroyPerfectGiftEnquiry($id)
    {
        $enquiryItem = PerfectGiftEnquiryItem::findOrFail($id);
        if (!$enquiryItem) {
            return response()->json([
                'success' => false,
                'message' => 'Record not found'
            ]);
        }
        $enquiryItem->delete();
        return response()->json([
            'success' => true,
            'message' => 'Item Successfully Removed',
        ]);
    }

    public function updatePerfectGiftQuantity(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        PerfectGiftEnquiryItem::where('id', $request->id)
            ->update([
                'quantity' => $request->quantity
            ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function Career()
    {
        $page_title = 'Careers || Never Forget';
        $categories = CareerCategory::with(['careers' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'ASC');
        }])->where('status', 1)->get();

        // Get all careers for the "All" tab
        $all_careers = Career::with('hasCategory')->where('status', 1)->orderBy('id', 'ASC')->get();

        return view('website.careers', compact('page_title', 'categories', 'all_careers'));
    }

    public function disclaimer()
    {
        $page_title = 'Disclaimer || Never Forget';
        return view('website.disclaimer', compact('page_title'));
    }
    public function cookiePolicy()
    {
        $page_title = 'Cookie Policy || Never Forget';
        return view('website.cookie-policy', compact('page_title'));
    }
    public function privacyPolicy()
    {
        $page_title = 'Privacy Policy || Never Forget';
        return view('website.privacy-policy', compact('page_title'));
    }

    public function loadMoreCareers(Request $request)
    {
        $page = $request->get('page', 1);
        $perPage = 6; // Adjust as needed

        $careers = Career::with('hasCategory')
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'careers' => $careers->items(),
            'hasMore' => $careers->hasMorePages()
        ]);
    }

    public function loadMoreCategoryCareers(Request $request, $categoryId)
    {
        $page = $request->get('page', 1);
        $perPage = 6; // Adjust as needed

        $careers = Career::with('hasCategory')
            ->where('status', 1)
            ->where('career_category_id', $categoryId)
            ->orderBy('id', 'ASC')
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'careers' => $careers->items(),
            'hasMore' => $careers->hasMorePages()
        ]);
    }

    public function careerApplicationForm(Request $request)
    {
        $page_title = 'Career Application || Never Forget';
        $career_id = $request->get('career_id');
        $career = null;

        if ($career_id) {
            $career = Career::with('hasCategory')->where('id', $career_id)->where('status', 1)->first();
        }

        return view('website.career-application', compact('page_title', 'career'));
    }

    public function howItWorks()
    {
        $page_title = 'How It Works || Never Forget';
        $howitworks = AboutUs::where('status',  1)->first();
        return view('website.how-it-works', compact('howitworks', 'page_title'));
    }


    public function contactus()
    {
        $page_title = 'Contact Us || Never Forget';
        $contactus = ContactUs::where('status', 1)->first();
        return view('website.contact-us', compact('page_title', 'contactus'));
    }

    public function specialOffers()
    {
        $page_title = 'Special Offers || Never Forget';
        $products = Product::where('status', 1)->where('is_special', 1)->get();
        /*  $category = Category::orderby('id', 'ASC')->where('status', 1)->first(); */
        return view('website.special-offers', compact('page_title', 'products'/* ,'category' */));
    }

    public function reviews()
    {
        $page_title = 'Customers Reviews || Never Forget';
        return view('website.reviews', compact('page_title'));
    }


    public function categoryProducts(Request $request)
    {
        $page_title = 'Products';
        $category_id = $request->id;

        if (isset($category_id)) {
            $slugdata = explode('-', $category_id);
            // Check if there are at least two elements in the $slugdata array
            if (count($slugdata) >= 2) {
                $category_id = $slugdata[0];
                $sub_category_id = $slugdata[1];
                $products = Product::orderby('id', 'ASC')->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('status', 1)->paginate(12);
                $category = Category::orderby('id', 'ASC')->where('id', $category_id)->where('status', 1)->first();
                $subcategory = Category::orderby('id', 'ASC')->where('id', $sub_category_id)->where('status', 1)->first();
                // Now you can use $parantslug and $categoryslug as needed
            } else {
                $category_id = $slugdata[0];
                $products = Product::orderby('id', 'ASC')->where('category_id', $category_id)->where('status', 1)->paginate(12);
                $category = Category::orderby('id', 'ASC')->where('id', $category_id)->where('status', 1)->first();
                $subcategory = [];
            }
        }



        if ($request->ajax()) {
            $view = view('website.product-ajax', compact('products'))->render();
            $pagination = $products->links('pagination::bootstrap-4')->toHtml();

            return response()->json([
                'html' => $view,
                'pagination' => $pagination,
            ]);
        }

        return view('website.products', compact('category', 'subcategory', 'products', 'page_title'));
    }

    public function searchProducts(Request $request)
    {
        $page_title = 'Search Products';
        $products = Product::orderby('id', 'ASC')->where('name', 'like', '%' . $request->search . '%')->where('status', 1)->get();
        return view('website.search-products', compact('products', 'page_title'));
    }

    public function singleProduct($slug)
    {
        $page_title = 'Single Products';
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return redirect()->route('shop')->with('error', 'Product not found');
        }

        $related_products = [];
        if (isset($product->related_product)) {
            $related_p = json_decode($product->related_product);
            foreach ($related_p as $id) {
                $related_products[] = Product::where('id', $id)->first();
            }
        }

        $product_price = $product->product_price;
        $variations = collect([]);
        $variation_id = "";

        if ($product->product_type == 1 && $product->variations) {
            // Get variations from the JSON data
            $variationsData = json_decode($product->variations, true);
            if (!empty($variationsData)) {
                $variations_array = [];
                foreach ($variationsData as $var) {
                    // Get variation name from Variations model
                    $variationName = Variations::where('id', $var['variation_id'])->value('name');
                    $variations_array[] = [
                        'id' => $var['variation_id'],
                        'name' => $variationName ?? 'Unknown Variation',
                        'price' => $var['price'],
                        'image' => $var['image'] ?? null
                    ];
                }
                $variations = collect($variations_array);

                if ($variations->isNotEmpty()) {
                    $firstVariation = $variations->first();
                    $product_price = $firstVariation['price'];
                    $variation_id = $firstVariation['id'];
                }
            }
        }

        return view('website.product-details', compact('product', 'page_title', 'related_products', 'product_price', 'variations', 'variation_id'));
    }

    public function store(Request $request)
    {
        $accountType = $request->account_type ?? 'Individual';

        if ($accountType === 'Individual') {
            return $this->registerIndividual($request);
        } else {
            return $this->registerCompany($request);
        }
    }

    private function registerIndividual(Request $request)
    {
        $this->validate($request, [
            'account_type' => 'required|in:Individual,Company',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
        ]);

        do {
            $verify_token = uniqid();
        } while (User::where('verify_token', $verify_token)->first());

        do {
            $user_id = rand(1000, 9999);
        } while (User::where('user_id', $user_id)->first());

        $user = User::create([
            'name' => $request->first_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'account_type' => 'Individual',
            'verify_token' => $verify_token,
            'user_id' => $user_id,
            'password' => Hash::make($request->password),
            'status' => '0'
        ]);

        $user->assignRole("Individual");

        $details = [
            'from' => 'verify',
            'title' => "Hi " . $request->first_name . ' ' . $request->last_name . ',',
            'body' => "Thanks for creating an account on NEVER FORGET Showing Appreciation. Your username is <b>" . $request->email . "</b>. You can access your account, and more at: ",
            'regard' => 'We look forward to seeing you soon.',
            'account_type' => 'Individual',
            'verify_token' => $verify_token
        ];

        try {
            \Mail::to($user->email)->send(new \App\Mail\Email($details));
            return redirect()->route('login')->with('success', 'Registration successful! Please check your email to verify your account before logging in.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registration successful but email could not be sent. Please contact support.');
        }
    }

    private function registerCompany(Request $request)
    {
        $this->validate($request, [
            'account_type' => 'required|in:Individual,Company',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'company_name' => 'required|string|max:255',
        ]);

        do {
            $verify_token = uniqid();
        } while (User::where('verify_token', $verify_token)->first());

        do {
            $user_id = rand(1000, 9999);
        } while (User::where('user_id', $user_id)->first());

        $user = User::create([
            'name' => $request->first_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'account_type' => 'Company',
            'verify_token' => $verify_token,
            'user_id' => $user_id,
            'password' => Hash::make($request->password),
            'status' => '0'
        ]);

        $user->assignRole("Company");

        $details = [
            'from' => 'verify',
            'title' => "Hi " . $request->first_name . ' ' . $request->last_name . ',',
            'body' => "Thanks for creating a company account on NEVER FORGET Showing Appreciation. Your username is <b>" . $request->email . "</b>. You can access your account area to view orders, and more at: ",
            'regard' => 'We look forward to seeing you soon.',
            'account_type' => 'Company',
            'verify_token' => $verify_token
        ];

        $company_details = Company::create([
            'name' => $request->company_name,
            'website' => 'www.google.com',
            'address' => 'Street 123',
            'industry' => 'ABC Company',
            'billing_email' => $request->email,
            'billing_phone' => $request->phone,
            'admin_user_id' => $user->id
        ]);
        try {
            \Mail::to($user->email)->send(new \App\Mail\Email($details));
            return redirect()->route('login')->with('success', 'Registration successful! Please check your email to verify your account before logging in.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registration successful but email could not be sent. Please contact support.');
        }
    }

    public function verifyEmail($token)
    {
        $user = User::where('verify_token', $token)->first();
        if (!empty($user)) {
            $user->verify_token = null;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->status = '1';
            if (!empty($user->temprary_email)) {
                $user->email = $user->temprary_email;
                $user->temprary_email = null;
            }
            $user->update();

            return redirect()->route('login')->with('success', 'You are welcome. You can login from here.');
        } else {
            return redirect()->back()->with('error', 'Your token is expired');
        }
    }
    public function cartLogin(Request $request)
    {
        Session::put('slug', $request->slug);
        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if (!empty($user) && $user->status == 1) {
            // Customer login form (user_type=User): do not allow admin here; admin must use /admin/login
            if ($user->hasRole('Admin') && $request->input('user_type') !== 'Admin') {
                return redirect()->back()->with('error', 'Please use the admin login page.');
            }
            if (Auth::attempt($credentials)) {
                /** @var User $user */
                $user = Auth::user();

                // Redirect based on role
                if ($user->hasRole('Admin')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('Individual')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('Company')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('Sales Person')) {
                    return redirect()->route('dashboard');
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Unauthorized role.');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to login, try again!');
            }
        } elseif (!empty($user) && $user->status == 0) {
            return redirect()->back()->with('error', 'Your account is not active. Please verify your email.');
        } else {
            return redirect()->back()->with('error', 'User not found!');
        }
    }


    public function logOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('auth.passwords.forgot-password', compact('page_title'));
    }
    public function passwordResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();
        if (empty($user)) {
            return redirect()->back()->with('error', 'Your account not found.');
        } elseif ($user->status != 1) {
            return redirect()->back()->with('error', 'Your account is not verified. We have sent verification email verify first.');
        }
        if (!empty($user) && $user->status == 1 && $user->hasRole('User')) {
            $page_title = 'Change Password';
            do {
                $verify_token = uniqid();
            } while (User::where('verify_token', $verify_token)->first());

            $user->verify_token = $verify_token;
            $user->update();

            $details = [
                'from' => 'password-reset',
                'title' => "Hello!",
                'body' => "You are receiving this email because we received a password reset request for your account.",
                'verify_token' => $user->verify_token,
            ];

            \Mail::to($user->email)->send(new \App\Mail\Email($details));

            return redirect()->route('login')->with('success', 'We have emailed your password reset link!');
        } else {
            return redirect()->back()->with('error', 'You have not allow to access this panel.');
        }
    }
    public function resetPassword($verify_token)
    {
        $page_title = 'Reset Password';
        return view('auth.passwords.change-password', compact('page_title', 'verify_token'));
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:password_confirmation',
        ]);

        $user = User::where('verify_token', $request->verify_token)->where('status', 1)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if ($user) {
            return redirect()->route('login')->with('message', 'You have updated password. You can login now.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        if (!empty($request->current_password)) {
            if (!Hash::check($request->current_password, $userPassword)) {
                return back()->withErrors(['current_password' => 'Current password does not match']);
            } else {
                $request->validate([
                    'current_password' => 'required',
                    'password' => 'required|same:confirm_password|min:6',
                    'confirm_password' => 'required',
                ]);
                $user->password = Hash::make($request->password);
            }
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Profile successfully updated');
    }

    public function sendEmail(Request $request)
    {
        if (!isset($request->type)) {
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
            ]);
        }

        $user = User::where('email', Auth::user()->email)->first();

        do {
            $verify_token = uniqid();
        } while (User::where('verify_token', $verify_token)->first());

        $user->temprary_email = $request->email;
        $user->verify_token = $verify_token;
        $user->update();

        $details = [
            'from' => 'verify',
            'title' => "We have received update email request. First, you need to confirm your account. Just press the button below.",
            'body' => "If you have any questions, just reply to this email—we're always happy to help out.",
            'verify_token' => $user->verify_token,
        ];

        \Mail::to($request->email)->send(new \App\Mail\Email($details));

        return redirect()->back()->with('message', 'We have sent verification email. Click on link and get activation');
    }

    public function billingAddress()
    {
        $address = BillingAddress::where('customer_id', Auth::user()->id)->first();
        return view('website.billing-address', compact('address'));
    }
    public function cartList()
    {
        return redirect()->route('cart.list');
    }
    public function cart()
    {
        $cartItems = Cart::getContent();
        $page_title = 'Cart';
        return view('website.cart', compact('cartItems', 'page_title'));
    }

    public function faqs()
    {
        $page_title = 'FAQs';
        $questions = Faq::where('status', 1)->get();
        return view('website.faqs', compact('questions', 'page_title'));
    }
    public function whyChooseUs()
    {
        $page_title = 'Why Choose Us';
        $chooseus = WhyChooseUs::where('status', 1)->get();
        return view('website.why-choose-us', compact('chooseus', 'page_title'));
    }

    public function lostPassword()
    {
        return view('website.lost-password');
    }

    public function shippingAddress()
    {
        $shipping = ShippingAddress::where('customer_id', Auth::user()->id)->first();
        return view('website.shipping-address', compact('shipping'));
    }

    public function termsAndConditions()
    {
        return view('website.terms-and-conditions');
    }


    public function orderDetail($id)
    {
        $orders = Order::where('customer_id', Auth::user()->id)->where('id', $id)->orderby('id', 'desc')->first();
        $address = BillingAddress::where('customer_id', Auth::user()->id)->where('id', $orders->billing_address_id)->orderby('id', 'desc')->first();
        return view('website.order-details', compact('orders', 'address'));
    }

    public function getProductId()
    {
        $product_ids = Product::where('status', 1)->get(['id', 'draw_ends']);
        return response()->json($product_ids);
    }

    public function shareEmail(Request $request)
    {

        $slug = $request->product_email_slug;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->your_email;
        $to_email = $request->to_email;
        $product = Product::where('slug', $slug)->first();
        $details = [
            'from' => 'share-email',
            'first_name' => $first_name,
            'last_name' => $last_name,
            'from-email' => $email,
            'to_email' => $to_email,
            'product_slug' => $slug,
            'product_image' => $product->image,
        ];

        \Mail::to($to_email)->send(new \App\Mail\Email($details));

        return redirect()->back()->with('share-email-success', 'Email sent successfully to your friend.');
    }

    public function getSizesPrice($id)
    {
        $sizesprice = Variations::where('id', $id)->first('price');
        return array('sizesprice' => $sizesprice);
    }

    public function loadMoreProducts(Request $request)
    {
        $page = $request->get('page', 1);
        $perPage = 3; // Load 3 products at a time
        $skip = ($page - 1) * $perPage;

        $products = Product::where('status', 1)
            ->orderBy('id', 'ASC')
            ->skip($skip)
            ->take($perPage)
            ->get()
            ->map(function ($product) {
                // Format price based on product type
                if ($product->product_type == 0) {
                    // Simple product
                    $product->formatted_price = '$' . number_format($product->product_price, 2);
                } else {
                    // Variable product - get prices from variations
                    $variations = json_decode($product->variations, true);
                    if ($variations && count($variations) > 0) {
                        $prices = array_column($variations, 'price');
                        $minPrice = min($prices);
                        $maxPrice = max($prices);
                        $product->formatted_price = '$' . number_format($minPrice, 2) . ' – $' . number_format($maxPrice, 2);
                    } else {
                        $product->formatted_price = 'N/A';
                    }
                }
                return $product;
            });

        return response()->json([
            'products' => $products
        ]);
    }

    public function loadMoreCategoryProducts(Request $request, $categoryId)
    {
        $page = $request->get('page', 1);
        $perPage = 3; // Load 3 products at a time
        $skip = ($page - 1) * $perPage;

        $products = Product::where('status', 1)
            ->where('category_id', $categoryId)
            ->orderBy('id', 'ASC')
            ->skip($skip)
            ->take($perPage)
            ->get()
            ->map(function ($product) {
                // Format price based on product type
                if ($product->product_type == 0) {
                    // Simple product
                    $product->formatted_price = '$' . number_format($product->product_price, 2);
                } else {
                    // Variable product - get prices from variations
                    $variations = json_decode($product->variations, true);
                    if ($variations && count($variations) > 0) {
                        $prices = array_column($variations, 'price');
                        $minPrice = min($prices);
                        $maxPrice = max($prices);
                        $product->formatted_price = '$' . number_format($minPrice, 2) . ' – $' . number_format($maxPrice, 2);
                    } else {
                        $product->formatted_price = 'N/A';
                    }
                }
                return $product;
            });

        return response()->json([
            'products' => $products
        ]);
    }

    public function send_inquiry(Request $request)
    {
        if (auth()->check()) {
            $request->merge([
                'name' => $request->input('name') ?: (auth()->user()->name ?? ''),
                'email' => $request->input('email') ?: (auth()->user()->email ?? ''),
                'phone' => $request->input('phone') ?: (auth()->user()->phone ?? ''),
            ]);
        }

        $identifier = trim((string) ($request->input('identifier') ?? ''));

        if ($identifier === 'quality_logo') {
            $rules = [
                'title' => 'required|string|max:100',
                'name' => 'required|string|max:100',
                'email' => 'required|email',
                'phone' => (auth()->check() ? 'nullable|' : 'required|') . 'string|max:20',
                'message' => 'required|string|max:500',
                'product' => 'nullable|string|max:255',
            ];
        } elseif ($identifier === 'journey_expert') {
            // Form shows either (cruise/tour: duration + destination) OR (all_inclusive: country + amenity + budget)
            $rules = [
                'title' => 'required|string|max:100',
                'name' => 'required|string|max:100',
                'email' => 'required|email',
                'phone' => (auth()->check() ? 'nullable|' : 'nullable|') . 'string|max:20',
                'message' => 'required|string|max:500',
                'travel_type' => 'required|string|in:cruise,tour,all_inclusive',
                'date' => 'required|string|max:100',
            ];
            $travelType = $request->input('travel_type');
            if ($travelType === 'all_inclusive') {
                $rules['country'] = 'required|string|max:100';
                $rules['amenity'] = 'required|string|max:100';
                $rules['budget'] = 'required|string|max:100';
                $rules['duration'] = 'nullable|string|max:100';
                $rules['destination'] = 'nullable|string|max:100';
            } else {
                $rules['duration'] = 'required|string|max:100';
                $rules['destination'] = 'required|string|max:100';
                $rules['country'] = 'nullable|string|max:100';
                $rules['amenity'] = 'nullable|string|max:100';
                $rules['budget'] = 'nullable|string|max:100';
            }
        } else {
            $rules = [
                'title' => 'required|string|max:100',
                'name' => 'required|string|max:100',
                'email' => 'required|email',
                'phone' => (auth()->check() ? 'nullable|' : 'required|') . 'string|max:20',
                'message' => 'required|string|max:500',
                'travel_type' => 'required|string|max:100',
                'duration' => 'required|string|max:100',
                'destination' => 'required|string|max:100',
                'country' => 'required|string|max:100',
                'amenity' => 'required|string|max:100',
                'budget' => 'required|string|max:100',
                'date' => 'required|string|max:100',
            ];
        }

        $data = $request->validate($rules);

        $params = $request->all();

        // Send email
        $details = [
            'from'          => 'user-inquiry',
            'title'         => $data['title'] . ' ' . $data['name'] . ',',
            'body'          => (object) $data
        ];
        Enquires::create([
            'user_id' => auth()->check() ? auth()->id() : 0,
            'identifier' => $params['identifier'] ?? '',
            'product_name' => $params['product'] ?? '',
            'name' => $params['name'],
            'email' => $params['email'],
            'phone' => $params['phone'] ?? '',
            'message' => $params['message'],
            'status' => 1,
            'travel_type' => $params['travel_type'] ?? '',
            'duration' => $params['duration'] ?? '',
            'destination' => $params['destination'] ?? '',
            'country' => $params['country'] ?? '',
            'amenity' => $params['amenity'] ?? '',
            'budget' => $params['budget'] ?? '',
            'date' => $params['date'] ?? '',
        ]);

        \Mail::to('cruise@neverforgetappreciation.com')->send(new \App\Mail\Email($details));

        if ($identifier === 'journey_expert') {
            try {
                \Log::info('Sending Travel & Experience confirmation email to: ' . $data['email']);
                $confirmationDetails = [
                    'from' => 'travel-experience-confirmation',
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'message' => $data['message'],
                    'travel_type' => $params['travel_type'],
                    'duration' => $params['duration'],
                    'destination' => $params['destination'],
                    'country' => $params['country'],
                    'amenity' => $params['amenity'],
                    'budget' => $params['budget'],
                    'date' => $params['date'],
                ];
                \Mail::to($data['email'])->send(new \App\Mail\Email($confirmationDetails));
                \Log::info('Travel & Experience confirmation email sent successfully to: ' . $data['email']);
            } catch (\Throwable $e) {
                \Log::error('Travel & Experience confirmation email failed: ' . $e->getMessage(), [
                    'exception' => $e->getTraceAsString(),
                    'recipient' => $data['email'],
                ]);
            }
        } elseif ($identifier === 'quality_logo') {
            try {
                $confirmationDetails = [
                    'from' => 'quality-logo-confirmation',
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'message' => $data['message'],
                    'product' => $params['product'] ?? '',
                ];
                \Mail::to($data['email'])->send(new \App\Mail\Email($confirmationDetails));
            } catch (\Throwable $e) {
                \Log::error('Quality Logo confirmation email failed: ' . $e->getMessage(), [
                    'exception' => $e->getTraceAsString(),
                    'recipient' => $data['email'],
                ]);
            }
        }

        return back()->with('success', 'Your inquiry has been sent successfully!');
    }

    public function sendCollaborateQuote(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
            'company_name' => 'required|string|max:100',
            
        ]);

        $model = new ContactUs();
        $model->type = $request->type;
        $model->first_name = $request->first_name;
        $model->last_name = $request->last_name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->message = $request->message;
        $model->company_name = $request->company_name;
       
        $model->save();

        // Prepare email data
        $emailBody = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            'message' => $data['message'] ?? 'No additional message provided.',
        ];

        // Send email
        $details = [
            'from' => 'collaborate-quote',
            'title' => 'New Corporate Gifting Quote Request',
            'body' => $emailBody
        ];

        try {
            \Mail::to('carreer@neverforgetappreciation.com')->send(new \App\Mail\Email($details));
        } catch (\Exception $e) {
            \Log::error('Failed to send collaborate quote email: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email. Please try again.');
        }

        return back()->with('getaquotemessage', 'Your quote request has been submitted successfully! We will contact you soon.');
    }

    public function founder()
    {
        $page_title = 'Founder’s Vision || Never Forget';
        $collaborators = Collaborator::where('status', 1)->get();
        return view('website.founder', compact('page_title', 'collaborators'));
    }
}
