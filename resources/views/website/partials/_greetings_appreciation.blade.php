@foreach ($greetingsCategories as $category)
    <div class="col-lg-4 col-md-6 product-item visible">
        <div class="gift-card-wrapper">
            @if ($category->image)
                <img src="{{ asset('/public/' . $category->image) }}" alt="{{ $category->title }}">
            @endif
            <div class="product-info">
                <h3 class="product-title">{{ $category->title }}</h3>

                @if (in_array($category->id, $addedGreetingsCategoryIds ?? []))
                    <a href="{{ route('greetings-appreciation-items') }}" class="add-to-cart balloon-btn"
                        style="width:100%; text-align:center;">
                        View
                    </a>
                @else
                    <form class="greetings-appreciation-form" method="POST"
                        action="{{ route('create-greetings-appreciation-enquiry-item') }}">
                        @csrf
                        <input type="hidden" name="greetings_appreciation_category_id" value="{{ $category->id }}">
                        <button type="submit" class="add-to-cart balloon-btn" style="width: 100%">
                            Add
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endforeach
