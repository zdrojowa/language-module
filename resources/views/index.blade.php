@extends('DashboardModule::dashboard.index', ['title' => 'Języki'])

@section('navbar-actions')
    <b-nav-form>
        <b-button size="sm" class="my-2 my-sm-0" type="button" variant="success" to="{{ route('LanguageModule::create') }}">
            <b-icon-plus></b-icon-plus> Dodaj
        </b-button>
    </b-nav-form>
@endsection

@section('content')
    <b-container fluid>
        <index
                route="{{ route('LanguageModule::api.languages') }}"
                edit-route="{{ route('LanguageModule::edit', ['language' => 'id']) }}"
                remove-route="{{ route('LanguageModule::api.remove', ['language' => 'id']) }}"
                csrf="{{ csrf_token() }}"
        >
        </index>
    </b-container>
@endsection

@section('javascripts')
    <script src="{{ mix("vendor/js/LanguageModule.js") }}"></script>
@endsection