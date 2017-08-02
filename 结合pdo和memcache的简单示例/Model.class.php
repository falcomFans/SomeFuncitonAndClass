<?php
class Model 
{
   private $mem; 
   private $pdo;
   private $dbname;

   /**构造方法，要求传入一个server池二维数组
   */
   public function __construct(array $servers) 
   {
       $this->mem = new Memcache();
       foreach ($servers as $value) {
           $this->mem->addServer($value[0],$value[1],$value[2],$value[3]);
       }
   }

   /**链接数据库
   ** @param string $sqltype 数据库类型
   ** @param string $dbname 数据库名称
   ** @param string $host 数据库地址
   ** @param string $user 数据库用户
   ** @param string $pass 数据库密码
   *
   */
   public function getSql($sqltype,$dbname,$host,$user,$pass)
   {
        $dsn = "$sqltype:dbname=$dbname;host=$host";
        $user = "$user";
        $password = "$pass";
        $this->pdo = new PDO($dsn, $user, $password);
        $this->dbname = $dbname;
   }

    /**取得指定数据表所有数据，返回二维数组
    ** @param $table string 数据表名称
    */
   public function getAlldata($table)
   {  
      $key = "All".$this->dbname.$table;
      $data = $this->mem->get($key);
      if (!$data) 
      {
            $sql = "select * from $table";
            $result = $this->pdo->query($sql);
            $data = $result->fetchAll();
            $this->mem->set($key,$data);
      }
      return $data;   
   }
}







