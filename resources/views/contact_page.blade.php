@extends('layout')


@section('title')
<title>Contact Us</title>
@endsection('title')

@section('head')
<style class="background-image">
        body{
            background-image: url("{{asset('black02.jpg')}}");
            background-size: cover;
        }
</style>
@endsection

@section('contents')
<div class ="page_content">
    <h1 class = "title_text text_content" style = "border-bottom : 3px solid whitesmoke; padding-bottom:1%">Contact Us</h1>
    <p class="common_text text_content">
            If you have any comments / suggestions, feel free to contact us through the form below.<br>
            We truly appreciate your effort in helping us grow our <strong>CT-Scan Preprocessor </strong> even more than what it is now. 
    </p>
    <div class="contact-us">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user bg-dark text-white">
                    <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    
                    <form method="post" action="contact-us">
                        {{csrf_field()}}
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label> Name </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label> Subject </label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label> Message </label>
                            <textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Message" name="message"></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div>
                            <button type="submit" class="btn btn-outline-light float-left"
                            style = "margin-left:25%; width:500%; margin-top:2%; margin-bottom:2%;">
                                Send
                            </button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection