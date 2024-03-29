@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->title }}</div>

                <div class="panel-body">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                        
                        <embed src="{{ url('storage/' . $post->cover_image_url) }}" />
                      </a>
                  </div>
                  <div class="media-body">
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
