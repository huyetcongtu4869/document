@extends('templates.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Danh mục tin tức</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a href="{{ url('edit-cate-news/' . $item->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                <a href="{{ url('delete-cate-news/' . $item->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Close"><i
                                                        class="fa fa-close color-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <a href="{{ url('add-cate-news') }}"><button
                                                    type="button"class="btn mb-1 btn-rounded btn-info"><span
                                                        class="btn-icon-left"><i
                                                            class="fa fa-plus color-info"></i></span>Add</button></a>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
