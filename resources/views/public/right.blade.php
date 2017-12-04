<section class="container-fluid">
    <div class="row">
        @include('page::public.partials.header')
    </div>
</section>
<div class="container page">
    <div class="row">
        <div class="col-md-9">
            {!!$page->content!!}
        </div>
        <div class="col-md-3">
        @include('page::public.partials.left')
        </div>
    </div>
</div>