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
                        <h4 class="c-grey-900 mB-20">Yayın Yerleri
                            <div class="peer" style="float:right;">
                                <a href="{!! route('publicationPlaces.add') !!}" class="btn cur-p btn-outline-primary">Yayın Yeri Ekle</a>
                            </div>
                        </h4>
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Yayın Yeri</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Yayın Yeri</th>
                                    <th>İşlemler</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($places as $v)
                                <tr>
                                    <td>{!! $v->id !!}</td>
                                    <td>{!! $v->text !!}</td>
                                    <td>
                                        <a href="{!! route('publicationPlaces.edit',$v->id) !!}" class="btn cur-p btn-outline-primary">Düzenle</a>
                                        <a href="{!! route('publicationPlaces.delete',$v->id) !!}" class="btn cur-p btn-outline-danger">Sil</a>
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