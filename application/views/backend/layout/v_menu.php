<?php $list_menu = $this->db->select('*')->from('qh_post_type')->where('public',1)->order_by('num','asc')->get()->result_array(); ?>
<?php 
$product_setup = array(
    'public' => 1,
    'father_id' => 0,
); 
?>
<?php $list_product_setup = $this->db->select('*')->from('qh_posts_product_setup')->where($product_setup)->order_by('num','asc')->get()->result_array(); ?>
<ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title">Menu</li>

    <li>
        <a href="backend/main/dashboard" class="waves-effect">
            <i class="uim uim-airplay"></i>
            <span>Thống kê</span>
        </a>
    </li>
    <li>
        <a href="backend/page/templates/list/1" class="waves-effect">
            <i class="uim uim-airplay"></i>
            <span>Trang</span>
        </a>
    </li>
    <?php foreach ($list_menu as $value): ?>
      <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="uim uim-comment-message"></i>
            <span><?= $value['name_type']; ?></span>
        </a>
        <ul class="sub-menu" aria-expanded="true">
            <li><a href="backend/service/posts/status/<?= $value['uri']; ?>/2">Danh sách <?= $value['name_type']; ?></a></li>
            <li><a href="backend/service/posts/add/<?= $value['uri']; ?>">Thêm <?= $value['name_type']; ?> mới</a></li>
            <li><a href="backend/service/category/main/<?= $value['uri']; ?>">Chuyên mục <?= $value['name_type']; ?></a></li>
            <?php if($value['id'] == 2){ ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">Thuộc tính sản phẩm</a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php foreach ($list_product_setup as $value_product_setup): ?>
                            <li><a href="backend/service/posts_setup/list/<?= $value_product_setup['id']; ?>"><?= $value_product_setup['product_setup_group']; ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
            <?php } ?>
            <li><a href="backend/service/tags/main/<?= $value['uri']; ?>">Tags <?= $value['name_type']; ?></a></li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">Giao diện <?= $value['name_type']; ?></a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="backend/service/templates/list/<?= $value['uri']; ?>/1">Giao diện chuyên mục</a></li>
                    <li><a href="backend/service/templates/list/<?= $value['uri']; ?>/2">Giao diện bài viết</a></li>
                    <li><a href="backend/service/templates/list/<?= $value['uri']; ?>/3">Giao diện Tags</a></li>
                </ul>
            </li>
        </ul>
    </li>  
<?php endforeach ?>
<li>
    <a href="backend/setup/feedback" class="waves-effect">
        <i class="uim uim-airplay"></i>
        <span>Đánh giá khách hàng</span>
    </a>
</li>
<li>
    <a href="backend/setup/contact" class="waves-effect">
        <i class="uim uim-airplay"></i>
        <span class="badge rounded-pill bg-success float-end"><?= $this->Model_main->get_unread_info('qh_contact'); ?></span>
        <span>Liên hệ</span>
    </a>
</li>
<li>
    <a href="backend/setup/comment" class="waves-effect">
        <i class="uim uim-airplay"></i>
        <span class="badge rounded-pill bg-success float-end"><?= $this->Model_main->get_unread_info('qh_comment'); ?></span>
        <span>Bình luận</span>
    </a>
</li>
<li class="menu-title">Cài đặt Website</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uim uim-comment-message"></i>
        <span>Chỉnh sửa Website</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a href="backend/setup/menu">Menu</a></li>
        <li><a href="">Banner</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uim uim-comment-message"></i>
        <span>Cài đặt</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li>
            <a href="javascript: void(0);" class="has-arrow">Cài đặt Website</a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="">Tổng quan Website</a></li>
                <li><a href="backend/setup/general/language">Ngôn ngữ Website</a></li>
                <li><a href="">Mạng xã hội</a></li>
                <li><a href="">Ngôn ngữ chung</a></li>
                <li><a href="">Ngôn ngữ code</a></li>
            </ul>
        </li>
        <li><a href="">Cài đặt người dùng</a></li>
        <li><a href="">Chỉnh sửa File</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uim uim-comment-message"></i>
        <span>Tool chức năng</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a href="backend/setup/get_image">Get Image</a></li>
    </ul>
</li>
</ul>