<?php

 class Book
 {
     private $id;
     private $title;
     private $author;
     private $type;
     private $desc;

    public function __construct()
    {
        $this->id= "-1";
        $this->title = "";
        $this->author = "";
        $this->desc = "";
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
     public function getDesc()
     {
         return $this->desc;
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

     public function createBook(mysqli $conn)
     {
         if ($this->id == -1) {
             $sql = "INSERT INTO Messages(id,title,author,type,desc )VALUES ('$this->id','$this->title','$this->author','$this->type','$this->desc')";
             $result = $conn->query($sql);
             if ($result == true) {
                 $this->id = $conn->insert_id;
                 return true;
             }
         } else {
             $sql = "UPDATE Messages SET id='$this->id', title='$this->title', author='$this->author', type='$this->type', desc='$this->desc'WHERE id=$this->id";
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