<section class="home-sec-1">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content top">
                    <div class="title">
                        <h4><?php echo $this->setting['home_content_1'] ?></h4>
                    </div>
                    <div class="subtitle">
                        <p><a href="<?php echo CHtml::normalizeUrl(array('/home/products')); ?>"><?php echo $this->setting['home_subtitle_1'] ?></a></p>
                    </div>
                </div>
            </div>

            <?php 
            $criteria = new CDbCriteria;
            $criteria->with = array('description');
            $criteria->addCondition('t.type = :type');
            $criteria->params[':type'] = 'category';
            // $criteria->limit = 3;
            $criteria->order = 'sort ASC';
            $categorys = PrdCategory::model()->findAll($criteria);
            ?>
            <?php 
            $tops_data = array_slice($categorys, 0, 2);
            $bottoms_data = array_slice($categorys, 2, 3);
            ?>
            
            <?php foreach ($tops_data as $key => $value): ?>
            <div class="col-md-30">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/category/'. $value->image ?>" alt="">
                            <p><?php echo $value->description->name ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?>

            <?php foreach ($bottoms_data as $key => $value): ?>
            <div class="col-md-20">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/category/'. $value->image ?>" alt="">
                            <p><?php echo $value->description->name ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?>

        </div>
        <div class="py-4"></div>
        <div class="clearfix clear"></div>
    </div>
</section>

<section class="home-sec-2">
    <div class="prelative container2">
        <div class="row">
            <div class="col-md-30"></div>
            <div class="col-md-30">
                <div class="box-content">
                    <div class="caption">
                        <!-- <h3>Want to become our partner in distributing<br><b>Reich hardware & accessories products?</b></h3>
                        <p>Reich Architectural & Interior accessories will bring you an excellent plan to market and distribute smart and technological solution products. Expect a profitable business plan that can help construct and build your relationship with modern customers and furniture makers. Come and join us, our representative will be ready to answer your inquiries.</p> -->

                        <?php echo $this->setting['home2_subtitle'] ?>
                    </div>

                    <div class="click">
                        <p><a href="<?php echo CHtml::normalizeUrl(array('/home/partner')); ?>">CLICK HERE</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-sec-3">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content quality">
                    <div class="title">
                        <h4><?php echo $this->setting['home3_title'] ?></h4>
                    </div>
                    <div class="subtitle">
                        <p><?php echo $this->setting['home3_subtitle'] ?></p>
                    </div>
                </div>
            </div>
            <?php for ($i=1; $i < 5; $i++) { ?>
            <div class="col-md-15">
                <div class="box-content">
                    <div class="image">
                        <img class="img img-fluid" src="<?php echo Yii::app()->baseUrl.'/images/static/'.$this->setting['home3_icons_picture_'. $i] ?>" alt="">
                    </div>
                    <div class="caption">
                        <p><?php echo $this->setting['home3_icons_title_'. $i] ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>