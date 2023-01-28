<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $categoryModel;
    protected $userModel;
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = session()->get('name');
        // dd($data);
        $db      = \Config\Database::connect();

        $builder = $db->table('posts');
        $builder->select('posts.id as postId, category_id, user_id, categories.name as name_category , users.name as name_user ,title , body , image , posts.created_at as ct');
        $builder->join('categories', 'categories.id = posts.category_id');
        $builder->join('users', 'users.id = posts.user_id');
        $query = $builder->orderBy('posts.created_at', 'DESC')->get();
        $data = $query->getResultObject();

        $category = $this->categoryModel->findAll();
        // dd(session()->get('id'));
        return view('home', [
            'title' => 'HomePage',
            'category' => $category,
            'posts' => $data,
        ]);
    }
}
