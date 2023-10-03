@extends('layout')
@section('title','About')
@section('breadcrum','Edit About')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">About page</h5>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif



                    <!-- Multi Columns Form -->
                    <form method="post" class="row g-3" action="{{ route('update-about') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">About</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="about" rows="3" name="about">{{ $about->about }}</textarea><!-- End TinyMCE Editor -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Mission</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="mission" rows="3" name="mission">{{ $about->mission }}</textarea><!-- End TinyMCE Editor -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Vision</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="vision" rows="3" name="vision">{{ $about->vision }}</textarea><!-- End TinyMCE Editor -->
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" value="submit">Update</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
            </div>

        </div>


    </div>
</section>
@endsection