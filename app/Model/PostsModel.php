<?php

namespace App\Model;

use Core\Database;

class PostsModel
{
    private $id = null;
    private $title;
    private $content;
    private $authorId;
    private $image;

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * PostsModel constructor.
     * @param $id
     * @param $title
     * @param $content
     * @param $authorId
     * @param $image
     */


    public static function getPosts()
    {
        $db = new Database();
        $db->select()->from('posts')->where('active', 1);
        return $db->getAll();
    }

    public function load($id)
    {
        $this->db->select()->from('posts')->where('id', $id);
        $post = $this->db->get();
        $this->id = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->authorId = $post->author_id;
        $this->image = $post->image;
    }

    public function save($id = null)
    {
        if($id !== null){
            $this->id = $id;
            $this->update();
        }else{
            $this->create();
        }
    }

    public function update(){

        $setContent = "title = '$this->title', content = '$this->content', image = '$this->image', author_id = 1";
        $this->db->update('posts', $setContent)->where('id',$this->id);
        $this->db->get();
    }

    public function create(){
        //

        $columns = 'title, content, author_id, image';
        $values = "'$this->title', '$this->content', 1, '$this->image'";
        $this->db->insert('posts', $columns, $values);
        $this->db->get();
    }

    public function delete($id){
        $setContent = "active = 0";
        $this->db->update('posts', $setContent)->where('id',$id);
        $this->db->get();
    }
}