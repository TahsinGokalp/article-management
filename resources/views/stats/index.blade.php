@extends('layout')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">İstatistikler</h4>
                        <h5>Yıllara göre;</h5>
                        <table class="table-bordered">
                        @foreach($year as $k=>$v)
                            <tr>
                                <td>{!! $k !!}</td>
                                <td>{!! $v !!}</td>
                            </tr>
                        @endforeach
                        </table>
                        <h5>Türe göre;</h5>
                        <table class="table-bordered">
                            @foreach($type as $k=>$v)
                                <tr>
                                    <td>{!! getConstantsAndReturnSelected('\App\Models\Article',$k) !!}</td>
                                    <td>{!! $v !!}</td>
                                </tr>
                            @endforeach
                        </table>
                        <h5>Dillere göre;</h5>
                        <table class="table-bordered">
                            @foreach($language as $k=>$v)
                                <tr>
                                    <td>{!! $k !!}</td>
                                    <td>{!! $v !!}</td>
                                </tr>
                            @endforeach
                        </table>
                        <h5>Etiketlere göre;</h5>
                        <table class="table-bordered">
                            @foreach($tag as $v)
                                <tr>
                                    <td>{!! $v->text !!}</td>
                                    <td>{!! $v->article_count !!}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection