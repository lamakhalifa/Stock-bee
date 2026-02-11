<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Http\Response;

class UsersExport
{
    public function export()
    {
        $users = User::select('id', 'name', 'phone', 'email', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $html = '
        <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>تقرير المستخدمين</title>
            <style>
                body {
                    font-family: "Tajawal", Arial, sans-serif;
                    direction: rtl;
                }
                h1 {
                    color: #000000;
                    text-align: center;
                }
                h2 {
                    color: #FFDD00;
                    text-align: center;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                    margin-top: 20px;
                }
                th {
                    background-color: #FFDD00;
                    color: #000000;
                    font-weight: bold;
                    padding: 12px;
                    border: 1px solid #ddd;
                    text-align: center;
                }
                td {
                    padding: 10px;
                    border: 1px solid #ddd;
                    text-align: center;
                }
                tr:hover {
                    background-color: #f5f5f5;
                }
                .stats {
                    display: flex;
                    justify-content: center;
                    gap: 50px;
                    margin: 20px 0;
                    font-size: 16px;
                    font-weight: bold;
                }
                .stat-box {
                    background: #f8f9fa;
                    padding: 15px 25px;
                    border-radius: 10px;
                    border-right: 5px solid #FFDD00;
                }
            </style>
        </head>
        <body>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>رقم الجوال</th>
                        <th>البريد الإلكتروني</th>
                        <th>تاريخ التسجيل</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($users as $index => $user) {
            $html .= '
                    <tr>
                        <td>' . ($index + 1) . '</td>
                        <td>' . $user->name . '</td>
                        <td>' . ($user->phone ?? 'غير متوفر') . '</td>
                        <td>' . $user->email . '</td>
                        <td>' . $user->created_at->format('Y-m-d') . '</td>
                    </tr>';
        }

        $html .= '
                </tbody>
            </table>
        </body>
        </html>';

        return response($html)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="users_report_' . date('Y-m-d') . '.xls"')
            ->header('Cache-Control', 'max-age=0');
    }
}
