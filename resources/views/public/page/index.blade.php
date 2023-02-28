@include('page::public.page.partial.header')
<section class="listing-page-wrap">
    <div class="container">
        <div class="row">
            @include('page::public.page.partial.aside')

            <div class="col-12 col-lg-9 left-sidebar" id="listing_data">
                @forelse($data as $page)
                @php 
                $page = $page->toArray([]);
                @endphp
                <div class="listing-single-item d-flex align-items-center flex-wrap">
                    <div class="col-12 col-lg-5 p-0 listing-image">
                        <a href="{{trans_url('page')}}/{{$page['slug']}}">
                        <img src="{{url($page['image'])}}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 p-0 listing-text">
                        <div class="listing-content">
                            <h3><a href="{{trans_url('page')}}/{{$page['slug']}}">{{$page['title']}}</a></h3>
                            <div class="listing-metas">
                                <span>By <a
                                        href="{{trans_url('page')}}/{{$page['slug']}}">{{$page['user']}}</a></span>
                                <span><a
                                        href="{{trans_url('page')}}/{{$page['slug']}}">{{$page['category']}}</a></span>
                            </div>
                            <p>{{ Str::limit($page['description'],300 )}}</p>
                        </div>
                        <a href="{{trans_url('page')}}/{{$page['slug']}}" class="btn btn-theme">Continue Reading</a>
                    </div>
                </div>
                @empty
                @endif
                <nav class="pagination-wrap mb-50" aria-label="Page navigation example">
                    <ul class="pagination">
                        {!!view('paginator', compact('meta'))!!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
