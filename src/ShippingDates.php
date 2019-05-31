<?php
namespace Jh\Shipping;
/**
 * Class ShippingDates
 * @package Jh\Shipping 
 */

class ShippingDates implements ShippingDatesInterface 
{ 
    /**   
    * @param \DateTime $orderDate
    * @return \DateTime
    */
    public function calculateDeliveryDate(\DateTime $orderDate)
    {
        $stOrderDate = $orderDate -> format('Y-m-d');   
        $deliveryDate = $orderDate -> modify('+3 days');  //add 3days regardless 
        $dayName = $deliveryDate -> format("l");          //using the deliverydate not orderdate to check and alter
        switch ($dayName)
        {
            case 'Monday': $deliveryDate -> modify('+2 days'); break;   //original day was Friday
            case 'Tuesday':$deliveryDate -> modify('+2 days'); break;   //original day was Saturday
            case 'Wednesday':  $deliveryDate -> modify('+1 days'); break;  //original day was Sunday
            case 'Thursday':  break;
            case 'Friday':  break;
            case 'Saturday': $deliveryDate -> modify('+2 days'); break;  //original day was Wednesdday
            case 'Sunday': $deliveryDate -> modify('+2 days'); break;    //original day was Thursday
            default: echo "ERROR - This should never happen"; break;
        }
        return ($deliveryDate);
    }
}