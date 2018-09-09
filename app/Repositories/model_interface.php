<?php 
namespace App\Repositories;

interface model_interface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $column,$value);

    public function update_detail(array $data, $column,$value,$column1,$value1);

    public function delete($column,$value);

    public function show($column,$value);

    public function max($param);

    public function cari($column,$value);

    public function same($column,$value);

    public function max_detail($column,$value,$param);

    public function deleteNotSame($column,$value,$column1,$value1);
    
    public function show_detail_one($column,$value,$column1,$value1);
    
    public function cari_jika_tidak($column,$value,$column1,$value1);
    
    public function semua_kecuali($column,$value);
    
    public function group_by($query,$column);


}