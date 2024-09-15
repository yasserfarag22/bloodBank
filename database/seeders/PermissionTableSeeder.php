<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
       
        $permissions = [
            ['name' => 'users-list', 'display_name' => 'عرض المستخدمين'],
            ['name' => 'users-create', 'display_name' => 'إنشاء مستخدم'],
            ['name' => 'users-edit', 'display_name' => 'تعديل مستخدم'],
            ['name' => 'users-delete', 'display_name' => 'حذف مستخدم'],

            ['name' => 'categories-list', 'display_name' => 'عرض الاقسام'],
            ['name' => 'categories-create', 'display_name' => 'إنشاء قسم'],
            ['name' => 'categories-edit', 'display_name' => 'تعديل قسم'],
            ['name' => 'categories-delete', 'display_name' => 'حذف قسم'],

            ['name' => 'cities-list', 'display_name' => 'عرض المدن'],
            ['name' => 'cities-create', 'display_name' => 'إنشاء مدينه'],
            ['name' => 'cities-edit', 'display_name' => 'تعديل مدينه'],
            ['name' => 'cities-delete', 'display_name' => 'حذف مدينه'],

            ['name' => 'clients-list', 'display_name' => 'عرض العملاء'],
            ['name' => 'clients-edit', 'display_name' => 'تعديل حاله العميل'],
            ['name' => 'clients-delete', 'display_name' => 'حذف العميل'],

            ['name' => 'contacts-list', 'display_name' => 'عرض الرسائل'],
            ['name' => 'contacts-delete', 'display_name' => 'حذف الرساله'],

            ['name' => 'donations-list', 'display_name' => 'عرض طلبات التبرع'],

            ['name' => 'governorates-list', 'display_name' => 'عرض المحافظه'],
            ['name' => 'governorates-create', 'display_name' => 'إنشاء محافظه'],
            ['name' => 'governorates-edit', 'display_name' => 'تعديل محافظه'],
            ['name' => 'governorates-delete', 'display_name' => 'حذف محافظه'],

            ['name' => 'posts-list', 'display_name' => 'عرض المقالات'],
            ['name' => 'posts-create', 'display_name' => 'إنشاء مقاله'],
            ['name' => 'posts-edit', 'display_name' => 'تعديل مقاله'],
            ['name' => 'posts-delete', 'display_name' => 'حذف مقاله'],

            ['name' => 'roles-list', 'display_name' => 'عرض الرتب'],
            ['name' => 'roles-create', 'display_name' => 'إنشاء رتبه'],
            ['name' => 'roles-edit', 'display_name' => 'تعديل رتبه'],
            ['name' => 'roles-delete', 'display_name' => 'حذف رتبه'],

            ['name' => 'settings-list', 'display_name' => 'عرض الاعدادات'],
            ['name' => 'settings-edit', 'display_name' => 'تعديل الاعدادات'],
         
        
            
        ];


        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}