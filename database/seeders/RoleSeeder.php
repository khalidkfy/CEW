<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        Role::create([
            'role_name' => 'admin',
            'type' => 'admin',
        ]);

        Role::create([
            'role_name' => 'box_header_edit',
            'type' => 'box_header',
        ]);

        Role::create([
            'role_name' => 'out_partners_index',
            'type' => 'out_partners',
        ]);

        Role::create([
            'role_name' => 'out_partners_edit',
            'type' => 'out_partners',
        ]);

        Role::create([
            'role_name' => 'slider_image_delete',
            'type' => 'slider_image',
        ]);

        Role::create([
            'role_name' => 'slider_image_add',
            'type' => 'slider_image',
        ]);

        Role::create([
            'role_name' => 'our_services_index',
            'type' => 'our_services',
        ]);

        Role::create([
            'role_name' => 'our_services_edit',
            'type' => 'our_services',
        ]);

        Role::create([
            'role_name' => 'our_services_add',
            'type' => 'our_services',
        ]);

        Role::create([
            'role_name' => 'our_services_delete',
            'type' => 'our_services',
        ]);

        Role::create([
            'role_name' => 'categories_index',
            'type' => 'categories',
        ]);

        Role::create([
            'role_name' => 'categories_add',
            'type' => 'categories',
        ]);

        Role::create([
            'role_name' => 'categories_edit',
            'type' => 'categories',
        ]);

        Role::create([
            'role_name' => 'categories_delete',
            'type' => 'categories',
        ]);

        Role::create([
            'role_name' => 'our_products_index',
            'type' => 'our_products',
        ]);

        Role::create([
            'role_name' => 'our_products_edit',
            'type' => 'our_products',
        ]);

        Role::create([
            'role_name' => 'our_products_add',
            'type' => 'our_products',
        ]);

        Role::create([
            'role_name' => 'our_products_delete',
            'type' => 'our_products',
        ]);

        Role::create([
            'role_name' => 'why_choose_us',
            'type' => 'why_choose_us',
        ]);

        Role::create([
            'role_name' => 'who_we_are',
            'type' => 'who_we_are',
        ]);
    }
}
