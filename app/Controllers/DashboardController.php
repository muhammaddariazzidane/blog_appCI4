<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PostModel;
use App\Models\UserModel;

// use App\Models\CategoryModel;

class DashboardController extends BaseController
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
        // dd(session()->get());
        // $data = $this->postModel->where('user_id', session()->get('id'))->findAll();


        // dd($data);
        $posts = $this->postModel->myPaginated(3);
        // $lempar = $posts[0];
        $data = [
            // ''
            'title' => 'Dashboard',
            'posts' => $posts[0]
            // 'posts' =>  $this->postModel->myPaginated(3),
        ];
        // dd($data['posts']);
        return view('dashboard/posts', $data);
    }
    public function UserLists()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $users =  $this->userModel->search($keyword);
        } else {
            $users = $this->userModel->where('is_admin', 0)->orderBy('created_at', 'DESC');
        }
        // dd($users->is_admin);
        return view('dashboard/users', [
            'title' => 'Lists User',
            'users' =>  $users->paginate(10, 'users'),
            'pager' => $this->userModel->pager

        ]);
    }
    public function deleteUser($id = false)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'Success Delete User');
        return redirect()->back();
    }
    public function CategoryLists()
    {

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $categories =  $this->categoryModel->search($keyword);
        } else {
            $categories = $this->categoryModel->orderBy('created_at', 'DESC');
        }

        // $data = $this->categoryModel->paginate(5, 'categories');
        return view('dashboard/categories', [
            'title' => 'Lists Category',
            'categories' => $categories->paginate(5, 'categories'),
            'pager' => $this->categoryModel->pager
        ]);
    }
    public function storeCategory()
    {
        if (!$this->validate([
            'name' => 'required|is_unique[categories.name]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('message', $validation->getError('name'));
        }
        $data  = [
            'name' => $this->request->getVar('name')
        ];
        // dd($name);

        $this->categoryModel->insert($data);
        session()->setFlashdata('success', 'Success Create New Category');
        return redirect()->back();
    }
    public function editCategory($id = false)
    {
        return view('dashboard/editCategory', [
            'title' => 'Edit Category',
            'category' => $this->categoryModel->where('id', $id)->first()
        ]);
    }
    public function updateCategory($id)
    {
        $oldName = $this->categoryModel->where('id', $id)->first();
        // dd($oldName->name == $this->request->getVar('name'));
        if ($oldName->name == $this->request->getVar('name')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[categories.name]';
        }
        if (!$this->validate([
            'name' => $rule
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('message', $validation->getError('name'));
        }
        $data = [
            'id' => $id,
            'name' => $this->request->getVar('name')
        ];
        $this->categoryModel->save($data);
        session()->setFlashdata('success', 'Success Update Category');
        return redirect()->to('/dashboard/categories');
    }
    public function deleteCategory($id = false)
    {
        $this->categoryModel->delete($id);
        session()->setFlashdata('success', 'Success Delete Category');
        return redirect()->back();
    }
}
