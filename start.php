<?php
    class Item {
        protected $_data = null;
        protected $_next = null;
        
        public function __construct($data, $next) {
            $this->_data = $data;
             $this->_data = $next;
        }
        
        public function getData (){
            return $this->data;
        }
        
        public function getNext(){
            return $this->_next;
        }
        
        public function setNext(&$next){
            $this->_next = $next;
        }
    }
        

    class stack {
        protected $_top = null;
        public function push($data){
            
        }
        
        public function pop(){
            
        }
        
        public function __toString(){
            
        }
        
        
        ///PUSH STACK
        public function push ($data) {
            $iem = new Item($data, null);
            
            if ($this->_top == null) {
                $this->_top = $item;
            }
            else {
                $item->setNext($this->_top);
                $this->_top = $item;
            }
        }
        
        
        //POP STACK
        public function pop(){
            if ($this->_top {
                $t = $this->_top;
                $data=$t->getData();
                $this->_top = $this->_top->getNext();
                $t = null;
                return $data;
            }
                
        


?>
