@include('page::public.partials.header')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="container">
            {!!$page->content!!}
            </div>
        </div>
        <div class="col-md-3">
        @include('page::public.partials.left')
        </div>
    </div>
</div>