@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">新的记录</div>

                <div class="panel-body">
                    <div id="post-creator-form">
                          <div class="form-group">
                              <label for="title">记录标题</label>
                              <input type="text" name="title" class="form-control" id="title" placeholder="请在这里输入...">
                          </div>
                          <div class="form-group">
                            <label for="content">记录内容</label>
                            <textarea class="form-control" rows="3" id="content" name="content" placeholder="请在这里输入..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover-image">标题图片(允许上传 PNG JEPG GIF SVG)</label>
                            <input type="file" name="cover-image" id="cover-image">
                        </div>
                        <button class="btn btn-default" id="submit-post">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    
    // error parser
    var parseErrorMessage = function(raw) {
        var message = "";
        for (var key in raw) {
            message += raw[key][0];
            message += " ";
        }
        return message;
    }

    $('#submit-post').click(function(e){

        // construct form data
        var fd = new FormData();
        fd.append('cover-image', $('#cover-image')[0].files[0]);
        fd.append('title', $('#title').val());
        fd.append('content', $('#content').val());

        // upload
        http.post('/posts/create', fd)
            .then(function(res){
                console.log(res);
                salert("Success", res.data['message'], 'success');
            })
            .catch(function(res){
                salert("Error", parseErrorMessage(res.response.data), 'error');
            });

    });
</script>
@endsection