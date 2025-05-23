@php
    $menuItems = [
        ['name' => 'Home', 'url' => url('/'), 'pattern' => '/'],
        // ['name' => 'Category', 'url' => '#', 'pattern' => 'category', 'sub' => getCategories()],
        ['name' => 'Products', 'url' => url('product'), 'pattern' => 'product*'],
        ['name' => 'Blog', 'url' => url('blog'), 'pattern' => 'blog*'],
        ['name' => 'Contact Us', 'url' => url('contact'), 'pattern' => 'contact'],
        ['name' => 'About Us', 'url' => url('about'), 'pattern' => 'about'],
    ];
@endphp

<header id="header" class="header-default">
    <div class="container">
        <div class="row wrapper-header align-items-center">
            <div class="col-md-4 col-3 d-xl-none">
                <a href="#mobileMenu" class="mobile-menu" data-bs-toggle="offcanvas" aria-controls="mobileMenu">
                    <i class="icon icon-categories"></i>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="index.html" class="logo-header">
                    <img src="https://themesflat.co/html/modave/images/logo/logo.svg" alt="logo" class="logo">
                </a>
            </div>
            <div class="col-xl-6 d-none d-xl-block">




                @php
                    // Get categories that exist as subcategories
                    $subCategoryIds = getCategoriesForHeader()->flatMap->subcategories->pluck('id')->toArray();
                    // dd($subCategoryIds);
                @endphp
                {{-- {{ json_encode(getCategoriesForHeader()->flatMap->subcategories) }} --}}
                <nav class="box-navigation text-center">
                    <ul class="box-nav-ul d-flex align-items-center justify-content-center">

                        <li class="menu-item">
                            <div class="tf-list-categories">
                                <a href="#" class="item-link">
                                    Product
                                    <i class="icon icon-arrow-down"></i>
                                </a>
                                <div class="list-categories-inner">
                                    <ul>
                                        @foreach (getCategoriesForHeader() as $category)
                                            {{-- Skip categories that are already a subcategory --}}
                                            @if (!in_array($category->id, $subCategoryIds))
                                                <li class="sub-categories2">
                                                    <a href="#" class="categories-item">
                                                        <span class="inner-left">
                                                            <i class="icon icon-{{ $category->icon }}"></i>
                                                            {{ $category->name }}
                                                        </span>
                                                        @if ($category->subcategories->count())
                                                            <i class="icon icon-arrRight"></i>
                                                        @endif
                                                    </a>

                                                    {{-- first child  --}}
                                                    @if ($category->subcategories->count())
                                                        <ul class="list-categories-inner">
                                                            @foreach ($category->subcategories as $subcategory)
                                                                {{-- @dd($subcategory->subcategories->count()) --}}
                                                                <li class="sub-categories2">
                                                                    <a href="#" class="categories-item">
                                                                        <span class="inner-left">
                                                                            {{ $subcategory->name }}gg
                                                                        </span>
                                                                        @if ($subcategory->subcategories->count())
                                                                            <i class="icon icon-arrRight"></i>
                                                                        @endif
                                                                    </a>

                                                                    {{-- third child --}}
                                                                    @if ($subcategory->subcategories->count())
                                                                        <ul class="list-categories-inner">
                                                                            @foreach ($subcategory->subcategories as $subcategory)
                                                                                <li class="sub-categories2">
                                                                                    <a href=""
                                                                                        class="categories-item">
                                                                                        <span class="inner-left">
                                                                                            {{ $subcategory->name }}
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif

                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>



                        @foreach ($menuItems as $item)
                            <li class="menu-item {{ request()->is($item['pattern']) ? 'active' : '' }}">
                                <a href="{{ $item['url'] }}" class="item-link">
                                    {{ $item['name'] }}
                                    @if (!empty($item['sub']))
                                        <i class="icon icon-arrow-down"></i>
                                    @endif
                                </a>

                                @if (!empty($item['sub']) && $item['name'] === 'Category')
                                    <div class="sub-menu mega-menu">
                                        <div class="container">
                                            <div class="row-demo">
                                                @foreach ($item['sub'] as $category)
                                                    <div class="demo-item active">
                                                        <a href="home-fashion-eleganceNest.html">
                                                            <div class="demo-image position-relative"
                                                                style="height: 80%">
                                                                <img class="lazyload" data-src="{{ $category->img }}"
                                                                    src="{{ $category->img }}"
                                                                    alt="{{ $category->name }}">
                                                                <div class="demo-label">
                                                                    <span class="demo-new">New</span>
                                                                    <span class="demo-hot">Hot</span>
                                                                </div>
                                                            </div>
                                                            <span class="demo-name mt-2">{{ $category->name }}</span>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="text-center view-all-demo">
                                                <a href="#modalDemo" data-bs-toggle="modal" class="tf-btn">
                                                    <span class="text">View All Products</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @endforeach


                        {{-- <div class="tf-list-categories">
                            <a href="#" class="categories-title"><span
                                    class="icon-left icon-squares-four"></span>
                                <span class="text">Shop By
                                    Categories</span> <span class="icon icon-arrow-down"></span></a>
                            <div class="list-categories-inner">
                                <ul>
                                    <li class="sub-categories2">
                                        <a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-laptop"></i> Accessories</span><i
                                                class="icon icon-arrRight"></i></a>
                                        <ul class="list-categories-inner">
                                            <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                            class="icon icon-camera"></i> Camera
                                                        &amp; Photo</span></a></li>
                                            <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                            class="icon icon-camera"></i> Camera
                                                        &amp; Photo</span></a></li>
                                            <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                            class="icon icon-camera"></i> Camera
                                                        &amp; Photo</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-categories2">
                                        <a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-camera"></i> Camera &amp; Photo</span><i
                                                class="icon icon-arrRight"></i></a>
                                        <ul class="list-categories-inner">
                                            <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                            class="icon icon-camera"></i> Camera
                                                        &amp; Photo</span></a></li>
                                            <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                            class="icon icon-camera"></i> Camera
                                                        &amp; Photo</span></a></li>
                                            <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                            class="icon icon-camera"></i> Camera
                                                        &amp; Photo</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-smartphone"></i> Smart Phones</span></a></li>
                                    <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-tv"></i> TV &amp; Audio</span><i
                                                class="icon icon-arrRight"></i></a></li>
                                    <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-laptop"></i> Computer &amp; Laptop</span><i
                                                class="icon icon-arrRight"></i></a></li>
                                    <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-software"></i> Software</span></a></li>
                                    <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-headphones"></i> Headphones</span></a></li>
                                    <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-audio"></i> Home Audio</span></a></li>
                                    <li><a href="#" class="categories-item"><span class="inner-left"><i
                                                    class="icon icon-security"></i> Security &amp;
                                                Surveillance</span><i class="icon icon-arrRight"></i></a></li>
                                </ul>
                                <div class="box-cate-bottom">
                                    <ul>
                                        <li><a href="#" class="categories-item"><span class="inner-left">
                                                    Accessories</span><i class="icon icon-arrRight"></i></a></li>
                                        <li><a href="#" class="categories-item"><span class="inner-left">
                                                    Camera &amp; Photo</span><i class="icon icon-arrRight"></i></a>
                                        </li>
                                        <li><a href="#" class="categories-item"><span class="inner-left">
                                                    Smart Phones</span><i class="icon icon-arrRight"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                    </ul>



                </nav>
            </div>

            <div class="col-xl-3 col-md-4 col-3">
                <ul class="nav-icon d-flex justify-content-end align-items-center">
                    <li class="nav-search"><a href="#search" data-bs-toggle="modal" class="nav-icon-item">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a></li>
                    <li class="nav-account">
                        <a href="#" class="nav-icon-item">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                        <div class="dropdown-account dropdown-login">
                            <div class="sub-top">
                                <a href="login.html" class="tf-btn btn-reset">Login</a>
                                <p class="text-center text-secondary-2">Don’t have an account? <a
                                        href="register.html">Register</a></p>
                            </div>
                            <div class="sub-bot">
                                <span class="body-text-">Support</span>
                            </div>
                        </div>
                    </li>
                    <li class="nav-wishlist"><a href="wish-list.html" class="nav-icon-item">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item">
                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.5078 10.8734V6.36686C16.5078 5.17166 16.033 4.02541 15.1879 3.18028C14.3428 2.33514 13.1965 1.86035 12.0013 1.86035C10.8061 1.86035 9.65985 2.33514 8.81472 3.18028C7.96958 4.02541 7.49479 5.17166 7.49479 6.36686V10.8734M4.11491 8.62012H19.8877L21.0143 22.1396H2.98828L4.11491 8.62012Z"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="count-box">1</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

@if (request()->is('/'))
    <x-site.header.banner />
@endif


<!-- mobile menu -->
<div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <div class="mb-content-top">
                <form class="form-search">
                    <fieldset class="text">
                        <input type="text" placeholder="What are you looking for?" class="" name="text"
                            tabindex="0" value="" aria-required="true" required="">
                    </fieldset>
                    <button class="" type="submit">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                stroke="#181818" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20.9984 20.9999L16.6484 16.6499" stroke="#181818" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item active">
                        <a href="#dropdown-menu-one" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-one">
                            <span>Home</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-one" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="index.html" class="sub-nav-link">Fashion Womenswear</a></li>
                                <li><a href="home-fashion-eleganceNest.html" class="sub-nav-link active">Fashion
                                        EleganceNest</a></li>
                                <li><a href="home-fashion-main.html" class="sub-nav-link">Fashion Main</a></li>
                                <li><a href="home-fashion-trendset.html" class="sub-nav-link">Fashion TrendsetHome</a>
                                </li>
                                <li><a href="home-fashion-vogueLing.html" class="sub-nav-link">Fashion VogueLiving</a>
                                </li>
                                <li><a href="home-fashion-elegantAbode.html" class="sub-nav-link">Fashion
                                        ElegantAbode</a></li>
                                <li><a href="home-fashion-glamDwell.html" class="sub-nav-link">Fashion GlamDwell</a>
                                </li>
                                <li><a href="home-fashion-classyCove.html" class="sub-nav-link">Fashion ClassyCove</a>
                                </li>
                                <li><a href="home-fashion-chicHaven.html" class="sub-nav-link">Fashion ChicHaven 1</a>
                                </li>
                                <li><a href="home-fashion-chicHaven-02.html" class="sub-nav-link">Fashion ChicHaven
                                        2</a></li>
                                <li><a href="home-fashion-tiktok.html" class="sub-nav-link">Fashion TikTok</a></li>
                                <li><a href="home-fashion-luxeLiving.html" class="sub-nav-link">Fashion LuxeLiving</a>
                                </li>
                                <li><a href="home-fashion-modernRetreat.html" class="sub-nav-link">Fashion
                                        ModernRetreat</a></li>
                                <li><a href="home-beauty.html" class="sub-nav-link">Beauty</a></li>
                                <li><a href="home-skincare.html" class="sub-nav-link">Skin Care</a></li>
                                <li><a href="home-cosmetic.html" class="sub-nav-link">Cosmetic</a></li>
                                <li><a href="home-decor.html" class="sub-nav-link">Decor</a></li>
                                <li><a href="home-furniture.html" class="sub-nav-link">Furniture</a></li>
                                <li><a href="home-jewelry-01.html" class="sub-nav-link">Jewelry ElegantGems</a></li>
                                <li><a href="home-jewelry-02.html" class="sub-nav-link">Jewelry GlitterGlam</a></li>
                                <li><a href="home-activewear.html" class="sub-nav-link">Activewear</a></li>
                                <li><a href="home-organic.html" class="sub-nav-link">Organic</a></li>
                                <li><a href="home-sock.html" class="sub-nav-link">Socks</a></li>
                                <li><a href="home-camping.html" class="sub-nav-link">Camping</a></li>
                                <li><a href="home-electronic.html" class="sub-nav-link">Electronic Market</a></li>
                                <li><a href="home-pet-store.html" class="sub-nav-link">Pet Store</a></li>
                                <li><a href="home-pickleball.html" class="sub-nav-link">PickleBall</a></li>
                                <li><a href="home-sock-2.html" class="sub-nav-link">Sock 2</a></li>
                                <li><a href="home-bookstore.html" class="sub-nav-link">Book Store</a></li>
                                <li><a href="home-baby.html" class="sub-nav-link">Baby</a></li>
                                <li><a href="home-electronics-store.html" class="sub-nav-link">Electronics Store</a>
                                </li>
                                <li><a href="home-sneaker.html" class="sub-nav-link">Sneaker</a></li>
                                <li><a href="home-gaming.html" class="sub-nav-link">Gaming Accessory</a></li>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-two" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Shop</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-two" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="#sub-shop-one" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="sub-shop-one">
                                        <span>Shop layout</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-one" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="shop-default-grid.html" class="sub-nav-link">Default Grid</a>
                                            </li>
                                            <li><a href="shop-default-list.html" class="sub-nav-link">Default List</a>
                                            </li>
                                            <li><a href="shop-fullwidth-list.html" class="sub-nav-link">Full Width
                                                    List</a></li>
                                            <li><a href="shop-fullwidth-grid.html" class="sub-nav-link">Full Width
                                                    Grid</a></li>
                                            <li><a href="shop-left-sidebar.html" class="sub-nav-link">Left Sidebar</a>
                                            </li>
                                            <li><a href="shop-right-sidebar.html" class="sub-nav-link">Right
                                                    Sidebar</a></li>
                                            <li><a href="shop-filter-dropdown.html" class="sub-nav-link">Filter
                                                    Dropdown</a></li>
                                            <li><a href="shop-filter-canvas.html" class="sub-nav-link">Filter
                                                    Canvas</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-shop-two" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="sub-shop-two">
                                        <span>Shop Features</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-two" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="shop-categories-top.html" class="sub-nav-link">Categories Top
                                                    1</a></li>
                                            <li><a href="shop-categories-top-02.html" class="sub-nav-link">Categories
                                                    Top 2</a></li>
                                            <li><a href="shop-collection.html" class="sub-nav-link">Shop
                                                    Collection</a></li>
                                            <li><a href="shop-breadcrumb-img.html" class="sub-nav-link">Breadcrumb
                                                    IMG</a></li>
                                            <li><a href="shop-breadcrumb-left.html" class="sub-nav-link">Breadcrumb
                                                    Left</a></li>
                                            <li><a href="shop-breadcrumb-background.html"
                                                    class="sub-nav-link">Breadcrumb BG</a></li>
                                            <li><a href="shop-load-button.html" class="sub-nav-link">Load Button</a>
                                            </li>
                                            <li><a href="shop-pagination.html" class="sub-nav-link">Pagination</a>
                                            </li>
                                            <li><a href="shop-infinite-scrolling.html" class="sub-nav-link">Infinite
                                                    Scrolling</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-shop-three" class="sub-nav-link collapsed"
                                        data-bs-toggle="collapse" aria-expanded="true"
                                        aria-controls="sub-shop-three">
                                        <span>Products Hover</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-three" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-style-01.html" class="sub-nav-link">Product Style
                                                    1</a></li>
                                            <li><a href="product-style-02.html" class="sub-nav-link">Product Style
                                                    2</a></li>
                                            <li><a href="product-style-03.html" class="sub-nav-link">Product Style
                                                    3</a></li>
                                            <li><a href="product-style-04.html" class="sub-nav-link">Product Style
                                                    4</a></li>
                                            <li><a href="product-style-05.html" class="sub-nav-link">Product Style
                                                    5</a></li>
                                            <li><a href="product-style-06.html" class="sub-nav-link">Product Style
                                                    6</a></li>
                                            <li><a href="product-style-07.html" class="sub-nav-link">Product Style
                                                    7</a></li>

                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-shop-four" class="sub-nav-link collapsed" data-bs-toggle="collapse"
                                        aria-expanded="true" aria-controls="sub-shop-four">
                                        <span>My Pages</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-four" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="wish-list.html" class="sub-nav-link">Wish List</a></li>
                                            <li><a href="search-result.html" class="sub-nav-link">Search Result</a>
                                            </li>
                                            <li><a href="shopping-cart.html" class="sub-nav-link">Shopping Cart</a>
                                            </li>
                                            <li><a href="login.html" class="sub-nav-link">Login/Register</a></li>
                                            <li><a href="forget-password.html" class="sub-nav-link">Forget
                                                    Password</a></li>
                                            <li><a href="order-tracking.html" class="sub-nav-link">Order Tracking</a>
                                            </li>
                                            <li><a href="my-account.html" class="sub-nav-link">My Account</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-three" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>Products</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-three" class="collapse">
                            <ul class="sub-nav-menu">
                                <li>
                                    <a href="#sub-product-one" class="sub-nav-link collapsed"
                                        data-bs-toggle="collapse" aria-expanded="true"
                                        aria-controls="sub-product-one">
                                        <span>Products Layout</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-one" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-detail.html" class="sub-nav-link">Product Default</a>
                                            </li>
                                            <li><a href="product-grid-1.html" class="sub-nav-link">Product Grid1</a>
                                            </li>
                                            <li><a href="product-grid-2.html" class="sub-nav-link">Product Grid2</a>
                                            </li>
                                            <li><a href="product-stacked.html" class="sub-nav-link">Product
                                                    stacked</a></li>
                                            <li><a href="product-right-thumbnails.html" class="sub-nav-link">Product
                                                    right thumbnails</a></li>
                                            <li><a href="product-bottom-thumbnails.html" class="sub-nav-link">Product
                                                    bottom thumbnails</a></li>
                                            <li><a href="product-description-accordion.html"
                                                    class="sub-nav-link">Product Description Accordion</a></li>
                                            <li><a href="product-description-list.html" class="sub-nav-link">Product
                                                    Description List</a></li>
                                            <li><a href="product-description-menutab.html"
                                                    class="sub-nav-link">Product Description MenuTab</a></li>
                                            <li><a href="product-description-fullwidth.html"
                                                    class="sub-nav-link">Product Description Fullwidth</a></li>
                                            <li><a href="product-fixed-price.html" class="sub-nav-link">Product Fixed
                                                    Price</a></li>
                                            <li><a href="product-fixed-scroll.html" class="sub-nav-link">Product Fixed
                                                    Scrolls</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-product-two" class="sub-nav-link collapsed"
                                        data-bs-toggle="collapse" aria-expanded="true"
                                        aria-controls="sub-product-two">
                                        <span>Colors Swatched</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-two" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-swatch-color.html" class="sub-nav-link">Product
                                                    Swatch Color</a></li>
                                            <li><a href="product-swatch-rounded.html" class="sub-nav-link">Product
                                                    Swatch Rounded</a></li>
                                            <li><a href="product-swatch-rounded-color.html"
                                                    class="sub-nav-link">Product Swatch Rounded Colors</a></li>
                                            <li><a href="product-swatch-image.html" class="sub-nav-link">Product
                                                    Swatch Image</a></li>
                                            <li><a href="product-swatch-rounded-image.html"
                                                    class="sub-nav-link">Product Swatch Rounded Image</a></li>
                                            <li><a href="product-swatch-dropdown.html" class="sub-nav-link">Product
                                                    Swatch Dropdown</a></li>
                                            <li><a href="product-swatch-dropdown-color.html"
                                                    class="sub-nav-link">Product Swatch Dropdown Colors</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-product-three" class="sub-nav-link collapsed"
                                        data-bs-toggle="collapse" aria-expanded="true"
                                        aria-controls="sub-product-three">
                                        <span>Products Features</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-product-three" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-frequently-bought-together.html"
                                                    class="sub-nav-link">Frequently Bought Together 1</a></li>
                                            <li><a href="product-frequently-bought-together-02.html"
                                                    class="sub-nav-link">Frequently Bought Together 2</a></li>
                                            <li><a href="product-up-sell.html" class="sub-nav-link">Up Sell</a></li>
                                            <li><a href="product-pre-order.html" class="sub-nav-link">Pre-orders</a>
                                            </li>
                                            <li><a href="product-grouped.html" class="sub-nav-link">Grouped</a></li>
                                            <li><a href="product-customer-note.html" class="sub-nav-link">Customer
                                                    Note</a></li>
                                            <li><a href="product-out-of-stock.html" class="sub-nav-link">Out Of
                                                    Stock</a></li>
                                            <li><a href="product-pickup-available.html" class="sub-nav-link">Pick Up
                                                    Available</a></li>
                                            <li><a href="product-variable.html" class="sub-nav-link">Variable</a></li>
                                            <li><a href="product-deals.html" class="sub-nav-link">Deals</a></li>
                                            <li><a href="product-with-discount.html" class="sub-nav-link">With
                                                    Discount</a></li>
                                            <li><a href="product-external.html" class="sub-nav-link">External</a></li>
                                            <li><a href="product-subscribe-save.html" class="sub-nav-link">Subscribe
                                                    Save</a></li>
                                            <li><a href="product-deals-grid.html" class="sub-nav-link">Deals Grid</a>
                                            </li>
                                            <li><a href="product-buyx-gety.html" class="sub-nav-link">Buy X Get Y</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <span>Blog</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-four" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="blog-default.html" class="sub-nav-link">Blog Default</a></li>
                                <li><a href="blog-list.html" class="sub-nav-link">Blog List</a></li>
                                <li><a href="blog-grid.html" class="sub-nav-link">Blog Grid</a></li>
                                <li><a href="blog-detail.html" class="sub-nav-link">Blog Detail 1</a></li>
                                <li><a href="blog-detail-02.html" class="sub-nav-link">Blog Detail 2</a></li>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-five" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Pages</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-five" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="about-us.html" class="sub-nav-link">About Us</a></li>
                                <li><a href="store-list.html" class="sub-nav-link">Store List 1</a></li>
                                <li><a href="store-list-02.html" class="sub-nav-link">Store List 2</a></li>
                                <li><a href="contact.html" class="sub-nav-link">Contact Us 1</a></li>
                                <li><a href="contact-02.html" class="sub-nav-link">Contact Us 2</a></li>
                                <li><a href="404.html" class="sub-nav-link">404</a></li>
                                <li><a href="FAQs.html" class="sub-nav-link">FAQs</a></li>
                                <li><a href="term-of-use.html" class="sub-nav-link">Terms Of Use</a></li>
                                <li><a href="coming-soon.html" class="sub-nav-link">Coming Soon</a></li>
                                <li><a href="customer-feedback.html" class="sub-nav-link">Customer Feedbacks</a></li>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-mb-item">
                        <a href="https://themeforest.net/user/themesflat" class="mb-menu-link">Buy Theme</a>
                    </li>
                </ul>
            </div>
            <div class="mb-other-content">
                <div class="group-icon">
                    <a href="wish-list.html" class="site-nav-icon">
                        <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z"
                                stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Wishlist
                    </a>

                    <a href="login.html" class="site-nav-icon">
                        <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
                                stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                                stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Login
                    </a>

                </div>
                <div class="mb-notice">
                    <a href="contact.html" class="text-need">Need Help?</a>
                </div>
                <div class="mb-contact">
                    <p class="text-caption-1">549 Oak St.Crystal Lake, IL 60014</p>
                    <a href="contact.html" class="tf-btn-default text-btn-uppercase">GET DIRECTION<i
                            class="icon-arrowUpRight"></i></a>
                </div>
                <ul class="mb-info">
                    <li>
                        <i class="icon icon-mail"></i>
                        <p>themesflat@gmail.com</p>
                    </li>
                    <li>
                        <i class="icon icon-phone"></i>
                        <p>315-666-6688</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mb-bottom">
            <div class="bottom-bar-language">
                <div class="tf-currencies">
                    <select class="image-select center style-default type-currencies">
                        <option selected data-thumbnail="images/country/us.svg">USD</option>
                        <option data-thumbnail="images/country/vn.svg">VND</option>
                    </select>
                </div>
                <div class="tf-languages">
                    <select class="image-select center style-default type-languages">
                        <option>English</option>
                        <option>Vietnam</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /mobile menu -->
