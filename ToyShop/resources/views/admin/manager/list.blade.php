@extends("admin.layout")
@section("title", "員工管理列表")
@section("content")
<div class="app-content-header bg-light py-3 shadow-sm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0"><i class="bi bi-list-check me-2 fs-2"></i>@yield("title")</h3>
            </div>
        </div>
    </div>
</div><br>

<!-- Table 區塊 -->
<div class="app-content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11"> <!-- 調整表格容器的寬度 -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="/admin/manager/add" class="btn btn-primary">
                        <i class="bi bi-person-fill-add"></i> 新增
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered"> <!-- 縮小字體大小 -->
                        <thead class="table-dark text-center">
                            <tr>
                                <th class="col-1">編號</th> <!-- 調整欄寬 -->
                                <th class="col-2">姓名</th>
                                <th class="col-2">帳號</th>
                                <th class="col-2">建立時間</th>
                                <th class="col-2">修改時間</th>
                                <th class="col-3">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($list as $data)
                            @if(($data -> deleteTime) == null)
                            <tr class="text-center">
                                <td>{{ $data->Id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->account }}</td>
                                <td>{{ $data->createTime }}</td>
                                <td>{{ $data->updateTime }}</td>
                                <td>
                                    <a href="/admin/manager/edit/{{ $data->Id }}" class="btn btn-sm btn-success">
                                        <i class="bi bi-pencil-square"></i> 修改
                                    </a>&nbsp;&nbsp;&nbsp;
                                    <form action="/admin/manager/delete" method="POST" id="delete-form-{{ $data->Id }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="Id" value="{{ $data->Id }}">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="doDelete('{{ $data->Id }}')">
                                            <i class="bi bi-trash-fill"></i> 刪除
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">目前沒有員工資料。</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection