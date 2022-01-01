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
                        <h4 class="c-grey-900 mB-20">Makale Düzenle</h4>
                        <div class="mT-30">
                            <form method="post" action="{!! route('articles.update',$item->id) !!}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="exampleInputEmail1">Başlık</label>
                                        <input type="text" class="form-control" name="title" value="{!! $item->title !!}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Makale Tipi</label>
                                        <select name="type" class="form-control">
                                            @foreach($types as $v)
                                                <option @if($item->type == $v['id']){!! 'selected="selected"' !!}@endif value="{!! $v['id'] !!}">{!! $v['text'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1">Yayın Yeri</label>
                                        <select name="publication_place_id" class="form-control">
                                            @foreach($places as $v)
                                                <option @if($item->publication_place_id == $v->id){!! 'selected="selected"' !!}@endif value="{!! $v->id !!}">{!! $v->text !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Yayın Yılı</label>
                                        <input type="text" class="form-control" name="publication_year" value="{!! $item->publication_year !!}" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1">Durum</label>
                                        <select name="status" class="form-control">
                                            @foreach($statuses as $v)
                                                <option @if($item->status == $v['id']){!! 'selected="selected"' !!}@endif value="{!! $v['id'] !!}">{!! $v['text'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Özet</label>
                                        <textarea name="abstract" class="form-control">{!! $item->abstract !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1">Dil</label>
                                        <select name="language_id" class="form-control">
                                            @foreach($languages as $v)
                                                <option @if($item->language_id == $v->id){!! 'selected="selected"' !!}@endif value="{!! $v->id !!}">{!! $v->text !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="exampleInputEmail1">Yazarlar</label>
                                        <input type="text" class="form-control" name="authors" value="@foreach($item->authors as $v){!! $v->author->name.',' !!}@endforeach" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Etiketler</label>
                                        <input type="text" class="form-control" name="tags" value="@foreach($item->tags as $v){!! $v->tag->text.',' !!}@endforeach" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1">Dosya <a data-fancybox="" data-type="iframe" href="{!! asset('files/articles/'.$item->file) !!}" class="cur-p btn-outline-primary">Eski Dosya</a></label>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
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
