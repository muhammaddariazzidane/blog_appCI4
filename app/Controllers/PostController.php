<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PostModel;
use App\Models\UserModel;

class PostController extends BaseController
{
    protected $categoryModel;
    protected $userModel;
    protected $postModel;
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
        $this->postModel = new PostModel();
    }
    public function index()
    {
        echo "ini posts";
    }
    public function create()

    {
        if (!$this->validate([
            'title' => 'required|max_length[200]',
            'body' => 'required',
            'image' => 'uploaded[image]|is_image[image]'
        ])) {
            return redirect()->back()->withInput();
            # code...
        }
        // dd('bisa');
        $fileImage = $this->request->getFile('image');
        // move image to folder img
        $fileImage->move('img');
        // get name file
        $fileName = $fileImage->getName();

        $this->postModel->save([
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body'),
            'image' => $fileName,
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => session()->get('id'),
        ]);
        return redirect()->to('/');
    }
}
