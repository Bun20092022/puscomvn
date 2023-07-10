<div class="theme_slider_1">
    <div class="slider_inner_content">
        <div class="slider_text">
            <div class="swiper-container slider_posts">
                <div class="swiper-wrapper">
                    <?php $listbanner = $this->Model_frontent->show_banner_by(2);?>
                    <?php foreach ($listbanner as $value): ?>
                        <div class="swiper-slide">
                            <article class="blog_post">
                                <div class="post_img">
                                    <div class="calendar">
                                        <a href="#"><span class="date">30</span><br>May</a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <?= $value['info'] ?>
                                    <div class="post_footer">
                                        <div class="read_more">
                                            <a href="<?= $value['link'] ?>"><?= $value['button_name'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="slider_images">
            <div class="swiper-container slider_posts">
                <div class="swiper-wrapper">
                    <?php $listbanner = $this->Model_frontent->show_banner_by(2);?>
                    <?php foreach ($listbanner as $value): ?>
                        <div class="swiper-slide">
                            <div class="slide_img" data-swiper="overlay-left">
                                <img src="<?= $value['imgslider'] ?>" alt="img">
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                
            </div>
        </div>
    </div>
</div>

