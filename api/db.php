<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset:utf8;dbname=db0202";
    protected $pdo;
    protected $talbe;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo   = new PDO($this->dsn, 'root', '');
    }
// all
    public function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table ";
        if (! empty($arg[0])) {
            if (is_array($arg[0])) {
                $where = $this->a2s($arg[0]);
                $sql   = $sql . " WHERE " . join(" && ", $where);
            } else {
                $sql .= $arg[0];
            }
            if (! empty($arg[1])) {
                $sql = $sql . $arg[1];
            }
            return $this->fetchAll($sql);
        }

    }

// find
    public function find($id)
    {
        $sql = "SELECT * FROM $this->table ";

        if (is_array($id)) {
            $where = $this->a2s($id);
            $sql   = $sql . " WHERE " . join(" && ", $where);
        } else {
            $sql = $sql . " WHERE `id`='$id' ";
        }
        return $this->fetchOne($sql);
    }

// save
    public function save($array)
    {
        // 如果有id就是更新
        if (isset($array['id'])) {
            $id = $array['id'];
            unset($array['id']);
            $set = $this->a2s($array);
            $sql = "UPDATE $this->table SET " . join(',', $set) . " WHERE `id`='$id' ";
        } else {
            // 如果沒有id就是新增
            $cols = array_keys($array);
            $sql  = "INSERT INTO $this->table (`" . join("`,`", $cols) . "`) VALUES ('" . join("','", $array) . "')";
            // INSERT INTO `total` (`id`, `date`, `total`) VALUES (NULL, '2025-02-17', '50');
        }
        return $this->pdo->exec($sql);
    }

// del
    public function del($id)
    {
        $sql = "DELETE FROM $this->table ";

        if (is_array($id)) {
            $where = $this->a2s($id);
            $sql   = $sql . " WHERE " . join(" && ", $where);
        } else {
            $sql = " WHERE `id`='$id' ";
        }
        return $this->pdo->exec($sql);
    }

// a2s
    public function a2s($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

// fetchOne
    public function fetchOne($sql)
    {
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
// fetchAll
    public function fetchAll($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}

function q($sql)
{
    $dsn = "mysql:host=localhost;charset:utf8;dbname=db0202";
    $pdo = new PDO($dsn, 'root', '');
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

$Total = new DB('total');

if (! isset($_SESSION['view'])) {
    if ($Total->count(['date' => date("Y-m-d")]) > 0) {
        $total = $Total->find(['date' => date("Y-m-d")]);
        $total['total']++;
        $Total->save($total);
    } else {
        $Total->save(['date' => date("Y-m-d"), 'total' => 1]);
    }
    $_SESSION['view'] = 1;
}
