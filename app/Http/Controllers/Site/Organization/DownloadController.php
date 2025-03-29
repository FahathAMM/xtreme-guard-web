<?php

namespace App\Http\Controllers\Site\Organization;

use App\Models\Contact\Contact;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductAttachment;
use App\Repositories\Contact\ContactRepo;

class DownloadController extends Controller
{

    protected $modelName = 'download';
    protected $routeName = 'download.index';
    protected $isDestroyingAllowed;
    protected $model;
    protected $repo;

    public function __construct(Contact $model, ContactRepo $repo)
    {
        $this->model = $model;
        $this->repo = $repo;
        $this->isDestroyingAllowed = true;
    }

    public function index()
    {
        $attachments = Product::with('files')->get(['id', 'name', 'file_category'])->groupBy('file_category');

        // $attachment = ProductAttachment::get();

        // return $attachments;

        return view('site.download.index', [
            'modelName' => $this->modelName,
            'routeName' => $this->routeName,
            'attachments' => $attachments,
        ]);
    }
}
