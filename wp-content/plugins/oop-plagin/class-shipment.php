
<?php
interface Shippment {
    public function send();
    public function tax();
}

class SendByPlane implements Shippment {
    public function send() {
        echo "Package sent by plane\n";
    }

    public function tax() {
        echo "Tax calculated for plane shipment\n";
    }
}

// تست
$shipment = new SendByPlane();
$shipment->send(); // خروجی: Package sent by plane
$shipment->tax();  // خروجی: Tax calculated for plane shipment
// اینترفیس یک قرارداد است مانند روش ارسال مالیات وتوسعه برنامه نویسان بعدی 