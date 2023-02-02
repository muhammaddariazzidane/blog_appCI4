<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\PostModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $categoryModel;
    protected $userModel;
    protected $postModel;
    protected $commentModel;
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
    }
    public function index()
    {

        // dd(session()->get('id'));
        // $posts = $this->postModel->homePaginate(2);
        // $data =  ;
        $category = $this->categoryModel->findAll();
        // d($this->request->getVar());
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $postmodel = $this->postModel->search($keyword);
        } else {
            $postmodel = $this->postModel;
        }
        $data =  [
            'title' => 'HomePage',
            'category' => $category,
            'posts' => $postmodel->homePaginate(3),

            // 'pager' => $this->postModel->pager
        ];
        // dd($data);
        // dd($data['validation']);

        return view('home', $data);
    }
    public function show($id)
    {

        // $com = $this->commentModel->where('post_id', $id)->first();
        // dd($com);
        $post = $this->postModel->getPostById($id);
        // $post = $this->postModel->where('id', $id)->first();
        // dd($post[0]);
        $category = $this->categoryModel->findAll();
        $data =  [
            'title' => 'DetailPost',
            'category' => $category,
            'post' => $post[0],
            'comment' => $this->commentModel->getComment($id)
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
