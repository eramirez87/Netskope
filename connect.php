
<?php
class Connect {
    private $host = '192.168.0.2';
    private $user = 'host.docker.internal';
    private $pass = 'root';
    private $db = 'take_home';
    public $mysql;

    public function __construct(){
        $this->mysql = new mysqli($this->host,$this->user,$this->pass,$this->db);
    }

    public function getMovies(){
        $q = $this->mysql->query("SELECT * FROM movies");
        return $q->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getMovie($id){
        $q = $this->mysql->query("SELECT * FROM movies WHERE id= $id");
        $r = $q->fetch_object();
        $q2 = $this->mysql->query("SELECT * FROM comments WHERE id_movie= $id ORDER BY created_at DESC");
        $r->comments = $q2->fetch_all(MYSQLI_ASSOC);
        return $r;
    }

    public function push_comment($post){
        $value = (object) $post;
        $sql = "INSERT INTO comments(name, comment, id_movie) VALUES('{$value->name}','{$value->comment}','{$value->id_movie}')";
        $this->mysql->query($sql);
        return ['success'=>true];
    }
}