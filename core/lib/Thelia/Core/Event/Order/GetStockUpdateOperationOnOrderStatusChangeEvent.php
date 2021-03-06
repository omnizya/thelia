<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace Thelia\Core\Event\Order;

use Thelia\Core\Event\ActionEvent;
use Thelia\Model\Order;
use Thelia\Model\OrderStatus;

/**
 * Class OrderEvent
 * @package Thelia\Core\Event\Order
 */
class GetStockUpdateOperationOnOrderStatusChangeEvent extends ActionEvent
{
    const DECREASE_STOCK = -1;
    const INCREASE_STOCK = 1;
    const DO_NOTHING = 0;

    /** @var Order */
    protected $order = null;

    /** @var OrderStatus */
    protected $newOrderStatus = null;

    protected $operation = self::DO_NOTHING;

    /**
     * StockUpdateOnOrderStatusChangeEvent constructor.
     * @param Order $order
     * @param OrderStatus $newOrderStatus
     */
    public function __construct(Order $order, OrderStatus $newOrderStatus)
    {
        $this->order = $order;
        $this->newOrderStatus = $newOrderStatus;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return OrderStatus
     */
    public function getNewOrderStatus()
    {
        return $this->newOrderStatus;
    }

    /**
     * @return int
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param int $operation
     * @return $this
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }
}
