@extends('templates.layout-client')
@section('content')
  
            <div class="row no-gutters slider-text justify-content-center align-items-center">
                <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                    <div class="text text-center w-100">
                        <h1 class="mb-4">Find Properties <br>That Make You Money</h1>
                        <p><a href="#" class="btn btn-primary py-3 px-4">Search Properties</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mouse">
            <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
            </a>
        </div>
    </div>


    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-wrap-1 ftco-animate">
                        <form action="#" class="search-property-1">
                            <div class="row">
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Location</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="ion-ios-search"></span></div>
                                            <input type="text" class="form-control" placeholder="City/Locality Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Property Type</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Type</option>
                                                    <option value="">Commercial</option>
                                                    <option value="">- Office</option>
                                                    <option value="">Residential</option>
                                                    <option value="">Villa</option>
                                                    <option value="">Condominium</option>
                                                    <option value="">Apartment</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Property Status</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Type</option>
                                                    <option value="">Rent</option>
                                                    <option value="">Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Price Limit</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">$5,000</option>
                                                    <option value="">$10,000</option>
                                                    <option value="">$50,000</option>
                                                    <option value="">$100,000</option>
                                                    <option value="">$200,000</option>
                                                    <option value="">$300,000</option>
                                                    <option value="">$400,000</option>
                                                    <option value="">$500,000</option>
                                                    <option value="">$600,000</option>
                                                    <option value="">$700,000</option>
                                                    <option value="">$800,000</option>
                                                    <option value="">$900,000</option>
                                                    <option value="">$1,000,000</option>
                                                    <option value="">$2,000,000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-self-end">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <input type="submit" value="Search Property"
                                                class="form-control btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section goto-here">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">What we offer</span>
                    <h2 class="mb-2">Exclusive Offer For You</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($realEstate as $item)
                    <div class="col-md-4">
                        <div class="property-wrap ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center"
                                style="background-image: url('{{ $item->image ? '' . Storage::url($item->image) : '' }}');">
                                <a href="{{ url('properties-single/' . $item->id) }}"
                                    class="icon d-flex align-items-center justify-content-center btn-custom">
                                    <span class="ion-ios-link"></span>
                                </a>
                                {{-- <img src="{{ $item->image ? '' . Storage::url($item->image) : '' }}" alt=""> --}}
                                <div class="list-agent d-flex align-items-center">
                                    <a href="" class="agent-info d-flex align-items-center">
                                        <div class="img-2 rounded-circle"
                                            style="background-image: url('{{ Storage::url($item->image) }}');">
                                        </div>

                                        <h3 class="mb-0 ml-2">Ben Ford</h3>
                                    </a>
                                    <div class="tooltip-wrap d-flex">
                                        <a href="#" class="icon-2 d-flex align-items-center justify-content-center"
                                            data-toggle="tooltip" data-placement="top" title="Bookmark">
                                            <span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
                                        </a>
                                        <a href="#" class="icon-2 d-flex align-items-center justify-content-center"
                                            data-toggle="tooltip" data-placement="top" title="Compare">
                                            <span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p class="price mb-3"><span class="old-price">800,000</span><span
                                        class="orig-price">${{ $item->price }}<small></small></span></p>
                                <h3 class="mb-0"><a href="properties-single.html">{{ $item->name }}</a></h3>
                                <span class="location d-inline-block mb-3"><i
                                        class="ion-ios-pin mr-2"></i>{{ $item->address }}
                                    {{ $item->cateRealEstate }}</span>
                                <ul class="property_list">
                                    <li><span class="flaticon-floor-plan"></span>{{ $item->area }} m&sup2;</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Find Properties</span>
                    <h2 class="mb-2">Find Properties In Your City</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($cateRealEstate as $item)
                    <div class="col-md-4">
                        <div class="listing-wrap img rounded d-flex align-items-end"
                            style="background-image: url('{{ Storage::url($item->image) }}');">
                            <div class="location">
                                <span class="rounded">{{ $item->name }}</span>
                            </div>
                            <div class="text">
                                <h3><a href="#">{{ $item->quantity }} Property Listing</a></h3>
                                <a href="#" class="btn-link">See All Listing <span
                                        class="ion-ios-arrow-round-forward"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach ($news as $item)
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <div class="text">
                                <a href="blog-single.html" class="block-20 img"
                                    style="background-image: url('{{ Storage::url($item->image) }}');">
                                </a>
                                <h3 class="heading"><a href="#">{{ $item->title }}</a>
                                </h3>
                                <div class="meta mb-3">
                                    <div><a href="#">{{ $item->created_at }}</a></div>
                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
