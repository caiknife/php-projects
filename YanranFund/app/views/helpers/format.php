<?php
class FormatHelper extends AppHelper {
    public function toDate($date, $format='Y.m.d') {
        return date($format, strtotime($date));
    }
    
    public function getRandom($max=3) {
        return rand(1, $max);
    }
    
    public function setYearRange() {
        $ageRange = range((int)date('Y')+1, 2008);
        return array_combine($ageRange, $ageRange);
    }
    
    public function setMonthRange() {
        $month = range(1, 12);
        return array_combine($month, $month);
    }
    
    public function getNewsListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/news/'.$banner['banner_file_path'];
        } else {
            return '/images/260x180.jpg';
        }
    }
    
    public function getProjectListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/project/'.$banner['banner_file_path'];
        } else {
            return '/images/160x120.jpg';
        }
    }
    
    public function getPlanListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/plan/'.$banner['banner_file_path'];
        } else {
            return '/images/260x180.jpg';
        }
    }
    
    public function getVolunteerListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/volunteer/'.$banner['banner_file_path'];
        } else {
            return '/images/70x70.jpg';
        }
    }
    
    public function getHospitalListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/hospital/'.$banner['banner_file_path'];
        } else {
            return '/images/hospital_logo.png';
        }
    }
    
    public function getEnterpriseListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/enterprise/'.$banner['banner_file_path'];
        } else {
            return '/images/hospital_logo.png';
        }
    }
    
    public function getPersonListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/person/'.$banner['banner_file_path'];
        } else {
            return '/images/140x200.jpg';
        }
    }
    
    public function getLogoListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/logo/'.$banner['banner_file_path'];
        } else {
            return '/images/hospital_logo.png';
        }
    }
    
    public function getAlbumListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/photo_list/'.$banner['banner_file_path'];
        } else {
            return '/images/260x180.jpg';
        }
    }
    
    public function getPhotoListImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/photo_list/'.$banner['banner_file_path'];
        } else {
            return '/images/260x180.jpg';
        }
    }
    
    public function getPhotoBigImage($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/photo/'.$banner['banner_file_path'];
        } else {
            return '/images/bigPhoto_02.jpg';
        }
    }
    
    public function getMediaFile($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/files/'.$banner['banner_file_path'];
        } else {
            return '/files/empty';
        }
    }
    
    public function getTopicFile($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/files/'.$banner['banner_file_path'];
        } else {
            return '/files/empty';
        }
    }
    
    public function getHelpAttachmentImage($banner, $origin=false) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            if ($origin) {
                return '/attachments/photos/origin/'.$banner['banner_file_path'];
            } else {            
                return '/attachments/photos/help/'.$banner['banner_file_path'];
            }
        } else {
            return '/files/empty';
        }
    }
        
    public function getFileType($banner) {
        $file = pathinfo($banner);
        switch (strtolower($file['extension'])) {
            case 'docx':
            case 'doc':
                return 'doc';
                break;
            case 'pdf':
                return 'pdf';
                break;
        }
    }
}