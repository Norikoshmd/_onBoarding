<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'name'          => 'Employee Information Form',
                'category'      => 'Basic',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'          => 'Emergency Contact Form',
                'category'      => 'Basic',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'          => 'My Number Card | マイナンバーカード',
                'category'      => 'Basic',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'          => 'Pension Book / Pension Certificate | 年金手帳、基礎年金番号通知書',
                'category'      => 'Copies',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'          => 'Employment Insurance Card | 雇用保険被保険者証',
                'category'      => 'Copies',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'          => 'Income Tax Withholing Slip | 給与所得者の源泉徴収票',
                'category'      => 'Copies',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'          => 'Pension book/certificate for your Spouse | 配偶者の年金手帳、基礎年金番号通知書',
                'category'      => 'Dependent',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
            [
                'name'          => 'My Number Card of dependent spouse  | 配偶者のマイナンバーカード',
                'category'      => 'Dependent',
                'created_at'    => NOW(),
                'updated_at'    => NOW()
            ],
        ];

        $this->task->insert($tasks);
    }
}
