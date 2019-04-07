@extends('layout')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {!! $error !!} <br />
                            @endforeach
                        </div>
                    @endif
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Makale Ekle</h4>
                        <div class="mT-30">
                            <form method="post" action="{!! route('articles.save') !!}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="exampleInputEmail1">Başlık</label>
                                        <input type="text" class="form-control" name="title" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Makale Tipi</label>
                                        <select name="type" class="form-control">
                                            @foreach($types as $v)
                                                <option value="{!! $v['id'] !!}">{!! $v['text'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1">Yayın Yeri</label>
                                        <select name="publication_place_id" class="form-control">
                                            @foreach($places as $v)
                                                <option value="{!! $v->id !!}">{!! $v->text !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Yayın Yılı</label>
                                        <input type="text" class="form-control" name="publication_year" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Özet</label>
                                        <textarea name="abstract" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1">Dil</label>
                                        <select name="language_id" class="form-control">
                                            @foreach($languages as $v)
                                                <option value="{!! $v->id !!}">{!! $v->text !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="exampleInputEmail1">Yazarlar</label>
                                        <input type="text" class="form-control" name="authors" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Etiketler</label>
                                        <input type="text" class="form-control" name="tags" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1">Dosya</label>
                                        <input type="file" name="file" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerAssets')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link href="{!! asset('plugins/tagify/tagify.css') !!}" rel="stylesheet">
    <script type="text/javascript" src="{!! asset('plugins/tagify/tagify.js') !!}"></script>
    <script>
        var $input = $('input[name=tags]').tagify({
            whitelist : [
                {!! $tags !!}
            ]
        });
        var $input = $('input[name=authors]').tagify({
            whitelist : [
                {!! $authors !!}
            ]
        });
    </script>
@endsection