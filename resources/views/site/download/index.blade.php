@extends('layout.app-site')

@section('content')
    @php
        $contactInfo = [
            ['title' => 'Phone', 'value' => '+971 52 482 0440'],
            ['title' => 'Email', 'value' => 'sales@akilsecurity.com'],
            ['title' => 'Address', 'value' => '26 Al Nahdha St - Bur dubai - Al Fahidi - Dubai'],
        ];

        $openTime = [
            ['day' => 'Mon - Sat', 'time' => '9:30am - 9:30pm'],
            ['day' => 'Sunday', 'time' => '9:00am - 5:00pm'],
        ];

        $categories = [
            'headphone' => 'Headphone',
            'mouse' => 'Mouse',
            'keyboard' => 'Keyboard',
            'mousepad' => 'Mousepad',
            'cable' => 'Cables',
            'networking' => 'Networking',
        ];
        $first = true;
    @endphp

    <x-site.component.page-title :title="$modelName" :breadcrumbs="[['label' => 'Home', 'url' => url('/')], ['label' => $modelName]]" />

    {{-- @dd($attachments) --}}

    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons5.min.css') }}">

    <section class="flat-spacing">
        <div class="container">
            <div class="heading-section-4 wow fadeInUp">
                <div class="heading-left">
                    {{-- <h3 class="heading font-5 fw-bold">Best Sellers</h3> --}}
                    <ul class="tab-product style-2 justify-content-sm-center mb-0" role="tablist">

                        @foreach ($attachments as $key => $name)
                            <li class="nav-tab-item" role="presentation">
                                <a href="#{{ $key }}" class="{{ $first ? 'active' : '' }}"
                                    data-bs-toggle="tab">{{ $key }}</a>
                            </li>
                            @php $first = false; @endphp

                            @if (!$loop->last)
                                <li class="text-line d-none d-sm-block">/</li>
                            @endif
                        @endforeach
                    </ul>

                </div>
                {{-- <a href="shop-collection.html" class="btn-line">View All Products</a> --}}
            </div>
            <div class="flat-animate-tab">
                <div class="tab-content">

                    @foreach ($attachments as $key => $products)
                        <div class="tab-pane {{ $loop->first ? 'active show' : '' }}" id="{{ $key }}"
                            role="tabpanel">


                            <div class="widget-content-inner d-flex justify-content-start active">
                                <div class="w-100">
                                    <div class="w-100 ">
                                        <div>
                                            <table class="tf-table-page-cart">
                                                <tbody>

                                                    @foreach ($products as $product)
                                                        {{-- <pre>
                                                        {{ $product['files'] }}
                                                    </pre> --}}
                                                        @foreach ($product['files'] as $file)
                                                            <tr class="tf-cart-item1 file-delete">
                                                                <td class="tf-cart-item_product">
                                                                    <i class="fas fa-file-pdf me-2 fs-2 text-danger"></i>
                                                                    {{ $file->file_name }}
                                                                </td>

                                                                <td>
                                                                    <span class="fs-12">
                                                                        <small style=" font-size: 12px; ">Last
                                                                            updated:</small>
                                                                        {{ date('d M Y', strtotime($file->created_at)) }}
                                                                    </span>
                                                                </td>

                                                                <td class="remove-cart text-end">
                                                                    {{-- <span class="fs-12">
                                                                        <small style=" font-size: 10px; ">Last
                                                                            updated:</small>
                                                                        {{ date('d M Y', strtotime($file->created_at)) }}
                                                                    </span> --}}
                                                                    <a href="{{ asset('storage/' . $file->path, []) }}"
                                                                        download
                                                                        class="d-flex justify-content-end  link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">
                                                                        <i class="fas fa-download me-2"></i>
                                                                        <span>Download</span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach


                                                    {{-- <tr class="tf-cart-item1 file-delete">
                                                        <td class="tf-cart-item_product">
                                                            <i class="fas fa-file-pdf me-2 fs-2 text-danger"></i>
                                                            Doc1
                                                        </td>

                                                        <td class="remove-cart text-end">
                                                            <span class="fs-12">
                                                                <small style=" font-size: 10px; ">Last updated:</small>
                                                                13 Mar 2025
                                                            </span>
                                                            <a href="http://143.244.130.129/storage/attachment/64UIBq902XiZUFlPiJp9Qqa7MvDDFo41wfELHMwd.pdf"
                                                                download=""
                                                                class="d-flex justify-content-end  link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">
                                                                <i class="fas fa-download me-2"></i>
                                                                <span>Download</span>
                                                            </a>
                                                        </td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    @endforeach

                </div>
    </section>














    {{-- <section class="flat-spacing">
        <div class="container">
            <div class="heading-section-4 wow fadeInUp">
                <div class="heading-left">
                    <ul class="tab-product style-2 justify-content-sm-center mb-0" role="tablist">

                        @foreach ($categories as $id => $name)
                            <li class="nav-tab-item" role="presentation">
                                <a href="#{{ $id }}" class="{{ $first ? 'active' : '' }}"
                                    data-bs-toggle="tab">{{ $name }}</a>
                            </li>
                            @php $first = false; @endphp

                            @if (!$loop->last)
                                <li class="text-line d-none d-sm-block">/</li>
                            @endif
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="flat-animate-tab">
                <div class="tab-content">
                    <div class="tab-pane active show" id="headphone" role="tabpanel">

                        <div class="widget-content-inner d-flex justify-content-start active">
                            <div class="w-100">
                                <div class="w-100 w-sm-100 w-md-75 w-lg-100 w-xl-50 w-xxl-50">
                                <div>
                                    <table class="tf-table-page-cart">
                                        <tbody>
                                            <tr class="tf-cart-item1 file-delete">
                                                <td class="tf-cart-item_product">
                                                    <i class="fas fa-file-pdf me-2 fs-2 text-danger"></i>
                                                    Doc1
                                                </td>

                                                <td class="remove-cart text-end">
                                                    <span class="fs-12">
                                                        <small style=" font-size: 10px; ">Last updated:</small>
                                                        13 Mar 2025
                                                    </span>
                                                    <a href="http://143.244.130.129/storage/attachment/64UIBq902XiZUFlPiJp9Qqa7MvDDFo41wfELHMwd.pdf"
                                                        download=""
                                                        class="d-flex justify-content-end  link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">
                                                        <i class="fas fa-download me-2"></i>
                                                        <span>Download</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane" id="mouse" role="tabpanel">
                        mouse
                    </div>
                    <div class="tab-pane" id="keyboard" role="tabpanel">
                        keyboard
                    </div>
                    <div class="tab-pane" id="mousepad" role="tabpanel">
                        mousepad
                    </div>
                    <div class="tab-pane" id="cable" role="tabpanel">
                        cable
                    </div>
                    <div class="tab-pane" id="networking" role="tabpanel">
                        networking
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
