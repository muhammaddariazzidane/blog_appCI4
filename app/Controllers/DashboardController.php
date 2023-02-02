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
    public function User()
    {
        // dd(session()->get());
        // $user = $this->userModel->findAll();
        // dd($user);
        $user = $this->userModel->where('id', session()->get('id'))->first();
        $data = [
            'title' => 'Your Profile',
            'user' => $user
        ];
        return view('dashboard/user', $data);
    }
    public function UserEdit($id)
    {
        $user = $this->userModel->where('id', session()->get('id'))->first();
        // dd($this->request->getVar());
        if (!$this->validate([
            'name' => 'required|max_length[200]',
            'user_image' => 'is_image[user_image]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('message', $validation->listErrors());
        }
        // dd('bisa');

        $image = $this->request->getFile('user_image');
        $oldImage = $this->request->getVar('oldImage');

        if ($image->getError() == 4) {
            $newImage = $this->request->getVar('oldImage');
        } else {
            $newImage = $image->getRandomName();
            $image->move('img', $newImage);

            if ($user->user_image != 'default.png') {
                # code...
                unlink('img/' . $oldImage);
            }
        }

        // dd($this->request->getVar());
        $this->userModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'image' => $newImage,

        ]);
        session()->setFlashdata('success', 'Success Edit Profile');
        return redirect()->back()->withInput();
    }
    public function index()
    {
        $posts = $this->postModel->getAll();
        $user = $this->userModel->where('id', session()->get('id'))->first();
        $admin = $this->postModel->getAllFadmin();
            // $lempar = $posts[0]
        ;
        $data = [
            // ''
            'title' => 'Dashboard',
            'posts' => $posts,
            'user' => $user,
            'admin' => $admin


        ];
        // dd($posts);
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
        // $user = $this->userModel->where('id', session()->get('id'))->first();

        $id = session()->get('id');
        // dd(session()->get());
        return view('dashboard/users', [
            'title' => 'Lists User',
            'users' =>  $users->paginate(15, 'users'),
            'pager' => $this->userModel->pager,
            'user' => $this->userModel->getUser($id)

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
        $id = session()->get('id');

        // $data = $this->categoryModel->paginate(5, 'categories');
        return view('dashboard/categories', [
            'title' => 'Lists Category',
            'categories' => $categories->paginate(5, 'categories'),
            'pager' => $this->categoryModel->pager,
            'user' => $this->userModel->getUser($id)
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
