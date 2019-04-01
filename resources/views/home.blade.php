@extends('layout')

@section('content')
    <div id="mainContent">
        <div class="full-container">
            <div class="masonry-item col-md-6 mT-20">
                <div class="bd bgc-white p-20">
                    <div class="layers">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Makale Yükle</h6></div>
                        <div class="layer w-100">
                            <form action="/file-upload" class="dropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerAssets')
    <link href="{!! asset('plugins/dropzone/dropzone.min.css') !!}" rel="stylesheet">
    <script type="text/javascript" src="{!! asset('plugins/dropzone/dropzone.js') !!}"></script>
    <script>$("div#myId").dropzone({ url: "/file/post" });</script>
@endsection