@extends('layout')

@section('title')
<title>About Us</title>
@endsection('title')

@section('head')
<style class="background-image">
        body{
            background-image: url("{{asset('black03.jpg')}}");
            background-size: cover;
        }
</style>
@endsection

@section('contents')
    <div class="page_content ">
        <h1 class = "title_text text_content" style = "border-bottom : 3px solid black; padding-bottom:1%">About Us</h1>
        
        <p class="common_text text_content">
            <a style="font-size:30px">The brains and developers behind this <strong>CT-Scan Preprocessor</strong> is a group of final year students from 
            <strong>Monash University Malaysia</strong> pursuing Bachelor in Computer Science. </a>

            <div class = "table_styled">
       

        <table style="width:90%;margin-left:5%;">
            <thead class="thead-light">
                <tr>
                    <th style="width: 15%; font-size:30px; color:white">Jeyvan Viriya</th>
                    <th style="width: 15%; font-size:30px; color:white">Darren Lum</th>
                    <th style="width: 15%; font-size:30px; color:white">William Susanto</th>
                    <th style="width: 15%; font-size:30px; color:white">Ivan Tarabykin</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="images/Darren.jpg" height = "350" width = "350"></td>
                    <td><img src="images/Darren.jpg" height = "350" width = "350"></td>
                    <td><img src="images/Darren.jpg" height = "350" width = "350"></td>
                    <td><img src="images/Darren.jpg" height = "350" width = "350"></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

