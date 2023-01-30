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

    public function create()

    {
        if (!$this->validate([
            'title' => 'required|max_length[200]',
            'body' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,5024]'
        ])) {
            return redirect()->back()->withInput();
        }
        // dd('bisa');
        $fileImage = $this->request->getFile('image');
        // get name file
        $fileName = $fileImage->getRandomName();

        // move image to folder img
        $fileImage->move('img', $fileName);

        $this->postModel->save([
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body'),
            'image' => $fileName,
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => session()->get('id'),
        ]);
        return redirect()->to('/');
    }
    public function edit($postId)
    {
        $post = $this->postModel->getPostById($postId);
        // dd($postId);
        $category = $this->categoryModel->findAll();

        return view('dashboard/editPost', [
            'title' => 'Edit Post',
            'post' => $post[0],
            'category' => $category
            // 'category' => $this->categoryModel->where('id', $id)->first()
        ]);
    }
    public function update($postId)
    {
        if (!$this->validate([
            'title' => 'required|max_length[200]',
            'body' => 'required',
            'image' => 'is_image[image]|max_size[image,5024]'
        ])) {
            return redirect()->back()->withInput();
        }

        $image = $this->request->getFile('image');
        $oldImage = $this->request->getVar('oldImage');

        if ($image->getError() == 4) {
            $newImage = $this->request->getVar('oldImage');
        } else {
            $newImage = $image->getRandomName();

            $image->move('img', $newImage);

            unlink('img/' . $oldImage);
        }

        // dd($this->request->getVar());
        $this->postModel->save([
            'id' => $postId,
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body'),
            'image' => $newImage,
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => session()->get('id'),
        ]);
        return redirect()->to('/dashboard')->withInput();
    }
    public function delete($id)
    {
        $post = $this->postModel->find($id);
        unlink('img/' . $post->image);

        $this->postModel->delete($id);
        session()->setFlashdata('success', 'Success Delete Post');
        return redirect()->back();
    }
    public function show($id)
    {
        dd($id);
    }
}
