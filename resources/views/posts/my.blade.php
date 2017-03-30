@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">你的所有记录</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>标题</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        @forelse($posts as $post)
                        <tbody>
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td><a href="{{ url('/posts/'.$post->uid.'/show') }}">查看记录</a></td>
                            </tr>
                        </tbody>
                        @empty
                        <tr>还没有记录,赶紧试试吧!</tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
