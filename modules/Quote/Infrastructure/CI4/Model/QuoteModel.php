<?php

namespace Quote\Infrastructure\CI4\Model;

use \CodeIgniter\Model;

class QuoteModel extends Model {

    protected $table = 'quotes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
//    protected $returnType = 'array';
    protected $allowedFields = ['valid_at', 'customer_id', 'status'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}
