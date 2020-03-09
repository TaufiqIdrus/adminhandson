<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?= $judul ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">

  <link href="<?= base_url() ?>css/main.87c0748b313a1dda75f5.css" rel="stylesheet">
  <script type="text/javascript" src="<?= base_url() ?>assets/scripts/main.87c0748b313a1dda75f5.js"> </script>
</head>

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow">
      <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="app-header__content">
        <div class="app-header-left">

        </div>
        <div class="app-header-right">
          <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="btn-group">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                      <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                      <div class="dropdown-menu-header">
                        <div class="dropdown-menu-header-inner bg-info">
                          <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');">
                          </div>
                          <div class="menu-header-content text-left">
                            <div class="widget-content p-0">
                              <div class="widget-content-wrapper">
                                <div class="widget-content-left mr-3">
                                </div>
                                <div class="widget-content-left">
                                  <div class="widget-heading"><?= $this->session->userdata("nama") ?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="scroll-area-xs" style="height: 150px;">
                        <div class="scrollbar-container ps">
                          <ul class="nav flex-column">
                            <li class="nav-item-header nav-item">My Account
                            </li>
                            <li class="nav-item">
                              <a href="javascript:void(0);" class="nav-link">Settings
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <ul class="nav flex-column">
                        <li class="nav-item-divider mb-0 nav-item"></li>
                      </ul>
                      <ul class="nav flex-column">
                        <li class="nav-item-divider nav-item">
                        </li>
                        <li class="nav-item-btn text-center nav-item">
                          <a href="<?= base_url() ?>login/logout" class="btn-wide btn btn-primary btn-sm">Logout</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="app-main">
      <div class="app-sidebar sidebar-shadow">
        <div class="scrollbar-sidebar">
          <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
              <li>
                <a href="<?= base_url() ?>dashboard">
                  <i class="metismenu-icon"></i>Dashboard
                </a>

              </li>
              <li>
                <a href="<?= base_url() ?>kursus">
                  <i class="metismenu-icon"></i>Kursus
                </a>
                <ul>
                  <li>
                    <a href="<?= base_url() ?>kursus">
                      <i class="metismenu-icon"></i>Manage Kursus
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>videokursus">
                      <i class="metismenu-icon"></i>Video Kursus
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>quiz">
                      <i class="metismenu-icon"></i>Quiz
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="<?= base_url() ?>user">
                  <i class="metismenu-icon"></i>User
                </a>
              </li>
              <li>
                <a href="<?= base_url() ?>dokter">
                  <i class="metismenu-icon"></i>Dokter
                </a>
              </li>
              <li>
                <a href="<?= base_url() ?>pembayaran">
                  <i class="metismenu-icon"></i>Pembayaran
                </a>
              </li>
              <li>
                <a href="<?= base_url() ?>log">
                  <i class="metismenu-icon"></i>Log Aktivitas
                </a>
              </li>
              <li>
                <a href="<?= base_url() ?>lainnya">
                  <i class="metismenu-icon"></i>Laporan
                </a>
                <ul>
                  <li>
                    <a href="<?= base_url() ?>kategori">
                      <i class="metismenu-icon"></i>User
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>bahasa">
                      <i class="metismenu-icon"></i>Kursus
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>bahasa">
                      <i class="metismenu-icon"></i>Keuangan
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>bahasa">
                      <i class="metismenu-icon"></i>Quiz
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="<?= base_url() ?>lainnya">
                  <i class="metismenu-icon"></i>Lainnya
                </a>
                <ul>
                  <li>
                    <a href="<?= base_url() ?>kategori">
                      <i class="metismenu-icon"></i>Kategori
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>bahasa">
                      <i class="metismenu-icon"></i>Bahasa
                    </a>
                  </li>
                </ul>
              </li>
              


            </ul>
          </div>
        </div>
      </div>