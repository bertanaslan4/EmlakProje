<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use App\Models\AdvertApplication;
use App\Models\AdvertApplicationDocument;

class AdvertApplicationController extends Controller
{
    public function index(Advert $advert)
    {
        if ($advert->advertApplication()->where('user_id', auth()->user()->id)->exists()) {
            return redirect()->back()->with('error', 'You already applied for this advert.');
        }

        return view('front.advert.advert-application', ['user' => auth()->user(), 'advert' => $advert]);
    }

    public function store(Request $request, Advert $advert)
    {
        if (!is_null($request->input('document'))) {
            $documents = $request->input('document');
            $documentTypes = $request->input('document_types');

            $requiredTypes = [1, 4, 5, 6, 9];

            if (count(array_intersect($requiredTypes, $documentTypes)) === count($requiredTypes)) {
                $advertApplication = $advert->advertApplication()->create([
                    'user_id' => auth()->user()->id,
                    'document_comments' => $request->input('document_comments'),
                ]);

                foreach (range(0, count($documents) - 1) as $index) {
                    AdvertApplicationDocument::create([
                        'advert_application_id' => $advertApplication->id,
                        'document' => $documents[$index],
                        'type' => $documentTypes[$index],
                    ]);
                }
            } else {
                foreach ($documents as $document) {
                    $filePath = storage_path('app/public/'.$document);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }

                return redirect()->back()->with('error', 'Required document types are missing.');
            }
        }else{
            return redirect()->back()->with('error', 'Required document types are missing.');
        }

        return redirect()->to(route('application.thanks') . '#thanks');
    }

    public function thanks()
    {
        return view('front.advert.thank-you');
    }

    public function getApplicationStatus(int $id)
    {
        $application = AdvertApplication::find($id);

        return response()->json($application);
    }
}
