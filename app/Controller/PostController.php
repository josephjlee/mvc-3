<?php

namespace App\Controller;
use Core\Controller;
// include /var/www/html/mvc/core/Controller.php

class PostController extends Controller
{

    public function index(){
        $this->view->posts = \App\Model\PostsModel::getPosts();
        $this->view->render('posts/posts');
    }

    public function show($id){
        $postsObject = new \App\Model\PostsModel();
        $postsObject->load($id);

        $this->view->post = $postsObject;
        $this->view->render('posts/post');
    }

    public function create(){
        $this->view->render('posts/admin/create');
    }

    public function store(){
        $data = $_POST;
        $postModelObject = new \App\Model\PostsModel();
        $postModelObject->setTitle($_POST['title']);
        $postModelObject->setContent($_POST['content']);
        $postModelObject->setImage($_POST['image']);
        $postModelObject->setAuthorId(1);
        $postModelObject->save();
    }

    public function edit($id){

        $postModelObject = new \App\Model\PostsModel();
        $postModelObject->load($id);
        $this->view->post = $postModelObject;
        $this->view->render('posts/admin/edit');
    }

    public function update(){
        $postModelObject = new \App\Model\PostsModel();
        $postModelObject->setTitle($_POST['title']);
        $postModelObject->setContent($_POST['content']);
        $postModelObject->setImage($_POST['image']);
        $postModelObject->setAuthorId(1);
        $postModelObject->save($_POST['id']);
    }

    public function delete($id){
        $postModelObject = new \App\Model\PostsModel();
        $postModelObject->delete($id);

    }

}