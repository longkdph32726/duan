<?php
namespace Khuat\Thithu\Models;
use Khuat\Thithu\Commons\Model;
class Post extends Model{
    public function getAll(){
        try{
            $sql = "SELECT * FROM posts";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(\Exception $e){
            echo 'Lỗi cơ bản: '.$e->getMessage();
            die;
        }
    }

    public function getById($id){
        try{
            $sql = "SELECT * FROM posts WHERE id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt-> bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();
        }catch(\Exception $e){
            echo 'Lỗi cơ bản: '.$e->getMessage();
            die;
        }
        
    }
    public function insert($category,$title,$excerpt,$content,$imagePath){
        try {
            $sql = "INSERT INTO posts(category_id,title,excerpt,content,image) VALUES (:category_id,:title,:excerpt,:content,:image)";
            $stmt = $this->conn->prepare($sql);
            $stmt-> bindParam(':category_id',$category);
            $stmt-> bindParam(':title',$title);
            $stmt-> bindParam(':excerpt',$excerpt);
            $stmt-> bindParam(':content',$content);
            $stmt-> bindParam(':image',$image);
            return $stmt->execute();
        } catch (\Exception $e) {
            echo 'Lỗi cơ bản: '.$e->getMessage();
            die;
        }
    }
    public function deleteById($id){
        try {
            $sql = "DELETE FROM posts WHERE id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        } catch (\Exception $e) {
            echo 'Lỗi cơ bản';
            die();
        }
    }
    public function updateById($id,$category,$title,$excerpt,$content,$imagePath){
        try {
            $sql = "UPDATE posts SET category_id =  :category_id,title= :title,excerpt= :excerpt,content= :content,image= :image WHERE id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':category_id',$category);
            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':excerpt',$excerpt);
            $stmt->bindParam(':content',$content);
            $stmt->bindParam(':image',$image);
            $stmt->execute();
        } catch (\Exception $e) {
            echo 'Lỗi cơ bản';
            die();
        }
    }
}