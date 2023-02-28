@include('page::page.partial.header')
@php 
$data = $data->toArray([]);
@endphp
<section class="listing-page-wrap">
    <div class="container">
        <div class="row">
            @include('page::page.partial.aside')

            <div class="col-12 col-lg-9 left-sidebar" id="listing_data">
                <div class="listing-single-wrap">
                    <h1 class="single-title">{{@$data['title']}}</h1>
                    <div class="single-metas">
                        <span>By <a href="#">{{@$data['author']}}</a></span>
                        <span>{{@$data['created_at']}}</span>
                        <span><a href="#">{{@$data['category']}}</a></span>
                    </div>
                    @foreach($data['images'] as $image)
                    <img src="{{url('image/original/'.@$image['path'])}}" class="img-fluid mb-30" alt="">
                    @endforeach

                    <div class="single-content">
                        <p>{!! @$data['description'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>