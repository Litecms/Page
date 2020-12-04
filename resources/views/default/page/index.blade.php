<div class="app-list-wrap">
    <div class="app-list-inner">
        <div class="app-list-header d-flex align-items-center justify-content-between">
            <h3>{{__('Pages')}}</h3>
            <div class="header-search">
                <input type="search" class="form-control" placeholder="{{__('Search')}}..." id="app-search">
                <span class="search-btn"><i class="las la-search"></i></span>
                <button type="button" class="settings  btn-icon" data-toggle="modal" data-target="#searchModal"><i
                        class="las la-ellipsis-v"></i></button>
            </div>
            <button type="button" class="btn add-app-btn btn-icon btn-outline" data-action='CREATE'
                data-load-to="#app-entry" data-url="{{guard_url('page/page/create')}}">
                <i class="las la-plus"></i>
            </button>
        </div>

        <div class="app-list-wrap-inner ps ps--active-y" id="app-list">
            <div class="app-list-toolbar">
                <div class="app-list-pagination" id="app-paginate">
                    <a href="#" id="select-all"><i class="las la-check"></i></a>
                    &nbsp;
                    <span class="mr-5" id="paginate-number">Page 1 of {{$meta['pagination']['total_pages']}}</span>
                    <a href="#" class="page-previous"><i class="las la-angle-left"></i></a>
                    <a href="#" class="page-next"><i class="las la-angle-right"></i></a>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="las la-ellipsis-v"></i></button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-title">Modules</div>
                        <a class="dropdown-item" href="#"><i class="las la-inbox"></i>Pages</a>
                        <a class="dropdown-item" href="#"><i class="las la-angle-down"></i>Categories</a>
                        <div class="dropdown-title">Settings</div>
                        <a class="dropdown-item" href="#"><i class="las la-inbox"></i>Show archived</a>
                        <a class="dropdown-item" href="#"><i class="las la-angle-down"></i>Expand all folders</a>
                    </div>
                </div>
            </div>
            <div class="app-items" data-url="{{guard_url('page/page')}}" id="item-list">
                @include('page::page.more', ['mode' => 'list'])
            </div>

        </div>
    </div>
    <div class="app-detail-wrap" id="app-entry">
    </div>
</div>
<script type="">
    var module_link = "{{guard_url('page/page')}}";
    var current_page = {{$meta['pagination']['current_page']}};
    var total_pages = {{$meta['pagination']['total_pages']}};
    $(function () {
        $("#app-search").on('search', function () {
            app.load('#item-list', module_link + '?q=' + $(this).val());
        });
    });
</script>