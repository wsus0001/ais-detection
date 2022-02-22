@extends('layout')

@section('title')
<title>Upload Image</title>
@endsection('title')


@section('head')
<meta name="_token" content="{{csrf_token()}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
@endsection


@section('contents')
    <div class="page_content ">
        <h1 class = "title_text text_content" style = "border-bottom : 3px solid whitesmoke; padding-bottom:1%">CT Scan Upload</h1>
        <p class="common_text text_content" style="margin-right:25%">
            To start using our CT-Scan Pre-processing services, you can upload a CT scan image in the formats of
            <strong>DICOM</strong> or <strong>JPEG</strong> images.<br>
            Please be ensured that your data is safe as your image will be encrypted upon upload and stored securely on our local database.<br>
            The team would <strong>NOT</strong> be sharing the medical images uploaded through this website with any third-party applications.
        </p>
        <div class="page_content2">
            <label class= "common_text text_content" for="dropzone">Image Upload</label>
            <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data"
                class="dropzone text_content" id="dropzone"
                style="width:90%; background:rgba(245, 245, 245);">
                @csrf
            </form>
            <a href="{{url('/upload_list')}}" class="text_content btn btn-outline-light"
                style = "width:15%; margin-top:2%; margin-bottom:2%;">
                    Next
            </a>
        </div>

    </div>

@endsection

@section('script')
<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 512,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.dicom,.dcm",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file)
            {
                var name = file.upload.file_name;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/delete") }}',
                    data: {file_name: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) :
                        void 0;
            },

            success: function(file, response)
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
@endsection
