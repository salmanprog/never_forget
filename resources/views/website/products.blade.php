@extends('layouts.website.master')
@section('content')
@section('title', $page_title)
<!-- Inner Page Banner  -->
<!-- catigory flora art sec  -->
<main id="main" class="inner-page-header-menu">

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg-img">
            <div class="container aos-init aos-animate" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{ $category->title }}</h2>
                </div>
                @if(isset($products))
                    <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            @if(!empty($subcategory))
                                <li data-filter="*" class="filter-active">{{ $subcategory->title }}</li>
                            @else
                                <li data-filter="*" class="filter-active">All {{ $category->title }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                @endif

                <div class="row menu-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 597.9px;">
                    @include('website.product-ajax')
                </div>

            </div>
        </section>
        <!-- End Menu Section -->
    </main>

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
@push('js')
<script type="text/javascript">

$(window).on('hashchange', function() {
   if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        var url = new URL(window.location.href);
        var slug = url.searchParams.get("slug");
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            getData(slug,page);
        }
    }
});

$(document).ready(function()
{
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];
        var url = new URL(window.location.href);
        var slug = url.searchParams.get("slug");
        getData(slug,page);
    });
});


     function getData(slug, page) {
        $.ajax({
            url: '?slug=' + slug + '&page=' + page,
            type: 'get',
            dataType: 'json', // Change datatype to json to expect a JSON response
        })
        .done(function(data) {
            $("#item-lists").empty().html(data.html);
            $(".pagination").html(data.pagination);
            location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }
</script>
@endpush
<!-- catigory flora art sec  -->
@endsection
