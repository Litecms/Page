@include('page::public.partials.header')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="container">
                @include('page::public.partials.left')
            </div>
        </div>
        <div class="col-md-9">
            {!!$page->content!!}
        </div>
    </div>
</div>