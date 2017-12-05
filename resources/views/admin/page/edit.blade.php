
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">{{ trans('page::page.tab.page') }}</a></li>
            <li><a href="#metatags" data-toggle="tab">{{ trans('page::page.tab.meta') }}</a></li>
            <li><a href="#settings" data-toggle="tab">{{ trans('page::page.tab.setting') }}</a></li>
            <li><a href="#images" data-toggle="tab">{{ trans('page::page.tab.image') }}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#page-page-edit'  data-load-to='#page-page-entry' data-datatable='#page-page-list'><i class="fa fa-floppy-o"></i> Save</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#page-page-entry' data-href='{{guard_url('page/page')}}/{{$page->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('page-page-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('page/page/'. $page->getRouteKey()))!!}
        <div class="tab-content  clearfix">                  
            <div class="tab-pan-title">  {{ trans('app.edit') }}   [{!!$page->name!!}]</div>
             @include('page::admin.page.partial.entry', ['mode' => 'edit'])
        </div>
        {!!Form::close()!!}
    </div>