<?php

return [

    'disks' => [
        'gcs' => [
            'driver' => 'gcs',
            'project_id' => env('GOOGLE_CLOUD_PROJECT'),
            'key_file_path' => env('GOOGLE_APPLICATION_CREDENTIALS', ''), // Path to credentials. Empty string is related with issue 60 in recent driver version.
            'key_file' => [], // optional: Array of data that substitutes the .json file (see below)
            'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', env('GOOGLE_CLOUD_PROJECT').'.appspot.com'), // Default bucket
            'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', 'services/'.env('GAE_SERVICE').'/storage/'), // Storage prefix
            'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI'), // see: Public URLs below
            'apiEndpoint' => env('GOOGLE_CLOUD_STORAGE_API_ENDPOINT'), // set storageClient apiEndpoint
            'visibility' => 'private', // optional: public|private
            'visibility_handler' => null, // optional: set to \League\Flysystem\GoogleCloudStorage\UniformBucketLevelAccessVisibility::class to enable uniform bucket level access
            'metadata' => ['cacheControl' => 'public,max-age=86400'], // optional: default metadata
        ],
    ],

];
