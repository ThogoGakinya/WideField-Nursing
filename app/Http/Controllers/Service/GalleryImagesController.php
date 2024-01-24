<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\GalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class GalleryImagesController extends Controller
{

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'service_id' => 'required',
                'image' => 'bail|required|image|mimes:jpeg,jpg,png'
            ],[
                "service_id.required" => "Something went wrong !",
                "image.required" => "Please select an image to upload",
                "image.image" => "Please select an image type of file to upload",
                "image.mimes" => "Please select only jpg,jpeg,png type of image file to upload"
            ]);
        if ($validator->fails()) {

            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);

        }else{

            $file = $request->file("image");
            $filename = 'gallery-'.rand().".".$file->getClientOriginalExtension();
            $file->move(storage_path().'/app/public/service/',$filename);

            $s = new GalleryImages();
            $s->service_id = $request->service_id;
            $s->image = $filename;
            $s->save();

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully'
                ]
            );  
        }
    }
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'gimage_id' => 'required',
                'image' => 'bail|required|image|mimes:jpeg,jpg,png'
            ],[
                "gimage_id.required" => "Something went wrong !",
                "image.required" => "Please select an image to upload",
                "image.image" => "Please select an image type of file to upload ",
                "image.mimes" => "Select only jpg,jpeg,png type of image file to upload"
            ]);
        if ($validator->fails()) {

            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
            
        }else{
            $oldData = GalleryImages::find($request->gimage_id);
            if(file_exists(storage_path("app/public/service/".$oldData->image))){
                unlink(storage_path("app/public/service/".$oldData->image));
            }

            $file = $request->file("image");
            $filename = 'gallery-'.rand().".".$file->getClientOriginalExtension();
            $file->move(storage_path().'/app/public/service/',$filename);

            GalleryImages::where('id',$request->gimage_id)->update(['image'=>$filename]);

            return response()->json([
                'success' => true,
                'message' => 'Image updated successfully'
                ]
            );  
        }
    }
    public function destroy(Request $request)
    {
        $gimage = GalleryImages::find($request->id);
        if(file_exists(storage_path("app/public/service/".$gimage->image))){
            unlink(storage_path("app/public/service/".$gimage->image));
        }
        
        $success = $gimage->delete();

        if($success) {
            return 1;
        } else {
            return 0;
        }
    }
}
