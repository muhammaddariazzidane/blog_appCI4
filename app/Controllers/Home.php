<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PostModel;
use App\Models\UserModel;

class Home extends BaseController
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

        // dd(session()->get('id'));
        // $posts = $this->postModel->homePaginate(2);
        // $data =  ;
        $category = $this->categoryModel->findAll();
        $data =  [
            'title' => 'HomePage',
            'category' => $category,
            'posts' => $this->postModel->homePaginate(3),
            // 'pager' => $this->postModel->pager
        ];
        // dd($data);

        return view('home', $data);
    }
    public function show($id)
    {
        $post = $this->postModel->where('id', $id)->first();
        // dd($post);
        $category = $this->categoryModel->findAll();
        $data =  [
            'title' => 'DetailPost',
            'category' => $category,
            'post' => $post,
            // 'pager' => $this->postModel->pager
        ];
        return view('detail', $data);
    }
    public function sorting($category_id)
    {
        // dd($category_id);
        $posts =  $this->postModel->getById($category_id);
        // dd($posts);
        $category = $this->categoryModel->findAll();
        $data =  [
            'title' => 'Post By Category',
            'category' => $category,
            'posts' => $posts,
            // 'pager' => $this->postModel->pager
        ];
        // dd($data);

        return view('category', $data);
    }
}
