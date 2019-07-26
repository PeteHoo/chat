<?php

namespace App\Admin\Controllers;

use App\Model\Movies;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MoviesController extends Controller
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
        $grid=new Grid(new Movies());
        $grid->model()->where('id','<',3);
        $grid->model()->orderBy('id','DESC');
        $grid->id('ID')->sortable();
        $grid->column('title');
//        $grid->director()->display(function ($userId){
//            return User::find($userId)->name;
//        });
        $grid->director("导演")->display(function ($director){
            return $director;
        });
        $grid->column('full')->display(function (){
            return $this->title." ".$this->director;
        });
        $grid->describle();
        $grid->rate();
        $grid->released('上映?')->display(function ($released){
            return $released?'是':'否';
        });
        $grid->release_at();
        $grid->created_at();
        $grid->updated_at();
        $grid->filter(function ($filter) {
            // 设置created_at字段的范围查询
            $filter->between('created_at', 'Created Time')->datetime();
        });
        return $content->body($grid);
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
        $grid = new Grid(new Movies);

        $grid->id('Id');
        $grid->title('Title');
        $grid->director('Director');
        $grid->describe('Describe');
        $grid->rate('Rate');
        $grid->released('Released');
        $grid->release_at('Release at');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Movies::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->director('Director');
        $show->describe('Describe');
        $show->rate('Rate');
        $show->released('Released');
        $show->release_at('Release at');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Movies);

        $form->text('title', 'Title');
        $form->text('director', 'Director');
        $form->text('describe', 'Describe');
        $form->switch('rate', 'Rate');
        $form->text('released', 'Released');
        $form->datetime('release_at', 'Release at')->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
