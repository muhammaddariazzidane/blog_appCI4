<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

// use App\Models\CategoryModel;

class DashboardController extends BaseController
{
    protected $categoryModel;
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        // dd(session()->get());
        return view('dashboard/posts', [
            'title' => 'Dashboard'
        ]);
    }
    public function CategoryLists()
    {

        $data = $this->categoryModel->findAll();
        // $data = $;

        // dd($data);
        return view('dashboard/categories', [
            'title' => 'Lists Category',
            'categories' => $data
        ]);
    }
    public function storeCategory()
    {
        $data  = [
            'name' => $this->request->getVar('name')
        ];
        // dd($name);

        $this->categoryModel->insert($data);
        session()->setFlashdata('success', 'Success Create New Category');
        return redirect()->back();
    }
    public function deleteCategory($id = false)
    {
        $this->categoryModel->delete($id);
        session()->setFlashdata('success', 'Success Delete Category');
        return redirect()->back();
    }
}
