<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',
            //tabla anuncios
            'ver-anuncio',
            'crear-anuncio',
            'editar-anuncio',
            'eliminar-anuncio',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
