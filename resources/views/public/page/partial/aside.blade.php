<div class="col-12 col-lg-3">
    <div class="search-block">
        <form class="data-filter">
            <div class="position-relative">
                <input type="text" class="form-control category-filter" name="q"
                    placeholder="Enter your keywords...">

            </div>
        </form>
    </div>
    <div class="widget">
        <h4>Categories</h4>
        <ul class="list-style">

            @foreach($categories as $category)
            <li>
                <a href="{{url('page')}}?category={{$category['slug']}}">{{$category['name']}}</a>
                <span>{{$category['count']}}</span>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <h4>Recently Added</h4>
        <ul class="latest-post position-relative">
            @foreach($recent as $page)
            <li class="media">
                <figure>
                    <a href="{{trans_url('page')}}/{{@$page['slug']}}">
                        <img src="{{url($page['image'])}}" class="img-fluid" alt="">
                    </a>
                </figure>
                <div class="media-body">
                    <h5><a href="{{trans_url('page')}}/{{@$page['slug']}}"
                            class="text-extra-dark-gray">{{$page['title']}}</a></h5>
                    <span class="d-block">{{date('M d,Y', strtotime(@$page['published_at']))}}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <h4>Tags Cloud</h4>
        <div class="tag-cloud">
            @foreach($tags as $tag)
            <a href="{{url('pages')}}?tag={{$tag['slug']}}">{{$tag['name']}}</a>
            @endforeach
        </div>
    </div>
</div>