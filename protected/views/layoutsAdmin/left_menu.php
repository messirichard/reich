<div class="leftmenu">        
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">Navigation</li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/product/index')); ?>"><span class="fa fa-tag"></span> <?php echo Tt::t('admin', 'Products') ?></a>
            <ul>
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/product')); ?>">All Product Discount</a></li> -->
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/product/index')); ?>">View Products</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/product/create')); ?>">Add Products</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/category/index')); ?>">Category</a></li>
                
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/filtercat/index')); ?>">Filter</a></li> -->
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/brand/index')); ?>">Brand</a></li> -->
            </ul>
        </li>

        <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/promo/index')); ?>"><span class="fa fa-fax"></span> <?php echo Tt::t('admin', 'Voucher Discount') ?></a></li> -->

        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/order/index')); ?>"><span class="fa fa-fax"></span> <?php echo Tt::t('admin', 'Orders') ?> (<?php echo OrOrder::model()->count('is_read = 0') ?>)</a></li>

        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/customer/index')); ?>"><span class="fa fa-fax"></span> <?php echo Tt::t('admin', 'Customer') ?></a></li>
        
        <?php /*
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index')); ?>"><span class="fa fa-image"></span> <?php echo Tt::t('admin', 'Slides/Promotion') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>"><span class="fa fa-info"></span> <?php echo Tt::t('admin', 'About Us') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/howto')); ?>"><span class="fa fa-info"></span> <?php echo Tt::t('admin', 'How To Order') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/gallery/index')); ?>"><span class="fa fa-image"></span> <?php echo Tt::t('admin', 'Event') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/home')); ?>"><span class="fa fa-building"></span> <?php echo Tt::t('admin', 'Home Page') ?></a></li>
        */ ?>
        <li class="dropdown"><a href="#"><span class="fa fa-heart"></span> <?php echo Tt::t('admin', 'Slide') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index')); ?>">View Slide</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/create')); ?>">Create Slide</a></li>
            </ul>
        </li>

        <li class="dropdown"><a href="#"><span class="fa fa-folder"></span> <?php echo Tt::t('admin', 'Store Location') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/address/index')); ?>">View Store List</a></li>
            </ul>
        </li>
        

        <li>&nbsp;</li>
        <li class="dropdown"><a href="#"><span class="fa fa-folder"></span> <?php echo Tt::t('admin', 'Static Page') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/home')); ?>">Homepage</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/about')); ?>">About</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/store')); ?>">Store</a></li>
                <li>
                    <a href="<?php echo CHtml::normalizeUrl(array('/admin/static/partner')); ?>">Partner</a>
                    <a href="<?php echo CHtml::normalizeUrl(array('/admin/static/howorder')); ?>">How To Order</a>
                </li>
            </ul>
        </li>

        <!-- <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>"><span class="fa fa-flag"></span> <?php echo Tt::t('admin', 'Blog') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>">List Blog</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/create')); ?>">Create Blog</a></li>
            </ul>
        </li> -->
        

        <!-- <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/promotion/index')); ?>"><span class="fa fa-heart"></span> <?php echo Tt::t('admin', 'Lokasi Toko') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/address')); ?>">Lokasi Toko Hero Image</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/address/index')); ?>">View Lokasi Toko</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/address/create')); ?>">Create Lokasi Toko</a></li>
            </ul>
        </li> -->

        <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/career')); ?>"><span class="fa fa-phone"></span> <?php echo Tt::t('admin', 'Career') ?></a></li> -->

        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/static/contact')); ?>"><span class="fa fa-phone"></span> <?php echo Tt::t('admin', 'Contact Us') ?></a></li>
        <?php /*
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>"><span class="fa fa-book"></span> <?php echo Tt::t('admin', 'Tips/Artikel') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/faq')); ?>"><span class="fa fa-quote-left"></span> <?php echo Tt::t('admin', 'FAQ') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/tos')); ?>"><span class="fa fa-wrench"></span> <?php echo Tt::t('admin', 'Syarat & Ketentuan') ?></a></li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/career/index')); ?>"><span class="fa fa-heart"></span> <?php echo Tt::t('admin', 'Career') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/productedit/index')); ?>">Page Product</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/career/index')); ?>">Page Career</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/banner/index')); ?>">View Banner</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/banner/create')); ?>">Add Banner</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/factory/index')); ?>"><span class="fa fa-bank"></span> <?php echo Tt::t('admin', 'Factory') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/gema/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'ge-ma') ?></a></li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>"><span class="fa fa-info"></span> <?php echo Tt::t('admin', 'About Us') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/index')); ?>">About Header</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/whoweare')); ?>">What is Realfood?</a></li>
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/ourteam')); ?>">Our Team</a></li> -->
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/visimisi')); ?>">Vision & Mision</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/about/workwithus')); ?>">Why bird's nest?</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/career/index')); ?>"><span class="fa fa-heart"></span> <?php echo Tt::t('admin', 'Career') ?></a></li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/index')); ?>"><span class="fa fa-folder-open"></span> <?php echo Tt::t('admin', 'Pages') ?></a>
            <ul>
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>3)); ?>">About US</a></li> -->
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>">Blog/Artikel</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>4)); ?>">Contact US</a></li>
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/customer/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Customers') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/pdf/index')); ?>"><span class="fa fa-fax"></span> <?php echo Tt::t('admin', 'PDF') ?></a></li>
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>"><span class="fa fa-tag"></span> <?php echo Tt::t('admin', 'News & Article') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>">View News & Article</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/create')); ?>">Add News & Article</a></li>
                <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/category/index')); ?>">View Category</a></li> -->
            </ul>
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/address/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Lokasi Penjualan') ?></a></li>
        */ ?>
        <!-- <li><a href="#"><span class="fa fa-bullhorn"></span> <?php echo Tt::t('admin', 'Promotions') ?></a></li> -->
        <!-- <li><a href="#"><span class="fa fa-file-text-o"></span> <?php echo Tt::t('admin', 'Reports') ?></a></li> -->
        <!-- class="dropdown" -->
        <li><a href="<?php echo CHtml::normalizeUrl(array('setting/index')); ?>"><span class="fa fa-cogs"></span> <?php echo Tt::t('admin', 'General Setting') ?></a>
             <!--  <ul>
                <li class="active"><a href="<?php echo CHtml::normalizeUrl(array('/admin/administrator/index')); ?>">Administrator Manager</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/language/index')); ?>">Language (Bahasa)</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/access_block/index')); ?>">Access Blok</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/contact/index')); ?>">Contact & Form Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/meta_page/index')); ?>">Default Meta Page</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/google_tools/index')); ?>">Google Tools</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/#/index')); ?>">Import/Export Product</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/purechat/index')); ?>">Integrasi PureChat</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/invoice_setting/index')); ?>">Invoice Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/logo_setting/index')); ?>">Logo Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mail_setting/index')); ?>">Mail Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mailchimp/index')); ?>">MailChimp</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/marketplace/index')); ?>">Market Place</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/mobile_text/index')); ?>">Mobile Text Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/payment/index')); ?>">Payment Setting</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/shipping/index')); ?>">Pengaturan Shipping</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/popOut/index')); ?>">Setting PopOut</a></li>
            </ul> -->
        </li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/home/logout')); ?>"><span class="fa fa fa-sign-out"></span> Logout</a></li>
    </ul>
</div><!--leftmenu-->
