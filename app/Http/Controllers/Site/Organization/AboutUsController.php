<?php

namespace App\Http\Controllers\Site\Organization;

use Illuminate\Http\Request;
use App\Models\Contact\Contact;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use App\Repositories\Contact\ContactRepo;
use App\Http\Requests\Contact\StoreRequest;

class AboutUsController extends Controller
{

    protected $modelName = 'aboutus';
    protected $routeName = 'aboutus.index';
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
        return view('site.aboutus.index');
    }
}
