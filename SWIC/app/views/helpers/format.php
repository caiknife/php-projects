<?php
class FormatHelper extends AppHelper {
    public function toDate($date, $format='Y.m.d') {
        return date($format, strtotime($date));
    }
    
    public function setWineAge() {
        $ageRange = range((int)date('Y')+1, 1980);
        return array_combine($ageRange, $ageRange);
    }
    
    public function setYearRange() {
        return $this->setWineAge();
    }
    
    public function setMonthRange() {
        $month = range(1, 12);
        return array_combine($month, $month);
    }
    
    public function setDayRange() {
        $day = range(1, 31);
        return array_combine($day, $day);
    }
    
    public function getTotalScore($score) {
        return sprintf('%d', ($score['score_color'] + $score['score_aroma'] + $score['score_aftertaste'] + $score['score_potential']));
    }
    
    public function getNewsLogo($news) {
        if (isset($news['media_url_list']) && $news['media_url_list']) {
            return '/attachments/photos/news_logo/'.$news['media_url_list'];
        } else {
            return '/img/newsList_70.jpg';
        }
    }
    
    public function getNewstypeLogo($newstype) {
        if (isset($newstype['media_url']) && $newstype['media_url']) {
            return '/attachments/photos/newstype_logo/'.$newstype['media_url'];
        } else {
            return '/img/newsList_70.jpg';
        }
    }
    
    public function getNewsBig($news) {
        if (isset($news['media_url_big']) && $news['media_url_big']) {
            return '/attachments/photos/news_big/'.$news['media_url_big'];
        } else {
            return '/img/newsTop_640.jpg';
        } 
    }
    
    public function getWineLogo($wine) {
        for ($i=1; $i<=5; $i++) {
            if ($wine['media_url_'.$i]) {
                return '/attachments/photos/wine_logo/'.$wine['media_url_'.$i];
            }
        }
        return '/img/liquor_100.jpg';
    }
    
    public function getWineBig($wine) {
        for ($i=1; $i<=5; $i++) {
            if ($wine['media_url_'.$i]) {
                return '/attachments/photos/wine_big/'.$wine['media_url_'.$i];
            }
        }
        return '/img/liquorBig_01.jpg';
    }
    
    public function getWineThumb($wine) {
        for ($i=1; $i<=5; $i++) {
            if ($wine['media_url_'.$i]) {
                return '/attachments/photos/wine_thumb/'.$wine['media_url_'.$i];
            }
        }
        return '/img/liquor_54.jpg';
    }
    
    public function getBanner($banner) {
        if (isset($banner['banner_file_path']) && $banner['banner_file_path']) {
            return '/attachments/photos/banner/'.$banner['banner_file_path'];
        } else {
            return '/img/banner.jpg';
        }
    }
    
    public function setCurrentMonthPriceAndRatio(&$wine) {
        if (empty($wine['PriceMonthly'])) {
            $wine['Wine']['current_month_price'] = '';
            $wine['Wine']['price_ratio'] = '';
        } else {
            $currentMonth = date('Y-n');
            $lastMonth = date('Y-n', strtotime('-1 month'));
            $prices = array();
            foreach ($wine['PriceMonthly'] as $price) {
                $prices[$price['year'].'-'.$price['month']] = $price;
            }
            if (isset($prices[$currentMonth])) {
                $wine['Wine']['current_month_price'] = $prices[$currentMonth]['price'];
                if (isset($prices[$lastMonth]) && $prices[$lastMonth]['price']) {
                    $wine['Wine']['price_ratio'] = sprintf('%d', ($prices[$currentMonth]['price']-$prices[$lastMonth]['price'])/$prices[$lastMonth]['price']*100);
                } else {
                    $wine['Wine']['price_ratio'] = '';    
                }
            } else {
                $wine['Wine']['current_month_price'] = '';
                $wine['Wine']['price_ratio'] = '';
            }
        }
    }
    
    public function getPriceRatioClass($ratio) {
        if ($ratio > 0) {
            return 'up';
        } else {
            return 'down';
        }
    }
    
    public function getPriceRadioDisplayValue($ratio) {
        if ($ratio > 0) {
            return '+'.$ratio;
        } else {
            return $ratio;
        }
    }
    
    public function getIndexPurchaseMonth($key) {
        $result = explode('-', $key);
        return $result[0].'年/'.$result[1].'月';
    }
    
    public function getTeamAvatar($team) {
        if (isset($team['media_url']) && $team['media_url']) {
            return '/attachments/photos/team/'.$team['media_url'];
        } else {
            return '/img/avatar.png';
        }
    }
    
    public function getPartnerLogo($partner) {
        if (isset($partner['media_url']) && $partner['media_url']) {
            return '/attachments/photos/partner/'.$partner['media_url'];
        } else {
            return '/img/partner.jpg';
        }
    }
    
    public function getWineScore($wine) {
        if (!empty($wine['TastingScore'])) {
            $total = $wine['TastingScore'][0]['score_color'] + $wine['TastingScore'][0]['score_aroma'] + $wine['TastingScore'][0]['score_aftertaste'] + $wine['TastingScore'][0]['score_potential'];
            return sprintf('%d', $total);
        } else {
            return '';
        }
    }
    
    public function isRatingHasMedia($rating) {
        for ($i=1; $i<=6; $i++) {
            if (!empty($rating['media_url_'.$i])) {
                return true;
            }
        }
        return false;
    }
}