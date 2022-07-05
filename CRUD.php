<?php
/** @noinspection ALL */
include './DB.php';
class CRUD
{
    public string $table;
    public string $query;
    public array $columns;
    public array $data;
    public int $id;
    public object $connect;

    public function __construct(string $table ,$columns=[] ,$data=[],$id =0,$query=' ')
    {

        $this->table = $table;
        $this->columns = $columns;
        $this->data = $data;
        $this->query = $query;
        $this->id = $id;
        $this->connect = new DB();
    }

    public function create(): string
    {
//        var_dump("insert into " . $this->table . "(".implode(',', $this->columns) . ") values ('". implode("','", $this->data) . "') ");
//        die();
   $query = $this->connect->getConnect()->query("insert into " . $this->table . "(".implode(',', $this->columns) . ") values ('". implode("','", $this->data) . "') ");


        if ($query) {
            return "Success";
        }
        return "Error";
    }

    public function update(): string
    {
        unset($this->data['action']);
        $data = '';
        foreach ($this->data as $key => $value){
            $data.= $key . "='" . $value . "',";
        }
        $data= rtrim($data, ',');

        $query = $this->connect->getConnect()->query("update" . $this->table . "set" . $data . " where id=" . $this->id);

        if ($query) {
            return "Success";
        }
        return "Error";
    }

    public function delete(): string
    {

        $query = $this->connect->getConnect()->query( " delete * from " . $this->table . " where id= " . $this->id);

        if ($query) {
            return "Success";
        }
        return "Error";
    }

    public function show()
    {
        $query = $this->connect->getConnect()->query(" select * from " . $this->table . " where id= " . $this->id);

        if ($query) {
            return $query->fetch_object();
        }
        return null;
    }

    public function list():array
    {
        $data = [];
        $query = $this->connect->getConnect()->query("select * from " . $this->table);

        if ($query && $query->num_rows > 0) {
            while ($item = $query->fetch_object()) {
                $data [] = $item;
            }
            return $data;
        }
        return $data;
    }

    public function query()
    {
        $query = $this->connect->getConnect()->query("select * from" . $this->table ."".$this->query);

        if ($query) {
            return $query->fetch_object();
        }
        return null;
    }


}

