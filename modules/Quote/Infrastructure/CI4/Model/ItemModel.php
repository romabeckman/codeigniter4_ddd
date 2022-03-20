<?php

namespace Quote\Infrastructure\CI4\Model;

use \CodeIgniter\Model;

class ItemModel extends Model {

    protected $table = 'itens';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
//    protected $returnType = 'array';
    protected $allowedFields = ['quote_id', 'product', 'amount', 'quantity'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}
