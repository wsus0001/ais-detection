@extends('layout')

@section('title')
<title>Upload Confirmation</title>
@endsection('title')

@section('head')
<style class="background-image">
        body{
            background-image: url("{{asset('black05.jpg')}}");
            background-size: cover;
        }
</style>
@endsection

@section('contents')
<div class="page_content ">
    <h1 class = "title_text text_content" style = "border-bottom : 3px solid whitesmoke; padding-bottom:1%">Image Upload Confirmation</h1>
    <p class="common_text text_content">
            The following table contains all the details of all the files that you have previously uploaded, please make sure that the files are correct before proceeding.<br>
            You can still go back to the upload stage by clicking  <strong>BACK</strong> button to add files, or click <strong>SUBMIT</strong> to commence the image preprocessing process.<br>
            Do note that the file names are embedded with a 13 character prefix string for database transaction purposes.
            (e.g. yor file name is "JohnDoe.img", it will show as "XXXXXXXXXXXXXJohnDoe.img" where X would be numbers from 0-9).
        </p>
    <div class = "table_styled">
        <table class="table table-dark table-bordered table-styled">
            <thead class="thead-light">
            <tr>
                <th scope="col">File Name</th>
                <th scope="col">File Size</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($image_uploads as $image)
                <tr>
                <th scope="row">{{$image->image_name}}</th>
                <td>{{$image->image_size}}</td>
                <td>{{$image->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{url('/results_page')}}" class="text_content btn btn-light float-right"
            style = "width:15%; margin-bottom:2%;">
                Submit
    </a>
    <a href="{{url('/upload_page')}}" class="text_content btn btn-outline-light float-left"
            style = "width:15%; margin-bottom:2%;">
                Back
    </a>
</div>
