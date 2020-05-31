<?php


namespace App\Http\Repositories;

use App\Customer;
use Illuminate\Database\Eloquent\Collection;


class CustomerRepository
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }


    public function getAll()
    {
        return $this->customer->paginate(5);

    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function save($customer)
    {
        $customer->save();
    }
}
