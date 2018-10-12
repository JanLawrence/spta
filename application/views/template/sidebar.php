
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="<?= base_url('assets/images/'.$user['user_type'].'-icon.png')?>" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name"> <?= $profile['first_name']?>  <?= $profile['last_name']?></p>
                        <div>
                            <small class="designation text-muted"><?= strtoupper($user['user_type'])?></small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                <!--<button class="btn btn-success btn-block">New Project
                    <i class="mdi mdi-plus"></i>
                </button>-->
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <?php
            if($user['user_type'] == "admin"){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('subjects') ?>">
                        <i class="menu-icon mdi mdi-format-list-bulleted"></i>
                        <span class="menu-title">Subjects</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('teachers') ?>">
                        <i class="menu-icon mdi mdi-account-multiple"></i>
                        <span class="menu-title">Teachers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-chart-histogram"></i>
                        <span class="menu-title">Student Logs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user_logs') ?>">
                        <i class="menu-icon mdi mdi-chart-histogram"></i>
                        <span class="menu-title">User Logs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-label-outline"></i>
                        <span class="menu-title">Announcement</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-message-alert"></i>
                        <span class="menu-title">Feedback</span>
                    </a>
                </li>
                <?php
            }else if($user['user_type'] == "parent"){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-chart-bubble"></i>
                        <span class="menu-title">Grade</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-clock-in"></i>
                        <span class="menu-title">Attendance</span>
                    </a>
                </li>
                <?php
            }else if($user['user_type'] == "student"){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-label-outline"></i>
                        <span class="menu-title">Announcement</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-chart-bubble"></i>
                        <span class="menu-title">Grade</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-clock-in"></i>
                        <span class="menu-title">Attendance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-message-alert"></i>
                        <span class="menu-title">Feedback</span>
                    </a>
                </li>
                <?php
            }else if($user['user_type'] == "teacher"){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('students')?>">
                        <i class="menu-icon mdi mdi-account-star"></i>
                        <span class="menu-title">Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-label-outline"></i>
                        <span class="menu-title">Announcement</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-chart-bubble"></i>
                        <span class="menu-title">Grade</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="menu-icon mdi mdi-clock-in"></i>
                        <span class="menu-title">Attendance</span>
                    </a>
                </li>
                <?php
            }


        ?>
    </ul>
</nav>