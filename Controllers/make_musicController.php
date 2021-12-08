<?php
require_once(ROOT_PATH.'/Models/Users.php');
require_once(ROOT_PATH.'/Models/Chord.php');
require_once(ROOT_PATH.'/Models/Post.php');
require_once(ROOT_PATH.'/Models/Nice.php');

class MakeMusicCtl
{
    private $request;
    private $Users;
    private $MajorChord;
    private $MinorChord;
    private $Post;
    private $Nice;

    public function __construct(){  
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        $this->Users = new Users();
        $dbh = $this->Users->get_db_handler(); 
        $this->MajorChord = new MajorChord($dbh);
        $this->MinorChord = new MinorChord($dbh);
        $this->Post = new Post($dbh);
        $this->Nice = new Nice($dbh);
    }

    public function createAcountCtl()
    {
        $insert = $this->Users->createAcount($this->request['post']['name'],
                                             $this->request['post']['email'],
                                             $this->request['post']['password'],
                                             $this->request['post']['history'],
                                             $this->request['post']['guiter'],
                                             $this->request['post']['artist1'],
                                             $this->request['post']['artist2'],
                                             $this->request['post']['artist3'],
                                             $this->request['post']['music1'],
                                             $this->request['post']['music2'],
                                             $this->request['post']['music3'],);
        return $insert;
    }

    public function editAcountCtl()
    {
        $editAcount = $this->Users->editAcount($this->request['post']['id'],
                                               $this->request['post']['name'],
                                               $this->request['post']['email'],
                                               $this->request['post']['password'],
                                               $this->request['post']['history'],
                                               $this->request['post']['guiter'],
                                               $this->request['post']['artist1'],
                                               $this->request['post']['artist2'],
                                               $this->request['post']['artist3'],
                                               $this->request['post']['music1'],
                                               $this->request['post']['music2'],
                                               $this->request['post']['music3'],);
        return $editAcount;
    }

    public function getUsersCtl()
    {
        $getUsers = $this->Users->getUsers();
        return $getUsers;
    }

    public function pointFindUserCtl()
    {
        $pointFindUser = $this->Users->pointFindUser($this->request['get']['id']);
        return $pointFindUser;
    }


    public function findMajorChordCtl()
    {
        $Mchord = $this->MajorChord->findMajorChord();
        return $Mchord;
    }

    public function findMinorChordCtl()
    {
        $mchord = $this->MinorChord->findMinorChord();
        return $mchord;
    }

    public function createPostCtl()
    {
        $newPost = $this->Post->createPost($this->request['post']['user_id'],
                                           $this->request['post']['name'],
                                           $this->request['post']['main_key'],
                                           $this->request['post']['main_scale'],
                                           $this->request['post']['progress_chord'],
                                           $this->request['post']['in_chord'],
                                           $this->request['post']['A_chord'],
                                           $this->request['post']['B_chord'],
                                           $this->request['post']['main_chord'],
                                           $this->request['post']['C_chord'],
                                           $this->request['post']['out_chord'],
                                           $this->request['post']['body']);
        return $newPost;
    }

    public function findPostCtl()
    {
        $findPost = $this->Post->findPost($this->request['get']['id']);
        return $findPost;
    }
    
    public function pointFindPostCtl()
    {
        $pointFindPost = $this->Post->pointFindPost($this->request['get']['id']);
        return $pointFindPost;
    }

    public function memPostCtl()
    {
        $memPost = $this->Post->memPost();
        return $memPost;
    }

    public function editPostCtl()
    {
        $editPostStart = $this->Post->editPost($this->request['post']['id'],
                                               $this->request['post']['main_key'],
                                               $this->request['post']['main_scale'],
                                               $this->request['post']['progress_chord'],
                                               $this->request['post']['in_chord'],
                                               $this->request['post']['A_chord'],
                                               $this->request['post']['B_chord'],
                                               $this->request['post']['main_chord'],
                                               $this->request['post']['C_chord'],
                                               $this->request['post']['out_chord'],
                                               $this->request['post']['body']);
        return $editPostStart;
    }

    public function deletePostCtl()
    {
        $deletePost = $this->Post->deletePost($this->request['post']['id']);
        return $deletePost;
    }

    public function allNiceCtl()
    {
        $allNice = $this->Nice->allNice();
        return $allNice;
    }
    public function insertNiceCtl()
    {
        $insertNice = $this->Nice->insertNice($this->request['post']['post_id'],
                                              $this->request['post']['user_id']);
        return $insertNice;
    }
    public function niceFlgOnCtl()
    {
        $niceFlgOn = $this->Nice->niceFlgOn($this->request['post']['post_id'],
                                              $this->request['post']['user_id']);
        return $niceFlgOn;
    }
    public function niceFlgOffCtl()
    {
        $niceFlgOff = $this->Nice->niceFlgOff($this->request['post']['post_id'],
                                              $this->request['post']['user_id']);
        return $niceFlgOff;
    }

    public function selectNiceCountCtl()
    {
        $selectNiceCount = $this->Nice->selectNiceCount($this->request['get']['id']);
        return $selectNiceCount;
    }
    // 「いいね」の更新、追加
    public function niceUpdateCtl()
    {
        $this->Nice->update($this->request['post']['user_id'],$this->request['post']['post_id']);
    }
}

?>