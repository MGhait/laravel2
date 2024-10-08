<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Intervention\Image\Facades\Image;

class UplodeImageController extends Controller
{
    public function index() {
        return view('edit');
    }

    public function upload(Request $request) {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:10000'
        ]);

        try {
            // Get the uploaded file
            $uploadedImage = $request->file('image');
            $fileName = date('YmdHi') . $uploadedImage->getClientOriginalName();
            
            // Process the image using Intervention Image
            $image = Image::make($uploadedImage)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->sharpen(5)
                ->contrast(10);

            // Save the processed image
            $image->save(public_path('images/' . $fileName));

            // Run OCR on the processed image
            $ocr = new TesseractOCR(public_path("images/$fileName"));
            $text = $ocr->run();

            return redirect()->back()->with('text', $text);
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error processing image: ' . $e->getMessage());
        }
    }
}