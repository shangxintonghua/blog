<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 23:13
 */
  if (!defined("BL_SXTH"))
  {
      header("location:../index.php");
  }
?>
<?php
    class PAGE
    {
        private $totalPage;//总页数
        private $totalData;//影响的总记录数
        private $curPage=1;//当前页
        private $perPage;//每一页的条数

        //参数
        private $paramName;
        //当前目录
        private $curPath;

        public function __construct($perPage,$paramName,$curPath)
        {
            $this->perPage=$perPage;
            $this->paramName=$paramName;
            $this->curPath=$curPath;
        }

        /*设置总数据*/
        function setTotalData($totalData)
        {
            $this->totalData=$totalData;
        }

        /*设置总的页数*/
        function getTotalPage()
        {
            //向上舍入数字,比喻ceil(0.4)=1
            $this->totalPage=ceil($this->totalData/$this->perPage);
            return $this->totalPage;
        }

        /*获取当前页*/
        function getCurPage()
        {
            return $this->curPath;
        }

        /*设置当前页*/
        function setCurPage($curPage)
        {

            if($curPage<=0)
            {
                $this->curPage=1;
            }
            else if ($curPage>$this->getTotalPage())
            {
                $this->curPage=$this->getTotalPage();
            }
            else
            {
                $this->curPage=$curPage;
            }
        }


        /*输出分页列表*/
        function getPages()
        {
            if ($this->totalData<=$this->perPage)
            {
                echo '<li>';
                echo '<a class="curpage">'.$this->curPage;
                echo '</a>';
                echo '</li>';
            }
            else
            {
                $allPage=$this->getTotalPage();
                for ($i=1;$i<=$allPage;$i++)
                {
                    echo '<li>';
                    if ($this->getCurPage()==$i)
                    {
                        echo '<a class="curpage">'.$i;
                        echo '</a>';
                    }
                    else
                    {
                        echo '<a href="'.$this->curPath.'/page'.$i.'-'.$this->paramName.'">'.$i;
                        echo '</a>';
                    }
                    echo '</li>';
                    echo '';
                }
            }
        }



    }

?>
