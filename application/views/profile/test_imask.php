<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Acorn Admin Template | Form Input Masks</title>
    <meta name="description" content="A javascript input mask library that helps the user with the input by ensuring a predefined format." />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=base_url()?>assets/img/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?=base_url()?>assets/img/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="<?=base_url()?>assets/img/favicon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="<?=base_url()?>assets/img/favicon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="<?=base_url()?>assets/img/favicon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="<?=base_url()?>assets/img/favicon/mstile-310x310.png" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url()?>assets/font/CS-Interface/style.css" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/vendor/OverlayScrollbars.min.css" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.css" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css" />
    <script src="<?=base_url()?>assets/js/base/loader.js"></script>
  </head>

  <body>
    <div id="root">
      <div id="nav" class="nav-container d-flex">
        <div class="nav-content d-flex">
          <!-- Logo Start -->
          <div class="logo position-relative">
            <a href="Dashboards.Default.html">
              <!-- Logo can be added directly -->
              <!-- <img src="<?=base_url()?>assets/img/logo/logo-white.svg" alt="logo" /> -->

              <!-- Or added via css to provide different ones for different color themes -->
              <div class="img"></div>
            </a>
          </div>
          <!-- Logo End -->

          <!-- Language Switch Start -->
          <div class="language-switch-container">
            <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">DE</a>
              <a href="#" class="dropdown-item active">EN</a>
              <a href="#" class="dropdown-item">ES</a>
            </div>
          </div>
          <!-- Language Switch End -->

          <!-- User Menu Start -->
          <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="profile" alt="profile" src="<?=base_url()?>assets/img/profile/profile-9.webp" />
              <div class="name">Lisa Jackson</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
              <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                  <div class="text-extra-small text-primary">ACCOUNT</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">User Info</a>
                    </li>
                    <li>
                      <a href="#">Preferences</a>
                    </li>
                    <li>
                      <a href="#">Calendar</a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Security</a>
                    </li>
                    <li>
                      <a href="#">Billing</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                  <div class="text-extra-small text-primary">APPLICATION</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Themes</a>
                    </li>
                    <li>
                      <a href="#">Language</a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Devices</a>
                    </li>
                    <li>
                      <a href="#">Storage</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                  <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">
                        <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Help</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Docs</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">
                        <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Logout</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- User Menu End -->

          <!-- Icons Menu Start -->
          <ul class="list-unstyled list-inline text-center menu-icons">
            <li class="list-inline-item">
              <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                  <i data-acorn-icon="bell" data-acorn-size="18"></i>
                  <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                  <ul class="list-unstyled border-last-none">
                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="<?=base_url()?>assets/img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">Joisse Kaycee just sent a new comment!</a>
                      </div>
                    </li>
                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="<?=base_url()?>assets/img/profile/profile-2.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">New order received! It is total $147,20.</a>
                      </div>
                    </li>
                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="<?=base_url()?>assets/img/profile/profile-3.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">3 items just added to wish list by a user!</a>
                      </div>
                    </li>
                    <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="<?=base_url()?>assets/img/profile/profile-6.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">Kirby Peters just sent a new message!</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
          <!-- Icons Menu End -->

          <!-- Menu Start -->
          <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
              <li>
                <a href="#dashboards" data-href="Dashboards.html">
                  <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                  <span class="label">Dashboards</span>
                </a>
                <ul id="dashboards">
                  <li>
                    <a href="Dashboards.Default.html">
                      <span class="label">Default</span>
                    </a>
                  </li>
                  <li>
                    <a href="Dashboards.Visual.html">
                      <span class="label">Visual</span>
                    </a>
                  </li>
                  <li>
                    <a href="Dashboards.Analytic.html">
                      <span class="label">Analytic</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#apps" data-href="Apps.html">
                  <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                  <span class="label">Apps</span>
                </a>
                <ul id="apps">
                  <li>
                    <a href="Apps.Calendar.html">
                      <span class="label">Calendar</span>
                    </a>
                  </li>
                  <li>
                    <a href="Apps.Chat.html">
                      <span class="label">Chat</span>
                    </a>
                  </li>
                  <li>
                    <a href="Apps.Contacts.html">
                      <span class="label">Contacts</span>
                    </a>
                  </li>
                  <li>
                    <a href="Apps.Mailbox.html">
                      <span class="label">Mailbox</span>
                    </a>
                  </li>
                  <li>
                    <a href="Apps.Tasks.html">
                      <span class="label">Tasks</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#pages" data-href="Pages.html">
                  <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                  <span class="label">Pages</span>
                </a>
                <ul id="pages">
                  <li>
                    <a href="#authentication" data-href="Pages.Authentication.html">
                      <span class="label">Authentication</span>
                    </a>
                    <ul id="authentication">
                      <li>
                        <a href="Pages.Authentication.Login.html">
                          <span class="label">Login</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Authentication.Register.html">
                          <span class="label">Register</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Authentication.ForgotPassword.html">
                          <span class="label">Forgot Password</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Authentication.ResetPassword.html">
                          <span class="label">Reset Password</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#blog" data-href="Pages.Blog.html">
                      <span class="label">Blog</span>
                    </a>
                    <ul id="blog">
                      <li>
                        <a href="Pages.Blog.Home.html">
                          <span class="label">Home</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Blog.Grid.html">
                          <span class="label">Grid</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Blog.List.html">
                          <span class="label">List</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Blog.Detail.html">
                          <span class="label">Detail</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#miscellaneous" data-href="Pages.Miscellaneous.html">
                      <span class="label">Miscellaneous</span>
                    </a>
                    <ul id="miscellaneous">
                      <li>
                        <a href="Pages.Miscellaneous.Faq.html">
                          <span class="label">Faq</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Miscellaneous.KnowledgeBase.html">
                          <span class="label">Knowledge Base</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Miscellaneous.Error.html">
                          <span class="label">Error</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Miscellaneous.ComingSoon.html">
                          <span class="label">Coming Soon</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Miscellaneous.Pricing.html">
                          <span class="label">Pricing</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Miscellaneous.Search.html">
                          <span class="label">Search</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Miscellaneous.Mailing.html">
                          <span class="label">Mailing</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Miscellaneous.Empty.html">
                          <span class="label">Empty</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#portfolio" data-href="Pages.Portfolio.html">
                      <span class="label">Portfolio</span>
                    </a>
                    <ul id="portfolio">
                      <li>
                        <a href="Pages.Portfolio.Home.html">
                          <span class="label">Home</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Portfolio.Detail.html">
                          <span class="label">Detail</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#profile" data-href="Pages.Profile.html">
                      <span class="label">Profile</span>
                    </a>
                    <ul id="profile">
                      <li>
                        <a href="Pages.Profile.Standard.html">
                          <span class="label">Standard</span>
                        </a>
                      </li>
                      <li>
                        <a href="Pages.Profile.Settings.html">
                          <span class="label">Settings</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#blocks" data-href="Blocks.html">
                  <i data-acorn-icon="grid-5" class="icon" data-acorn-size="18"></i>
                  <span class="label">Blocks</span>
                </a>
                <ul id="blocks">
                  <li>
                    <a href="Blocks.Cta.html">
                      <span class="label">Cta</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.Details.html">
                      <span class="label">Details</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.Gallery.html">
                      <span class="label">Gallery</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.Images.html">
                      <span class="label">Images</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.List.html">
                      <span class="label">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.Stats.html">
                      <span class="label">Stats</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.Steps.html">
                      <span class="label">Steps</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.TabularData.html">
                      <span class="label">Tabular Data</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.Thumbnails.html">
                      <span class="label">Thumbnails</span>
                    </a>
                  </li>
                  <li>
                    <a href="Blocks.Users.html">
                      <span class="label">Users</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="mega">
                <a href="#interface" data-href="Interface.html">
                  <i data-acorn-icon="pocket-knife" class="icon" data-acorn-size="18"></i>
                  <span class="label">Interface</span>
                </a>
                <ul id="interface">
                  <li>
                    <a href="#interfaceComponents" data-href="Interface.Components.html">
                      <span class="label">Components</span>
                    </a>
                    <ul id="interfaceComponents">
                      <li>
                        <a href="Interface.Components.Accordion.html">
                          <span class="label">Accordion</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Alerts.html">
                          <span class="label">Alerts</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Badge.html">
                          <span class="label">Badge</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Breadcrumb.html">
                          <span class="label">Breadcrumb</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Buttons.html">
                          <span class="label">Buttons</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.ButtonGroup.html">
                          <span class="label">Button Group</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Card.html">
                          <span class="label">Card</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Close.html">
                          <span class="label">Close Button</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Collapse.html">
                          <span class="label">Collapse</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Dropdowns.html">
                          <span class="label">Dropdowns</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.ListGroup.html">
                          <span class="label">List Group</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Modal.html">
                          <span class="label">Modal</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Navs.html">
                          <span class="label">Navs</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Offcanvas.html">
                          <span class="label">Offcanvas</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Pagination.html">
                          <span class="label">Pagination</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Popovers.html">
                          <span class="label">Popovers</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Progress.html">
                          <span class="label">Progress</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Spinners.html">
                          <span class="label">Spinners</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Toasts.html">
                          <span class="label">Toasts</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Components.Tooltips.html">
                          <span class="label">Tooltips</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#interfaceForms" data-href="Interface.Forms.html">
                      <span class="label">Forms</span>
                    </a>
                    <ul id="interfaceForms">
                      <li>
                        <a href="Interface.Forms.Layouts.html">
                          <span class="label">Layouts</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Forms.Validation.html">
                          <span class="label">Validation</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Forms.Wizard.html">
                          <span class="label">Wizard</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Forms.InputGroup.html">
                          <span class="label">Input Group</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Forms.InputMask.html">
                          <span class="label">Input Mask</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Forms.GenericForms.html">
                          <span class="label">Generic Forms</span>
                        </a>
                      </li>
                      <li>
                        <a href="#formControls" data-href="Interface.Forms.Controls.html">
                          <span class="label">Controls</span>
                        </a>
                        <ul id="formControls">
                          <li>
                            <a href="Interface.Forms.Controls.Autocomplete.html">
                              <span class="label">Autocomplete</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.CheckboxRadio.html">
                              <span class="label">Checkbox-Radio</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.DatePicker.html">
                              <span class="label">Date Picker</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.Dropzone.html">
                              <span class="label">Dropzone</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.Editor.html">
                              <span class="label">Editor</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.InputSpinner.html">
                              <span class="label">Input Spinner</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.Rating.html">
                              <span class="label">Rating</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.Select2.html">
                              <span class="label">Select2</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.Slider.html">
                              <span class="label">Slider</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.Tags.html">
                              <span class="label">Tags</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Forms.Controls.TimePicker.html">
                              <span class="label">Time Picker</span>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#interfacePlugins" data-href="Interface.Plugins.html">
                      <span class="label">Plugins</span>
                    </a>
                    <ul id="interfacePlugins">
                      <li>
                        <a href="Interface.Plugins.Carousel.html">
                          <span class="label">Carousel</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Charts.html">
                          <span class="label">Charts</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Clamp.html">
                          <span class="label">Clamp</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.ContextMenu.html">
                          <span class="label">Context Menu</span>
                        </a>
                      </li>
                      <li>
                        <a href="#pluginsDatatables" data-href="Interface.Plugins.Datatables.html">
                          <span class="label">Datatables</span>
                        </a>
                        <ul id="pluginsDatatables">
                          <li>
                            <a href="Interface.Plugins.Datatables.EditableRows.html">
                              <span class="label">Editable Rows</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Plugins.Datatables.EditableBoxed.html">
                              <span class="label">Editable Boxed</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Plugins.Datatables.RowsAjax.html">
                              <span class="label">Ajax Data</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Plugins.Datatables.RowsServerSide.html">
                              <span class="label">Server Side</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Plugins.Datatables.BoxedVariations.html">
                              <span class="label">Boxed Variations</span>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Lightbox.html">
                          <span class="label">Lightbox</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.List.html">
                          <span class="label">List</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Maps.html">
                          <span class="label">Maps</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Notify.html">
                          <span class="label">Notify</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Player.html">
                          <span class="label">Players</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Progress.html">
                          <span class="label">Progress</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Scrollbar.html">
                          <span class="label">Scrollbar</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Shortcuts.html">
                          <span class="label">Shortcuts</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Plugins.Sortable.html">
                          <span class="label">Sortable</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#interfaceContent" data-href="Interface.Content.html">
                      <span class="label">Content</span>
                    </a>
                    <ul id="interfaceContent">
                      <li>
                        <a href="#icons" data-href="Interface.Content.Icons.html">
                          <span class="label">Icons</span>
                        </a>
                        <ul id="icons">
                          <li>
                            <a href="Interface.Content.Icons.Acorn.Interface.html">
                              <span class="label">Acorn Interface</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Icons.Acorn.Commerce.html">
                              <span class="label">Acorn Commerce</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Icons.Acorn.Learning.html">
                              <span class="label">Acorn Learning</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Icons.Acorn.Medical.html">
                              <span class="label">Acorn Medical</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Icons.BootstrapIcons.html">
                              <span class="label">Bootstrap Icons</span>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="Interface.Content.Images.html">
                          <span class="label">Images</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Content.Tables.html">
                          <span class="label">Tables</span>
                        </a>
                      </li>
                      <li>
                        <a href="Interface.Content.Typography.html">
                          <span class="label">Typography</span>
                        </a>
                      </li>
                      <li>
                        <a href="#menuVarieties" data-href="Interface.Content.Menu.html">
                          <span class="label">Menu</span>
                        </a>
                        <ul id="menuVarieties">
                          <li>
                            <a href="Interface.Content.Menu.HorizontalStandard.html">
                              <span class="label">Horizontal</span>
                            </a>
                          </li>
                          <li></li>
                          <li>
                            <a href="Interface.Content.Menu.VerticalStandard.html">
                              <span class="label">Vertical</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Menu.VerticalSemiHidden.html">
                              <span class="label">Vertical Hidden</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Menu.VerticalNoSemiHidden.html">
                              <span class="label">Vertical No Hidden</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Menu.MobileOnly.html">
                              <span class="label">Mobile Only</span>
                            </a>
                          </li>
                          <li>
                            <a href="Interface.Content.Menu.Sidebar.html">
                              <span class="label">Sidebar</span>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- Menu End -->

          <!-- Mobile Buttons Start -->
          <div class="mobile-buttons-container">
            <!-- Scrollspy Mobile Button Start -->
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
              <i data-acorn-icon="menu-dropdown"></i>
            </a>
            <!-- Scrollspy Mobile Button End -->

            <!-- Scrollspy Mobile Dropdown Start -->
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            <!-- Scrollspy Mobile Dropdown End -->

            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
              <i data-acorn-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
          </div>
          <!-- Mobile Buttons End -->
        </div>
        <div class="nav-shadow"></div>
      </div>

      <main>
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title Start -->
              <section class="scroll-section" id="title">
                <div class="page-title-container">
                  <h1 class="mb-0 pb-0 display-4">Input Masks</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
                      <li class="breadcrumb-item"><a href="Interface.html">Interface</a></li>
                      <li class="breadcrumb-item"><a href="Interface.Forms.html">Forms</a></li>
                    </ul>
                  </nav>
                </div>
              </section>
              <!-- Title End -->

              <!-- Content Start -->
              <div>
                <div class="card mb-5">
                  <div class="card-body">
                    <p class="mb-0">A javascript input mask library that helps the user with the input by ensuring a predefined format.</p>
                  </div>
                </div>

                <!-- Date Start -->
                <section class="scroll-section" id="date">
                  <h2 class="small-title">Date</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label">Date</label>
                          <input type="text" class="form-control" id="dateMask" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Initial Value</label>
                          <input type="text" class="form-control" value="02.02.2000" id="dateInitialMask" />
                        </div>
                        <div>
                          <label class="form-label">Date Chars</label>
                          <input type="text" class="form-control" id="dateCharMask" />
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Date End -->

                <!-- Hour Start -->
                <section class="scroll-section" id="hour">
                  <h2 class="small-title">Hour</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label">Hour</label>
                          <input type="text" class="form-control" id="hourMask" />
                        </div>
                        <div>
                          <label class="form-label">Hour 12(AM-PM)</label>
                          <input type="text" class="form-control" id="hourMaskAMPM" />
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Hour End -->

                <!-- Phone Start -->
                <section class="scroll-section" id="phone">
                  <h2 class="small-title">Phone</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label">International</label>
                          <input type="text" class="form-control" id="hourInternationalMask" />
                        </div>
                        <div>
                          <label class="form-label">Domestic</label>
                          <input type="text" class="form-control" id="hourDomesticMask" />
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Phone End -->

                <!-- Number Start -->
                <section class="scroll-section" id="number">
                  <h2 class="small-title">Number</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label">Number</label>
                          <input type="text" class="form-control" id="maskNumber" />
                          <div class="form-text">Only number</div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Large Number</label>
                          <input type="text" class="form-control" id="maskNumberLarge" />
                          <div class="form-text">Between -10000-10000</div>
                        </div>
                        <div>
                          <label class="form-label">Small Number</label>
                          <input type="text" class="form-control" id="maskNumberSmall" />
                          <div class="form-text">Between 0-9</div>
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Number End -->

                <!-- Mask in Mask Start -->
                <section class="scroll-section" id="maskInMask">
                  <h2 class="small-title">Mask in Mask</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div>
                          <label class="form-label">Currency</label>
                          <input type="text" class="form-control" id="maskCurrency" />
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Mask in Mask End -->

                <!-- Credit Card Start -->
                <section class="scroll-section" id="creditCard">
                  <h2 class="small-title">Credit Card</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div>
                          <label class="form-label">Card Number</label>
                          <input type="text" class="form-control" id="maskCreditCard" />
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Credit Card End -->

                <!-- Complex Values Start -->
                <section class="scroll-section" id="complexValues">
                  <h2 class="small-title">Complex Values</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div>
                          <label class="form-label">Fill in the Blanks</label>
                          <input type="text" class="form-control" id="maskComplex" />
                          <small class="form-text text-muted">Values are year(YY), month(MM), and one of the three of 'TV', 'HD' or 'VR'</small>
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Complex Values End -->

                <!-- Function Start -->
                <section class="scroll-section" id="function">
                  <h2 class="small-title">Function</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div>
                          <label class="form-label">Grow</label>
                          <input type="text" class="form-control" id="maskFunction" />
                          <small class="form-text text-muted">Accepts growing values from 0 to 9.</small>
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Function End -->

                <!-- Prepare Start -->
                <section class="scroll-section" id="prepare">
                  <h2 class="small-title">Prepare</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form>
                        <div>
                          <label class="form-label">Uppercase</label>
                          <input type="text" class="form-control" id="maskUppercase" />
                          <small class="form-text text-muted">Convert to text-uppercase.</small>
                        </div>
                      </form>
                    </div>
                  </div>
                </section>
                <!-- Prepare End -->

                <!-- Get the Value Start -->
                <section class="scroll-section" id="getTheValue">
                  <h2 class="small-title">Get the Value</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <input type="text" class="form-control mb-1" id="maskGetValue" />
                      <div class="mb-1">
                        <button class="btn btn-outline-primary" id="logButton" type="button">Log Value</button>
                      </div>
                      <div>
                        <button class="btn btn-outline-primary" id="logUnmaskedButton" type="button">Log Unmasked Value</button>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Get the Value End -->

                <!-- Top Label Start -->
                <section class="scroll-section" id="topLabel">
                  <h2 class="small-title">Top Label</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <label class="top-label mb-0 w-100">
                        <input type="text" class="form-control" id="maskTopLabel" />
                        <span>DATE</span>
                      </label>
                    </div>
                  </div>
                </section>
                <!-- Top Label End -->

                <!-- Filled Start -->
                <section class="scroll-section" id="filled">
                  <h2 class="small-title">Filled</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="filled mb-0 w-100">
                        <i data-acorn-icon="calendar"></i>
                        <input type="text" class="form-control" id="maskFilled" />
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Filled End -->

                <!-- Top Label Start -->
                <section class="scroll-section" id="floatingLabel">
                  <h2 class="small-title">Floating Label</h2>
                  <div class="card">
                    <div class="card-body">
                      <div class="form-floating mb-0 w-100">
                        <input type="text" class="form-control" id="maskFloatingLabel" />
                        <label>Date</label>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- Top Label End -->
              </div>
              <!-- Content End -->
            </div>

            <!-- Scrollspy Start -->
            <div class="col-md-auto d-none d-lg-block" id="scrollSpyMenu">
              <ul class="nav flex-column">
                <li>
                  <a class="nav-link" href="#title">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Title</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#date">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Date</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#hour">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Hour</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#phone">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Phone</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#number">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Number</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#maskInMask">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Mask in Mask</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#creditCard">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Credit Card</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#complexValues">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Complex Values</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#function">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Function</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#prepare">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Prepare</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#getTheValue">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Get the Value</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#topLabel">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Top Label</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#filled">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Filled</span>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#floatingLabel">
                    <i data-acorn-icon="chevron-right"></i>
                    <span>Floating Label</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- Scrollspy End -->
          </div>
        </div>
      </main>
      <!-- Layout Footer Start -->
      <footer>
        <div class="footer-content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-sm-6">
                <p class="mb-0 text-muted text-medium">Colored Strategies 2021</p>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Review</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Purchase</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://acorn-html-docs.coloredstrategies.com/" target="_blank" class="btn-link">Docs</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Layout Footer End -->
    </div>

    <!-- Theme Settings Modal Start -->
    <div
      class="modal fade modal-right scroll-out-negative"
      id="settings"
      data-bs-backdrop="true"
      tabindex="-1"
      role="dialog"
      aria-labelledby="settings"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-scrollable full" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Theme Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="scroll-track-visible">
              <div class="mb-5" id="color">
                <label class="mb-3 d-inline-block form-label">Color</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="blue-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT BLUE</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="blue-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK BLUE</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-teal" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="teal-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT TEAL</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-teal" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="teal-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK TEAL</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-sky" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="sky-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT SKY</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-sky" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="sky-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK SKY</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-red" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="red-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT RED</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-red" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="red-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK RED</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-green" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="green-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT GREEN</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="green-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK GREEN</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-lime" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="lime-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT LIME</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-lime" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="lime-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK LIME</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-pink" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="pink-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT PINK</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-pink" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="pink-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK PINK</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-purple" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="purple-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT PURPLE</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-purple" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="purple-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK PURPLE</span>
                    </div>
                  </a>
                </div>
              </div>
              <div class="mb-5" id="navcolor">
                <label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="default" data-parent="navcolor">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DEFAULT</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="light" data-parent="navcolor">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-secondary figure-light top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="dark" data-parent="navcolor">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-muted figure-dark top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="placement">
                <label class="mb-3 d-inline-block form-label">Menu Placement</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="horizontal" data-parent="placement">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">HORIZONTAL</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="vertical" data-parent="placement">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary left"></div>
                      <div class="figure figure-secondary right"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">VERTICAL</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="behaviour">
                <label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="pinned" data-parent="behaviour">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary left large"></div>
                      <div class="figure figure-secondary right small"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">PINNED</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned" data-parent="behaviour">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary left"></div>
                      <div class="figure figure-secondary right"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">UNPINNED</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="layout">
                <label class="mb-3 d-inline-block form-label">Layout</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="fluid" data-parent="layout">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">FLUID</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="boxed" data-parent="layout">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom small"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">BOXED</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="radius">
                <label class="mb-3 d-inline-block form-label">Radius</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="rounded" data-parent="radius">
                    <div class="card rounded-md radius-rounded p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">ROUNDED</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="standard" data-parent="radius">
                    <div class="card rounded-md radius-regular p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">STANDARD</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="flat" data-parent="radius">
                    <div class="card rounded-md radius-flat p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">FLAT</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Theme Settings Modal End -->

    <!-- Niches Modal Start -->
    <div
      class="modal fade modal-right scroll-out-negative"
      id="niches"
      data-bs-backdrop="true"
      tabindex="-1"
      role="dialog"
      aria-labelledby="niches"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-scrollable full" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Niches</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="scroll-track-visible">
              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Classic Dashboard</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/classic-dashboard.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-classic-dashboard.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-classic-dashboard.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-classic-dashboard.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Medical Assistant</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/medical-assistant.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-medical-assistant.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-medical-assistant.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-medical-assistant.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Service Provider</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/service-provider.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-service-provider.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-service-provider.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-service-provider.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Elearning Portal</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/elearning-portal.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-elearning-portal.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-elearning-portal.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-elearning-portal.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Ecommerce Platform</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/ecommerce-platform.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-ecommerce-platform.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-ecommerce-platform.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-ecommerce-platform.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Starter Project</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/starter-project.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-starter-project.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-starter-project.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-starter-project.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Niches Modal End -->

    <!-- Theme Settings & Niches Buttons Start -->
    <div class="settings-buttons-container">
      <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
          <i data-acorn-icon="paint-roller" class="position-relative"></i>
        </span>
      </button>
      <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#niches" id="nichesButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Niches">
          <i data-acorn-icon="toy" class="position-relative"></i>
        </span>
      </button>
    </div>
    <!-- Theme Settings & Niches Buttons End -->

    <!-- Search Modal Start -->
    <div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header border-0 p-0">
            <button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ps-5 pe-5 pb-0 border-0">
            <input id="searchPagesInput" class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text" autocomplete="off" />
          </div>
          <div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Navigate</span>
            </span>
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom-left" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Select</span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Modal End -->

    <!-- Vendor Scripts Start -->
    <script src="<?=base_url()?>assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/js/vendor/OverlayScrollbars.min.js"></script>
    <script src="<?=base_url()?>assets/js/vendor/autoComplete.min.js"></script>
    <script src="<?=base_url()?>assets/js/vendor/clamp.min.js"></script>

    <script src="<?=base_url()?>assets/icon/acorn-icons.js"></script>
    <script src="<?=base_url()?>assets/icon/acorn-icons-interface.js"></script>

    <script src="<?=base_url()?>assets/js/cs/scrollspy.js"></script>

    <script src="<?=base_url()?>assets/js/vendor/imask.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="<?=base_url()?>assets/js/base/helpers.js"></script>
    <script src="<?=base_url()?>assets/js/base/globals.js"></script>
    <script src="<?=base_url()?>assets/js/base/nav.js"></script>
    <!-- <script src="<?=base_url()?>assets/js/base/search.js"></script> -->
    <script src="<?=base_url()?>assets/js/base/settings.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="<?=base_url()?>assets/js/forms/inputmask.js"></script>

    <script src="<?=base_url()?>assets/js/common.js"></script>
    <script src="<?=base_url()?>assets/js/scripts.js"></script>
    <!-- Page Specific Scripts End -->
  </body>
</html>
