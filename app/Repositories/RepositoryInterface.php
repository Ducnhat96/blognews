<?php
/**
 * Created by PhpStorm.
 * User: ducchien
 * Date: 09/08/2018
 * Time: 14:08
 */

namespace App\Repositories;

interface RepositoryInterface
{
    public function index();

    public function edit($id);

    public function store(array $attributes);

    public function update($id,array $attributes);

    public function destroy($id);

}