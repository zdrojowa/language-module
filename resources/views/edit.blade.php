@extends('DashboardModule::dashboard.index', ['title' => (isset($language) ? 'Edytowanie' : 'Dodawanie') . ' języka'])

@section('navbar-actions')
    <b-nav-form>
        <b-button size="sm" class="my-2 my-sm-0" type="button" to="{{ route('LanguageModule::index') }}">
            <b-icon-arrow-left></b-icon-arrow-left> Do listy
        </b-button>
    </b-nav-form>
@endsection

@section('content')
    <b-container fluid>
        <language
                route="{{ isset($language) ? route('LanguageModule::update', ['language' => $language]) : route('LanguageModule::store') }}"
                csrf="{{ csrf_token() }}"
                check-key-route="{{ route('LanguageModule::api.checkKey') }}"
                :language="{{ isset($language) ? json_encode($language) : json_encode(null) }}"
        >
        </language>
    </b-container>
@endsection

@section('javascripts')
    <script src="{{ mix("vendor/js/LanguageModule.js") }}"></script>
@endsection