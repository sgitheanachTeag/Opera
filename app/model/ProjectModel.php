<?php
class ProjectModel extends Model {

    public function table () {
        return $this->connection->table('projects');
    }

    public function fetch ($what, $order = 'DT_CREATED DESC' ) {
        return $this->table()
            ->where($what)
            ->order($order);;
    }

    public function fetchAll() {
        return $this->table()
        ->order('dt_from DESC');
    }


    public function insert($data) {
        $this->table()
            ->insert($data);
    }
 
    public function delete ($id) {
        return $this->table()->get($id)->delete();
    }


    public function get ($id) {
        return $this->table()->get($id);
    }

    public function exists ($id){

    }

    public function publish ($id, $val){
        $this->table()->get($id)->update(array( 'is_public' => $val));
    }
}
