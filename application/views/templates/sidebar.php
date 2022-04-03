<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?= base_url('assets/'); ?>images/icon/ns.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">


        <nav class="navbar-sidebar">
            <hr class="account-dropdown__footer">
            <!-- Query Menu -->

            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC 
                            ";
            $menu = $this->db->query($queryMenu)->result_array();

            ?>
            <!-- Looping Menu -->
            <?php foreach ($menu as $m) : ?>
                <div class="sidebar-haeding">
                    <?= $m['menu']; ?>
                </div>

                <!-- Siapkan Sub Menu Sesuai Menu -->
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                    FROM `user_sub_menu`
                                    WHERE `menu_id` = $menuId
                                    AND `is_active` = 1
                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <?php foreach ($subMenu as $sm) : ?>

                    <ul class="list-unstyled navbar__list">
                        <?php if ($title == $sm['title']) : ?>
                            <li class="has-sub active">
                            <?php else : ?>
                            <li class="has-sub">
                            <?php endif; ?>
                            <a class="js-arrow pb-0" href="<?= base_url($sm['url']); ?>">
                                <i class="<?= $sm['icon']; ?>"></i><?= $sm['title']; ?></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list"></ul>
                            </li>
                    </ul>
                <?php endforeach; ?>
                <hr class="account-dropdown__footer">
            <?php endforeach; ?>


        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->