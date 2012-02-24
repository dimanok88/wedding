<?php
class WebUser extends CWebUser {
    private $_model = null;

    function getRole() {
        if($user = $this->getModel()){
            // в таблице User есть поле role
            return $user->role;
        }
    }

    function getContent() {
        if($user = $this->getModel()){
            // в таблице User есть поле role
            return $user->content_id;
        }
    }

    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = Users::model()->findByPk($this->id, array('select' => 'role, content_id'));
        }
        return $this->_model;
    }
}

