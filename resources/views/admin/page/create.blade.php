

    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">{{ trans('page::page.tab.page') }}</a></li>
            <li><a href="#metatags" data-toggle="tab">{{ trans('page::page.tab.meta') }}</a></li>
            <li><a href="#settings" data-toggle="tab">{{ trans('page::page.tab.setting') }}</a></li>
            <li><a href="#images" data-toggle="tab">{{ trans('page::page.tab.image') }}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#page-page-create'  data-load-to='#page-page-entry' data-datatable='#page-page-list'><i class="fa fa-floppy-o"></i> Save</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#page-page-entry' data-href='{{guard_url('page/page/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('page-page-create')
        ->method('POST')
        ->files('true')
        ->action(guard_url('page/page'))!!}
         
        <div class="tab-content clearfix">   
            <div class="tab-pan-title ">  {{ trans('app.create') }}   {{ trans('page::page.name') }}</div>
            @include('page::admin.page.partial.entry', ['mode' => 'create'])
        </div>
      
        {!! Form::close() !!}
    </div>