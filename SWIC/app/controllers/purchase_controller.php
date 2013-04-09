<?php
class PurchaseController extends AppController {
    public $uses = array(
        'IndexPurchase', 
    );
    
    // frontend goes here
    
    // cn frontend goes here
    
    public function cn_index() {
        
    }
    
    // backend goes here
    
    public function admin_index() {
        $purchases = $this->IndexPurchase->order('created DESC')->select();        
        $this->set('purchases', $purchases);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        if ($this->IndexPurchase->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
        
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $index = $this->data['AddIndex'];
        if ($this->IndexPurchase->save($index)) {
            $index['id'] = $this->IndexPurchase->id;
            $this->set('item', $index);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoLayout = false;
        $index = $this->IndexPurchase->where(array('id'=>$id))->first();
        if (!$index) {
            echo false;
        } else {
            $this->data['EditIndex'.$id] = $index['IndexPurchase'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
        
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $index = $this->data['EditIndex'.$id];
        $index['id'] = $id;
        if ($this->IndexPurchase->save($index)) {
            $this->set('item', $index);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
}