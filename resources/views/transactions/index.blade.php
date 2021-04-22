@extends('layouts.layout')
@section('content')
@section('title', 'Transactions | ' . config('app.name'))
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-head">
                            <h4 style="float: left">Sortie des Produits</h4>
                            <!-- <a href="" style="float: right" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addproduct">
                                        <i class="fa fa-plus"></i>Add new Products</a> -->
                        </div>
                        <form action="{{ route('transactions.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <table class="table table-bordered table-left">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Disc(%)</th>
                                            <th>Total</th>
                                            <th> <a href="#" class="btn btn-sm btn-primary rounded-circle add_more"><i
                                                        class="fa fa-plus-circle"></i></a> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="addMoreProduct">
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select name="product_id[]" id="product_id" class="form-control product_id">
                                                    <option value="">Select product</option>
                                                    @foreach ($products as $product)
                                                        <option data-price="{{ $product->price }}"
                                                            value="{{ $product->id }}">{{ $product->product_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="quantity[]" id="quantity"
                                                    class="form-control quantity">
                                            </td>
                                            <td>
                                                <input type="number" name="price[]" id="price" class="form-control price">
                                            </td>
                                            <td>
                                                <input type="number" name="discount[]" id="discount"
                                                    class="form-control discount">
                                            </td>
                                            <td>
                                                <input type="number" name="total_amount[]" id="total"
                                                    class="form-control total_amount">
                                            </td>
                                            <td><a href="#" class="btn btn-sm btn-danger delete rounded-circle"><i
                                                        class="fa fa-times-circle"></i></a></td>

                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="card">
                            <div class="card-head">
                                <h4>Total <b class="total">0.00</b></h4>
                            </div>
                            <div class="card-body">
                                <div class="panel">
                                    <div class="row">
                                        <table class="table table-striped">
                                            <tr>
                                                <td><label for="">Customer Name</label>
                                                    <input type="text" name="customer_name" id="" class="form-control">
                                    </div>
                                    </td>
                                    <td> <label for="">Customer Phone</label>
                                        <input type="number" name="customer_phone" id="" class="form-control">
                                </div>
                                </td>
                                </tr>
                                </table>
                                <td>Payment Method <br>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true"
                                            value="cash" checked="checked">
                                        <label for="payment_method"><i
                                                class="fa fa-money-bill text-success"></i>Cash</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true"
                                            value="bank transfer">
                                        <label for="payment_method"><i class="fa fa-university text-danger"></i>Bank
                                            Transfer</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true"
                                            value="credit card">
                                        <label for="payment_method"><i class="fa fa-credit-card text-info"></i>Lumicash ou
                                            Ecocash</label>
                                    </span>
                                </td><br>
                                <td>Payment
                                    <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                                </td>

                                <td>Returning Change
                                    <input type="number" readonly name="balance" id="balance" class="form-control">
                                </td>
                                <td>
                                    <button name="" id="" class="btn btn-primary btn-block mt-3">Save</button>
                                </td>
                                <!-- <td>
                                        <button type="button" name="" id=""
                                            class="btn btn-danger btn-block mt-1">Calculator</button>
                                    </td>-->
                                <!--<td>
                                    <div class="text-center">
                                        <a href="#" class="text-danger"><i class="fa fa-sign-out-alt"
                                                aria-hidden="true">Logout</i></a>
                                    </div>
                                </td>-->
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
