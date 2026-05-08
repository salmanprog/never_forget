@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
<meta content="" name="description">
<meta content="" name="keywords">
@endsection
@section('content')
<main class="inner-bg">
  <section class="inner-banner">
    <div class="container">
      <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic"
        data-aos-duration="1000">Our <span>Blogs</span></h1>
    </div>
  </section>
</main>
<section class="blog-sec py-150">
  <div class="container">
    <!-- <div class="col-lg-12">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-end flex-wrap gap-20 action-btns-wrapper">
          <button class="btn secondary-btn">Most Recent</button>
          <button class="btn secondary-btn">Highest Rated</button>
          <button class="btn secondary-btn">Trending Now</button>
          <button class="btn secondary-btn rounded-btns sm-circle d-flex align-items-center justify-content-center bg-transparent radius-100"><i class="fa-solid fa-magnifying-glass"></i></button>
          <button class="btn secondary-btn rounded-btns sm-circle d-flex align-items-center justify-content-center bg-transparent radius-100"><i class="fa-solid fa-filter"></i></button>
        </div>
      </div> -->
    <!-- <div id="blogs-container" class="row row-gap-40">
        @if(isset($blogs) && $blogs->count() > 0)
          @foreach($blogs as $index => $blog)
            <div class="col-lg-4 col-md-6">
              <div class="blogs-card-wrapper">
                @if($blog->image)
                  <img src="{{ asset('public/admin/assets/posts/'.$blog->image) }}" class="w-100 mb-10" alt="{{ $blog->title }}">
                @else
                  <img src="{{ asset('public/assets/website/images') }}/blogs/{{ ($index % 9) + 1 }}.png" class="w-100 mb-10" alt="{{ $blog->title }}">
                @endif
                <h5 class="pl-20 heading fs-24 mb-30">{{ $blog->title }}</h5>
                <p class="pl-20 blog-text-{{ $blog->id }}">
                  <span class="truncated-text-{{ $blog->id }} fs-18 secondry-font">
                    {!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 100) !!}...
                  </span>
                </p>
                <div class="pl-20 pb-20">
                  <a href="{{ route('blog-detail', $blog->slug) }}" class="btn primary-btn border-0">View</a>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="col-lg-12">
            <div class="text-center">
              <p class="fs-18">No blogs available at the moment.</p>
            </div>
          </div>
        @endif
      </div> -->
    <div class="row row-gap-30 justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/1.webp') }}" alt="">
          </div>
          <h2 class="mb-15">The Importance of Employee Appreciation in Retention</h2>
          <p class="mb-10">
            In today’s fast-paced business world, employee turnover can be one of the most expensive challenges a company faces. While competitive salaries and benefits are important, one of the most effective—and often overlooked—ways to retain employees is by showing genuine appreciation.
          </p>
          <p class="mb-10">
            Appreciation can take many forms, from a simple thank-you note to more substantial recognition, like awards or bonuses. Studies have shown that employees who feel valued are more likely to stay with their current employer. It fosters a sense of belonging and loyalty, improving morale and productivity.
          </p>
          <p class="mb-10">
            The key is consistency. It’s not just about the grand gestures, but about making appreciation a regular part of your company culture. Celebrating employee birthdays, recognizing work anniversaries, and publicly acknowledging achievements are simple ways to create a positive work environment. And when employees feel appreciated, they’re more likely to go the extra mile for the company.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/2.webp') }}" alt="">
          </div>
          <h2 class="mb-15">Making Your Clients Feel Special: Small Gestures, Big Impact</h2>
          <p class="mb-10">
            In the world of business, it’s easy to focus on closing deals and growing your client base. However, nurturing the relationships you already have is just as important, if not more so. Small, thoughtful gestures can go a long way in making your clients feel valued.
          </p>
          <p class="mb-10">
            Consider sending personalized thank-you cards after meetings or projects, or offering surprise discounts or gifts on your client’s anniversaries or birthdays. Tailored gestures show your clients that you see them as more than just another transaction—they are partners in your journey.
          </p>
          <p class="mb-10">
            Another idea is to remember personal details, like their favorite coffee order or a special hobby, and use that information in future interactions. This level of personalization can leave a lasting impression and strengthen your relationship in ways that go beyond business.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/3.jpg') }}" alt="">
          </div>
          <h3 class="mb-15">The Power of Gratitude in the Digital Age: Keeping Human Connection Alive</h3>
          <p class="mb-10">
            In a world that’s increasingly driven by digital transactions, it’s easy to lose the personal touch that fosters trust and loyalty. Emails, automation, and online meetings can often feel impersonal, leading to a disconnect between businesses and their clients.
          </p>
          <p class="mb-10">
            However, incorporating gratitude into your digital communications can reinvigorate the human connection. Consider sending a personalized email expressing appreciation for your client’s continued partnership, or incorporating video messages to add a more personal touch.
          </p>
          <p class="mb-10">
            Even in a digital world, handwritten notes can stand out. While it might take extra time, sending a physical thank-you card after a digital meeting shows your client that you’re willing to go the extra mile to maintain a meaningful connection.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/4.webp') }}" alt="">
          </div>
          <h3 class="mb-15">Creative Client Appreciation Ideas for the Holiday Season</h3>
          <p class="mb-10">
            The holiday season is the perfect time to show your clients how much you value their partnership. While sending out cards and gifts is a tradition, adding a creative spin can make your gesture stand out.
          </p>
          <p class="mb-10">
            Consider personalized holiday-themed gifts, such as custom ornaments with your client’s company logo or holiday gift baskets tailored to their preferences. You could also create a “12 Days of Appreciation” campaign, where you send small tokens of gratitude leading up to a big holiday celebration.
          </p>
          <p class="mb-10">
            Another idea is to host a virtual or in-person holiday event for your clients, allowing them to network and celebrate with you. These thoughtful gestures not only strengthen relationships but also position your business as one that values its clients far beyond just the business exchange.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/5.webp') }}" alt="">
          </div>
          <h3 class="mb-15">How to Celebrate Business Milestones with Clients</h3>
          <p class="mb-10">
            Milestones, whether it’s a company anniversary, a new product launch, or reaching a significant sales goal, are opportunities not only to celebrate your success but also to show appreciation to the clients who helped make it possible.
          </p>
          <p class="mb-10">
            Start by hosting a milestone event, whether in-person or virtual, inviting your key clients to join you in celebrating the achievement. It’s a great opportunity to recognize their role in your success and to build deeper connections.
          </p>
          <p class="mb-10">
            Additionally, consider giving a special gift to commemorate the occasion—this could be anything from a personalized plaque to an exclusive product or service offering. A personalized “thank you” for their contribution during these significant moments will leave a lasting impression.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/6.webp') }}" alt="">
          </div>
          <h3 class="mb-15">Why Appreciation Matters for Mental Health in the Workplace</h3>
          <p class="mb-10">
            A workplace that prioritizes employee appreciation does more than just create a positive environment—it also has a significant impact on mental health. Employees who feel appreciated tend to experience lower levels of stress, higher job satisfaction, and improved mental well-being.
          </p>
          <p class="mb-10">
            Regular acts of appreciation, such as recognition for good work, celebrating small wins, and showing concern for employees’ well-being, can help combat burnout. In addition to improving morale, it fosters a supportive atmosphere where employees feel safe and valued, which has been linked to increased productivity and a more engaged workforce.

          </p>
          <p class="mb-10">
            Making employee appreciation part of your mental health strategy demonstrates that you care about your team as people, not just workers, which in turn leads to a healthier, more positive workplace.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/7.webp') }}" alt="">
          </div>
          <h3 class="mb-15">Building Long-Term Relationships Through Acts of Kindness</h3>
          <p class="mb-10">
          In business, relationships are everything. Whether it’s with employees, clients, or partners, showing kindness and appreciation can transform a casual relationship into a long-term, loyal one.
          </p>
          <p class="mb-10">
          Consistent, thoughtful gestures—whether it’s remembering a birthday, sending a handwritten thank-you note, or providing support during challenging times—help build trust and rapport. These acts show that you value the relationship beyond its immediate financial value.
          </p>
          <p class="mb-10">
          Kindness doesn’t have to be expensive or extravagant. Often, it’s the small, genuine acts that leave the biggest impression. Over time, these consistent gestures help build a strong foundation of loyalty and trust that can turn business relationships into long-lasting partnerships.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="blogs-card-wrapper">
          <div class="mb-15">
            <img src="{{ asset('public/assets/website/images/blogs/8.jpg') }}" alt="">
          </div>
          <h3 class="mb-15">The Art of a Thank-You: How Personalized Cards Can Build Stronger Client Relationships
          </h3>
          <p class="mb-10">
          In the fast-paced world of emails and instant messages, taking the time to send a handwritten thank-you card can truly stand out. A personalized card shows that you’ve taken the time and effort to acknowledge a client or employee’s contribution, and this simple gesture can go a long way in building stronger relationships.
          </p>
          <p class="mb-10">
          Thank-you cards are versatile: they can be used after successful projects, meetings, or even as a follow-up to a positive interaction. The key is personalization—tailoring the message to reflect the specific moment or relationship.

          </p>
          <p class="mb-10">
          Including personal details or recalling shared moments in your thank-you message shows that you truly value the person, not just their role. As a result, you’re able to build deeper, more meaningful connections that foster loyalty and trust.
          </p>
        </div>
      </div>
    </div>
    @if(isset($totalBlogs) && $totalBlogs > 3)
    <div class="row">
      <div class="col-lg-12 text-center mt-40">
        <button id="load-more-blogs-btn" class="btn primary-btn border-0">Load More</button>
        <div id="loading-spinner" style="display: none;" class="mt-20">
          <span class="fs-18">Loading...</span>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    let page = 2; // Start from page 2 since page 1 (first 3 blogs) is already loaded
    let loading = false;
    let hasMore = {
      {
        isset($totalBlogs) && $totalBlogs > 3 ? 'true' : 'false'
      }
    };
    const loadMoreBtn = document.getElementById('load-more-blogs-btn');
    const loadingSpinner = document.getElementById('loading-spinner');
    const blogsContainer = document.getElementById('blogs-container');

    if (loadMoreBtn) {
      loadMoreBtn.addEventListener('click', function() {
        if (loading || !hasMore) return;

        loading = true;
        const currentPage = page;
        page++;
        loadMoreBtn.style.display = 'none';
        if (loadingSpinner) {
          loadingSpinner.style.display = 'block';
        }

        fetch(`{{ route('load.more.blogs') }}?page=${currentPage}`, {
            method: 'GET',
            headers: {
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest',
              'Accept': 'application/json'
            }
          })
          .then(response => {
            if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
            }
            const contentType = response.headers.get("content-type");
            if (!contentType || !contentType.includes("application/json")) {
              return response.text().then(text => {
                throw new Error('Expected JSON but got: ' + text.substring(0, 100));
              });
            }
            return response.json();
          })
          .then(data => {
            if (data.error) {
              console.error('Server error:', data.message);
              alert('Error loading blogs: ' + data.message);
              hasMore = false;
            } else if (data.html) {
              // Create a temporary container to parse HTML
              const tempDiv = document.createElement('div');
              tempDiv.innerHTML = data.html;

              // Append each blog card to the container
              const blogCards = tempDiv.querySelectorAll('.col-lg-4');
              blogCards.forEach(card => {
                blogsContainer.appendChild(card);
              });

              hasMore = data.hasMore;

              if (hasMore) {
                loadMoreBtn.style.display = 'inline-block';
              }
            } else {
              hasMore = false;
            }

            if (loadingSpinner) {
              loadingSpinner.style.display = 'none';
            }
            loading = false;
          })
          .catch(error => {
            console.error('Error loading more blogs:', error);
            alert('Error loading blogs. Please try again.');
            if (loadingSpinner) {
              loadingSpinner.style.display = 'none';
            }
            loadMoreBtn.style.display = 'inline-block';
            loading = false;
            hasMore = false;
          });
      });
    }
  });
</script>

@include('website.include.perfect-gifting')
@endSection