<?php get_header() ?>
<!-- BEGIN CONTENT -->
<main class="content">
  <div class="mainSection catalog">
    <div class="catalog-item__number">
      <span class="current"></span>
      /
      <span class="total"></span>
      <span class="progress">
					<span class="bar"></span>
				</span>
    </div>
    <div class="catalog-categories">
      <ul>
        <li category="gadget">
          <i class="icon icon-gadget"></i>
        </li>
        <li category="mipow">
          <i class="icon icon-mipow"></i>
        </li>
        <li category="lamp">
          <i class="icon icon-lamp"></i>
        </li>
        <li category="headphones">
          <i class="icon icon-headphones"></i>
        </li>
        <li category="itag">
          <i class="icon icon-itag"></i>
        </li>
        <li category="charge">
          <i class="icon icon-charge"></i>
        </li>
        <li category="usb">
          <i class="icon icon-usb"></i>
        </li>
        <li category="phone">
          <i class="icon icon-phone"></i>
        </li>
        <li category="price" class="price">
          <span id="amount"></span>
          <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
        </li>
        <li category="map">
          <i class="icon icon-map"></i>
        </li>
      </ul>
    </div>
    <div class="catalog-item__sale">
      <h3>iTag</h3>
      <span class="text">В подарок.<br>
				Осталось <strong class="amount">34</strong>.</span>
    </div>
    <div class="catalog-slider js-catalog-slider">
      <?php
      /** @var WP_Post[] $posts */

      foreach ($wp_query->posts as $post) {
        ?>
        <div class="catalog-item" sale="true" price="1200" category="phone">
          <div class="wrapper-xs">
            <div class="catalog-item__preview">
              <div class="tab-container">
                <div class="tab-content">
                  <div class="tab-item">
                    <div class="img-wrapper">
                      <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                    </div>
                  </div>
                  <div class="tab-item">
                    <div class="img-wrapper">
                      <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                    </div>
                  </div>
                  <div class="tab-item">
                    <div class="img-wrapper">
                      <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                    </div>
                  </div>
                  <div class="tab-item">
                    <div class="img-wrapper">
                      <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                    </div>
                  </div>
                  <div class="tab-item">
                    <div class="img-wrapper">
                      <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                    </div>
                  </div>
                  <div class="tab-item">
                    <div class="img-wrapper">
                      <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                    </div>
                  </div>
                </div>
                <div class="tabs">
                  <div class="tab">
                    <span class="color" style="background-color: #fff;"></span>
                  </div>
                  <div class="tab">
                    <span class="color" style="background-color: #448aff;"></span>
                  </div>
                  <div class="tab">
                    <span class="color" style="background-color: #ffeb3b;"></span>
                  </div>
                  <div class="tab">
                    <span class="color" style="background-color: #e91e63;"></span>
                  </div>
                  <div class="tab">
                    <span class="color" style="background-color: #448aff;"></span>
                  </div>
                  <div class="tab">
                    <span class="color" style="background-color: #e91e63;"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="catalog-item__text">
              <div class="head">
                <a href="#" class="title">
                  <h1><?php echo $post->post_title?></h1>
                </a>
                <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
                <div class="price">
                  <span>1200</span>
                  <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
                </div>
              </div>
              <div class="text-box">
                <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
              </div>
              <button class="text-box-expand">Больше</button>
              <button class="main-button add-to-cart">
                <span>В корзину</span>
                <i class="icon icon-add"></i>
              </button>
            </div>
          </div>
          <a href="#" class="more-link">подробнее</a>
        </div>
        <?php
      }
      ?>

      <div class="catalog-item" sale="false" price="1600" category="itag">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1600</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="true" price="1200" category="map">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="false" price="1200" category="lamp">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="true" price="1200" category="usb">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="false" price="1200" category="charge">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="true" price="1200" category="mipow">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="false" price="1200" category="headphones">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="true" price="1200" category="gadget">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
      <div class="catalog-item" sale="false" price="1200" category="lamp">
        <div class="wrapper-xs">
          <div class="catalog-item__preview">
            <div class="tab-container">
              <div class="tab-content">
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
                <div class="tab-item">
                  <div class="img-wrapper">
                    <img src='<?php echo get_template_directory_uri() . '/' . "img/img-product.png" ?>' alt="">
                  </div>
                </div>
              </div>
              <div class="tabs">
                <div class="tab">
                  <span class="color" style="background-color: #fff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #ffeb3b;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #448aff;"></span>
                </div>
                <div class="tab">
                  <span class="color" style="background-color: #e91e63;"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="catalog-item__text">
            <div class="head">
              <a href="#" class="title">
                <h1>Рюкзак Bobby</h1>
              </a>
              <h4 class="sub-title">Лучший рюкзак с защитой от карманников</h4>
              <div class="price">
                <span>1200</span>
                <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
              </div>
            </div>
            <div class="text-box">
              <p>Рюкзак Bobby - это стильный рюкзак-крепость для своего владельца, которому не страшны никакие хулиганы и карманники. Такую неуязвимость аксессуару обеспечивают специальные скрытые молнии на внутренней стороне рюкзака и непрорезаемый влагоустойчивый материал на его передней части.Помимо скрытых карманов рюкзак имеет множество внутренних отделений для самых различных предметов - одежды, книг, электронных устройств,ноутбук, плалшет и других электронных гаджетов, кредитных карт и еще множества разных мелочей</p>
            </div>
            <button class="main-button add-to-cart">
              <span>В корзину</span>
              <i class="icon icon-add"></i>
            </button>
          </div>
        </div>
        <a href="#" class="more-link">подробнее</a>
      </div>
    </div>
    <a href="#" class="more-link js-more-link">подробнее</a>
  </div>
</main>

<!-- CONTENT EOF   -->
<!-- BEGIN FOOTER -->

<?php get_footer() ?>