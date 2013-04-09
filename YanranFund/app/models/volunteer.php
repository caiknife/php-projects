<?php
class Volunteer extends AppModel {
    public function getVolunteerListByType($type) {
        return $this->where(array(
            'is_display' => 1,
            'types LIKE' => '%|'.$type.'|%',
        ))->order("sort_{$type} ASC , id DESC")->select();
    }
}