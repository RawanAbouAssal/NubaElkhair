<?php

interface CRUDOperations {
    public function read($tableName);
    public function create($columns, $values);
    public function update($tableName, $tableId);
    public function delete($tableName, $tableId);
}

?>