@extends('layout')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            Ekleme / düzenleme / silme işlemi tamamlanmıştır.
                        </div>
                    @endif
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Makaleler
                            <div class="peer" style="float:right;">
                                <a href="{!! route('articles.add') !!}" class="btn cur-p btn-outline-primary">Makale Ekle</a>
                            </div>
                        </h4>
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tür</th>
                                    <th>Başlık</th>
                                    <th>Dil / Yayın Yeri / Yayın Yılı</th>
                                    <th>Etiketler</th>
                                    <th>Yazarlar</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tür</th>
                                    <th>Başlık</th>
                                    <th>Dil / Yayın Yılı / Yayın Yeri</th>
                                    <th>Etiketler</th>
                                    <th>Yazarlar</th>
                                    <th>İşlemler</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($articles as $v)
                                <tr>
                                    <td>{!! $v->id !!}</td>
                                    <td>{!! getConstantsAndReturnSelected('\App\Models\Article',$v->type) !!}</td>
                                    <td width="250">{!! $v->title !!}</td>
                                    <td>{!! $v->language->text !!} / {!! $v->publication_year !!} / {!! $v->publicationPlace->text !!}</td>
                                    <td>
                                        @foreach($v->tags as $k)
                                            {!! $k->tag->text !!}<br />
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($v->authors as $k)
                                            {!! $k->author->name !!}<br />
                                        @endforeach
                                    </td>
                                    <td>
                                        <a data-fancybox="" data-type="iframe" href="{!! asset('files/articles/'.$v->file) !!}" class="btn cur-p btn-outline-primary">PDF</a>
                                        <button type="button" class="btn cur-p btn-outline-success" data-toggle="popover" data-content="{!! $v->abstract !!}" data-original-title="Özet">Özet</button>
                                        <a href="{!! route('articles.edit',$v->id) !!}" class="btn cur-p btn-outline-primary">Düzenle</a>
                                        <a href="{!! route('articles.delete',$v->id) !!}" class="btn cur-p btn-outline-danger">Sil</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
@endsection