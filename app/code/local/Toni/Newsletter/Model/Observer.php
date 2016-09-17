<?php

class Toni_Newsletter_Model_Observer
{
    public function setDates(Varien_Event_Observer $observer)
    {
        $subscriber = $observer->getSubscriber();
        
        if ($subscriber->dataHasChangedFor('subscriber_status')) {
            switch ($subscriber->getSubscriberStatus()) {
                case Mage_Newsletter_Model_Subscriber::STATUS_UNCONFIRMED:
                    $subscriber->setCreatedAt(now());
                    break;
                case Mage_Newsletter_Model_Subscriber::STATUS_SUBSCRIBED:
                    $subscriber->setConfirmedAt(now());
                    break;
                case Mage_Newsletter_Model_Subscriber::STATUS_UNSUBSCRIBED:
                    $subscriber->setUnsubscribedAt(now());
                    break;
            }
        }
    }

    public function blockAfterCreate(Varien_Event_Observer $observer)
    {
        $block = $observer->getBlock();

        if ($block instanceof Mage_Adminhtml_Block_Newsletter_Subscriber_Grid) {
            $block->addColumnAfter('created_at',
                array(
                    'header' => Mage::helper('newsletter')->__('Created'),
                    'index' => 'created_at'
                ),
                'status'
            );

            $block->addColumnAfter('confirmed_at',
                array(
                    'header' => Mage::helper('newsletter')->__('Confirmed'),
                    'index' => 'confirmed_at'
                ),
                'created_at'
            );

            $block->addColumnAfter('unsubscribed_at',
                array(
                    'header' => Mage::helper('newsletter')->__('Unsubscribed'),
                    'index' => 'unsubscribed_at'
                ),
                'confirmed_at'
            );
        }
    }
}