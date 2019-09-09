<?php
$this->breadcrumbs=array(
    'Dashboard',
);
?>
    
<div class="pageheader">
    
    <div class="pageicon"><span class="fa fa-laptop"></span></div>
    <div class="pagetitle">
        <h5>All Features Summary</h5>
        <h1>Dashboard</h1>
    </div>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">
        <div class="row-fluid">
            <div id="dashboard-left" class="span8">
                    <h5 class="subtitle">Menu</h5>

                    <ul class="shortcuts">
                        <li class="events">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/product/index')); ?>">
                                <i class="icon-cms fa fa-tag"></i>
                                <span class="shortcuts-label">Products</span>
                            </a>
                        </li>
                        <?php /*
                        <li class="products">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index')); ?>">
                                <i class="icon-cms fa fa-image"></i>
                                <span class="shortcuts-label">Slide</span>
                            </a>
                        </li>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>">
                                <i class="icon-cms fa fa-info"></i>
                                <span class="shortcuts-label">About Us</span>
                            </a>
                        </li>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/healty/index')); ?>">
                                <i class="icon-cms fa fa-heart"></i>
                                <span class="shortcuts-label">Healty</span>
                            </a>
                        </li>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/gema/index')); ?>">
                                <i class="icon-cms fa fa-group"></i>
                                <span class="shortcuts-label">ge-ma</span>
                            </a>
                        </li>
                        */ ?>
                        <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/static/contact')); ?>">
                                <i class="icon-cms fa fa-phone"></i>
                                <span class="shortcuts-label">Contact Us</span>
                            </a>
                        </li>

                </ul>

                <br />
                
                <!-- <h5 class="subtitle">Daily Statistics</h5><br />
                <canvas id="myChart"></canvas> -->

                
                <div class="divider30"></div>

            </div> <!-- span-8 -->
            
            <div id="dashboard-right" class="span4">
                
                <h5 class="subtitle">Announcements</h5>
                
                <div class="divider15"></div>
                <?php /*
                <?php
                $jmlPenjualan = Yii::app()->db->createCommand()
                    ->select('COUNT(id) as jml, SUM(total) as total')
                    ->from('or_order')
                    ->where('DATE_FORMAT(date_add, "%Y-%m-%d") = :date', array(':date'=>date('Y-m-d')))
                    ->queryRow();

                $jmlBerhasil = Yii::app()->db->createCommand()
                    ->select('COUNT(id) as jml, SUM(total) as total')
                    ->from('or_order')
                    ->where('DATE_FORMAT(date_add, "%Y-%m-%d") = :date AND order_status_id IN (2, 3, 6, 15, 17)', array(':date'=>date('Y-m-d')))
                    ->queryRow();
                ?>
                <div class="alert alert-block">
                      <button data-dismiss="alert" class="close" type="button">&times;</button>
                      <h4>Jumlah Transaksi Hari Ini</h4>
                      <h2><?php echo $jmlPenjualan['jml'] ?> Transaksi</h2>
                      <!-- <p style="margin: 8px 0">Don't share your password</p> -->
                      <!-- <p style="margin: 8px 0">Lihat User Guide <a href="<?php echo Yii::app()->baseUrl.'/images/user-guide-victory.pdf' ?>">di sini</a> </p> -->
                </div><!--alert-->
                
                <div class="alert alert-block">
                      <button data-dismiss="alert" class="close" type="button">&times;</button>
                      <h4>Penjualan Berhasil Hari Ini</h4>
                      <h2><?php echo Cart::money($jmlBerhasil['total']) ?></h2>
                      <!-- <p style="margin: 8px 0">Don't share your password</p> -->
                      <!-- <p style="margin: 8px 0">Lihat User Guide <a href="<?php echo Yii::app()->baseUrl.'/images/user-guide-victory.pdf' ?>">di sini</a> </p> -->
                </div><!--alert-->
                
                <div class="alert alert-block">
                      <button data-dismiss="alert" class="close" type="button">&times;</button>
                      <h4>Jumlah Transaksi Berhasil Hari Ini</h4>
                      <h2><?php echo $jmlBerhasil['jml'] ?> Transaksi</h2>
                      <!-- <p style="margin: 8px 0">Don't share your password</p> -->
                      <!-- <p style="margin: 8px 0">Lihat User Guide <a href="<?php echo Yii::app()->baseUrl.'/images/user-guide-victory.pdf' ?>">di sini</a> </p> -->
                </div><!--alert-->
                */ ?>

                <div class="alert alert-block">
                      <button data-dismiss="alert" class="close" type="button">&times;</button>
                      <p style="margin: 8px 0">Download User Guide</p>
                      <!-- <p style="margin: 8px 0">Lihat User Guide <a href="<?php echo Yii::app()->baseUrl.'/images/user-guide.pdf' ?>">di sini</a> </p> -->
                </div>
                
                <br />
                
                
                <br />
                                        
            </div><!--span4-->
        </div><!--row-fluid-->
        
        <div class="footer">
            <div class="footer-left">
                <span>Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name ?>.</span>
            </div>
            <div class="footer-right">
                <span>All Rights Reserved. Developed By <a target="_blank" href="http://markdesign.net">Markdesign</a></span>
            </div>
        </div><!--footer-->
        
    </div><!--maincontentinner-->
</div><!--maincontent-->

<?php
// $dataPenjulan = Yii::app()->db->createCommand()
//     ->select('COUNT(id) as jml, SUM(total) as total, DATE_FORMAT(date_add, "%Y-%m-%d") as tanggal, DATE_FORMAT(date_add, "%a") as hari')
//     ->from('or_order')
//     ->where('DATE_FORMAT(date_add, "%Y-%m-%d") BETWEEN :date1 AND :date2', array(':date1'=>date('Y-m-d', strtotime(date('Y-m-d').' -7 day')), ':date2'=>date('Y-m-d')))
//     ->order('tanggal ASC')
//     ->group('tanggal')
//     ->queryAll();

// $day = array();
// for ($i=0; $i < 7; $i++) { 
//     $day[date('D', strtotime(date("Y-m-d")."-".$i." day"))] = '"'.date('D', strtotime(date("Y-m-d")."-".$i." day")).'"';
// }
// $day = array_reverse($day);
// $dataPenjulan2 = array();
// foreach ($dataPenjulan as $key => $value) {
//     $dataPenjulan2[$value['hari']] = $value;
// }
// // print_r($dataPenjulan2['Mon']);
// $dataPenjulan3 = array();
// foreach ($day as $key => $value) {
//     $dataPenjulan3[] = $dataPenjulan2[$key];
// }
// $totalArray = array();
// $jmlTransaksi = array();
// foreach ($dataPenjulan3 as $key => $value) {
//     $totalArray[] = $value['total'];
//     $jmlTransaksi[] = $value['jml'];
// }
// // print_r($dataPenjulan3);

?>
