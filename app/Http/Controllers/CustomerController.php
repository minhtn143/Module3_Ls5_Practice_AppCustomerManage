<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Env\Response;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\Http\Services\CustomerService;


class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index(){
        $customers = $this->customerService->getAllCustomer();
        return view('customers.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create(){
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $this->customerService->addCustomer($request);

        Session::flash('success', 'Create new customer success!');
        return redirect()->route('customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->dob      = $request->input('dob');
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa khách hàng thành công');

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }
}
