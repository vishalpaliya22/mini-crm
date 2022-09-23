{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @include('admin.pages.widgets._widget-1')
                    </div>
                    {{--<div class="row">
                        <section class="col-lg-7 connectedSortable">
                            @include('admin.pages.widgets._widget-2')
                            @include('admin.pages.widgets._widget-3')
                            @include('admin.pages.widgets._widget-4')
                        </section>
                        <section class="col-lg-5 connectedSortable">
                            @include('admin.pages.widgets._widget-5')
                            @include('admin.pages.widgets._widget-6')
                            @include('admin.pages.widgets._widget-7')
                        </section>
                    </div>--}}
                </div>
            </section>
        </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    
@endsection
