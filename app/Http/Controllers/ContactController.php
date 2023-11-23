<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Repository\BaseCrudRepo;
use Illuminate\Http\Request;

class ContactController  extends BaseCrudRepo
{
    public function setData()
    {
        $this->model = new Contact();
        $this->storeRequest = ContactRequest::class;
        $this->updateRequest = ContactRequest::class;
    }
}
