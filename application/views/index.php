<!DOCTYPE html>
<html>
    <head>
        <?php include 'header.php' ?>
    </head>
    <body class="dashboard-page sb-l-o sb-r-c">
        <!-- Start: Main -->
        <div id="main">           
            <!-- Start: Header -->
            <header class="navbar navbar-fixed-top bg-light">
                <div class="navbar-branding">
                    <a class="navbar-brand" href="dashboard.html">
                        <b>Assignment</b>
                    </a>
                </div>
            </header>
            <section id="content_wrapper" style="margin-left:0px !important;">               
                <!-- Begin: Content -->
                <section id="content" class="" style="margin-top: 50px;">
                    <!-- Content Header -->
                    <!-- Form Wizard -------------------------------------------------------------------------------->
                    <?php if (isset($page_name) && !(empty($page_name))): ?>
                        <?php include $page_name . '.php'; ?>
                    <?php endif; ?> 
                    <!-- end: .admin-form -->
                </section>
                <!-- End: Content -->
            </section>
        </div>
        <!-- End: Main -->        
    </body>
</html>


