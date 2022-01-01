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
                        <h4 class="c-grey-900 mB-20">Makale Not Düzenle</h4>
                        <div class="mT-30">
                            <form method="post" action="{!! route('article.notes.update', [$articleId, $item->id]) !!}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Not</label>
                                        <textarea name="note" class="form-control">{!! $item->note !!}</textarea>
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
