<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use function foo\func;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('仪表盘')
            ->description('描述...')
            ->row(Dashboard::title())
            ->body('hello world~')
            ->row(function (Row $row){
                $row->column(2,'foo');
                $row->column(2,'bar');
                $row->column(2,'baz');
                $row->column(6,function(Column $column){
                    $column->row('111111');
                    $column->row('222222');
                    $column->row('333333');
                    $column->row(function (Row $row){
                        $row->column(2,'行中列1');
                        $row->column(2,'行中列2');
                    });
                });
            })
//            ->breadcrumb(
//                ['text'=>'首页','url'=>'/admin'],
//                ['text'=>'用户管理','url'=>'/admin/users'],
//                ['text'=>'编辑用户']
//                )
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
