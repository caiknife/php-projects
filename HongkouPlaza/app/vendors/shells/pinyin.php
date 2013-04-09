<?php
class PinyinShell extends Shell {
    public $uses = array(
        'Brand'
    );
    
    public function main() {
        App::import('Component', 'Pinyin');
        $pinyinComponent = new PinyinComponent();
        $this->Brand->recursive = -1;
        $brands = $this->Brand->select();
        $result['Brand'] = array();
        foreach ($brands as $brand) {
            $pinyin = $pinyinComponent->getPY($brand['Brand']['title']);
            if (!empty($pinyin)) {
                $this->Brand->id = $brand['Brand']['id'];
                $this->Brand->saveField('pinyin', $pinyin);
            }
        }
    }
}