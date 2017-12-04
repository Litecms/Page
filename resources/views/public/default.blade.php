<section class="container-fluid">
    <div class="row">
        @include('page::public.partials.header')
    </div>
</section>
<div class="container page">
    <div class="row">
        <div class="col-md-12">
            {!!$page->content!!}
        </div>
    </div>
</div>