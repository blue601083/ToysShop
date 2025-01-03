@extends("admin.layout")
@section("title", "商品管理列表")
@section("content")
<link rel="stylesheet" href="/admin/css/lightbox.min.css">
<script src="/admin/js/lightbox.min.js"></script>
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
                    <a href="/admin/product/add" class="btn btn-primary">
                        <i class="bi bi-person-fill-add"></i> 新增
                    </a>
                </div>
                <div>
                    <h5>列表資料總數: {{ $list->total() }} 筆</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered"> <!-- 縮小字體大小 -->
                        <thead class="table-dark text-center">
                            <tr>
                                <th>編號</th> <!-- 調整欄寬 -->
                                <th>圖片</th>
                                <th>名稱</th>
                                <th>類別</th>
                                <th>內容</th>
                                <th>點數</th>
                                <th>總數</th>
                                <th>庫存</th>
                                <th>出貨天數</th>
                                <th>上架時間</th>
                                <th class="col-2">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($list as $data)
                            <tr class="text-center">
                                <td>{{ $data->Id }}</td>
                                <td>
                                    @if(!empty($data->photo))
                                    <a href="/admin/images/{{ $data->photo }}" data-lightbox="image" data-title="{{ $data->name }}">
                                        <img src="/admin/images/{{ $data->photo }}" width="75">
                                    </a>
                                    @endif
                                </td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->category->name ?? '無分類' }}</td>
                                <td>
                                    <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#contentModal-{{ $data->Id }}">
                                        {{ Str::limit($data->content, 50, '....(了解更多)') }}
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="contentModal-{{ $data->Id }}" tabindex="-1" aria-labelledby="contentModalLabel-{{ $data->Id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="contentModalLabel-{{ $data->Id }}">內容詳情</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $data->content }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $data->point }}</td>
                                <td>{{ $data->totalCount }}</td>
                                <td>{{ $data->stock }}</td>
                                <td>{{ $data->shippingDays }}</td>
                                <td>{{ $data->createTime }}</td>
                                <td>
                                    <a href="/admin/product/edit/{{ $data->Id }}" class="btn btn-sm btn-success">
                                        <i class="bi bi-pencil-square"></i> 修改
                                    </a>&nbsp;&nbsp;&nbsp;
                                    <form action="/admin/product/delete" method="POST" id="delete-form-{{ $data->Id }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="Id" value="{{ $data->Id }}">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="doDelete('{{ $data->Id }}')">
                                            <i class="bi bi-trash-fill"></i> 刪除
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">目前沒有活動公告資料。</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $list->links() }}
                    </div>
                    <div class="text-center mt-3">
                        <p>
                            第 {{ $list->currentPage() }} 頁，共 {{ $list->lastPage() }} 頁，本頁顯示 {{ $list->count() }} 筆
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection