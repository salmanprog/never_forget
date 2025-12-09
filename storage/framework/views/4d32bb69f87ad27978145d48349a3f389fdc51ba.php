
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?> 
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
      <div id="blogs-container" class="row row-gap-40">
        <?php if(isset($blogs) && $blogs->count() > 0): ?>
          <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
              <div class="blogs-card-wrapper">
                <?php if($blog->image): ?>
                  <img src="<?php echo e(asset('public/admin/assets/posts/'.$blog->image)); ?>" class="w-100 mb-10" alt="<?php echo e($blog->title); ?>">
                <?php else: ?>
                  <img src="<?php echo e(asset('public/assets/website/images')); ?>/blogs/<?php echo e(($index % 9) + 1); ?>.png" class="w-100 mb-10" alt="<?php echo e($blog->title); ?>">
                <?php endif; ?>
                <h5 class="pl-20 heading fs-24 mb-30"><?php echo e($blog->title); ?></h5>
                <p class="pl-20 blog-text-<?php echo e($blog->id); ?>">
                  <span class="truncated-text-<?php echo e($blog->id); ?> fs-18 secondry-font">
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($blog->description), 100); ?>...
                  </span>
                </p>
                <div class="pl-20 pb-20">
                  <a href="<?php echo e(route('blog-detail', $blog->slug)); ?>" class="btn primary-btn border-0">View</a>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          <div class="col-lg-12">
            <div class="text-center">
              <p class="fs-18">No blogs available at the moment.</p>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <?php if(isset($totalBlogs) && $totalBlogs > 3): ?>
        <div class="row">
          <div class="col-lg-12 text-center mt-40">
            <button id="load-more-blogs-btn" class="btn primary-btn border-0">Load More</button>
            <div id="loading-spinner" style="display: none;" class="mt-20">
              <span class="fs-18">Loading...</span>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let page = 2; // Start from page 2 since page 1 (first 3 blogs) is already loaded
      let loading = false;
      let hasMore = <?php echo e(isset($totalBlogs) && $totalBlogs > 3 ? 'true' : 'false'); ?>;
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

          fetch(`<?php echo e(route('load.more.blogs')); ?>?page=${currentPage}`, {
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

  <?php echo $__env->make('website.include.perfect-gifting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/blogs.blade.php ENDPATH**/ ?>