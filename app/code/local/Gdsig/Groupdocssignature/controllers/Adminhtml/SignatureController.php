<?php

class Gdsig_Groupdocssignature_Adminhtml_SignatureController extends Mage_Adminhtml_Controller_Action
{
    public $jj;
    
    public function indexAction()
    {
    $this->loadLayout();
    
    // gether data
    $block = $this->getLayout()->getBlock('viewer'); 
//            //on initialize la variable
//        $retour = '';
//        /* we are doing the query to select all elements of the pfay_test table (thanks to our model test/test and we sort them by id_pfay_test */
//        $collection = Mage::getModel('groupdocsassembly/groupdocsassembly')->getCollection()
//                ->setOrder('id');
//
//        /* then, we check the result of the query and with the function getData() */
//        foreach ($collection as $data) {
//            $retour.= $data->getData('id') .' => '. $data->getData('file_id') .  '<br />';
//        }
//    $block->setData('doc',$retour);

    $this->renderLayout();
    }
    
    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Invalid form data.'));
            }
            
            /* here's your form processing */
            
            $message = $this->__('Your form has been submitted successfully.');
            Mage::getSingleton('adminhtml/session')->addSuccess($message);
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*');
    }
}