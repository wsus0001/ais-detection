<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;
use Exception;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ImageUploadController extends Controller
{
    public function fileIndex()
    {
        $image_uploads = ImageUpload::all();

        if (!$image_uploads) { 
            throw new Exception('No images');
        }

        return view('upload_list', compact('image_uploads'));
    }

    public function fileStore(Request $request)
    {
        request() -> validate([
            'file' => ['required']
        ]);

    
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $imageSize = $image->getSize();
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $imageSize > 0 ? floor(log($imageSize, 1024)) : 0;
        $imageContent = base64_encode($image->get());
        $image->move(public_path('images'),$imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->image_name = $imageName;
        $imageUpload->image_size = number_format($imageSize / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
        $imageUpload->uploaded_image = $imageContent;
        $imageUpload->save();

        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $file_name = $request->get('file_name');
        ImageUpload::where('file_name',$file_name)->delete();
        $path = public_path().'/images/'.$file_name;

        if (file_exists($path)) {
            unlink($path);
        }

        return $file_name;
    }

    public static function fileGet()
    {
        $process = new Process(["python3", base_path() . "/python/prediction.py"]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $images = ImageUpload::all();

        if (!$images) {
            throw new Exception('no images available'); 
        }

        $imageInfo = [];
        foreach ($images as $i => $image) {
            $imageInfo[$i]['uploaded_image'] = $image->uploaded_image;
            $imageInfo[$i]['processed_image'] = $image->processed_image;
            $imageInfo[$i]['image_name'] = $image->image_name;
        }
        
        return view('results_page', ['imageInfo' => $imageInfo]);
    }
}
