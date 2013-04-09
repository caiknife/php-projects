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
            return '/images/banner1.jpg';
        }
    }
    
    public function getPlan($banner, $type='logo') {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            if ($type=='logo') {
                return '/attachments/photos/plan_logo/'.$banner['banner_file_path'];
            } elseif ($type=='origin') {
                return '/attachments/photos/origin/'.$banner['banner_file_path'];
            } else {
                return '/attachments/photos/plan/'.$banner['banner_file_path'];
            }
        } else {
            return '/images/banner1.jpg';
        }
    }
    
    public function getGuest($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/guest/'.$banner['banner_file_path'];
        } else {
            return '/images/avartar.png';
        }
    }
    
    public function getExhibitor($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/exhibitor/'.$banner['banner_file_path'];
        } else {
            return '/images/avartar.png';
        }
    }
    
    public function getPartner($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/partner/'.$banner['banner_file_path'];
        } else {
            return '/images/taobao.png';
        }
    }

    public function getNewsLogo($news) {
        if (isset($news['news_pic_file_path']) && $news['news_pic_file_path']) {
            return '/attachments/photos/news/'.$news['news_pic_file_path'];
        } else {
            return '/images/newsList_70.jpg';
        }
    }
    
    public function getActivityLogo($news) {
        if (isset($news['activity_pic_file_path']) && $news['activity_pic_file_path']) {
            return '/attachments/photos/activity/'.$news['activity_pic_file_path'];
        } else {
            return '/images/activities.jpg';
        }
    }
}