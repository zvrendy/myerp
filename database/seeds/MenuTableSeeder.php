<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Create Menu Data */
<<<<<<< HEAD

        DB::table('menu')->insert([
            ['menu_judul' => 'Home', 'menu_link' => '#', 'menu_icon' => 'fas fa-home', 'menu_parent_id' => 0],
            ['menu_judul' => 'Account Receivable', 'menu_link' => 'AccountReceivablePesanan', 'menu_icon' => 'fas fa-exchange-alt', 'menu_parent_id' => 0],
            ['menu_judul' => 'Master Data', 'menu_link' => '#', 'menu_icon' => 'fas fa-database', 'menu_parent_id' => 0],
            ['menu_judul' => 'Setting', 'menu_link' => '#', 'menu_icon' => 'fas fa-cogs', 'menu_parent_id' => 0],
            // ['menu_judul' => 'Master File', 'menu_link' => '#', 'menu_icon' => 'fas fa-folder', 'menu_parent_id' => '2'],
            // ['menu_judul' => 'AR Management', 'menu_link' => '#', 'menu_icon' => 'fas fa-folder', 'menu_parent_id' => '2'],
            // ['menu_judul' => 'Posting Rules', 'menu_link' => 'PostingRules', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '5'],
            // ['menu_judul' => 'A/R Parameter Setup', 'menu_link' => 'ParameterSetup', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '5'],
            // ['menu_judul' => 'Tax No Setup', 'menu_link' => 'TaxNoSetup', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '5'],
            // ['menu_judul' => 'Invoice Entry', 'menu_link' => '#', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '6'],
            // ['menu_judul' => 'Credit Note Entry', 'menu_link' => '#', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '6'],
            // ['menu_judul' => 'Refund Entry', 'menu_link' => '#', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '6'],
=======
    
        DB::table('menu')->insert([
            ['menu_judul' => 'Home', 'menu_link' => '#', 'menu_icon' => 'fas fa-home', 'menu_parent_id' => 0],
            ['menu_judul' => 'Account Receivable', 'menu_link' => '#', 'menu_icon' => 'fas fa-exchange-alt','menu_parent_id' => 0],
            ['menu_judul' => 'Master Data', 'menu_link' => '#', 'menu_icon' => 'fas fa-database', 'menu_parent_id' => 0],
            ['menu_judul' => 'Setting', 'menu_link' => '#', 'menu_icon' => 'fas fa-cogs', 'menu_parent_id' => 0],
            ['menu_judul' => 'Master File', 'menu_link' => '#', 'menu_icon' => 'fas fa-folder', 'menu_parent_id' => '2'],
            ['menu_judul' => 'AR Management', 'menu_link' => '#', 'menu_icon' => 'fas fa-folder', 'menu_parent_id' => '2'],
            ['menu_judul' => 'Posting Rules', 'menu_link' => 'PostingRules', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '5'],
            ['menu_judul' => 'A/R Parameter Setup', 'menu_link' => 'ParameterSetup', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '5'],
            ['menu_judul' => 'Tax No Setup', 'menu_link' => 'TaxNoSetup', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '5'],
            ['menu_judul' => 'Invoice Entry', 'menu_link' => '#', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '6'],
            ['menu_judul' => 'Credit Note Entry', 'menu_link' => '#', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '6'],
            ['menu_judul' => 'Refund Entry', 'menu_link' => '#', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '6'],
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
            ['menu_judul' => 'Master Customer', 'menu_link' => 'Customer', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '3'],
            ['menu_judul' => 'Master Produk', 'menu_link' => 'Produk', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '3'],
            ['menu_judul' => 'Master Unit', 'menu_link' => 'Unit', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '3'],
            ['menu_judul' => 'Master Supplier', 'menu_link' => 'Supplier', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '3'],
            ['menu_judul' => 'Master Bank', 'menu_link' => 'Bank', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '3'],
            ['menu_judul' => 'Master Trans', 'menu_link' => 'Trans', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '3'],
            ['menu_judul' => 'Master Unit', 'menu_link' => 'Unit', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '3'],
            ['menu_judul' => 'Menu Management', 'menu_link' => 'Menu', 'menu_icon' => 'fas fa-bolt', 'menu_parent_id' => '4'],
<<<<<<< HEAD


=======
    
    
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
        ]);
    }
}
