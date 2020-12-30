<?php

namespace TDP\User\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    //
    protected $table = 'order_details';
    protected $primaryKey = 'id';

    public function Products() {
        return $this->belongsTo('TDP\User\Models\Products', 'forigen_key', 'local_key');
    }
}
