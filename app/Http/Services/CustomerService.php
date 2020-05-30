<?php


namespace App\Http\Services;

use App\Customer;
use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepo;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function getAllCustomer()
    {
        return $this->customerRepo->getAll();
    }

    public function addCustomer($request)
    {
        return $this->customerRepo->save($request);
    }
}
