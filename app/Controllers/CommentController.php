<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\PostModel;

class CommentController extends BaseController
{
    protected $CommentModel;
    protected $postModel;
    public function __construct()
    {
        $this->CommentModel = new CommentModel();
        $this->postModel = new PostModel();
    }

    public function store()
    {
        // dd($user_id = session()->get('id'));
        // dd($this->request->getVar(''));
        if (!$this->validate([
            'value' => 'required'
        ])) {
            return redirect()->back()->withInput();
            # code...
        }

        $user_id = session()->get('id');

        $this->CommentModel->insert([
            'post_id' =>  $this->request->getVar('post_id'),
            'user_id' =>  $user_id,
            'value' => $this->request->getVar('value'),
            'created_at' => time()
        ]);
        // session()->setFlashdata('success', ' comment added !');
        return redirect()->back()->withInput();
    }
}
