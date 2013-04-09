<?php
class FormatHelper extends AppHelper {
    public function toDate($date, $format='Y.m.d') {
        return date($format, strtotime($date));
    }
    
    public function setYearRange() {
        $ageRange = range((int)date('Y')+1, 2000);
        return array_combine($ageRange, $ageRange);
    }
    
    public function setMonthRange() {
        $month = range(1, 12);
        return array_combine($month, $month);
    }
    
    public function getBanner($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/banner/'.$banner['banner_file_path'];
        } else {
            return '/images/department_01.jpg';
        }
    }
    
    public function getPartner($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/partner/'.$banner['banner_file_path'];
        } else {
            return '/images/cooperation_06.png';
        }
    }
    
    public function getBoard($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/board/'.$banner['banner_file_path'];
        } else {
            return '/images/board_01.jpg';
        }
    }
    
    public function getService($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/service/'.$banner['banner_file_path'];
        } else {
            return '/images/icon_service-01.png';
        }
    }
    
    public function getTeam($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/team/'.$banner['banner_file_path'];
        } else {
            return '/images/icon_expert.gif';
        }
    }
    
    public function getEquip($banner, $type='logo') {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            if ($type=='logo') {
                return '/attachments/photos/equip_logo/'.$banner['banner_file_path'];
            } elseif ($type=='big') {
                return '/attachments/photos/equip/'.$banner['banner_file_path'];
            } else {
                return '/images/s09.jpg';
            }
        } else {
            return '/images/s09.jpg';
        }
    }
    
    public function isNew($date) {
        $now = date('Ymd', strtotime('-7 days'));
        $day = date('Ymd', strtotime($date));
        if ($day > $now) {
            return true;
        } else {
            return false;
        }
    }
}