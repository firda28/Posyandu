<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg sidebar-light">
    <header class="sidebar-header bg-light">
        <span class="logo">
            <a href="index.html"><img src="<?php echo base_url(); ?>assets/img/logo-pos.jpg" alt="logo" style="height:80px, weight:70px;"></a>
        </span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">
            <li class="menu-category">Utama</li>

            <li class="menu-item <?php if ($this->uri->segment(2, 0) == 'dashboard') {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/dashboard">
                    <span class="icon pe-7s-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-category">Go-Posyandu</li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "posyanduu") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/posyanduu">
                    <span class="icon pe-7s-ribbon"></span>
                    <span class="title">Posyandu</span>
                </a>
            </li>
            <li class="menu-category">Master</li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "imunisasi") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/imunisasi">
                    <span class="icon pe-7s-ribbon"></span>
                    <span class="title">Data Imunisasi</span>
                </a>
            </li>
                <li class="menu-item <?php if ($this->uri->segment(2, 0) == "kelainan") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/kelainan">
                    <span class="icon pe-7s-ribbon"></span>
                    <span class="title">Data Kelainan</span>
                </a>
            </li>
             <li class="menu-item <?php if ($this->uri->segment(2, 0) == "kader") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/kader">
                    <span class="icon pe-7s-ribbon"></span>
                    <span class="title">Data Kader</span>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "status_gizi") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/status_gizi">
                    <span class="icon pe-7s-ribbon"></span>
                    <span class="title">Status Gizi</span>
                </a>
            </li>
        </ul>
    </nav>

</aside>