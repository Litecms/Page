<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <div class="app-entry-form-section" id="basic">
                <div class="section-title">Details</div>
                <div class="row">
                    <div class="col-12">
                        {!! Form::text('name')
                        -> label(trans(trans('page::page.label.name')))
                        -> required()
                        -> placeholder(trans(trans('page::page.placeholder.name')))
                        !!}

                        {!! Form::textarea('content')
                        -> label(trans('page::page.label.content'))
                        -> value(e($data['content']))
                        -> dataUpload(url($data->getUploadURL('content')))
                        -> addClass('html-editor-mini')
                        -> placeholder(trans('page::page.placeholder.content'))
                        !!}
                    </div>
                    <div class="col-12">
                        {!! Form::text('title')
                        -> label(trans('page::page.label.title'))
                        -> placeholder(trans('page::page.placeholder.title'))
                        !!}
                        {!! Form::text('heading')
                        -> label(trans('page::page.label.heading'))
                        -> placeholder(trans('page::page.placeholder.heading'))
                        !!}
                        {!! Form::text('sub_heading')
                        -> label(trans('page::page.label.sub_heading'))
                        -> placeholder(trans('page::page.placeholder.sub_heading'))
                        !!}
                        {!! Form::date('meta_title')
                        -> label(trans('page::page.label.meta_title'))
                        -> placeholder(trans('page::page.placeholder.meta_title'))
                        !!}
                    </div>
                </div>
            </div>
            <div class="app-entry-form-section" id="meta">

                <div class="section-title">Meta Details</div>
                <div class="row">
                    <div class="col-12">
                        {!! Form::text('meta_keyword')
                        -> label(trans('page::page.label.meta_keyword'))
                        -> placeholder(trans('page::page.placeholder.meta_keyword'))
                        !!}
                    </div>
                    <div class="col-6">
                        {!! Form::textarea('meta_description')
                        -> label(trans('page::page.label.meta_description'))
                        -> rows(3)
                        -> placeholder(trans('page::page.placeholder.meta_description'))
                        !!}
                    </div>
                    <div class="col-6">
                        {!! Form::textarea('abstract')
                        -> label(trans('page::page.label.abstract'))
                        -> rows(3)
                        -> placeholder(trans('page::page.placeholder.abstract'))
                        !!}
                    </div>
                </div>
            </div>
            <div class="app-entry-form-section" id="settings">

                <div class="section-title">Settings</div>
                <div class="row">
                    <div class="col-12">
                        {!! Form::range('order')
                        -> label(trans('page::page.label.order'))
                        -> placeholder(trans('page::page.placeholder.order'))
                        !!}

                        {!! Form::text('slug')
                        -> label(trans('page::page.label.slug'))
                        -> append('.html')
                        -> placeholder(trans('page::page.placeholder.slug'))
                        !!}

                        {!! Form::select('view')
                        -> options(trans('page::page.options.view'))
                        -> label(trans('page::page.label.view'))
                        -> placeholder(trans('page::page.placeholder.view'))
                        !!}

                        {!! Form::hidden('compile')
                        -> forceValue('0')
                        !!}

                        {!! Form::select('compile')
                        -> options(trans('page::page.options.compile'))
                        -> label(trans('page::page.label.compile'))
                        -> placeholder(trans('page::page.placeholder.compile'))
                        !!}

                        {!! Form::select('category_id')
                        -> options(trans('page::page.options.category'))
                        -> label(trans('page::page.label.category_id'))
                        -> placeholder(trans('page::page.placeholder.category_id'))
                        !!}

                        {!! Form::select('status')
                        -> options(trans('page::page.options.status'))
                        -> label(trans('page::page.label.status'))
                        -> placeholder(trans('page::page.placeholder.status'))
                        !!}
                    </div>
                </div>
            </div>

            <div class="app-entry-form-section" id="images">
                <div class="section-title">Images</div>
                <div class="row">
                    @if ($mode == 'create')
                    <div class="form-group">
                        <label for="images" class="control-label col-lg-12 col-sm-12 text-left">
                            {{trans('page::page.label.images') }}
                        </label>
                        <div class='col-12'>
                            {!! $data->files('images')
                            ->url($data->getUploadUrl('images'))
                            ->uploader()!!}
                        </div>
                    </div>
                    @elseif ($mode == 'edit')
                    <div class="form-group">
                        <label for="images" class="control-label col-lg-12 col-sm-12 text-left">
                            {{trans('page::page.label.images') }}
                        </label>
                        <div class='col-12'>
                            {!! $data->files('images')
                            ->url($data->getUploadUrl('images'))
                            ->uploader()!!}
                        </div>
                    </div>
                    @elseif ($mode == 'show')
                    <div class='col-12'>
                        {!! $data->files('banner') !!}
                    </div>
                    <div class='col-12'>
                        {!! $data->files('images') !!}
                    </div>
                    @endif
                </div>
                {!! Form::hidden('upload_folder') !!}
            </div>
        </div>
        <div class="col-md-3">
            <aside class="app-create-steps">
                <h5 class="steps-header">Steps</h5>
                <div class="steps-wrap" id="steps_nav">
                    <a class="step-item active" href="#basic"><span>1</span> Basic Details</a>
                    <a class="step-item" href="#meta"><span>2</span> Meta Tags</a>
                    <a class="step-item" href="#settings"><span>3</span> Settings</a>
                    <a class="step-item" href="#images"><span>4</span> Images & Videos</a>
                </div>
            </aside>
        </div>
    </div>
</div>
<br />
<br />
<br />