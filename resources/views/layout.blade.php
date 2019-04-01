<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>{!! $title !!}</title>
    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
        }
        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }
        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }
        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                opacity: 0
            }
        }
        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
</head>
<body class="app">
<div id="loader">
    <div class="spinner"></div>
</div>
<div>
    <div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed"><a class="sidebar-link td-n" href="{!! route('home') !!}">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo"><img src="{!! asset('images/logo.png') !!}" alt="Logo"></div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">{!! config('project.name') !!}</h5>
                                </div>
                            </div>
                        </a></div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle">
                            <a href="" class="td-n">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item mT-30">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Anasayfa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('tags') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-tag"></i>
                        </span>
                        <span class="title">Etiketler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Yazarlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Diller</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Makaleler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Kullanıcılar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Kayıtlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="sidebar-link" href="{!! route('home') !!}">
                        <span class="icon-holder">
                            <i class="c-blue-500 ti-home"></i>
                        </span>
                        <span class="title">Çıkış</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-container">
        <div class="header navbar">
            <div class="header-container">
                <ul class="nav-left">
                    <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                    <li class="search-box">
                        <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                            <i class="search-icon ti-search pdd-right-10"></i>
                            <i class="search-icon-close ti-close pdd-right-10"></i>
                        </a>
                    </li>
                    <li class="search-input"><input class="form-control" type="text" placeholder="Ara..."></li>
                </ul>
                <ul class="nav-right">
                    <li>
                        <a href="profile.html" class="no-after peers fxw-nw ai-c lh-1">
                            <div class="peer mR-10">
                                <img class="w-2r bdrs-50p" src="{!! getGravatar($user->email) !!}" alt="">
                            </div>
                            <div class="peer">
                                <span class="fsz-sm c-grey-900">{!! $user->name !!}</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <main class="main-content bgc-grey-100">
            @yield('content')
        </main>
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            <span><a href="https://tahsingokalp.com" target="_blank">tahsingokalp.com</a></span>
        </footer>
    </div>
</div>
<script>
    window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function () {
            loader.classList.add('fadeOut');
        }, 300);
    });
</script>
<script type="text/javascript" src="{!! asset('js/vendor.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/bundle.js') !!}"></script>
@yield('footerAssets')
</body>
</html>