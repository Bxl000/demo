<!doctype html>
<html lang="`en`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表展示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .white-space {white-space: nowrap;}
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand text-white" href="{{ route('index') }}">Index</a>
    <a href="{{ route('login.redirectToPage') }}" class="btn btn-primary btn-sm">登录</a>
</nav>
<div class="container col-10 mt-5">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">图片</th>
            <th scope="col">标题</th>
            <th scope="col">内容</th>
            <th scope="col">标签</th>
            <th scope="col">评论</th>
            <th scope="col">作者</th>
            <th scope="col">发布时间</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataAllList as $val)
            <tr>
                <th scope="row">{{ $val->id }}</th>
                <td>
                    <img src="{{ $val->thumbnail->imgsrc }}" alt="{{ $val->title }}" class="rounded img-thumbnail img-fluid">
                </td>
                <td>{{ $val->title }}</td>
                <td>{{ $val->content }}</td>
                <td><span class="badge badge-secondary" style="color: {{ $val->tag }}">{{ $val->tag }}</span></td>
                <td class="white-space">{{ $val->comments }}</td>
                <td class="white-space">{{ $val->author }}</td>
                <td class="white-space">{{ $val->created_at }}</td>
                <td class="white-space">
                    <div class="btn-group btn-group-justified align-self-center" >
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewModal" data-whatever="@mdo">查看</button>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModel" data-whatever="@mdo">编辑</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal" data-whatever="@mdo">删除</button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row align-items-center page-item">
        <div class="col-12">
            <div class="d-flex flex-row-reverse bd-highlight">
                {{ $dataAllList->links() }}
            </div>
        </div>
    </div>
</div>
</body>
{{-- 编辑 --}}
    <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">编辑信息</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">标题:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-inline row">
                                <div class="form-group col-6">
                                    <label for="recipient-name" class="col-form-label">标签:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group col-6">
                                    <label for="recipient-name" class="col-form-label">作者:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">发布时间:</label>
                            <input type="date" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">信息内容:</label>
                            <textarea class="form-control" id="message-text" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
    {{-- 删除 --}}
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
</html>
