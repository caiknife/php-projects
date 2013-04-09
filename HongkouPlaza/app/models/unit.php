<?php
class Unit extends AppModel {
    public function clearTable() {
        $this->deleteAll(true, false);
    }
}