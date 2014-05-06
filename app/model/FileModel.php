<?php
class FileModel extends Model {

    private function table () {
        return $this->connection->table('files');
    }

    public function fetchAll() {
        return $this->table()
        ->order('dt_created DESC');
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
