@extends('DashboardModule::dashboard.index')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('DashboardModule::partials.alerts')

                        <h4 class="card-title">Dodawanie nowego języka</h4>
                        <form method="POST" action="{{route('LanguageModule::languages.store')}}">
                            @csrf

                            <div class="form-group @error('name') has-danger @enderror">
                                <label for="">Nazwa</label>
                                <input type="text" class="form-control" name="name" placeholder="Wpisz nazwe" value="{{old('name')}}">
                                @error('name')
                                <small class="error mt-1 text-danger d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group @error('short_name') has-danger @enderror">
                                <label for="">Prefiks</label>
                                <input type="text" class="form-control" name="short_name" placeholder="Wpisz prefiks" value="{{old('short_name')}}">
                                <small>Krótki prefiks np. pl, en</small>
                                @error('short_name')
                                <small class="error mt-1 text-danger d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="float-right mt-2 btn btn-primary mr-2">Zapisz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
