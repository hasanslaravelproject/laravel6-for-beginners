@extends('frontend.master')
@section('content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Default Layout</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Layout</li>
                    <li class="breadcrumb-item">Page</li>
                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
                <!-- END Hero -->

                <!-- Page Content -->
<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-content text-center">
            <p>
                Left Sidebar, right Side Overlay and a fixed Header.
            </p>
        </div>
    </div>
</div>
@endsection