<?php

namespace Quote\Infrastructure\CI4\Model;

use \CodeIgniter\Model;

/**
 * Description of CustomerModel
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class CustomerModel extends Model {

    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
//    protected $returnType = 'array';
    protected $allowedFields = ['firstname', 'lastname', 'email'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}
