<?php 
namespace Khuat\Thithu\Controllers\Admin;
use Khuat\Thithu\Commons\Controller;
use Khuat\Thithu\Models\Post;
class PostController extends Controller{
    private Post $post;
    public function index(){
        $post = $this->post->getAll();
        print_r($post);
        $this->renderViewAdmin(__FUNCTION__);
    }
}