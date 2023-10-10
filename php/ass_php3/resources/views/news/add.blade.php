@extends('templates.layout')
@section('content')
    <form action="{{ route('route_news_add') }}" method="post" enctype="multipart/form-data">
        {{-- @csrf --}}
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                @csrf
                                <div class="form-validation">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Tiêu đề <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-username" name="title"
                                                placeholder="Enter a username..">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Nội dung <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-suggestions" name="desc" rows="5"
                                            placeholder="What would you like to see?"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Danh mục tin tức<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="cate">

                                            <option value="">Please select</option>
                                            @foreach ($cate as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-currency">Ảnh dự án <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <img id="mat_truoc_preview"
                                            src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                                            alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;"
                                            class="img-fluid" />
                                        <input type="file" name="image" accept="image/*"
                                            class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
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
