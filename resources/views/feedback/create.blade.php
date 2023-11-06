@extends('app.layouts.main-layout')

@section('page-title', 'Create Feeback')

@section('page-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.css" />
@endsection

@section('custom-css')
@endsection
@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Create Feeback
                </h2>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form id="feebackForm" class="form form-vertical" action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 position-relative">
                <div class="card">
                    <div class="card-body" style="border: 2px solid #58aeff; border-style: dashed; border-radius: 0;">
                        @csrf

                        {{ view('feedback.form-fields', [
                            'feedback_categroy' => $feedback_categroy,
                        ]) }}
                    </div>
                </div>
            </div>
            @can('is_admin')
            <div class="col-lg-3 col-md-3 col-sm-12 position-relative">
                <div class="card" style="border: 2px solid #58aeff; border-style: dashed; border-radius: 0;">
                    <div class="card-body">
                        <button type="submit" class="btn w-100 btn-outline-success mb-1">
                            <i class="fas fa-save"></i> Save Feedback
                        </button>

                        <a href="{{ route('feedback.index') }}" class="btn w-100 btn-outline-danger mb-1">
                            <i class="fas fa-cancel"></i> Cancel
                        </a>
                    </div>
                </div>
            </div>
            @endcan
        </div>

    </form>
@endsection


@section('page-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
@endsection
@section('custom-js')

@endsection
