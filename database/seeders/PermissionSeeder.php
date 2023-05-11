<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**معلومات الاختصاص */
        Permission::create([
            'name' => 'عرض كل الاختصاصات',
        ]);
        Permission::create([
            'name' => 'إضافة اختصاص',
        ]);
        Permission::create([
            'name' => 'عرض معلومات الاختصاص',
        ]);
        Permission::create([
            'name' => 'تعديل اختصاص',
        ]);
        Permission::create([
            'name' => 'حذف اختصاص',
        ]);
        /** معلومات المقيم */
        Permission::create([
            'name' => 'عرض كل المقيمين',
        ]);
        Permission::create([
            'name' => 'عرض المقيمين في اختصاص',
        ]);
        Permission::create([
            'name' => 'عرض الذين أنهو التدريب في اختصاص',
        ]);
        Permission::create([
            'name' => 'عرض الخريجين في اختصاص',
        ]);
        Permission::create([
            'name' => 'عرض الذين تم تغير حالتهم في اختصاص',
        ]);
        Permission::create([
            'name' => 'إضافة مقيم',
        ]);
        Permission::create([
            'name' => 'تعديل معلومات مقيم',
        ]);
        Permission::create([
            'name' => 'حذف مقيم',
        ]);
        /** معلومات المجلس العلمي*/
        Permission::create([
            'name' => 'عرض كل المجالس',
        ]);
        Permission::create([
            'name' => 'إضافة مجلس',
        ]);
        Permission::create([
            'name' => 'تعديل مجلس',
        ]);
        Permission::create([
            'name' => 'حذف مجلس',
        ]);
        /** معلومات المستخدمين*/
        Permission::create([
            'name' => 'عرض كل المستخدمين',
        ]);
        Permission::create([
            'name' => 'إضافة مستخدم',
        ]);
        Permission::create([
            'name' => 'تعديل مستخدم',
        ]);
        Permission::create([
            'name' => 'حذف مستخدم',
        ]);
        /** معلومات الكوادر*/
        Permission::create([
            'name' => 'عرض كل الكادر',
        ]);
        Permission::create([
            'name' => 'إضافة عضو',
        ]);
        Permission::create([
            'name' => 'تعديل عضو',
        ]);
        Permission::create([
            'name' => 'حذف عضو',
        ]);
        /**  معلومات المسميات الوظيفية*/
        Permission::create([
            'name' => 'عرض كل المسيات الوظيفية',
        ]);
        Permission::create([
            'name' => 'إضافة مسمى وظيفي',
        ]);
        Permission::create([
            'name' => 'تعديل مسمى وظيفي',
        ]);
        Permission::create([
            'name' => 'حذف مسمى وظيفي',
        ]);
        Permission::create([
            'name' => 'إضافة مسمى مهة لمسمى وظيفي',
        ]);
        /**معلومات الإجازات */
        Permission::create([
            'name' => 'عرض كل الإجازات',
        ]);
        Permission::create([
            'name' => 'إضافة إجازة',
        ]);
        Permission::create([
            'name' => 'تعديل إجازة',
        ]);
        Permission::create([
            'name' => 'حذف إجازة',
        ]);
        /** معلومات العقوبات */
        Permission::create([
            'name' => 'عرض كل العقوبات',
        ]);
        Permission::create([
            'name' => 'إضافة عقوبة',
        ]);
        Permission::create([
            'name' => 'تعديل عقوبة',
        ]);
        Permission::create([
            'name' => 'حذف عقوبة',
        ]);
        /**معلومات المراكز الامتحانية */
        Permission::create([
            'name' => 'عرض كل المراكز الامتحانية',
        ]);
        Permission::create([
            'name' => 'إضافة مركز امتحاني',
        ]);
        Permission::create([
            'name' => 'تعديل مركز امتحاني',
        ]);
        Permission::create([
            'name' => 'حذف مركز امتحاني',
        ]);
        /**معلومات الدورات الامتحانية */
        Permission::create([
            'name' => 'عرض كل الدورات الامتحانية',
        ]);
        Permission::create([
            'name' => 'إضافة دورة امتحانية',
        ]);
        Permission::create([
            'name' => 'تعديل دورة امتحانية',
        ]);
        /** معلومات الامتحان*/
        Permission::create([
            'name' => 'عرض كل الامتحانات',
        ]);
        Permission::create([
            'name' => 'إضافة امتحان',
        ]);
        Permission::create([
            'name' => 'تعديل امتحان',
        ]);
        Permission::create([
            'name' => 'حذف امتحان',
        ]);
        /**معلومات الحالات الوظيفية */
        Permission::create([
            'name' => 'عرض كل الحالات الوظيفة',
        ]);
        Permission::create([
            'name' => 'إضافة حالة وظيفية',
        ]);
        Permission::create([
            'name' => 'تعديل حالة وظيفية',
        ]);
        Permission::create([
            'name' => 'حذف حالة وظيفية',
        ]);
        /**التدريبات السابقة */
        Permission::create([
            'name' => 'عرض كل التدريبات السابقة',
        ]);
        Permission::create([
            'name' => 'إضافة تدريب سابق',
        ]);
        Permission::create([
            'name' => 'تعديل تدريب سابق',
        ]);
        Permission::create([
            'name' => 'حذف تدريب سابق',
        ]);
        /**  معلومات سنوات الإقامة*/
        Permission::create([
            'name' => 'عرض كل سنوات الإقامة',
        ]);
        Permission::create([
            'name' => 'إضافة سنة إقامة',
        ]);
        Permission::create([
            'name' => 'تعديل سنة إقامة',
        ]);
        Permission::create([
            'name' => 'حذف سنة إقامة',
        ]);
        /** معلومات إحازات المقيم */
        Permission::create([
            'name' => 'عرض إجازات المقيم',
        ]);
        Permission::create([
            'name' => 'إضافة إجازة لمقيم',
        ]);
        Permission::create([
            'name' => 'تعديل إجازة لمقيم',
        ]);
        Permission::create([
            'name' => 'حذف إجازة لمقيم',
        ]);
        /**  معلومات عقوبات المقيم*/
        Permission::create([
            'name' => 'كل عقوبات المقيم',
        ]);
        Permission::create([
            'name' => 'إضافة عقوبة لمقيم',
        ]);
        Permission::create([
            'name' => 'تعديل عقوبة لمقيم',
        ]);
        Permission::create([
            'name' => 'حذف عقوبة لمقيم',
        ]);
        /** معلومات الحالات الوظيفية */
        Permission::create([
            'name' => 'كل حالات المقيم',
        ]);
        Permission::create([
            'name' => 'إضافة حالة لمقم',
        ]);
        Permission::create([
            'name' => 'تعديل حالة لمقيم',
        ]);
        Permission::create([
            'name' => 'حذف حالة لمقيم',
        ]);
        /**  معلومات المقمين في الامتحانات*/
        Permission::create([
            'name' => 'كل المرشحين للامتحان',
        ]);
        Permission::create([
            'name' => 'ترشيح مقيم لامتحان',
        ]);
        Permission::create([
            'name' => 'إلغاء ترسيح مقيم لامتحان',
        ]);
        /**معلومات العقوبة الامتحانية */
        Permission::create([
            'name' => 'عرض كل العقوبات الامتحانية لمقيم',
        ]);
        Permission::create([
            'name' => 'إضافة عقوبة امتحانية لمقيم',
        ]);
        Permission::create([
            'name' => 'تعديل عقوبة امتحانية لمقيم',
        ]);
        Permission::create([
            'name' => 'حذف عقوبة امتحانية لمقيم',
        ]);
        /**معلومات الاعتذار عن امتحان */
        Permission::create([
            'name' => 'عرض كل اعتذارات المقيم',
        ]);
        Permission::create([
            'name' => 'إضافة اعتذار لمقيم',
        ]);
        Permission::create([
            'name' => 'تعديل اعتذار لمقيم',
        ]);
        Permission::create([
            'name' => 'حذف اعتذار لمقيم',
        ]);
        /**معلومات رسوم الامتحان */
        Permission::create([
            'name' => 'عرض كل رسوم الامتحان',
        ]);
        Permission::create([
            'name' => 'إضافة رسم امتحاني لقيم',
        ]);
        Permission::create([
            'name' => 'تعديل رسم امتحاني لمقيم',
        ]);
        Permission::create([
            'name' => 'حذف رسم امتحاني لمقيم',
        ]);
        /** نتائج الامتحانات*/
        Permission::create([
            'name' => 'عرض نتاج امتحان',
        ]);
        Permission::create([
            'name' => 'إضافة نتيجة امتحان',
        ]);
        Permission::create([
            'name' => 'تعديل نتيجة امتحانية',
        ]);
        Permission::create([
            'name' => 'حذف نتيجة امتحانية',
        ]);
    }
}