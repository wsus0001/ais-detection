@extends('layout')

@section('title')
<title>Results</title>
@endsection('title')


@section('contents')
<div class="page_content ">
    <h1 class = "title_text text_content" style = "border-bottom : 3px solid whitesmoke; padding-bottom:1%">Results</h1>
    <p class="common_text text_content">
        The image pre-processsing has been completed and the results will be shown below.<br>
        Do note that It may take sometime for the images to be fully loaded.<br>
        <strong style="font-size:18px">Please do not leave/reload this page.<br> 
        For security purposes, your images will be deleted from the database when you leave this page.</strong><br>
    </p>
    <div class="table-styled">
        <table class="table table-dark table-bordered table-styled" style="width:90%;margin-left:5%;margin-bottom:5%">
            <thead class="thead-light">
                <tr>
                    <th style="width: 15%">File Name</th>
                    <th style="width: 15%">Uploaded image</th>
                    <th style="width: 15%">Processed image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imageInfo as $image)
                    <tr>
                    <th>{{$image['image_name']}}</th>
                    <td><img src="data:image/jpg;base64,{{ $image['uploaded_image'] }}" height = "200px" width = "200px"></td>
                    <td><img src="data:image/jpg;base64,{{ $image['processed_image'] }}" height = "200px" width = "200px"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<?php

use App\Models\ImageUpload;

$images = ImageUpload::all();

if ($images) {
    foreach($images as $image){
        $image->delete();
    }
}

?>



