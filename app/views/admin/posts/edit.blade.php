@extends('admin.layouts.home')
@scection('styles')
@parent

    {{ HTML::style('js/html/style.css') }}

@stop
@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8"><h4>{{ Lang::get('buttons.add_new_post') }}</h4></div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            @if(count($photos->photos) == 0)
            <div class="col-md-8 text-center col-md-offset-2">
                <div class="alert alert-danger" role="alert"><i class="fa fa-fw fa-ban on fa-camera"></i>{{ Lang::get('general.no_photos') }}</div>
            </div>

            @else
            <div class="col-md-12" id="links">
                <!--return $post->comments[0]->body;-->
                @foreach($photos->photos as $photo)
                <div class="col-xs-6 col-md-3">
                        {{ Form::open(['action'=>['AdminPhotoController@destroy',$photo->id],'method'=>'DELETE', 'id'=>'form-'.$photo->id]) }}
                            {{ Form::hidden('image_id',$photo->photo_id) }}
                               <i class="remove glyphicon glyphicon-remove" style="color: red;" id="{{ $photo->id }}"></i>
                         {{ Form::close() }}
                        {{ HTML::image('/uploads/thumbnail/'.$photo->path,$post->title,array('class'=>'img-responsive thumbnail')) }}
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="row">
            {{ Form::Model($post, ['action' => ['AdminPostController@update', $post->id], 'class'=>'form','files'=>'true']) }}
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="form-group">
                    {{ Form::label('title', Lang::get('general.admin.title')) }}
                    {{ Form::text('title',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="form-group">
                    {{ Form::label('categories', Lang::get('general.admin.category')) }}

                    {{ Form::select('category', $categoriesList, $categorySelected->id,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <div class="form-group">
                    {{ Form::label('title', Lang::get('general.admin.title')) }}
                    {{ Form::file('image[]',['class'=>'form-control input-lg','multiple']) }}
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <div class="form-group">
                    {{ Form::label('body', Lang::get('general.admin.title')) }}
                    {{ Form::textarea('body',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-12 col-md-12 ">
                <div class="form-group pull-left bt-lg">
                    {{ Form::submit(Lang::get('forms.save'),['class'=>'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
@section('javascript')
@parent
    {{ HTML::script('http://js.nicedit.com/nicEdit-latest.js') }}
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page

    bkLib.onDomLoaded(function() {
        new nicEditor().panelInstance('area1');
    }); // convert text area with id area1 to rich text editor.

    bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true}).panelInstance('area2');
    }); // convert text area with id area2 to rich text editor with full panel.

    // remove btn for each image
    $('.remove').on('click', function() {
       photoId = $(this).attr('id');
        $('#form-'+photoId).submit();
        //
    });
</script>

@stop
