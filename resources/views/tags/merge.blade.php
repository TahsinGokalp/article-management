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
                        <h4 class="c-grey-900 mB-20">Etiket Birleştir</h4>
                        <div class="mT-30">
                            <form method="post" action="{!! route('tags.mergeSave',$id) !!}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Birleştirilecek Etiket</label>
                                    <select name="tag_id" class="form-control">
                                        @foreach($tags as $v)
                                            <option value="{!! $v->id !!}">{!! $v->text !!}</option>
                                        @endforeach
                                    </select>
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