<?php

namespace App\Admin\Controllers;

use App\Model\News;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class NewsController extends Controller
{
    use HasResourceActions;
    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News);
        $grid->id('Id');
        $grid->column('title');
        $grid->author('author');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->column('content');
//        $grid->Pic()->display(function ($url){
//            return "<img style='height:50px' src='https://".config('filesystems.disks.oss.bucket').'.'.config('filesystems.disks.oss.endpoint')."/".$url."'>";
//
//        });
        $grid->Pic()->image();
        $grid->column('sub_title');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(News::findOrFail($id));
        $show->id();
        $show->title();
        $show->author();
        $show->content();
        $show->Pic()->image();
        $show->sub_title();
        $show->created_at();
        $show->updated_at();
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News);
        $form->text('title', 'title');
        $form->text('sub_title', 'sub_title');
        $form->text('author', 'author');
        $form->textarea('content', 'content');
//        $directors = [
//            1 => 'John',
//            2 => 'Smith',
//            3 => 'Kate' ,
//        ];
//
//        $form->select('director', '导演')->options($directors);//单选
//        $form->number('rate', '打分');//数字
//        $form->switch('released', '发布？');//开关

//        $form->image('Pic', 'Pic')->move('public/upload/image/')->uniqueName();
        $form->image('Pic', 'Pic')->uniqueName();
        return $form;
    }
}
