<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public $comment=null;

    public function __construct()
    {
        $this->comment=new Comment();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //
        if(auth::check()){
            $data=array();
            $data['news_id']=$request->input('news_id');
            $data['parent_id']=$request->input('parent_id');
            $data['from_user_id']=$request->input('from_user_id');
            $data['to_user_id']=$request->input('to_user_id');
            $data['level']=$request->input('level');
            $data['status']=1;
            $data['content']=$request->input('content');
            $data['created_at']=date('Y-m-d h:i:s',time());
            $data['updated_at']=date('Y-m-d h:i:s',time());
            if($this->comment->addComment($data)){
                return response()->json([
                    'msg'=>'评论成功',
                    'status'=>200
                ]);
            }else{
                return response()->json([
                    'msg'=>'评论失败',
                    'status'=>250
                ]);
            }
        }else{
            return response()->json([
                'msg'=>'您还未登录',
                'status'=>260
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function test(){
        $nums=[1,1,2];
//        for($i=0;$i<count($nums);$i++){
//            for($j=$i+1;$j<count($nums);$j++){
//                if($nums[$i]==$nums[$j]){
//                    unset($nums[$i]);
//                }
//            }
//        }
        $newnums=array_unique($nums);
        $newnums=array_values($newnums);
        return $newnums;
    }
    public function export(){
        $objectPHPExcel = new PHPExcel();
        $objectPHPExcel->setActiveSheetIndex(0);

        $page_size = 52;
        //数据的取出
        $model = Yii::app()->session['printdata'];

        $dataProvider = $model->search();

        $dataProvider->setPagination(false);
        $data = $dataProvider->getData();
        $count = $dataProvider->getTotalItemCount();
        //总页数的算出
        $page_count = (int)($count/$page_size) +1;
        $current_page = 0;

        $n = 0;
        foreach ( $data as $product )
        {
            if ( $n % $page_size === 0 )
            {
                $current_page = $current_page +1;

                //报表头的输出
                $objectPHPExcel->getActiveSheet()->mergeCells('B1:G1');
                $objectPHPExcel->getActiveSheet()->setCellValue('B1','产品信息表');

                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B2','产品信息表');
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B2','产品信息表');
                $objectPHPExcel->setActiveSheetIndex(0)->getStyle('B1')->getFont()->setSize(24);
                $objectPHPExcel->setActiveSheetIndex(0)->getStyle('B1')
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B2','日期：'.date("Y年m月j日"));
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('G2','第'.$current_page.'/'.$page_count.'页');
                $objectPHPExcel->setActiveSheetIndex(0)->getStyle('G2')
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

                //表格头的输出
                $objectPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B3','编号');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(6.5);
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('C3','名称');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('D3','生产厂家');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(22);
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('E3','单位');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('F3','单价');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
                $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('G3','在库数');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);

                //设置居中
                $objectPHPExcel->getActiveSheet()->getStyle('B3:G3')
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                //设置边框
                $objectPHPExcel->getActiveSheet()->getStyle('B3:G3' )
                    ->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:G3' )
                    ->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:G3' )
                    ->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:G3' )
                    ->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:G3' )
                    ->getBorders()->getVertical()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

                //设置颜色
                $objectPHPExcel->getActiveSheet()->getStyle('B3:G3')->getFill()
                    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF66CCCC');

            }
            //明细的输出
            $objectPHPExcel->getActiveSheet()->setCellValue('B'.($n+4) ,$product->id);
            $objectPHPExcel->getActiveSheet()->setCellValue('C'.($n+4) ,$product->product_name);
            $objectPHPExcel->getActiveSheet()->setCellValue('D'.($n+4) ,$product->product_agent->name);
            $objectPHPExcel->getActiveSheet()->setCellValue('E'.($n+4) ,$product->unit);
            $objectPHPExcel->getActiveSheet()->setCellValue('F'.($n+4) ,$product->unit_price);
            $objectPHPExcel->getActiveSheet()->setCellValue('G'.($n+4) ,$product->library_count);
            //设置边框
            $currentRowNum = $n+4;
            $objectPHPExcel->getActiveSheet()->getStyle('B'.($n+4).':G'.$currentRowNum )
                ->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B'.($n+4).':G'.$currentRowNum )
                ->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B'.($n+4).':G'.$currentRowNum )
                ->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B'.($n+4).':G'.$currentRowNum )
                ->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B'.($n+4).':G'.$currentRowNum )
                ->getBorders()->getVertical()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $n = $n +1;
        }

        //设置分页显示
        //$objectPHPExcel->getActiveSheet()->setBreak( 'I55' , PHPExcel_Worksheet::BREAK_ROW );
        //$objectPHPExcel->getActiveSheet()->setBreak( 'I10' , PHPExcel_Worksheet::BREAK_COLUMN );
        $objectPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
        $objectPHPExcel->getActiveSheet()->getPageSetup()->setVerticalCentered(false);


        ob_end_clean();
        ob_start();

        header('Content-Type : application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename="'.'产品信息表-'.date("Y年m月j日").'.xls"');
        $objWriter= PHPExcel_IOFactory::createWriter($objectPHPExcel,'Excel5');
        $objWriter->save('php://output');
    }

}
