<?php

class Webguys_Telefonkeinpflicht_Model_Customer_Address extends Mage_Customer_Model_Address
{

    /**
     * Validate address attribute values
     *
     * @return bool
     */
    public function validate()
    {
        $errors = parent::validate();

        $transport = new Varien_Object();
        $transport->setErrors( $errors );
        $transport->setAddress( $this );

        Mage::dispatchEvent('customer_address_validation_errors', array('transport' => $transport ));

        $errors = $transport->getErrors();

        if ($errors === true || empty($errors))
        { // no errors: be true
            return true;
        }

        return $errors;
    }

}