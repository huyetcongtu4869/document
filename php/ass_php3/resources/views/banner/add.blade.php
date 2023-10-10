@extends('templates.layout')
@section('content')
    <form action="{{ route('route_banner_add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="#" method="post">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-email">Name <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-email" name="name"
                                                placeholder="Your valid email..">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-currency">Ảnh dự án <span
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
@endsection
@section('script')
    <script>
        let uploadInput = document.getElementById('cmt_truoc');
        let uploadImage = document.getElementById('mat_truoc_preview');
        uploadInput.addEventListener('change', function(event) {
            let file = event.target.files[0];
            uploadImage.src = URL.createObjectURL(file);
        })
    </script>
@endsection
