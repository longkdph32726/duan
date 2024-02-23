<?php
namespace Khuat\Thithu\Controllers\Client;
use Khuat\Thithu\Commons\Controller;
use Khuat\Thithu\Models\Post;
class HomeController extends Controller{
    private Post $post;

    public function index(){
        $data['post'] = $this->post->getAll();
        print_r($data['post']);
        return $this->renderViewClient(__FUNCTION__);
    }
}