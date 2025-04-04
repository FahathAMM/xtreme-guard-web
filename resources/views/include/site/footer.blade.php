@php
    $footerData = [
        'address' => '26 Al Nahdha St - Bur dubai - Al Fahidi - Dubai',
        'contact' => [
            'email' => 'sales@akilsecurity.com',
            'phone' => '+971 52 482 0440',
        ],
        'socialLinks' => [
            'fb' => '#',
            'x' => '#',
            'instagram' => '#',
            'tiktok' => '#',
            'amazon' => '#',
            'pinterest' => '#',
        ],
        'information' => [
            'Home' => url('/'),
            'Product' => url('product'),
            'Blog' => url('blog'),
            'Contact' => url('contact'),
            'About' => url('aboutus'),
        ],

        'customerServices' => getParentCategories(),
        'newsletter' => [
            'message' => 'Sign up for our newsletter and get 10% off your first purchase',
        ],
        'paymentMethods' => ['img-1', 'img-2', 'img-3', 'img-4', 'img-5', 'img-6'],
    ];
@endphp


<footer id="footer" class="footer bg-main">
    <div class="footer-wrap">
        <div class="footer-body py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-infor">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('site/images/logo/3.png') }}" alt="">
                                </a>
                            </div>
                            {{-- <div class="footer-address">
                                <p>{{ $footerData['address'] }}</p>
                                <a href="{{ url('contact') }}" class="tf-btn-default style-white fw-6">
                                    GET DIRECTION<i class="icon-arrowUpRight"></i></a>
                            </div> --}}
                            <ul class="footer-info">
                                <li>
                                    <i class="icon-map-pin"></i>
                                    <p>{{ $footerData['address'] }}</p>
                                </li>
                                <li>
                                    <i class="icon-mail"></i>
                                    <p>{{ $footerData['contact']['email'] }}</p>
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <p>{{ $footerData['contact']['phone'] }}</p>
                                </li>
                            </ul>
                            {{-- <ul class="tf-social-icon1 tf-social-icon style-white">
                                @foreach ($footerData['socialLinks'] as $key => $link)
                                    <li><a href="{{ $link }}" class="social-{{ $key }}"><i
                                                class="icon icon-{{ $key }}"></i></a></li>
                                @endforeach
                            </ul> --}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-menu">
                            <div class="footer-col-block">
                                <div class="footer-heading text-button footer-heading-mobile">
                                    Infomation
                                </div>
                                <div class="tf-collapse-content">
                                    <ul class="footer-menu-list">
                                        @foreach ($footerData['information'] as $label => $url)
                                            <li class="text-caption-1">
                                                <a href="{{ $url }}"
                                                    class="footer-menu_item">{{ ucfirst(str_replace('_', ' ', $label)) }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-col-block">
                                <div class="footer-heading text-button footer-heading-mobile">
                                    Customer Services
                                </div>
                                <div class="tf-collapse-content">
                                    <ul class="footer-menu-list">
                                        @foreach ($footerData['customerServices'] as $key => $item)
                                            {{-- @dd($footerData['customerServices']) --}}
                                            <li class="text-caption-1">
                                                <a href="{{ url('product-by-category/' . $item['slug']) }}"
                                                    class="footer-menu_item">{{ $item['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-col-block">
                            <div class="footer-heading text-button footer-heading-mobile">
                                Newletter
                            </div>
                            <div class="tf-collapse-content">
                                <div class="footer-newsletter">
                                    <p class="text-caption-1">{{ $footerData['newsletter']['message'] }}</p>
                                    <form id="subscribe-form" action="#" class="form-newsletter subscribe-form"
                                        method="post" accept-charset="utf-8" data-mailchimp="true">
                                        <div id="subscribe-content" class="subscribe-content">
                                            <fieldset class="email">
                                                <input id="subscribe-email" type="email" name="email-form"
                                                    class="subscribe-email" placeholder="Enter your e-mail"
                                                    tabindex="0" aria-required="true">
                                            </fieldset>
                                            <div class="button-submit">
                                                <button id="subscribe-button" class="subscribe-button" type="button"><i
                                                        class="icon icon-arrowUpRight"></i></button>
                                            </div>
                                        </div>
                                        <div id="subscribe-msg" class="subscribe-msg"></div>
                                    </form>
                                </div>
                            </div>
                            <ul
                                class="tf-social-icon1 mt-3 tf-social-icon w-100 style-white d-flex justify-content-center">
                                @foreach ($footerData['socialLinks'] as $key => $link)
                                    <li><a href="{{ $link }}" class="social-{{ $key }}"><i
                                                class="icon icon-{{ $key }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-wrap">
                            <div class="left">
                                <p class="text-caption-1">©2024 Modave. All Rights Reserved.</p>
                                <div class="tf-cur justify-content-end">
                                    <div class="tf-languages">
                                        <select class="image-select center style-default type-languages">
                                            <option>English</option>
                                            <option>Vietnam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-payment">
                                <p class="text-caption-1">Payment:</p>
                                <ul>
                                    @foreach ($footerData['paymentMethods'] as $method)
                                        <a href="#">
                                            <img src='{{ asset("site/images/payment/{$method}.png") }}' alt="">
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</footer>
