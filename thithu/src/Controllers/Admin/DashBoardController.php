<?php
namespace Khuat\Thithu\Controllers\Admin;
use Khuat\Thithu\Commons\Controller;
use Khuat\Thithu\Models\Post;

class DashBoardController extends Controller{
    private Post $post;
    const PATH_UPLOAD = '/uploads/';
    public function __construct(){
        $this->post = new Post;
    }
    public function index(){
        $data['posts'] = $this->post->getAll();
        $this->renderViewAdmin(__FUNCTION__,['posts'=>$data['posts']]);
    }
    public function update($id){
        if(!empty($_POST)){
            $category = $_POST['category'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];
            $image = $_FILES['image'];
            if($image){
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];
                if(!move_uploaded_file($image['tmp_name'],PATH_ROOT.$imagePath)){
                    $imagePath = null;
                }
            }
            $this->post->updateById($id,$category,$title,$excerpt,$content,$imagePath);
            header("Location: /admin");
        }
        $data['post']=$this->post->getById($id);
        $this->renderViewAdmin(__FUNCTION__,['post'=>$data]);
    }
    public function create(){
        if(!empty($_POST)){
            $category = $_POST['category'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];
            $image = $_FILES['image'];
            if($image){
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];
                if(move_uploaded_file($image['tmp_name'],PATH_ROOT.$imagePath)){
                    
                }else{
                    $imagePath = null;
                }
            }
            $this->post->insert($category,$title,$excerpt,$content,$imagePath);
            header("Location: /admin");
        }
        $this->renderViewAdmin(__FUNCTION__);
    }
    public function delete($id){
        $this->post->deleteById($id);
        header("Location: /admin");
    }
}