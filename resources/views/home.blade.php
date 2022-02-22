@extends('layout')

@section('title')
<title>Home Page</title>
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

    <div class= "main_alternate">
        <h1 class = "title_text">
            CT Scan Preprocessing for<br
            >Ischemic Stroke Detection
        </h1>
        <p class="home_common_text">
            <strong style="font-size:20px">Acute Ischemic Stroke</strong> is caused by the lack of blood supply entering the brain,<br>
            reducing neurological functions, with<strong style="font-size:20px">1 OUT OF 3 cases</strong> causing <strong style="font-size:20px">DEATH</strong><br>
            This image preprocessor allows you to enhance your CT scan <strong>image resolution</strong> and
            <strong>quality</strong><br>
            for you to provide the <strong>most
            accurate diagnostics and suitable treatments</strong>.
        </p>
        <a role="button" class="btn btn-lg btn-outline-light" href='/upload_page' style="margin-top:25px; width:35%">
            Upload CT Scan Here
        </a>
    </div>

@endsection
