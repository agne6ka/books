<?php

 class Book
 {
     private $id;
     private $title;
     private $author;
     private $type;
     private $desc;
     private $pages;
     private $imgPath;


     public function __construct()
    {
        $this->id= "-1";
        $this->title = "";
        $this->author = "";
        $this->type = "";
        $this->desc = "";
        $this->pages = "";
        $this->imgPath = "";
    }

     /** Getters **/

     /**
      * @return string
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
      * @return string
      */
     public function getAuthor()
     {
         return $this->author;
     }

     /**
      * @return string
      */
     public function getType()
     {
         return $this->type;
     }

     /**
      * @return string
      */
     public function getDesc()
     {
         return $this->desc;
     }

     /**
      * @return string
      */
     public function getPages()
     {
         return $this->pages;
     }

     /**
      * @return string
      */
     public function getImgPath()
     {
         return $this->imgPath;
     }

     /** Setters **/

     /**
      * @param string $title
      */
     public function setTitle($title)
     {
         $this->title = $title;
     }

     /**
      * @param string $author
      */
     public function setAuthor($author)
     {
         $this->author = $author;
     }

     /**
      * @param string $desc
      */
     public function setDesc($desc)
     {
         $this->desc = $desc;
     }

     /**
      * @param mixed $type
      */
     public function setType($type)
     {
         $this->type = $type;
     }
     
     /**
      * @param string $pages
      */
     public function setPages($pages)
     {
         $this->pages = $pages;
     }

     /**
      * @param string $imgPath
      */
     public function setImgPath($imgPath)
     {
         $this->imgPath = $imgPath;
     }

     public function createBook(mysqli $conn)
     {
         if ($this->id == -1) {
             $sql = "INSERT INTO Book(id,title,author,type,desc,pages )VALUES ('$this->id','$this->title','$this->author','$this->type','$this->desc')";
             $result = $conn->query($sql);
             if ($result == true) {
                 $this->id = $conn->insert_id;
                 return true;
             }
         } else {
             $sql = "UPDATE Book SET id='$this->id', title='$this->title', author='$this->author', type='$this->type', desc='$this->desc', pages='$this->pages'WHERE id=$this->id";
             $result = $conn->query($sql);
             if ($result == true) {
                 return true;
             }
         }
         return false;
     }

     public  function getBookById(){

     }

     public  function getAllBooks(){

     }
 }