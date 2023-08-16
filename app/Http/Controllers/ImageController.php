<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    public function index()
    {
        $folderUrls = [
            'https://drive.google.com/drive/folders/13dZf8njb24SIdQIy3Vi_-si5aQ1BOx1x?usp=sharing',
            'https://drive.google.com/drive/folders/1JbAPSN0kYS6hFEuRMkVVZzTkpEDZiUaH?usp=sharing'
        ];
        $imageLists = [];

        foreach ($folderUrls as $folderUrl) {
            // Retrieve the file IDs from the folder URL
            $folderId = basename(parse_url($folderUrl, PHP_URL_PATH));
            $fileIds = [];

            $apiUrl = "https://www.googleapis.com/drive/v3/files?q='%s'+in+parents&key=";
            $apiUrl = sprintf($apiUrl, $folderId);

            $response = Http::get($apiUrl);
            $data = $response->json();

            $images = [];

            if (isset($data['files'])) {
                foreach ($data['files'] as $file) {
                    if (isset($file['id'])) {
                        $fileId = $file['id'];
                        $webViewLink = "https://drive.google.com/uc?export=view&id={$fileId}";
                        $images[] = $webViewLink;
                    } else {
                        // Debug statement to inspect $file array
                        dd($file);
                    }
                }
            }

            $imageLists[] = $images;
        }

        return view('welcome', ['imageLists' => $imageLists]);
    }
}
