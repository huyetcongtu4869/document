@extends('templates.layout')
@section('content')
    <form action="{{ route('route_cate_real_estate_add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="#" method="post">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Tên loại hình bất động sản
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-username" name="name"
                                                placeholder="Enter a username..">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-currency">Ảnh danh mục <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <img id="mat_truoc_preview"
                                                src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                                                alt="your image"
                                                style="max-width: 200px; height:100px; margin-bottom: 10px;"
                                                class="img-fluid" />
                                            <input type="file" name="image" accept="image/*"
                                                class="form-control-file @error('image') is-invalid @enderror"
                                                id="cmt_truoc">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </form>
@endsection
@section('script')
    <script>
        $(function() {
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function() {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>
@endsection
