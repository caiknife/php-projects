<?php
class FormatHelper extends AppHelper {
    public function toDate($date) {
        return date('Y.m.d', strtotime($date));
    }
    
    public function showBrands($brands) {
        if (empty($brands)) {
            return '';
        }
        $result = array();
        foreach ($brands as $brand) {
            $result[] = $brand['title'];
        }
        return implode('，', $result);
    }
    
    public function printTime($time) {
        $limit = time() - strtotime($time);
        $result = '';
        if ($limit > 0 && $limit < 60 ) {
            $result = $limit.'秒前';
        } elseif($limit >= 60 && $limit < 3600) {
            $i = floor($limit / 60);
            $s = $limit % 60;   
            $result = $i.'分'.$s.'秒前';
        } elseif ($limit >= 3600 && $limit < 3600*24 ) {
            $h = floor($limit / 3600);
            $_h = $limit % 3600;
            $i = ceil($_h/60);
            $result = "{$h}小时{$i}分前";
        } elseif ($limit >= 3600*24) {
            $d = floor($limit/(3600*24));
            echo "{$d}天前";
        } else {
            $result = '0秒前';
        }
        return $result;
    }
    
    public function showBrandMainPhoto($photo) {
        if (empty($photo)) {
            return '/images/brand_default.jpg'; 
        } else {
            return '/attachments/photos/brand_main_photo/'.$photo;
        }
    }
    
    public function showBrandLogoThumb($event) {
        if (empty($event['Brand'])) {
            return '/img/frontend/logo_57.png';
        } else {
            return '/attachments/photos/brand_logo_thumb/'.$event['Brand'][0]['logo'];
        }
    }
    
    public function getPost($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/post/'.$banner['banner_file_path'];
        }
    }
}