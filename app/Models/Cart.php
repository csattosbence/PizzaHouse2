<?php

namespace App\Models;

use Nette\NotImplementedException;

Class Cart
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item,$id)
    {
        $storedItem = ['qty' => 0,'price'=>$item->price, 'item' => $item];
        if ($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->totalPrice += $item->price;
        $this->totalQuantity++;
        $this->items[$id] = $storedItem;
    }

    public function extract($product,$id)
    {

        if ($this->items){
            if(array_key_exists($id,$this->items)){

                $stored_item = $this->items[$id];

                if ($stored_item['qty'] > 0)
                {
                    $stored_item['qty']--;
                    $stored_item['price'] -= $product->price;
                    $this->items[$id] = $stored_item;
                    $this->totalQuantity--;
                    $this->totalPrice -= $product->price;

                    if ($stored_item['qty']<1){
                        unset($this->items[$id]);
                    }
                }
            }
        }

    }

}
