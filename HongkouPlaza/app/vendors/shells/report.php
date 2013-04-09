<?php
class ReportShell extends Shell {
    public $uses = array(
        'Member'
    );
    
    public function main() {
        $members = $this->Member->find('all');
        $this->out(count($members));
    }
}