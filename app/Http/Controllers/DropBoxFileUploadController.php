<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Dcblogdev\Dropbox\Facades\Dropbox;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client as DropboxClient;


class DropBoxFileUploadController extends Controller
{
    protected $accessToken;

    public function __construct()
    {
        // Replace with your actual access token
        $this->accessToken = config('filesystems.disks.dropbox.authorization_token');
    }

    public function index()
    {
        return view('uploadfile.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // max size of 10MB
        ]);


        $file = $request->file('file');
        $filePath = 'Muhammad_Arslan/' . $file->getClientOriginalName(); // Ensure the file path starts with a slash

        // Initialize Dropbox Client
        $client = new DropboxClient($this->accessToken);


        // for reading data 
        // $folderPath = '/';
        // // List contents of the folder
        // $response = $client->listFolder($folderPath);
        // $entries = $response['entries'];
        // foreach ($entries as $entry) {
        //     if ($entry['.tag'] === 'folder') {
        //         // It's a folder
        //         $folderName = $entry['name'];
        //         echo "Folder Name: $folderName\n";
        //     } elseif ($entry['.tag'] === 'file') {
        //         // It's a file
        //         $fileName = $entry['name'];
        //         $fileSize = $entry['size'];
        //         echo "File Name: $fileName\n";
        //         echo "File Size: $fileSize bytes\n";
        //     }
        // }

        // Store file to Dropbox
        $drop = $client->upload($filePath, file_get_contents($file), 'add');

        /* Simple Put File */

        return response()->json(['message' => 'File uploaded successfully.']);
    }
}
