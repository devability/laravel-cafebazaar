<?php
namespace Devability\LaravelCafebazaar;

class CafebazaarPurchase {

    public $data;

    public $is_subscription;

    public function __construct($data,$is_subscription) {
        $this->data = $data;
        $this->is_subscription = $is_subscription;
    }

    public function getConsumptionState() {
        return $this->data->consumptionState;
    }

    public function getPurchaseState() {
        return $this->data->purchaseState;
    }

    public function getKind() {
        return $this->data->kind;
    }

    public function getPayload() {
        return $this->data->developerPayload;
    }

    public function getTime() {
        return $this->data->purchaseTime;
    }

    public function getInitiationTimestampMsec() {
        return $this->data->initiationTimestampMsec;
    }

    public function getValidUntilTimestampMsec() {
        return $this->data->validUntilTimestampMsec;
    }

    public function isValid() {
        if($this->is_subscription){
            return $this->getKind() === 'androidpublisher#subscriptionPurchase';
        }else{
            return $this->getPurchaseState() === 0;
        }
    }

}
